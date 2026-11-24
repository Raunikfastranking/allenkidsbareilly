<?php
require_once 'config.php';

function fetchApiData($endpoint) {
    $url = rtrim(API_BASE_URL, '/') . '/' . ltrim($endpoint, '/');

    $body = api_get_cached($url);
    if ($body === null) {
        echo "cURL Error: unable to reach API";
        return null;
    }

    return json_decode($body, true);
}
