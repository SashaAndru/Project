<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="Style/account.css">
    <?php session_start();?>
    <?php include("../include/db_connect.php");?> 
    <?php //Зчитування з БД
        $allInfoSql = "SELECT Name, Surname, Father, DateOfBirth, Tel, Country, City, Oblast, FullAddres, LVL, Points, Limitation, Reg_date, Email
        FROM Users
        WHERE Email = ?";
        $stmt = $link->prepare($allInfoSql);
        $stmt->bind_param("s", $_SESSION['email']);
        $stmt->execute();
        $stmt->bind_result($Name, $Surname, $Father, $DateOfBirth, $Tel, $Country, $City, $Oblast, $FullAddres, $LVL, $Points, $Limitation, $Reg_date, $Email);
        $stmt->fetch();
        $stmt->close(); 
    ?>
</head>
<body>
    <div id="mainDivAccount">
        <div>
        <label>Ім'я: </label>
            <?php
                if($Name){
                    echo"$Name <br>"; ?>
                    <button class="showInput"> Редагувати </button><?php 
                }
                 else{ 
                    echo"???<br>";?> 
                    <button class="showInput"> Додати </button> <?php
                } ?>
                <div class="inputContainer" style="display: none;">
                    <input type="text" class="textInput" id="nameInput">
                    <button onclick="SaveData('nameInput', 'Name')" class="saveButtonAccount">Save</button>
                </div><?php 
            ?>
        </div> 

        <div> 
        <label>Призвище: </label>
            <?php
                if($Surname){
                    echo"$Surname <br>"; ?>
                    <button class="showInput"> Редагувати </button><?php 
                }
                 else{ 
                    echo"???<br>";?> 
                    <button class="showInput"> Додати </button> <?php
                } ?>
                <div class="inputContainer" style="display: none;">
                    <input type="text" class="textInput" id="surnameInput">
                    <button onclick="SaveData('surnameInput', 'SurName')" class="saveButtonAccount">Save</button>
                </div><?php 
            ?>
        </div>

        <div>
        <label>По батькові: </label>
            <?php
                if($Father){
                    echo"$Father <br>"; ?>
                    <button class="showInput"> Редагувати </button><?php 
                }
                 else{ 
                    echo"???<br>";?> 
                    <button class="showInput"> Додати </button> <?php
                } ?>
                <div class="inputContainer" style="display: none;">
                    <input type="text" class="textInput" id="fatherInput">
                    <button onclick="SaveData('fatherInput', 'Father')" class="saveButtonAccount">Save</button>
                </div><?php 
            ?>
        </div>

        <div>
        <label>Дата народження: </label>
            <?php
                if($DateOfBirth){
                    echo"$DateOfBirth <br>"; ?>
                    <button class="showInput"> Редагувати </button><?php 
                }
                 else{ 
                    echo"???<br>";?> 
                    <button class="showInput"> Додати </button> <?php
                } ?>
                <div class="inputContainer" style="display: none;">
                    <input type="text" class="textInput" id="birthDateInput">
                    <button onclick="SaveData('birthDateInput', 'DateOfBirth')" class="saveButtonAccount">Save</button>
                </div><?php
            ?>
        </div>

        <!-- <div>
        <label>Країна: </label>
            <?php
                // if($Country){echo"$Country";}
                // else{ echo"<br>";?> <button class="showInput"> Додати </button>
                // <div class="inputContainer" style="display: none;">
                //     <input type="text" class="textInput" id="countryI">
                // </div><?php 
                // }
            ?>
        </div>
        <div>
        <label>Область: </label>
            <?php
                // if($Oblast){echo"$Oblast";}
                // else{ echo"<br>";?> <button class="showInput"> Додати </button>
                // <div class="inputContainer" style="display: none;">
                //     <input type="text" class="textInput" id="">
                // </div><?php 
                // }
            ?>
        </div>
        <div>
        <label>Місто: </label>
            <?php
                // if($City){echo"$City";}
                // else{ echo"<br>";?> <button class="showInput"> Додати </button>
                // <div class="inputContainer" style="display: none;">
                //     <input type="text" class="textInput" id="">
                // </div><?php 
                // }
            ?>
        </div>
        <div> -->

        <div>
        <label>Адреса: </label>
            <?php
                if($FullAddres){
                    echo"$FullAddres <br>"; ?>
                    <button class="showInput"> Редагувати </button> <?php
                }
                else{ 
                    echo"???<br>";?> 
                    <button class="showInput"> Додати </button> <?php
                } ?>
                <div class="inputContainer" style="display: none;">
                    <input type="text" class="textInput" id="addresInput">
                    <button onclick="SaveData('addresInput', 'FullAddres')" class="saveButtonAccount">Save</button>
                </div><?php
            ?>
        </div>

        <div>
        <label>Телефон: </label>
            <?php
                if($Tel){
                    echo"$Tel <br>"; ?>
                    <button class="showInput"> Редагувати </button> <?php
                }
                else{ 
                    echo"???<br>";?> 
                    <button class="showInput"> Додати </button> <?php
                } ?>
                <div class="inputContainer" style="display: none;">
                    <input type="text" class="textInput" id="phoneInput">
                    <button onclick="SaveData('phoneInput', 'Tel')" class="saveButtonAccount">Save</button>
                </div><?php 
            ?>
        </div>

        <div>
            <label>LVL: <?php echo $LVL ?></label>
        </div>

        <div>
            <label>Баланс: <?php echo $Points ?> UAH</label>
        </div>

        <div>
            <label>Ліміт на знаття коштів: <?php echo $Limitation ?></label>
        </div>

        <div>
            <label>Дата реєстрації: <?php echo $Reg_date ?></label>
        </div>
        <div>
            <button id="giveMoneyButton">Поповнити баланс</button>
            <button id="takeMoneyButton">Зняти кошти</button>
        </div>
        <div>
            <button onclick="BackToMain()" id="backToMainButton">Повернутися на головну</button>
        </div>
        
    </div>

   
    <div id="formTakeMoney" class="hidden">
        <div id="giveMoneyDiv">
            <form id="vivodForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <label for="sumaVivoda">Сума зняття:</label><br>
                <input type="text" id="sumaVivoda" name="sumaVivoda" placeholder="100UAH"><br><br>
                <label for="cardNumber">Номер карти:</label><br>
                <input type="text" id="cardNumber" name="cardNumber" placeholder="XXXX XXXX XXXX XXXX"><br>
                <label>*Ваш лiмiт на вивiд: <?php echo "$Limitation"?></label><br><br>
                <input type="submit" name="vivod" value="Зняти кошти">
                <button id="closeGiveMoneyForm">Закрити</button>
            </form>
        </div>
    </div>

    <div id="formGiveMoney" class="hidden">
        <div id="giveMoneyDiv">
            <form id="donateForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <label for="sumaDonate" style="color: white">Введіть суму поповнення:</label><br>
                <input type="text" id="sumaDonate" name="sumaDonate" placeholder="100UAH"><br><br>
                <div class="card">
                    <div class="card-front">
                        <div class="card-number">
                            <label for="cardNumber">Номер картки:</label>
                            <input type="text" id="cardNumber" name="cardNumber" placeholder="XXXX XXXX XXXX XXXX">
                        </div>
                        <div class="card-holder">
                            <label for="cardHolder">Власник картки:</label>
                            <input type="text" id="cardHolder" name="cardHolder" placeholder="Ivan Ivanov">
                        </div>
                    </div>
                    <div class="card-back">
                        <div class="card-expiry">
                            <label for="expiryDate">Термін дії (MM/YY):</label>
                            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY">
                        </div>
                        <div class="card-cvv">
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" name="cvv" placeholder="XXX">
                        </div>
                        <input type="submit" name="donate" value="Поповнити">
                    </div>
                
                </div>
                <button id="flipButton">Перевернути карту</button>
                <button id="closeGiveMoneyForm">Закрити</button>
            </form>
        </div>
    </div>
    
    <script>
        var showInputBtns = document.querySelectorAll('.showInput');
        showInputBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var inputContainer = this.nextElementSibling;
                if (inputContainer.style.display === 'none' || inputContainer.style.display === '') {
                    inputContainer.style.display = 'block';
                } 
                else {
                    inputContainer.style.display = 'none';
                }
            });
        });
    </script>

    <script src="JavaScriptSH.js"></script>
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const clickParam = urlParams.get('click');

    if (clickParam === 'true') {
        const giveMoneyButton = document.getElementById('giveMoneyButton');
        giveMoneyButton.click();
    }
};
</script>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        if(isset($_POST["donate"])){ 
            if(empty($_POST["sumaDonate"]) || empty($_POST["cardNumber"]) || empty($_POST["cardHolder"]) || empty($_POST["expiryDate"]) || empty($_POST["cvv"])){
                echo "<p style='color: red;'>Заповнiть всi поля</p>";
            }
            elseif(strlen($_POST["cvv"])!=3){
                echo "<p style='color: red;'>Введiть коректний cvv код</p>";
            }
            elseif(strlen($_POST["cardNumber"])!=16){
                echo "<p style='color: red;'>Введiть коректний номер карти</p>";
            }
            else{
                $sum = $_POST["sumaDonate"];
                $sqlGiveMoney="UPDATE Users
                               SET Points = Points + $sum
                               WHERE Email = ?";
                $stmt = $link->prepare($sqlGiveMoney);
                $stmt->bind_param("s", $Email);
                $stmt->execute();
                $stmt->close();
                $_SESSION['balance'] = $Points + $sum;
                echo "<script>window.location.href = '../index.php';</script>";
                exit;
            }
        }
    }
?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        if(isset($_POST["vivod"])){ 
            if(empty($_POST["sumaVivoda"]) || empty($_POST["cardNumber"])){
                echo "<p style='color: red;'>Заповнiть всi поля</p>";
            }
            elseif($_POST["sumaVivoda"]>$Limitation){
                echo "<p style='color: red;'>Сума вивода перевищує лiмiт</p>";
            }
            elseif(strlen($_POST["cardNumber"])!=16){
                echo "<p style='color: red;'>Введiть коректний номер карти</p>";
            }
            elseif($_POST["sumaVivoda"]>$Points){
                echo "<p style='color: red;'>Недостатньо коштiв</p>";
            }
            else{
                $sum = $_POST["sumaVivoda"];
                $sqlTakeMoney="UPDATE Users
                               SET Points = Points - $sum
                               WHERE Email = '$Email'";
                $link->query($sqlTakeMoney);
                $link->close();
                $_SESSION['balance'] = $Points - $sum;
                echo "<script>window.location.href = '../index.php';</script>";
                exit;
            }
        }
    }
?>