<?php

require_once dirname(__DIR__) . '/proxy/config.php';



if (!function_exists('allenkids_fetch_sessions')) {

    function allenkids_fetch_sessions(): array

    {

        static $sessions = null;

        if (is_array($sessions)) {

            return $sessions;

        }



        $sessions = [];

        $apiUrl = rtrim(API_BASE_URL, '/') . '/api/school-sessions';

        $httpCode = 0;

        $response = api_get_cached($apiUrl, $httpCode);



        if ($response === null || $httpCode !== 200) {

            error_log("Sessions API failed - HTTP $httpCode");

            return $sessions;

        }



        $json = json_decode($response, true);

        if (

            json_last_error() === JSON_ERROR_NONE &&

            isset($json['status']) &&

            $json['status'] === 'success'

        ) {

            $sessions = $json['data']['data'] ?? [];

        }



        return $sessions;

    }

}



return allenkids_fetch_sessions();
