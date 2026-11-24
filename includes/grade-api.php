<?php
require_once dirname(__DIR__) . '/proxy/config.php';

$branchId = ALLENKIDS_BAREILLY_BRANCH_ID;
$apiUrl = rtrim(API_BASE_URL, '/') . "/api/grades/{$branchId}";

$httpCode = 0;
$response = api_get_cached($apiUrl, $httpCode);

if ($response !== null && $httpCode === 200) {
    $json = json_decode($response, true);
    if (isset($json['status']) && $json['status'] === 'success') {
        $grades = $json['data']['data'] ?? [];
        foreach ($grades as $grade) {
            $name = trim($grade['grades'] ?? '');
            if ($name !== '') {
                $escaped = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                echo "<option value=\"{$escaped}\">{$escaped}</option>\n";
            }
        }
        return;
    }
}

echo '<option value="">No grades available (API error)</option>';
