<?php
    // тут моя дб, обережно зi змiнами
   /* $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_database = "Stavki";
    $link = "";
    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
    if (!$link) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
    }*/

//дб Юри:
$db_host = 'localhost';
$db_user = 'Yuras1k';
$db_pass = '12345';
$db_database = 'Stavki';

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>