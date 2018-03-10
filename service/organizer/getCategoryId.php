<?php
    $statement = $connection->prepare("SELECT id FROM category WHERE name=:cName");
    $statement->execute([
        ":cName"=>$_POST['eventCategory']
    ]);
    $result = $statement->fetch();
    $eventCategoryId = $result[0];
?>