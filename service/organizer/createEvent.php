<?php
    session_start();
    // dummy username
    $_SESSION["current_username"] = "organizer01";
    //

    $username = $_SESSION["current_username"];

    // echo json_encode('ABC');

    // if(isset($_POST["create-event-submit"])) {
        // echo json_encode("ABC");
        $dbuser = "root";
        $dbpass = "";
        $eventName = $_POST['eventName'];
        $eventInfo = $_POST['eventInfo'];
        $eventPlace = $_POST['eventPlace'];
        // $eventMap = $_POST['eventMap'];
        $eventMap = '-';
        $eventStartDate = $_POST['eventStartDate'];
        $eventEndDate = $_POST['eventEndDate'];
        $eventCloseDate = $_POST['eventCloseDate'];
        $eventPrice = $_POST['eventPrice'];
        $eventForm = $_POST['eventForm'];
        $eventMaxAttendent = $_POST['eventMaxAttendent'];
        $eventMaxAge = $_POST['eventMaxAge'];
        $eventMinAge = $_POST['eventMinAge'];
        // echo json_encode($eventName);
        $connection = new PDO("mysql:host=localhost;dbname=webtech1;charset=utf8mb4", $dbuser, $dbpass);
        $connection->exec("
            INSERT INTO event(name, information, place, map, event_start_date, event_finish_date, close_date, price, google_form, max_attendents, max_age, min_age)
            VALUES (".
            "'".$eventName."'".','.
            "'".$eventInfo."'".','.
            "'".$eventPlace."'".','.
            "'".$eventMap."'".','.
            "'".$eventStartDate."'".','.
            "'".$eventEndDate."'".','.
            "'".$eventCloseDate."'".','.
            "'".$eventPlace."'".','.
            "'".$eventForm."'".','.
            "'".$eventMaxAttendent."'".','.
            "'".$eventMaxAge."'".','.
            "'".$eventMinAge."'"
            .")
        ");
        echo json_encode("Successful added new event.");
    // }
?>