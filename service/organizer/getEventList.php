<?php
    include("../connection.php");
    session_start();
    // dummy username
    $_SESSION["current_username"] = "user2";
    //
    $username = $_SESSION["current_username"];
    include("../connection.php");

    try {
        $dbuser = 'root';
        $dbpass = '';

        $statement = $connection->prepare("SELECT id FROM organizer WHERE user_name=:username");
        $statement->execute([
            ":username"=>$username
        ]);
        $result = $statement->fetch();
        $orgID = $result[0];

        if(sizeof($result) > 0) {
            $result = null;
            $statement = null;
            $statement = $connection->prepare("SELECT `name` FROM `event` WHERE organizer_id=:orgID");
            $statement->execute([
                ":orgID"=>$orgID
            ]);
            $result = $statement->fetchAll();
            if(sizeof($result) > 0) {
                echo json_encode($result);
            }
        }

        
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>