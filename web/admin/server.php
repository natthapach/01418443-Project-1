<?php
    session_start();
    $username = "";
    $email = "";
    $password_1 = "";
    $for = "";
    $errors = array();
    $db = mysqli_connect("localhost","root","","webtech1");
    
    if(isset($_POST["register"])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        // $email = mysql_real_escape_string($_POST["email"];)
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        if(empty($username)){
            array_push($errors, "Username is required");
        }
        // if(empty($email)){
        //     array_push($errors, "Email is required");
        // }
        if(empty($password_1)){
            array_push($errors, "Password is required");
        }
        
        if($password_1 != $password_2){
            array_push($errors, "The two password do not match");
        }

        if (count($errors)==0) {
            $password = md5($password_1);
            $for = $_POST['for'];
            $query = "INSERT INTO account (user_name, password, role_id)  VALUES('$username', '$password', '$for')";
            mysqli_query($db, $query);
            $_SESSION["current_username"] = $username;
            $_SESSION['success'] = "You are now logged in";
            header("Location: profile.php");
            
        }


    }


?>