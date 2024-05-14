<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
include("include/db_connect.php");
session_start();
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Фортунний край</title>
    <link rel="stylesheet" type="text/css" href="css/ResetStyles.css">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="stylesheet" type="text/css" href="log/style.css">
  </head>
  <body>
    <header>
      <h1 style="color: #e7e003">Фортунний край</h1>
    <nav class="reg">
        <input type="search" id="searchInput" placeholder="Search sports...">
        <?php
          if($_SESSION["lvl"]==501){
            echo'<a href="include/new-Match.php"><button class="cta">Створення Матчу</button></a>';
          }
          if(empty($_SESSION["id"])){ ?>
            <button id="regis" onclick="openRegistration()" class="cta">Register</button>
            <button id="login" onclick="openLogin()"class="cta">Log In</button><?php }
          if(!empty($_SESSION["id"])){ ?>
            <button class="cta" onclick="openDonate()">Deposit</button>
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
        <ul class="test"> 
        <?php
          $result = mysqli_query($link,'SELECT * FROM MatchVS');

            if(mysqli_num_rows($result)>0){
               $row = mysqli_fetch_array($result);

               do{
                 echo'
                 <div class="block-game" style="background: url('.$row["Foto_Match"].') 0 0/100% ;">
                 <div class="block-game-koef-opis">
                 <div class="komand-koef-block">
                 <div class="komand-koef-1">
                 
                 <li><a href="include/new-Stavka.php?id-match='.$row['id_Match'].'&stavka-komand=1">'.$row["Komand_1"].'</a></li>
                 <li>'.$row["Koef_Team1"].'</li>
                 </div>
                 <div class="komand-koef-2">
                 <li><a href="include/new-Stavka.php?id-match='.$row['id_Match'].'&stavka-komand=2">'.$row["Komand_2"].'</a></li>
                 <li>'.$row["Koef_Team2"].'</li>
                 </div></div>
                 <div class="opis">
                 <li>'.$row["Opis_Match"].'</li>
                 </div>
                 </div>
                 <div class="data-koef">
                 <li>'.$row["Date_Start"].'/</li>
                 <li>'.$row["Date_End"].'</li>
                 </div>
                 </div>
                 
                 ';
               }while($row = mysqli_fetch_array($result));
    }
?>
</ul>s
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



    <div id="formContainer" class="hidden">
      <form>
        <button id="hideFormButton">Hide Form</button>
        <!-- cart -->
        </div>

      </form>
    </div>



    <footer class="footer">
      &copy; 2024 Фортунний край. Всі права захищені.
      Про нас
      Контакти
    </footer>
    <script src="js/JavaScript.js"></script>
  </body>
</html>