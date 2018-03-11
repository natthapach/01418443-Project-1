<?php
    include("../connection.php");
    $event_id = $_GET["event_id"];

    $statement = $connection->prepare(
        "SELECT *
        FROM comment
        JOIN account
        ON comment.user_name = account.user_name
        WHERE comment.event_id=:event_id
        ORDER BY comment.id"
    );
    $statement->execute([
        ":event_id"=>$event_id
    ]);
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($result);
?>