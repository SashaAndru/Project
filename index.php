<?php
include("include/db_connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="adminPhoto/logo/logoTip.ico">
    <link rel="stylesheet" href="css/ResetStyles.css">
    <link rel="stylesheet" href="css/style.css">

    
    <title>Hani-Mani</title>
    

</head>
<body>
    <div class="block-content">
         <ul> 
<?php
$result = mysqli_query($link,'SELECT * FROM MatchVS');

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);

        do{
            echo '
            <li class="block-match" style="background: url(adminPhoto/Match/'.$row["Foto_Match"].') 0 0/50% ;">
            <ul>
                <li>'.$row["Name_Match"].'</li>
                <!--<li>'.$row["Opis_Match"].'</li>-->
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
</body>
</html>