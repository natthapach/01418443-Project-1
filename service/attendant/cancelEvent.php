<?php
	include("../connection.php");
		session_start();
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

     $sql = "DELETE FROM `attendences`  WHERE attendant_id = '$attendantID' AND event_id='$eventid' ";

     // Prepare statement
     $stmt = $connection->prepare($sql);

     // execute the query
     $stmt->execute();

header("Location: ../../web/attendant/showbuying.php");
exit;
 ?>
