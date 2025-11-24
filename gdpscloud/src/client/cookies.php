<?php
    // Sessions values
    $s_udid = $_COOKIE['udid'] ?? NULL;
    $s_userID = $_COOKIE['userID'] ?? NULL;
    $s_uname = $_COOKIE['uname'] ?? NULL;
    $s_email = $_COOKIE['email'] ?? NULL;
    $s_avatar = urldecode($_COOKIE['avatar']) ?? NULL;


    $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_URL, "https://api.darinoxgdps.ru/v1/hosting/getServerID.php");
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query([
            'userID' => $s_userID,
            'secret' => '_uHWFOEyVkH6xsw'
        ]));
        $result = curl_exec($curl);
    $s_servers = $_COOKIE['servers'] ?? $result;