<?php
include("../connection.php");
 session_start();
$username = $_SESSION["current_username"];
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $statement = $connection->prepare("SELECT id FROM attendants WHERE user_name=:username");
   $statement->execute([
       ":username"=>$username
   ]);
   $result = $statement->fetch();
   $attendantID = $result[0];
    ?>
