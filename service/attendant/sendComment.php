<?php
    include("../connection.php");
    session_start();
    // dummy username
    // $_SESSION["current_username"] = "organizer01";
    // 
    $username = $_SESSION["current_username"];

    $comment = $_POST["comment"];
    $event_id = $_POST["event_id"];

    $affectedRow = $connection->exec(
        "INSERT INTO `comment`(`id`, `user_name`, `event_id`, `comment_time`, `content`) 
        VALUES (NULL,'$username', '$event_id', CURRENT_TIMESTAMP, '$comment')"
    );

    echo $affectedRow;
?>