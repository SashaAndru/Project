<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Style/Login.css">
    <?php include("../include/db_connect.php");?> 
    <?php session_start();?>
</head>
<body>
    <div id="loginForm">
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <label id="Txt">E-mail:</label> <br>
            <input class="inp" type="email" name="email" placeholder="Введіть свою пошту"> <br>
            <label id="Txt">Password:</label> <br>
            <input class="inp" type="password" name="password" placeholder="Введіть свій пароль"> <br><br>
            <input class="inp" type="submit" name="loginF" value="Увійти">
        </form>
    </div>
</body>
</html>

<?php 
//functions
//login function
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["loginF"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sqlLogin = "SELECT * FROM Users WHERE email = '$email'";
        $result = mysqli_query($link, $sqlLogin);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $db_password = $row["Password"];
            if(password_verify($password, $db_password)){
                session_start();
                $_SESSION["id"] = $row["id_User"];
                $_SESSION["name"] = $row["Name"];
                $_SESSION["email"] = $row["Email"];
                $_SESSION["balance"] = $row["Points"];
                $_SESSION["lvl"] = $row["LVL"];
                header("Location: ../index.php");
            }
            else{echo"password incorrect";}    
        }
        else{echo "no user";}
    }
}
?>