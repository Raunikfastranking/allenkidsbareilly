<?php
require_once dirname(__DIR__) . '/config.php';

$api_url = API_BASE_URL;

function fetchMultipleApiData($endpoints)
{
    $baseUrl = rtrim(API_BASE_URL, '/') . '/api';
    $mh = curl_multi_init();
    $curlHandles = [];
    $pending = [];
    $responses = [];
    // Serve fresh cache hits immediately, queue the rest for parallel fetch
    foreach ($endpoints as $key => $endpoint) {
        $url = $baseUrl . $endpoint;
        $fresh = false;
        $cached = api_cache_get($url, $fresh);
        if ($cached !== null && $fresh) {
            $responses[$key] = $cached;
        } else {
            $ch = api_get_handle($url);
            curl_multi_add_handle($mh, $ch);
            $curlHandles[$key] = $ch;
            $pending[$key] = ['url' => $url, 'stale' => $cached];
        }
    }
    $running = null;
    do {
        $status = curl_multi_exec($mh, $running);

        if ($status > CURLM_OK) {
             break;
        }
        if (curl_multi_select($mh) === -1) {
            usleep(10000);
        }
    } while ($running > 0);

    // Collect responses
    foreach ($curlHandles as $key => $ch) {
        $content = curl_multi_getcontent($ch);
        $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $info = $pending[$key];
        if ($content === false || $content === null || ($httpCode >= 500 && $info['stale'] !== null)) {
            $responses[$key] = $info['stale'];
        } else {
            if ($httpCode >= 200 && $httpCode < 300 && $content !== '') {
                api_cache_put($info['url'], $content);
            }
            $responses[$key] = $content;
        }
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    foreach ($responses as $key => $body) {
        $responses[$key] = $body === null ? null : json_decode($body, true);
    }
    return $responses;
}
$endpoints = [
   'landing_data' =>'/pages/landing-page-bareilly',
   'layoutParts' => '/public/branches/5/layout-parts/',
  ];

$data = fetchMultipleApiData($endpoints);
$landing_data = $data['landing_data'];
$layoutParts = $data['layoutParts'];
?>
