<?php
session_start();
// $_SESSION["current_user"] = "user2";
$username = $_SESSION["current_user"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "webtech1";
try {
    $conn = new PDO(
        "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
        "root",
        ""
    );
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM attendants where user_name='".$_SESSION['current_user']."';");
    $stmt->execute();
    $attendant = $stmt->fetch(PDO::FETCH_OBJ);

    $stmt = $conn->prepare("SELECT profile FROM account WHERE user_name='".$attendant->user_name."';");
    $stmt->execute();
    $picture = $stmt->fetch(PDO::FETCH_OBJ);
    if($picture != FALSE){
        $attendant->picture = $picture->profile;
    }

    echo json_encode($attendant);
}
catch(PDOException $e) {
    echo "[]";
}
?>
