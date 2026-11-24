<?php
require_once __DIR__ . '/config.php';

$branchId = ALLENKIDS_BAREILLY_BRANCH_ID;
$apiUrl = rtrim(API_BASE_URL, '/') . "/api/grades/{$branchId}";

$response = api_get_cached($apiUrl);

if ($response !== null) {
    $json = json_decode($response, true);
    if (is_array($json) && isset($json['status']) && $json['status'] === 'success') {
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

echo '<option value="">No grades available</option>';
