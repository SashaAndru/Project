<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");

$NameKomand=$_POST["NameKomand"];
$Koefi=$_POST["Koefi"];
$stavka=$_POST["stavka"];
$viigrash=$_POST["viigrash"];
$zalishok=$_POST["zalishok"];
$id_user=$_POST["id_user"];
$id_match=$_POST["id_match"];
$date=$_POST["date"];

$error_fields=[];

if($stavka == ''){
    $error_fields[]='stavka';
}

if(!empty($error_fields)){

$response = [
    "status"=>false,
    "type" => 1,
    "message"=>"Зробіть ставку...",
    "fields" => $error_fields
];

echo json_encode($response);

    die();
}

if($zalishok<0){
    $error_fields[]='stavka';
}

if(!empty($error_fields)){

$response = [
    "status"=>false,
    "type" => 1,
    "message"=>"Недостатньо коштів...",
    "fields" => $error_fields
];

echo json_encode($response);

    die();
}

if($stavka<0){
    $error_fields[]='stavka';
}

if(!empty($error_fields)){

$response = [
    "status"=>false,
    "type" => 1,
    "message"=>"Не коректне значення...",
    "fields" => $error_fields
];

echo json_encode($response);

    die();
}

mysqli_query($link, "INSERT INTO `Stavka`( `Id_User`, `id_Match`, `Name_Komand`,
 `Koef`, `Suma`, `result`, `DataUser`, `Active`) VALUES ('$id_user','$id_match',
 '$NameKomand','$Koefi','$stavka','$viigrash','$date','1')");

mysqli_query($link, "UPDATE `Users` SET `Points`='$zalishok' WHERE `id_User`= '$id_user'");


    $response = [
        "status" => true
    ];

    
    echo json_encode($response);









?>