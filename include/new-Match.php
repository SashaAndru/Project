<?php 
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/ResetStyles.css">
    <link rel="stylesheet" type="text/css" href="../css/new-Match.css">
    <link rel="shortcut icon" href="../adminPhoto/logo/logoTip.ico">
    <title>Новий матч</title>
</head>
<body style="background: url(../adminPhoto/logo/VS.jpg)0 0/100% no-repeat fixed;">
    
<div class="form-new-Match">
<form>
<label >Оберіть назву дисципліни:</label>
<select name="id_game" >
<option value="1">Футбол</option>
<option value="2">Counter-Strike 2</option>
<option value="3">Dota 2</option>
<option value="4">Warcraft 3</option>
<option value="5">StarCraft II</option>
<option value="6">League of Legends</option>
<option value="7">Smite</option>
<option value="8">Battlegrounds</option>
<option value="9">Hearthstone</option>
<option value="10">Heroes of the Storm</option>
<option value="11">Vainglory</option>
<option value="12">World of Tanks</option>
<option value="13">Fortnite</option>
<option value="14">Valorant</option>
<option value="15">Call of Duty: Modern Warfare III</option>
<option value="16">Волейбол</option>
<option value="17">Баскетбол</option>
<option value="18">Те́ніс</option>
<option value="19">Бейсбо́л</option>
<option value="20">Бокс</option>
<option value="21">Футза́л</option>
<option value="22">MMA</option>
<option value="23">Гандбол</option>
<option value="24">Снукер</option>
<option value="25">Мотоспо́рт</option>
<option value="26">Американський футбол</option>
<option value="27">Хокей</option>
<option value="28">Пляжний волейбол</option>
</select>
<label>Вкажіть 1 команду:</label>
<input type="text" name="nameOne">
<label>Вкажіть 2 команду:</label>
<input type="text" name="nameTwo">
<label>Короткий опис:</label>
<textarea  name="SmallOpis" cols="40" rows="3" maxlength="100"></textarea>
<label>Фото матчу:</label>
<input type="file" name="MatchFoto">
<label>Коефіцієнт для 1 команди:</label>
<input type="number" name="KoefOne">
<label>Коефіцієнт для 2 команди:</label>
<input type="number" name="KoefTwo">
<label>Дата старту:</label>
<input type="date" name="dateStart">
<label>Дата кінця:</label>
<input type="date" name="dateEnd">
<button type="submit" class="btn-new-Match">Створити!</button>
<div class="silka-home"><a href="../index.php">Повернутися до головної...</a></div>
        <div class="msg non"><span>Lorem, ipsum dolor sit </span></div>
</form>
</div>
<script src="../js/jquery-3.7.1.js"></script>
<script src="../js/new-Match.js"></script>
</body>
</html>