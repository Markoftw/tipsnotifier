<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'db.php';
require_once 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
require_once 'functions/sanitize.php';

spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php';
});
