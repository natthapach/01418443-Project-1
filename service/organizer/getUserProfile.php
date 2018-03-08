<?php
    include("../connection.php");
    session_start();
    // fake user name
    $_SESSION["current_username"] = "organizer01";

    $username = $_SESSION["current_username"];

    $statement = $connection->prepare(
        "select o.*, a.profile
        from organizer as o
        join account as a 
        on a.user_name = o.user_name 
        where o.user_name=:username"
    );

    $statement->execute([
        ":username"=>$username
    ]);

    $result = $statement->fetchAll(PDO::FETCH_OBJ);

    if(sizeof($result) > 0){
        echo json_encode($result[0]);
    }
?>