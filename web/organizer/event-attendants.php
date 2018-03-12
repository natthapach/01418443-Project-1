<?php
    include("../../service/connection.php");

    $event_id = $_GET["event_id"];


    $statement = $connection->prepare(
        'SELECT *, DATE_FORMAT(ad.pay_date, "%d %M %Y %T") as "pay_date"
        FROM attendences as ad
        JOIN attendants as at
        ON ad.attendant_id = at.id
        JOIN account as ac
        ON at.user_name = ac.user_name
        WHERE ad.event_id = :event_id'
    );

    $statement->execute([
        ":event_id"=>$event_id
    ]);

    $result = $statement->fetchAll(PDO::FETCH_OBJ);
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../app.css">
</head>
<body class="background-dark">
    <div class="container background-light">
    <div class="banner">

    </div>
    <nav class="row navbar navbar-expand-lg navbar-light primary">
        <!-- web name -->
        <a class="navbar-brand" href="home.html">EVENT PUSH</a>
        <!-- hamberger icon menu (3 line icon, show when small screen) -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- menu -->
                <li class="nav-item">
                    <a class="nav-link" href="checkin.html">Check in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createEvent.html">Create Event</a>
                </li>
                <!-- <li clss="nav-item">
                    <a class="nav-link" href="#">Log out</a>
                </li> -->

                <!-- dropdown menu -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
            </ul>
            <div class="nav-item">
            <a style="color:black" class="nav-link" href="profile.html">Profile</a>
            </div>

            <button id="logout-btn" type="button" class="btn btn-danger" style="font-size:15px;">Logout</button>
        </div>
    </nav>
        <!-- content start here -->
        <style>
            .img-container {
                background-color: red;
                width: 100%;
                padding-top: 100%; /* 1:1 Aspect Ratio */
                position: relative; /* If you want text inside of it */
                background-position: center center;
                background-repeat: no-repeat;
                background-size:cover;
            }
            .card-image-top {
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                width:100%;
                height:100%;
            }
        </style>
        <div class="row">
            <?php
                foreach($result as $attendant){
            ?>
            <div class="card col-xs-12 col-sm-4" style="margin: 10px">
                <div class="img-container"
                    style=<?php
                            echo "background-image:url('../../service/profile/$attendant->profile');";
                        ?>
                >
                </div>

                <div class="card-body">
                    <h4 class="card-title">
                        <?php
                            echo $attendant->first_name . " " . $attendant->last_name;
                        ?>
                    </h4>

                    <div>
                        <div id=<?php
                                echo "paid-".$attendant->attendant_id;
                                ?>
                            style=<?php
                                        if ($attendant->status_id == "P"){
                                            echo "display:block";
                                        }else{
                                            echo "display:none";
                                        }
                                    ?>>
                            <button
                                class="btn btn-primary"
                                onclick=<?php
                                            echo "onClickViewProof('$attendant->pay_proof_path')"; ?>>
                                หลักฐานการโอนเงิน
                            </button>
                            <button class="btn btn-success"
                                onclick=<?php
                                            echo "onClickConfirm($event_id,$attendant->attendant_id)"; ?>>
                                ยืนยัน
                            </button>
                        </div>
                        <div id=<?php
                                echo "confirm-".$attendant->attendant_id;
                                ?>
                            style=<?php
                                        if ($attendant->status_id == "C"){
                                            echo "display:block";
                                        }else{
                                            echo "display:none";
                                        }
                                    ?>>
                            ยืนยันแล้ว
                        </div>
                        <div id=<?php
                                echo "wait-".$attendant->attendant_id;
                                ?>
                            style=<?php
                                        if ($attendant->status_id == "W"){
                                            echo "display:block";
                                        }else{
                                            echo "display:none";
                                        }
                                    ?>>
                            รอการชำระเงิน
                        </div>
                    </div>
                    <hr>
                    <div>
                        วันที่โอน : <span id="pay-date">
                                        <?php
                                            echo $attendant->pay_date;
                                        ?>
                                </span> <br>
                        จำนวนเงิน : <span id="pay-amount">
                                        <?php
                                            echo $attendant->amount;
                                        ?>
                                </span>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>

        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- import my js file -->
    <script src="js/event-attendants.js"></script>
</body>
</html>

</body>
</html>
