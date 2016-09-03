<?php

Class Connections
{

    public static function Connection($url, $token, $type = null)
    {
        $post = '{"jsonrpc": "2.0"}';

        $header[] = 'X-Username: USERNAME'; // change me
        $header[] = 'X-Api-Token: ' . $token;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2");
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (!is_null($type)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        } else {
            curl_setopt($ch, CURLOPT_HTTPGET, 1);
        }
        $ret = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($http_status == 200) {
            return $ret;
        } else {
            return "<br><br>HTTP Return Code: {$http_status}";
        }

    }


    public static function Token()
    {
        $url = 'http://www.bettingexpert.com/api/auth/login/USERNAME/PASSWORD'; // change me

        $post = '{"jsonrpc": "2.0"}';

        $header[] = 'Accept: application/json';

        $ch = curl_init();
        if ($ch === false) {
            die('No cURL initialisation');
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2");
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $ret = curl_exec($ch);
        if ($ret === false) {
            die('curl_exec() returned false .. message: ' . curl_error($ch));
        }
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($http_status == 200) {
            return $ret;
        } else {
            return "<br><br>HTTP Return Code: {$http_status}";
        }

    }
}
