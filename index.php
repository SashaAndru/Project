<?php
include("include/db_connect.php");
session_start();
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Назва сайту</title>
    <link rel="stylesheet" type="text/css" href="css/ResetStyles.css">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="stylesheet" type="text/css" href="log/style.css">
  </head>
  <body>
    <header>
      <h1>Назва сайту</h1>
    <nav class="reg">
        <input type="search" id="searchInput" placeholder="Search sports...">
        <button id="showFormButton">Show Form</button>
        <button class="cta">Coupons</button>
        <button class="cta">Deposit</button>
        <?php
          if(empty($_SESSION["id"])){ ?>
            <button id="regis" onclick="openRegistration()" class="cta">Register</button>
            <button id="login" onclick="openLogin()"class="cta">Log In</button><?php }
          if(!empty($_SESSION["id"])){ ?>
            <button id="regis" onclick="openAccount()" class="cta">Account</button>
            <button id="login" onclick="logOut()"class="cta">Log Out</button><?php }
        ?>
    </nav>
    </header>
    <div class="abc">
     <div class="abcc">
      <div class="ad">
			  <h2>Advertisement Title</h2>
			  <p>This is where the advertisement would go.</p>
        <nav class="list">
          <button class="button-turn">Усі</button>
          <button class="button-turn">Найблищі</button>
          <button class="button-turn">Live</button>
        </nav>
        <div class="test">
        <ul> 
        <?php
          $result = mysqli_query($link,'SELECT * FROM MatchVS');

            if(mysqli_num_rows($result)>0){
               $row = mysqli_fetch_array($result);

               do{
                 echo '
                   <li class="block-match" style="background: url(adminPhoto/Match/'.$row["Foto_Match"].') 0 0/100% ;">
                     <ul>
                      <li>'.$row["Name_Match"].'</li>
                      <li>'.$row["Opis_Match"].'</li>
                      <li>'.$row["Koef_Team1"].'</li>
                      <li>'.$row["Koef_Team2"].'</li>
                      <li>'.$row["Date_Start"].'</li>
                      <li>'.$row["Date_End"].'</li>
                    </ul>
                  </li>
                ';
               }while($row = mysqli_fetch_array($result));
    }
?>
</ul>
        </div>
        </nav>
		  </div>
     </div>
     <main>
      <div class="sport">Види спорту</div>
      <div class="sport">Вид спорту 1</div>
      <div class="sport">Вид спорту 2</div>
      <div class="sport">Вид спорту 3</div>
      <div class="sport">Вид спорту 4</div>
      <div class="sport">Вид спорту 5</div>
      <div class="sport">Вид спорту 6</div>
      <div class="sport">Вид спорту 7</div>
      <div class="sport">Вид спорту 8</div>
      <div class="sport">Вид спорту 9</div>
      <div class="sport">Вид спорту 10</div>
     </main>
    </div>
    

<!--form-->

    <div id="formContainer" class="hidden">
      <form>
        <button id="hideFormButton">Hide Form</button>
        <div class="for">
        <h2>Мій баланс: 100 UAH</h2>
        <div class="submit-button-right">
        <button class="submit-button-right1">Відкриті</button>
        <button class="submit-button-right1">Розраховані</button>
        </div>  
        </div>
        <div class="button-group">
        <button class="col" id = "cash-register">Kaca</button>
        <button class="col">Баланс</button>
        <button class="col">Мої дані</button>
        <button class="col">Бонуси</button>
        <button class="col">Мої бонуси казино: 2</button>
        <button class="col">Мої спортивні бонуси: 3</button>
        <button class="col">Історія</button>
        <button class="col">Історія транзакцій</button>
        <button class="col">Історія ставок</button>
        <button class="col">Ігрові транзакції</button>
        <button class="col">Верифікація</button>
        <button class="col">Історія бонусів</button>
        </div>

      </form>
    </div>


    <!--form каса-->
    <div id="formContainer1" class="hidden">
      <form class="p">
        <div>
            <button id="hideFormButton">Закрити</button>
            <div class="for">
                <h2>Мій баланс: <?php echo"{$SESSION['balance']}"; ?>UAH</h2>
                <div class="submit-button-right">
                 <button class="submit-button-right1">Відкриті</button>
                 <button class="submit-button-right1">Розраховані</button>
                </div>
            </div>  
         <div class="button-group">
           <button id = "cash-register" class="col">Kaca</button>
           <button class="col">Баланс</button>
           <button class="col">Мої дані</button>
           <button class="col">Бонуси</button>
           <button class="col">Мої бонуси казино: 2</button>
           <button class="col">Мої спортивні бонуси: 3</button>
           <button class="col">Історія</button>
           <button class="col">Історія транзакцій</button>
           <button class="col">Історія ставок</button>
           <button class="col">Ігрові транзакції</button>
           <button class="col">Верифікація</button>
           <button class="col">Історія бонусів</button>
         </div>
        </div>

        <div id="tab2" class="tab">
          <h2>Tab 2</h2>
          <p>Content for Tab 2</p>
        </div>
      </form>
    </div>


    <footer>
      &copy; 2023 Назва сайту. Всі права захищені.
      Про нас
      Контакти
    </footer>
    <script src="js/JavaScript.js"></script>
  </body>
</html>