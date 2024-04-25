<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include("db_connect.php");?>
</head>
<body>
    
<?php //registration form 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["registration"])){ ?>
        <div id="registrationFormDiv">
            <form id="registrationForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <label>Ім'я: </label> <br>
            <input type="text" name="name"> <br>
            <label>E-mail: </label> <br>
            <input type="email" name="email"> <br>
            <label>Введіть пароль: </label> <br>
            <input type="password" name="password0"> <br> 
            <label>Введіть пароль ще раз:</label> <br>
            <input type="password" name="password1"> <br>
            <label for="over18">
                <input type="checkbox" name="over18">
                Мені більше 18 років
            </label><br>
            <label for="rulesAgree">
                <input type="checkbox" name="rulesAgree">
                Я згоден на обробку своїх персональних данних, та з правилами сайту
            </label><br>
            <input type="submit" name="registrationF" value="Зареєструватися">
            <div id="errorMessage"></div>
            </form>
        </div>
    <?php }
} ?>


<?php
//login form
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

//registration function
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["registrationF"])){
        $validationErrors = validateForm();
        if ($validationErrors === true) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = password_hash($_POST["password0"], PASSWORD_DEFAULT);
            $addUserSql="INSERT INTO users (Name, Email, Password)
                         VALUES ('$name','$email','$password')";
            mysqli_query($conn, $addUserSql);
            mysqli_close($conn);
            ?> 
            <p style="color: green;">Реєстрація успішна!</p>
            <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <input type="submit" name="ok" value="ok"></form>
            <?php
        }
        else {
            // Отобразить сообщения об ошибках
            echo "<p style='color: red;'>".$validationErrors."</p>";}
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
                header("Location: mainPage.php");
            }
            else{echo"password incorrect";}    
        }
        else{echo "no user";}
    }
}


function validateForm() {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password0 = $_POST["password0"];
  $password1 = $_POST["password1"];
  $errors = [];  

  if (empty($name) || empty(($email) || empty($password0) || empty($password1))) {
    $errors[] = "Заповніть всі поля!";
  }
  if (empty($password0) || empty($password1)) {
    $errors[] = "Введіть пароль в обидві поля!";
  } 
  else if ($password0 !== $password1) {
    $errors[] = "Введені паролі не спавпадають!";
  } 
  else if (strlen($password0) < 7) {
    $errors[] = "Пароль має містіти більше 7 символів!";
  }
  if($email != filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    $errors[] = "Введіть ваш справжній email!";
  }
  if(!isset($_POST["over18"]) || $_POST["over18"] != 'on'){
    $errors[] = "Сайт доступен лише для повнолітніх осіб!";
  }
  if(!isset($_POST["rulesAgree"]) || $_POST["rulesAgree"] != 'on'){
    $errors[] = "Ви маєте погодитися з правилами користування для реєстр";}
  if (!empty($errors)) {
    return implode("<br>", $errors);  
  }
  return true;  
}

?>


<!-- Знадобиться для редагування аккаунта
    <label>Прізвище</label> <br>
    <input type="text" name="surname"> <br>
    <label>По батькові</label> <br>
    <input type="text" name="name"> <br>
    <label>Номер телефону: </label> <br>
    <input type="text" name="phone"> <br>
    <label>Date of birth</label> <br>
    <input type="date" name="birthdate"> <br>
    <select id="country" name="country">
        <option value="">Виберіть країну</option>
        <option value="ukr">Україна</option>
    </select> <br>
    <select id="oblast" name="oblast">
        <option value="">Виберіть область</option>
        <option value="kievska">Київська</option>
        <option value="vinnitska">Вінницька</option>
        <option value="zakarpatska">Закарпатська</option>
        <option value="lvivska">Львівська</option>
        <option value="odesska">Одеська</option>
    </select> <br>
    <select id="city" name="city"> тут треба зробити пляску від області хз як
        <option value="">Виберіть місто</option>
        <option value="kiev">Київ</option>
        <option value="vinnitsa">Вінниця</option>
    </select> <br>
    <label>Введіть вулицю, номер дому, та номер квартири (якщо є)</label> <br>
    <input type="text" name="address"> <br><br>
-->