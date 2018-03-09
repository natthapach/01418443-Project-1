<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "webtech1";
try {
    $conn = new PDO(
        "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
        "root",
        ""
    );
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM event;"); 
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($events as $event) {
        $stmt = $conn->prepare("SELECT path FROM picture WHERE event_id=".$event->id); 
        $stmt->execute();
        $pictures = $stmt->fetchAll(PDO::FETCH_OBJ);
        $event->pictures = array();
        if ($pictures !== FALSE) {
            $event->pictures = $pictures;
        }
    }
    foreach ($events as $event){
        $stmt = $conn->prepare("SELECT category.name FROM category INNER JOIN event ON category.id=event.category_id");
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_OBJ);
        $event->categories = array();
        if (categories !== false) {
            $event->categories = $categories;
        }
    }
    echo json_encode($events);
}
catch(PDOException $e) {
    echo "[]";
}
?>