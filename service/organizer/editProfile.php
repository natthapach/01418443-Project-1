<?php
    include("../connection.php");
    session_start();

    //connectDB
    $username = $_SESSION["current_username"];
    $conn = new PDO(
        "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
        "root",
        ""
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //update first name, last name, email
    $sql = "UPDATE organizer SET name='".$_POST['name']."',website='".$_POST['website']."',phone='".$_POST['tel']."',facebook='".$_POST["facebook"]."',email='".$_POST['email']."' where user_name='".$_SESSION["current_username"]."'";
    // echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    var_dump($_POST);
    var_dump($_FILES);

    $target_dir = "../profile/";
    $imageFileType = strtolower(pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION));
    $file_name = $_SESSION["current_username"].'-profile.'.$imageFileType;
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
                $query_profile = "UPDATE account SET profile='".$file_name."' where user_name='".$_SESSION["current_username"]."'";
                echo "<br><br><br>", $query_profile;
                $stmt = $conn->prepare($query_profile);
                $stmt->execute();
                

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    }
    // header('location:../../web/organizer/profile.html');
?>