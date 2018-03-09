<?php
    session_start();
    include('../connection.php');

    $_SESSION["current_username"] = "organizer01";
    $username = $_SESSION["current_username"];

    try {
        $statement = $connection->prepare("SELECT `name` FROM category");
        $statement->execute();
        $result = $statement->fetchAll();
        echo json_encode($result);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>