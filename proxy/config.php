<?php
// Central config for API base URL, branch ID, and JWT auth
define('API_BASE_URL', 'https://allenkids.allenhouseschools.com');
define('ALLENKIDS_BAREILLY_BRANCH_ID', 5);
define('ALLENKIDS_BRANCH_ID', ALLENKIDS_BAREILLY_BRANCH_ID);
define('ALLENKIDS_SITE_NAME', 'Allen Kids Bareilly');
define('API_JWT_TOKEN', 'hgutuyg758374tg5f3738y87gusdfjhgjh$@.hgjgjhikj');

// SSL verification: disabled for local Docker/LAN testing, enabled on the live production domains.
$__localHosts = ['localhost', '127.0.0.1', '192.168.1.195'];
$__currentHost = $_SERVER['HTTP_HOST'] ?? 'localhost';
if (!defined('ALLENKIDS_VERIFY_SSL')) {
    define('ALLENKIDS_VERIFY_SSL', !in_array($__currentHost, $__localHosts, true) && !preg_match('/\.localhost$/i', $__currentHost));
}

if (!function_exists('api_auth_headers')) {
    /**
     * @param string[] $extra e.g. ['Content-Type: application/json']
     * @return string[]
     */
    function api_auth_headers(array $extra = []): array
    {
        $headers = ['Authorization: Bearer ' . API_JWT_TOKEN];
        foreach ($extra as $header) {
            $headers[] = $header;
        }
        return $headers;
    }
}

if (!function_exists('proxy_api_post')) {
    function proxy_api_post(string $endpoint, ?array $data): void
    {
        $ch = curl_init(rtrim(API_BASE_URL, '/') . '/' . ltrim($endpoint, '/'));
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => api_auth_headers(['Content-Type: application/json']),
            CURLOPT_POSTFIELDS => json_encode($data ?? []),
            CURLOPT_SSL_VERIFYPEER => ALLENKIDS_VERIFY_SSL,
            CURLOPT_SSL_VERIFYHOST => (ALLENKIDS_VERIFY_SSL ? 2 : 0),
        ]);

        $response = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        header('Content-Type: application/json');
        if ($response === false || $status < 100) {
            http_response_code(502);
            echo json_encode([
                'success' => false,
                'message' => 'Upstream API request failed',
                'error' => $error,
            ]);
            return;
        }

        http_response_code($status);
        echo $response;
    }
}

// ---- API response cache (file-based) --------------------------------------
// Caches GET responses from the upstream API so pages don't make a remote
// request per visit. Stale entries are still served if the API is unreachable.
if (!defined('ALLENKIDS_API_CACHE_TTL')) {
    define('ALLENKIDS_API_CACHE_TTL', 300); // seconds before revalidating
}
if (!defined('ALLENKIDS_API_CACHE_DIR')) {
    define('ALLENKIDS_API_CACHE_DIR', __DIR__ . '/cache');
}
// Guard line written at the top of every cache file: if the file is ever
// requested through the web server it executes and exits instead of leaking.
define('ALLENKIDS_API_CACHE_GUARD', '<?php exit; // api-cache' . "\n");

if (!function_exists('api_cache_file')) {
    function api_cache_file(string $url): string
    {
        return rtrim(ALLENKIDS_API_CACHE_DIR, '/\\') . '/' . sha1($url) . '.php';
    }
}

if (!function_exists('api_cache_get')) {
    /**
     * Returns the cached response body for $url (without the guard line).
     * $fresh is set true when the entry is within TTL, false when stale.
     */
    function api_cache_get(string $url, bool &$fresh): ?string
    {
        $file = api_cache_file($url);
        if (!is_file($file)) {
            return null;
        }
        $fresh = (time() - (int) @filemtime($file)) < ALLENKIDS_API_CACHE_TTL;
        $raw = @file_get_contents($file);
        if ($raw === false || strpos($raw, ALLENKIDS_API_CACHE_GUARD) !== 0) {
            return null;
        }
        $body = substr($raw, strlen(ALLENKIDS_API_CACHE_GUARD));
        return $body === '' ? null : $body;
    }
}

if (!function_exists('api_cache_put')) {
    function api_cache_put(string $url, string $body): void
    {
        $dir = rtrim(ALLENKIDS_API_CACHE_DIR, '/\\');
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
        @file_put_contents(api_cache_file($url), ALLENKIDS_API_CACHE_GUARD . $body, LOCK_EX);
    }
}

if (!function_exists('api_get_handle')) {
    /** curl handle for a GET against the API with sane timeouts. */
    function api_get_handle(string $url)
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT        => 15,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPHEADER     => api_auth_headers(),
            CURLOPT_SSL_VERIFYPEER => ALLENKIDS_VERIFY_SSL,
            CURLOPT_SSL_VERIFYHOST => (ALLENKIDS_VERIFY_SSL ? 2 : 0),
        ]);
        return $ch;
    }
}

if (!function_exists('api_get_cached')) {
    /**
     * GET $url with file caching. Returns the raw body, or null on failure with
     * no usable cache. $httpCode (when given) is the upstream status, 200 for
     * cache hits, 0 when nothing could be fetched. $fromCache reports whether
     * the returned body came from disk.
     */
    function api_get_cached(string $url, ?int &$httpCode = null, ?bool &$fromCache = null): ?string
    {
        $fresh = false;
        $cached = api_cache_get($url, $fresh);
        if ($cached !== null && $fresh) {
            $httpCode = 200;
            $fromCache = true;
            return $cached;
        }

        $ch = api_get_handle($url);
        $body = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($body === false) {
            error_log('cURL Error: ' . $error . ' | URL: ' . $url);
            if ($cached !== null) {
                $httpCode = 200;
                $fromCache = true;
                return $cached;
            }
            $httpCode = 0;
            $fromCache = false;
            return null;
        }

        if ($status >= 500 && $cached !== null) {
            $httpCode = 200;
            $fromCache = true;
            return $cached;
        }

        if ($status >= 200 && $status < 300 && $body !== '') {
            api_cache_put($url, $body);
        }
        $httpCode = $status;
        $fromCache = false;
        return $body;
    }
}

if (!function_exists('proxy_api_multipart_post')) {
    /**
     * @return array{response: string|false, status: int, error: string}
     */
    function proxy_api_multipart_post(string $endpoint, array $postData): array
    {
        $ch = curl_init(rtrim(API_BASE_URL, '/') . '/' . ltrim($endpoint, '/'));
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => api_auth_headers(),
            CURLOPT_SSL_VERIFYPEER => ALLENKIDS_VERIFY_SSL,
            CURLOPT_SSL_VERIFYHOST => (ALLENKIDS_VERIFY_SSL ? 2 : 0),
        ]);

        $response = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        return [
            'response' => $response,
            'status' => $status,
            'error' => $error,
        ];
    }
}
