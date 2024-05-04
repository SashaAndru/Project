<?php 
session_start();
include("db_connect.php");
?>


<?php //addToDataBase
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["field"]) && isset($_POST["data"])) {
            $field = $_POST["field"];
            $data = $_POST["data"];
            $addInfoSql = "UPDATE Users SET $field = ? WHERE Email = ?";
            $stmt = $conn->prepare($addInfoSql);
            $stmt->bind_param("ss", $data, $_SESSION['email']);
            $stmt->execute();
            $stmt->close();
        }
    }
?>
