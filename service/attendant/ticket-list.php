<?php
include("loadEventID.php");
   $stmt = $connection->prepare("SELECT * FROM `event`
     JOIN attendences
     on event.id=attendences.event_id
     WHERE `attendant_id`=$attendantID AND `status_id`='C'");
     $stmt->execute();
     $res = $stmt->fetchAll(PDO::FETCH_OBJ);
 		 echo json_encode($res);
 ?>
