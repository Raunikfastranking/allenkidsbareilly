<?php
require_once 'config.php';

function fetchApiData($endpoint) {
    $url = rtrim(API_BASE_URL, '/') . '/' . ltrim($endpoint, '/');
    $body = api_get_cached($url);
    return $body === null ? null : json_decode($body, true);
}

/**
 * Fetch several endpoints in parallel (curl_multi) with the same file cache
 * as fetchApiData(). Returns an array keyed by endpoint holding the decoded
 * JSON (or null) exactly as fetchApiData() would return per endpoint.
 *
 * @param string[] $endpoints
 * @return array<string, mixed>
 */
function fetchApiDataMulti(array $endpoints): array
{
    $results = [];
    $pending = [];

    foreach ($endpoints as $endpoint) {
        $url = rtrim(API_BASE_URL, '/') . '/' . ltrim($endpoint, '/');
        $fresh = false;
        $cached = api_cache_get($url, $fresh);
        if ($cached !== null && $fresh) {
            $results[$endpoint] = $cached;
        } else {
            $pending[$endpoint] = ['url' => $url, 'stale' => $cached];
        }
    }

    if ($pending) {
        $mh = curl_multi_init();
        $handles = [];
        foreach ($pending as $endpoint => $info) {
            $ch = api_get_handle($info['url']);
            curl_multi_add_handle($mh, $ch);
            $handles[$endpoint] = $ch;
        }

        do {
            $status = curl_multi_exec($mh, $running);
            if ($status > CURLM_OK) {
                break;
            }
            if (curl_multi_select($mh) === -1) {
                usleep(10000);
            }
        } while ($running > 0);

        foreach ($handles as $endpoint => $ch) {
            $body = curl_multi_getcontent($ch);
            $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $info = $pending[$endpoint];
            if ($body === false || $body === null || ($httpCode >= 500 && $info['stale'] !== null)) {
                $results[$endpoint] = $info['stale'];
            } else {
                if ($httpCode >= 200 && $httpCode < 300 && $body !== '') {
                    api_cache_put($info['url'], $body);
                }
                $results[$endpoint] = $body;
            }
            curl_multi_remove_handle($mh, $ch);
            curl_close($ch);
        }
        curl_multi_close($mh);
    }

    foreach ($results as $endpoint => $body) {
        $results[$endpoint] = $body === null ? null : json_decode($body, true);
    }
    return $results;
}
