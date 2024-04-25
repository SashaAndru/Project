<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeMoney</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php session_start(); ?>
</head>
<body>
    <h3>Welcome to FreeMoney!</h3>
    <div class="loginPanel">  
        <?php 
            if(empty($_SESSION["username"])){
                ?>  <form action="login.php" method="post"> <input type="submit" name="login" value="Login"> </form>
                <form action="login.php" method="post"> <input type="submit" name="registration" value="Registration"> </form>
            <?php }
            else if(!empty($_SESSION["username"])){
                ?> <form action="login.php" method="post"> <input type="submit" name="logout" value="Log out"> </form> <?php
             } ?>
    </div>
    <hr>
</body>
</html>