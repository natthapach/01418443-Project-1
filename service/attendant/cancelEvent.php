<?php
<<<<<<< HEAD
	include("../connection.php");
		session_start();
			$_SESSION["current_username"] = 'user1';
	$username = $_SESSION["current_username"];
			// set the PDO error mode to exception
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$eventid =$_GET['eventid'];
			$statement = $connection->prepare("SELECT id FROM attendants WHERE user_name=:username");
			$statement->execute([
					":username"=>$username
			]);
			$result = $statement->fetch();
			$attendantID = $result[0];
			echo $eventid;
			echo $attendantID;
     $sql = "UPDATE attendences SET status_id = 'R' WHERE attendant_id = '$attendantID' AND event_id='$eventid' ";
=======
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
>>>>>>> Organizer(Bird)

     // Prepare statement
     $stmt = $connection->prepare($sql);

     // execute the query
     $stmt->execute();

header("Location: ../../web/attendant/showbuying.php");
exit;
 ?>
