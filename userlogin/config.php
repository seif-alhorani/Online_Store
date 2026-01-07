<?php

$db_host = getenv('DB_HOST') ?: 'localhost';
$db_name = getenv('DB_NAME') ?: 'useraccounts';
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');

if ($db_user === false || $db_pass === false) {
    throw new RuntimeException('Database credentials not set. Please set DB_USER and DB_PASS.');
}

$db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
