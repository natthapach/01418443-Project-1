<?php
<<<<<<< HEAD
include("loadAttendID.php");
    $stmt = $connection->prepare("SELECT * FROM `event`
			JOIN attendences
			on event.id=attendences.event_id
			 WHERE `attendant_id`=$attendantID AND `is_checkin`='1'");
=======

	session_start();
	// $username = $_SESSION[“current_username”];
	$username = '2';

$connection = new PDO(
		 "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
		 "root",
		 ""
 );
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $connection->prepare("SELECT * FROM `event` JOIN attendences on event.id=attendences.event_id WHERE `attendant_id`=$username AND `is_checkin`='0'");
>>>>>>> Organizer(Bird)
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
		 echo json_encode($res);
?>
