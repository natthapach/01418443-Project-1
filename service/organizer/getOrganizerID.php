<?php
    $statement = $connection->prepare("SELECT id FROM organizer WHERE user_name=:username");
    $statement->execute([
        ":username"=>$username
    ]);
    $result = $statement->fetch();
    $orgID = $result[0];
?>