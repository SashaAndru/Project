<?php 
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");
if($_SESSION["id"]==null){
    header("Location: ../log/login.php");
}

function getTodayDate() {
    // Отримуємо поточну дату
    $today = date("Y-m-d");
    return $today;
}

$idMatch=$_GET["id-match"];
$stavkaKomand=$_GET["stavka-komand"];
$user=$_SESSION["id"];
$date = getTodayDate();


if($stavkaKomand>2||$stavkaKomand<1){
    header("Location: ../index.php");
}

$Userino = mysqli_query($link,"SELECT * FROM `Users` WHERE `id_User`= '$user' ");

            if(mysqli_num_rows($Userino)>0){
               $row = mysqli_fetch_array($Userino);

               do{
                $userBalans=$row['Points'];

               }while($row = mysqli_fetch_array($Userino));
    }

$result = mysqli_query($link,"SELECT * FROM `MatchVS` WHERE `id_Match`= '$idMatch' ");

            if(mysqli_num_rows($result)>0){
               $row = mysqli_fetch_array($result);

               do{
                 $title1=$row["Komand_1"];
                 $title2=$row["Komand_2"];
                 $image=$row["Foto_Match"];
                 $dateStart=$row["Date_Start"];
                 $dateEnd=$row["Date_End"];

                 if($stavkaKomand==1){
                    $komand=$row["Komand_1"];
                    $koef=$row["Koef_Team1"];
                 }else if($stavkaKomand==2){
                    $komand=$row["Komand_2"];
                    $koef=$row["Koef_Team2"];
                 }

               }while($row = mysqli_fetch_array($result));
    }
$title="$title1 VS $title2";
// $kinetsTsena= 700*$koef;Formula

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/ResetStyles.css">
    <link rel="stylesheet" type="text/css" href="../css/new-Stavka.css">
    <link rel="shortcut icon" href="../adminPhoto/logo/logoTip.ico">
    <title><?=$title?></title>
</head>
<body style="background: url(../<?=$image?>)0 0/100% no-repeat fixed;">
    
<div class="stavka-na-sport">
    <form>
        <Label>Назва команди:</Label>
        <input class="not-change" type="text" readonly name="NameKomand" value="<?=$komand?>">
        <Label>Коефіцієнт:</Label>
        <input class="not-change" type="text" readonly name="Koefi" value="<?=$koef?>">
        <Label>Ваш рахунок:</Label>
        <input class="stavka" type="number" name="rahunok" readonly value="<?=$userBalans?>">
        <Label>Ваша ставка:</Label>
        <input class="stavka" type="number" name="stavka">
        <Label>Виграш:</Label>
        <input class="not-change" type="text" name="viigrash" readonly value="0">
        <Label>На рахунку залишиться:</Label>
        <input class="not-change" type="text" name="zalishok" readonly value="0">
        <input class="none" name="id_user" type="text" value="<?=$user?>">
        <input class="none" name="id_match" type="text" value="<?=$idMatch?>">
        <input class="none" name="date" type="date" value="<?=$date?>">
        <button class="btn-stavka" type="submit">Поставити ставку!</button>
        <div class="silka-home"><a href="../index.php">Повернутися до головної...</a></div>
        <div class="msg non"><span>Lorem, ipsum dolor sit </span></div>
    </form>
</div>
<script src="../js/jquery-3.7.1.js"></script>
<script src="../js/new-Stavka.js"></script>
</body>
</html>