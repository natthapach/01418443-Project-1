<?php
    include("../connection.php");
    session_start();
    // dummy username
    $_SESSION["current_username"] = "organizer01";
    //
    $username = $_SESSION["current_username"];
    
    // getOrganizerID.php 
    // return : $orgID
    include("getOrganizerID.php");

    try {
        // $statement = $connection->prepare("SELECT id FROM organizer WHERE user_name=:username");
        // $statement->execute([
        //     ":username"=>$username
        // ]);
        // $result = $statement->fetch();
        // $orgID = $result[0];

        $statement = $connection->prepare("SELECT `name` FROM `event` WHERE organizer_id=:orgID");
        $statement->execute([
            ":orgID"=>$orgID
        ]);
        $result = $statement->fetchAll();
        echo json_encode($result);
        
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>