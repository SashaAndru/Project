<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="log/style.css">
    <?php include("db_connect.php");?>
</head>
<body>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["login"])){
        session_start();?>
        <div id="loginForm">
            <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                <label>E-mail:</label> <br>
                <input type="email" name="email"> <br>
                <label>Password:</label> <br>
                <input type="password" name="password"> <br>
                <input type="submit" name="loginF" value="Увійти">
            </form>
        </div>
    <?php }
}?>
</body>
</html>


<?php 
//functions

//logout function
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["logout"])){
        session_start();
        session_unset();
        session_destroy();
        header("Location: mainPage.php");
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["ok"])){
        header("Location: mainPage.php");
    }
}

//ligin function
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["loginF"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sqlLogin = "SELECT * FROM Users WHERE email = '$email'";
        $result = mysqli_query($conn, $sqlLogin);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $db_password = $row["Password"];
            if(password_verify($password, $db_password)){
                session_start();
                $_SESSION["username"] = $row["Name"];
                $_SESSION["email"] = $row["Email"];
                header("Location: mainPage.php");
            }
            else{echo"password incorrect";}    
        }
        else{echo "no user";}
    }
}


?>