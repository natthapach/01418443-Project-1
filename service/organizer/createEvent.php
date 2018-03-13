<?php
    include("../connection.php");
    include("../pictureUploader.php");
    session_start();
    // dummy username
    // $_SESSION["current_username"] = "organizer01";
    //
    $username = $_SESSION["current_username"];
    
    // getOrganizerID.php
    // take parameter: $username 
    // return : $orgID
    include("getOrganizerID.php");

    // getEventIdByName.php
    // take parameter: $_POST['eventPre']
    // return: $eventPreId
    include("getEventIdByName.php");

    // getCategoryId.php
    // take parameter: $_POST['eventCategory']
    // return: $eventCategoryId
    include("getCategoryId.php");

    // checkExistEvent.php
    // take parameter: $_POST['eventName'], $orgID
    // return: $result
    include("checkExistEvent.php");

    if( ! $result) {
        $result=null;
    // if(isset($_POST["create-event-submit"])) {
        try {
            // Insert event into table `event`
            $eventOrgNO = $orgID;
            $eventName = $_POST['eventName'];
            $eventPre = $_POST['eventPre'];
            $eventCategory = $_POST['eventCategory'];
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
            $eventMaxAge = $_POST['eventMaxAge'];
            $eventMinAge = $_POST['eventMinAge'];
            
            $statement = "INSERT INTO `event`(organizer_id, `name`, information, place, google_map_link, event_start_date, event_finish_date, price, close_date, google_form, max_attendents, category_id, max_age, min_age) ".
            "VALUES('$eventOrgNO', '$eventName', '$eventInfo', '$eventPlace', '$eventMap', '$eventStartDate', '$eventEndDate', '$eventPrice', '$eventCloseDate', '$eventForm', '$eventMaxAttendent', '$eventCategoryId', '$eventMaxAge', '$eventMinAge')";
            
            // echo $statement; 
            $connection->exec($statement);

            $event_id = $connection->lastInsertId();
                
            if($eventPre!="No Prerequisite"){
                $event_id_this = $event_id;
                // echo $event_id_this." ";
                // echo $eventPreId;
                $statement = "INSERT INTO pre_condition_event VALUES('$event_id_this', '$eventPreId')";
                $connection->exec($statement);
            }
            
            // Wait to ask if picture upload is a must or not.

            $uploader = new PictureUploader("../pictures/");
            for($i=0; $i<sizeof($_POST["pictures"]); $i++){
                $result = $uploader->uploadByBase64($_POST["pictures"][$i], "$event_id-$i.jpg");
                if($result["result"] == 0){
                    $filename = $result["filename"];
                    $statement = "INSERT INTO `picture` (`event_id`, `picture_number`, `path`) VALUES ('$event_id', '$i', '$filename')";
                    $connection->exec($statement);
                }
            }

            
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        echo json_encode($result);
    } else {
        echo json_encode("exist");
    }
    // }
?>