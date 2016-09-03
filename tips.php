<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

require_once 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$url = "http://www.bettingexpert.com/tips.rss";

//$feed = file_get_contents($url);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2");
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

$response = curl_exec($ch);

curl_close($ch);

echo $response;
