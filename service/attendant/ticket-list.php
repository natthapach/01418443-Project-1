<?php
<<<<<<< HEAD
include("loadAttendID.php");
   $stmt = $connection->prepare("SELECT * FROM `event`
     JOIN attendences
     on event.id=attendences.event_id
     WHERE `attendant_id`=$attendantID AND `status_id`='C'");
     $stmt->execute();
     $res = $stmt->fetchAll(PDO::FETCH_OBJ);
 		 echo json_encode($res);
 ?>
=======

	session_start();
	// $username = $_SESSION["current_username"];
	$username = '2';

$connection = new PDO(
		 "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
		 "root",
		 ""
 );
    $stmt = $connection->prepare("SELECT * FROM `event` JOIN attendences on event.id=attendences.event_id WHERE `attendant_id`=$username AND `status_id`='C'");
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
		 echo json_encode($res);


?>
>>>>>>> Organizer(Bird)
