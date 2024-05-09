<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title> 
    <?php include("include/db_connect.php");?> 
</head> 
<body> 
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
</body> 
</html> 
 
<?php  
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
            mysqli_query($link, $addUserSql); 
            mysqli_close($link); 
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
function validateForm() { 
    $name = $_POST["name"]; 
    $email = $_POST["email"]; 
    $password0 = $_POST["password0"]; 
    $password1 = $_POST["password1"]; 
    $errors = [];   
   
    if (empty($name)  empty(($email)  empty($password0) || empty($password1))) { 
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
  }?>