<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");

$id_game=$_POST["id_game"];
$nameOne=$_POST["nameOne"];
$nameTwo=$_POST["nameTwo"];
$SmallOpis=$_POST["SmallOpis"];
$KoefOne=$_POST["KoefOne"];
$KoefTwo=$_POST["KoefTwo"];
$dateStart=$_POST["dateStart"];
$dateEnd=$_POST["dateEnd"];

$error_fields=[];

if($nameOne == ''){
    $error_fields[]='nameOne';
}

if($nameTwo == ''){
    $error_fields[]='nameTwo';
}

if($SmallOpis == ''){
    $error_fields[]='SmallOpis';
}

if($KoefOne == ''){
    $error_fields[]='KoefOne';
}

if($KoefTwo == ''){
    $error_fields[]='KoefTwo';
}

if($dateStart == ''){
    $error_fields[]='dateStart';
}

if($dateEnd == ''){
    $error_fields[]='dateEnd';
}

if(!$_FILES['MatchFoto']){
    $error_fields[]='MatchFoto';
}


if(!empty($error_fields)){

$response = [
    "status"=>false,
    "type" => 1,
    "message"=>"Заповніть усі поля...",
    "fields" => $error_fields
];

echo json_encode($response);

    die();
}

$path = 'adminPhoto/Match/' .time(). $_FILES['MatchFoto']['name'];
    if(!move_uploaded_file($_FILES['MatchFoto']['tmp_name'], '../'.$path)){
        $response = [
            "status"=>false,
            "type" => 2,
            "message"=>"Помилка при загрузці файлу...",
        ];
        
        echo json_encode($response);
    }
    mysqli_query($link,"INSERT INTO `MatchVS`(`id_Game`, `Komand_1`, `Komand_2`,
     `Opis_Match`, `Foto_Match`, `Koef_Team1`, `Koef_Team2`, `Date_Start`, `Date_End`, 
     `Visible`) VALUES ('$id_game','$nameOne','$nameTwo','$SmallOpis','$path'
     ,'$KoefOne','$KoefTwo','$dateStart','$dateEnd','1')");

$response = [
    "status"=>true,
];

echo json_encode($response);


?>