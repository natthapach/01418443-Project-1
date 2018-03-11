<?php
    $statement = $connection->prepare("SELECT 1 FROM `event` WHERE `name`=:eName AND organizer_id=:orgId");
    $statement->execute([
        ":eName"=>$_POST['eventName'],
        ":orgId"=>$orgID
    ]);
    $result = $statement->fetch();
?>