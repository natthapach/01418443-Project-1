<?php
    include("../connection.php");
    session_start();
    // dummy username
    $_SESSION["current_username"] = "organizer01";
    //

    $username = $_SESSION["current_username"];
    include("../connection.php");

    // if(isset($_POST["create-event-submit"])) {
        try {
            $dbuser = "root";
            $dbpass = "";

            // $connection = new PDO("mysql:host=localhost;dbname=webtech1", $dbuser, $dbpass);
            // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Insert event into table `event`
            $eventOrgNO = "1";
            $eventName = $_POST['eventName'];
            $eventInfo = $_POST['eventInfo'];
            $eventPlace = $_POST['eventPlace'];
            $eventMap = $_POST['eventMap'];
            $eventStartDate = $_POST['eventStartDate'];
            $eventStartDate = date('Y-m-d H:i:s', strtotime($eventStartDate));
            $eventEndDate = $_POST['eventEndDate'];
            $eventEndDate = date('Y-m-d H:i:s', strtotime($eventEndDate));
            $eventCloseDate = $_POST['eventCloseDate'];
            $eventCloseDate = date('Y-m-d H:i:s', strtotime($eventCloseDate));
            $eventPrice = $_POST['eventPrice'];
            $eventForm = $_POST['eventForm'];
            $eventMaxAttendent = $_POST['eventMaxAttendent'];
            $eventCategoryId = 'Se';
            $eventMaxAge = $_POST['eventMaxAge'];
            $eventMinAge = $_POST['eventMinAge'];
            
            $statement = "INSERT INTO `event`(organizer_id, `name`, information, place, google_map_link, event_start_date, event_finish_date, price, close_date, google_form, max_attendents, category_id, max_age, min_age) ".
            "VALUES('$eventOrgNO', '$eventName', '$eventInfo', '$eventPlace', '$eventMap', '$eventStartDate', '$eventEndDate', '$eventPrice', '$eventCloseDate', '$eventForm', '$eventMaxAttendent', '$eventCategoryId', '$eventMaxAge', '$eventMinAge')";

            $connection->exec($statement);

            

            $statement = "INSERT INTO pre_condition_event VALUES('', '')";
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        echo json_encode("Successful added new event.");
    // }
?>