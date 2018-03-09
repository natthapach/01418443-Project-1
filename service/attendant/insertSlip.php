<?php
session_start();
// $username = $_SESSION["current_username"];
$eventid = $_SESSION["eventid"];

$username = '2';

$connection = new PDO(
		 "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
		 "root",
		 ""
 );
if (isset($_POST['submit'])){
  $filetmp = $_FILES["userfile"]["tmp_name"];
  $filename = $_FILES["userfile"]["name"];
  $filetype = $_FILES["userfile"]["type"];
  $filepath = "../slip/" . $username . "-" . $eventid . ".jpg";

  move_uploaded_file($filetmp,$filepath);

	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $sql = "UPDATE attendences SET pay_proof_path = '$filepath', status_id = 'P' WHERE attendant_id= '$username' AND event_id='$eventid' ";

     // Prepare statement
     $stmt = $connection->prepare($sql);

     // execute the query
     $stmt->execute();
}

header("Location: ../../web/attendant/buying.html");
exit;
 ?>
