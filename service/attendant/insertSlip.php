<?php
include("loadAttendID.php");
if (isset($_POST['submit'])){
	$eventid = $_SESSION["eventid"];
  $filetmp = $_FILES["userfile"]["tmp_name"];
  $filename = $_FILES["userfile"]["name"];
  $filetype = $_FILES["userfile"]["type"];
  $filepath = "../slip/" . $attendantID . "-" . $eventid . ".jpg";
  move_uploaded_file($filetmp,$filepath);
$stmt = $connection->prepare("UPDATE attendences
	SET pay_proof_path = '$filepath', status_id = 'P'
	WHERE attendant_id= '$attendantID' AND event_id='$eventid' ");
$stmt->execute();
}
header("Location: ../../web/attendant/showbuying.php");
exit;
 ?>
