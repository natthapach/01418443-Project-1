<?php
session_start();
// $username = $_SESSION["current_username"];
$eventid = $_GET["eventid"];

$username = '2';
$connection = new PDO(
		 "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
		 "root",
		 ""
 );

	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "UPDATE attendences SET status_id = 'R' WHERE attendant_id= '$username' AND event_id='$eventid' ";

     // Prepare statement
     $stmt = $connection->prepare($sql);

     // execute the query
     $stmt->execute();

header("Location: ../../web/attendant/showbuying.php");
exit;
 ?>
