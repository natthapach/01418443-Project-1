<?php
    $statement = $connection->prepare("SELECT id FROM `event` WHERE name=:eName");
    $statement->execute([
        ":eName"=>$_POST['eventPre']
    ]);
    $result = $statement->fetch();
    $eventPreId = $result[0];
?>