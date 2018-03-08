<?php
    session_start();
    $username = "";
    $email = "";
    $password_1 = "";
    $password1 = "";
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

        //if not error ,save user to database
        if (count($errors)==0) {
            $queryUser = "SELECT * FROM account WHERE user_name = '$username' ";
            $resU = mysqli_query($db,$queryUser) or die(mysqli_error($db));
            //if username already take
            if (mysqli_num_rows($resU)> 0) {
                array_push($errors, "This username is already taken");
            }else{
            $password = password_hash($password_1, PASSWORD_BCRYPT); //encrypt passqword before save in database
            $for = $_POST['for'];
            $query = "INSERT INTO account (user_name, password, role_id)  VALUES('$username', '$password', '$for')";
            mysqli_query($db, $query);
            $_SESSION["current_username"] = $username;
            $_SESSION['success'] = "You are now logged in";
            header("Location: profile.php"); //direct to profile
            }
            
        }


    }
    //login
    if(isset($_POST["login"])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        if(empty($username)){
            array_push($errors, "Username is required");
        }
        if(empty($password)){
            array_push($errors, "Password is required");
        }

        if (count($errors)==0) {
            $query = "SELECT * FROM account WHERE user_name = '$username'";
            $results = mysqli_query($db, $query);
            $row = mysqli_fetch_array($results);
            
            if ($row['user_name'] == $username and password_verify($password, $row['password'])) {
                $_SESSION["current_username"] = $username;
                $_SESSION['success'] = "You are now logged in";
                header("Location: profile.php"); //direct to profile
            }else{
                array_push($errors, "The username or password is wrong!");
            }

            
        }

    }


    //logout
    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('Location: ../../web/admin/index.php');
        
    }


?>