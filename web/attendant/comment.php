<?php
    $event_id = $_GET["event"];
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
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
                        <a class="nav-link" href="#">Buying</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Joined</a>
                    </li>
                    <li clss="nav-item">
                        <a class="nav-link" href="#">Ticket-list</a>
                    </li>

                </ul>
            </div>
        </nav>

        <!-- content start here -->
        <div class="row" id="comment-container">
            <!-- <div class="col-12" >
                
            </div> -->
        </div>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- import my js file -->
    <script src="js/comment.js"></script>
    <script>
        <?php
            echo "start('$event_id')"
        ?>
    </script>
</body>
</html>