<?php
include("loadAttendID.php");
if (isset($_POST['submit'])){
	$eventid = $_SESSION["eventid"];
	$transferDate = $_POST["date"];
	$transferTime = $_POST["time"];
	$amount = $_POST["amount"];
	$transferDateandTime = $transferDate . ' ' . $transferTime . ':00';
  $filetmp = $_FILES["userfile"]["tmp_name"];
  $filename = $_FILES["userfile"]["name"];
  $filetype = $_FILES["userfile"]["type"];
  $filepath = "../slip/" . $attendantID . "-" . $eventid . ".jpg";
  move_uploaded_file($filetmp,$filepath);
$stmt = $connection->prepare("UPDATE attendences
	SET pay_proof_path = '$filepath', status_id = 'P' ,pay_date = '$transferDateandTime' ,amount = '$amount'
	WHERE attendant_id= '$attendantID' AND event_id='$eventid' ");
$stmt->execute();
}
header("Location: ../../web/attendant/showbuying.php");
exit;
 ?>
