<?php

try {
    $mysqli = new PDO("mysql:host=localhost;dbname=bettingexpert", "USERNAME", "PASSWORD");
} catch (Exception $ex) {
    die("Error: " . $ex->getMessage());
}
