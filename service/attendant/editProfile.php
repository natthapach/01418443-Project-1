<?php
    session_start();
    // $_SESSION['currentUser'] = 'user2';

    //connectDB
    $username = $_SESSION["current_username"];
    $conn = new PDO(
        "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
        "root",
        ""
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //update first name, last name, email
    $stmt = $conn->prepare("UPDATE attendants SET first_name='".$_POST['first-name']."',last_name='".$_POST['last-name']."',phone='".$_POST['tel']."',email='".$_POST['email']."' where user_name='".$_SESSION['current_username']."'");
    $stmt->execute();

    var_dump($_POST);
    var_dump($_FILES);

    $target_dir = "../profile/";
    $imageFileType = strtolower(pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION));
    $file_name = $_SESSION['current_username'].'-profile.'.$imageFileType;
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    echo $target_file;
    // Check if image file is a actual image or fake image
    if(array_key_exists("submit-btn", $_POST)) {
        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
                
                //update profile image's file name
                $stmt = $conn->prepare("UPDATE account SET profile='".$file_name."' where user_name='".$_SESSION['current_username']."'");
                $stmt->execute();
                

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    }
    header('location:../../web/attendant/profile.html');
?>