<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php session_start();?>
    <?php include("../include/db_connect.php");?> 
    <?php //Зчитування з БД
        $allInfoSql = "SELECT Name, Surname, Father, DateOfBirth, Tel, Country, City, Oblast, FullAddres, LVL, Points, Limitation, Reg_date
        FROM Users
        WHERE Email = ?";
        $stmt = $link->prepare($allInfoSql);
        $stmt->bind_param("s", $_SESSION['email']);
        $stmt->execute();
        $stmt->bind_result($Name, $Surname, $Father, $DateOfBirth, $Tel, $Country, $City, $Oblast, $FullAddres, $LVL, $Points, $Limitation, $Reg_date);
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
            <label>Поінти: <?php echo $Points ?></label>
        </div>

        <div>
            <label>Ліміт на знаття коштів: <?php echo $Limitation ?></label>
        </div>

        <div>
            <label>Дата реєстрації: <?php echo $Reg_date ?></label>
        </div>

        <div>
            <button onclick="BackToMain()" id="backToMainButton">Повернутися на головну</button>
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
</body>
</html>

<script>
    function BackToMain(){
        window.location.href="mainPage.php";
    }
</script>
<script>
    function SaveData(inputId, dbName){
        var textInput = document.getElementById(inputId).value;
        if (textInput !== "") {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "mainFunctions.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("Данные успешно сохранены в базе данных!");
                }
            };
            xhr.send("field=" + dbName + "&data=" + encodeURIComponent(textInput));
        } else {
            alert("Заповніть будь ласка поле");
        }
    }
</script>
