<?php
        $headers[] = "Accept: application/vnd.github+json";
        $headers[] = "Authorization: Bearer ";
        $headers[] = "X-GitHub-Api-Version: 2022-11-28";
        $headers[] = "User-Agent: Awesome-Octocat-App";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/xDarinox/GDPS-Cloud/releases/latest");
        $result = json_decode(curl_exec($ch), true);
      

    //$gitData = '';
   
    echo str_replace(['`', '\n', '#', '**', '*'], ['</code>', '</br>', '<h3>', '<b>', '&#9679;'], file_get_contents($result['assets'][0]['browser_download_url']));