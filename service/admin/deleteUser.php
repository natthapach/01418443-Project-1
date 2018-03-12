<?php
    // include("../connection.php");
    $connection = new PDO(
        "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
        "root",
        ""
    );


    $user = $_POST['id'];
    if ($_POST['action'] && $_POST['id']) {
        if ($_POST['action'] == 'Changestatus') {
            if($_POST['status']=='Inactive'){
                $sql = "UPDATE account SET status ='Active' WHERE user_name = '$user' ";
                $statement = $connection->prepare($sql);
                $statement->execute();
                header("Location: ../../web/admin/userList.php");
            }
           else{
                $sql = "UPDATE account SET status ='Inactive' WHERE user_name = '$user' ";
                $statement = $connection->prepare($sql);
                $statement->execute();
                header("Location: ../../web/admin/userList.php");
            }
        }
        if ($_POST['action'] == 'View') {
            if($_POST['position'=='A']){
                $sql = "SELECT * FROM attendants  WHERE user_name = '$user' ";
                $statement = $connection->prepare($sql);
     
            }


        }
            
            
      }

    

?>
