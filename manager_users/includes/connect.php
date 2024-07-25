<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
try {
    if (class_exists('PDO')) {
        $dsn = 'mysql:dbname=' . _DB . ';host=' . _HOST;
        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $conn = new PDO($dsn, _USER, _PASS, $option);
        // var_dump($conn); 
    }
} catch (Exception $exception) {
    echo $exception->getMessage() . '<br>';
    die();
}
