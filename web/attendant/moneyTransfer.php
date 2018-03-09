<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body class="background-dark">
        <div class="container background-light">
            <div class="row banner primary-dark">
                <div class="col-12">
                    <b>
                        Kitty Event~~
                    </b>
                    <button type="button" class="btn btn-danger log-out">Logout</button>
                </div>

            </div>
            <nav class="row navbar navbar-expand-lg navbar-light primary">
                <!-- web name -->
                <a class="navbar-brand" href="#">Kitty</a>
                <!-- hamberger icon menu (3 line icon, show when small screen) -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <!-- menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="home.html">All event</a>
                                <a class="dropdown-item" href="#">Medical</a>
                                <a class="dropdown-item" href="#">Computer</a>
                                <a class="dropdown-item" href="#">Music</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.html">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buying.html">Buying</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="joined.html">Joined</a>
                        </li>
                        <li clss="nav-item">
                            <a class="nav-link" href="#">Ticket-list</a>
                        </li>

                    </ul>
                </div>
            </nav>

            <!-- content start here -->

            <div class="container" >
                <div class="row" id="event-table">

                </div>
            </div>



        <!-- content start here -->
        <div class="row">
            <!-- <h1> Event ที่คุณซื้อ</h1> -->
            <div style="width:100%;text-align:center;">
             <form enctype="multipart/form-data" action="../../service/attendant/insertSlip.php" method="POST">
               <input type="hidden" name="eventid" value="<?php
               session_start();
              $_SESSION["eventid"] = $_GET['eventid'];?>">
               วันที่โอนเงิน <input id="date" type="date" required><br>
               เวลาที่โอนที่ <input id="time" type="Time" step="60" required><br>
               จำนวนเงินที่โอน <input type="number" name="email" required> บาท<br>
               สลิปการโอนเงิน <input type="file" name="userfile" required>
                <input type="submit" value="Send File" name="submit"/>
              </form>
            </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
