<?php
    session_start();
    // dummy username
    $_SESSION["current_username"] = "user2";
    //

    $username = $_SESSION["current_username"];

    // echo json_encode('ABC');

    // if(isset($_POST["create-event-submit"])) {
        // echo json_encode("ABC");
        try {
            $dbuser = "root";
            $dbpass = "";

            $connection = new PDO("mysql:host=localhost;dbname=webtech1;charset=utf8mb4", $dbuser, $dbpass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $connection->prepare("INSERT INTO `event`(organizer_id, `name`, information, place, google_map_link, event_start_date, event_finish_date, price, close_date, google_form, max_attendents, category_id, max_age, min_age)
                VALUES(:organizer_id, :`name`, :information, :place, :google_map_link, :event_start_date, :event_finish_date, :price, :close_date, :google_form, :max_attendents, :category_id, :max_age, :min_age");
            $sql->bindParam(":organizer_id", $eventOrgNO);
            $sql->bindParam(":name", $eventName);
            $sql->bindParam(":information", $eventInfo);
            $sql->bindParam(":place", $eventPlace);
            $sql->bindParam(":google_map_link", $eventMap);
            $sql->bindParam(":event_start_date", $eventStartDate);
            $sql->bindParam(":event_finish_date", $eventEndDate);
            $sql->bindParam(":price", $eventPrice);
            $sql->bindParam(":close_date", $eventCloseDate);
            $sql->bindParam(":google_form", $eventForm);
            $sql->bindParam(":max_attendents", $eventMaxAttendent);
            $sql->bindParam(":category_id", $eventCategoryId);
            $sql->bindParam(":max_age", $eventMaxAge);
            $sql->bindParam(":min_age", $eventMinAge);

            $eventOrgNO = 2;
            $eventName = $_POST['eventName'];
            $eventInfo = $_POST['eventInfo'];
            $eventPlace = $_POST['eventPlace'];
            // $eventMap = $_POST['eventMap'];
            $eventMap = '-';
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
            
            $sql->execute();
        } catch(PDOException $e) {
            echo $e;
        }
        // echo $sql;
        // echo json_encode("Successful added new event.");
    // }
?>