<?php
require_once dirname(__DIR__) . '/proxy/config.php';

$apiUrl = 'https://allenp.superhouseerp.com/api/form-enquiry/get-active-sessions';

$response = api_get_cached($apiUrl);

if ($response === null) {
    exit;
}

$data = json_decode($response, true);

if (!is_array($data)) {
    exit;
}

foreach ($data as $item) {
    $sessionName = trim($item['session'] ?? $item['Session'] ?? '');
    if ($sessionName === '') {
        continue;
    }
    echo '<option value="' . htmlspecialchars($sessionName) . '">'
        . htmlspecialchars($sessionName) .
    '</option>';
}
