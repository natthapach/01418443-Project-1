<?php
session_start();
var_dump($_POST);
$_SESSION["current_user"] = "user2";
if ($_POST['user'] != $_SESSION["current_user"]) die("don't hack me dude.");
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
    $stmt = $conn->prepare("SELECT id FROM attendants WHERE user_name='".$_POST["user"]."'"); 
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    $stmt = $conn->prepare("INSERT INTO attendences(attendant_id, event_id, status_id) VALUES (".$result->id.' ,' .$_POST["event"]." , 'W')");
    if ($stmt->execute()){
        echo "true";
    } else {
        echo "false";
    }
}
catch(PDOException $e) {
    echo "false";
}
?>