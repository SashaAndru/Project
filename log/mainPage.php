<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainPage</title>
    <?php session_start();?>
</head>
<header>
    <?php include("header.php"); ?>
</header>
<body>
    <?php 
        if(empty($_SESSION["username"])){
            echo "Please login";
        }
        else if(!empty($_SESSION["username"])){
            echo "Hello, " . $_SESSION["username"]; 
         } ?>
</body>
</html>