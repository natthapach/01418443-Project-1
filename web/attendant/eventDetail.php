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
        <?php echo $_GET["event"]; ?><br>



        <?php
            session_start();
            $_SESSION["current_user"] = "user2";
            $username = $_SESSION["current_user"];
            $conn = new PDO(
                "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
                "root",
                ""
            );
                    
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = "Select * from event where event_id='".$_GET["event"]."'";
            $stmt = $conn->prepare("Select * from event where id='".$_GET["event"]."'");
            $stmt->execute();
            $event = $stmt->fetch(PDO::FETCH_OBJ);

    
            $stmt = $conn->prepare("SELECT path FROM picture WHERE event_id=".$event->id);
            $stmt->execute();
            $pictures = $stmt->fetchAll(PDO::FETCH_OBJ);
            $event->pictures = array();
            if ($pictures !== false) {
                $event->pictures = $pictures;
            }

            $stmt = $conn->prepare("SELECT * FROM organizer WHERE id=".$event->organizer_id);
            $stmt->execute();
            $organizer = $stmt->fetch(PDO::FETCH_OBJ);
            if ($organizer !== false) {
                $event->organizer = $organizer;
            }
            var_dump($event);
            for ($x = 0; $x < count($event->pictures); $x++) {
                echo "<div class='mySlides w3-display-container w3-center'>
                <img src='../../service/pictures/".$event->pictures[$x]->path."' style='width:100%'>
            </div>";
            }
        ?>
        <div class='w3-container w3-content w3-center w3-padding-64' style='max-width:800px' id='band'>
            <h2 class='w3-wide'>
                <?php echo $event->name ?>
            </h2>
            <p class='w3-opacity'><i>We love music</i></p>
            <p class='w3-justify'>We have created a fictional band website.</p>
            <div class='w3-row w3-padding-32'>
                <div class='w3-third'>
                    <p>Name</p>
                    <img src='/w3images/bandmember.jpg' class='w3-round w3-margin-bottom' alt='Random Name' style='width:60%'>
                </div>
                <div class='w3-third'>
                    <p>Name</p>
                    <img src='/w3images/bandmember.jpg' class='w3-round w3-margin-bottom' alt='Random Name' style='width:60%'>
                </div>
                <div class='w3-third'>
                    <p>Name</p>
                    <img src='/w3images/bandmember.jpg' class='w3-round' alt='Random Name' style='width:60%'>
                </div>
            </div>
        </div>
        <div class='w3-black ' id='tour'>
            <div class='w3-container w3-content w3-padding-64' style='max-width:800px'>
                <h2 class='w3-wide w3-center'>EVENT DATE</h2>
                <p class='w3-opacity w3-center'><i>Remember to book your tickets!</i></p><br>
                <div class='w3-one w3-margin-bottom'>
                    <img src='/w3images/paris.jpg' style='width:100%' class='w3-hover-opacity'>
                    <div class='w3-container w3-white'>
                        <p><b><?php echo $event->name ?></b></p>
                        <p class='w3-opacity'>
                            <?php echo $event->event_start_date ?>
                        </p>
                        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                        <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Buy Tickets</button>
                    </div>
                </div>
            </div>
        </div>
            <!-- Ticket Modal -->
        <div id='ticketModal' class='w3-modal'>
            <div class='w3-modal-content w3-animate-top w3-card-4'>
                <header class='w3-container w3-teal w3-center w3-padding-32'>
                    <span onclick="document.getElementById('ticketModal').style.display='none'" class='w3-button w3-teal w3-xlarge w3-display-topright'>×</span>
                    <h2 class='w3-wide'><i class='fa fa-suitcase w3-margin-right'></i>Tickets</h2>
                </header>
                <div class='w3-container'>
                    <p><label><i class='fa fa-shopping-cart'></i> Tickets, $15 per person</label></p>
                    <p><label><i class='fa fa-user'></i> Send To</label></p>
                    <button class='w3-button w3-block w3-teal w3-padding-16 w3-section w3-right' id="buy-ticket" onclick="buyTicket()">PAY<i class='fa fa-check'></i></button>
                    <button class='w3-button w3-red w3-section' onclick="document.getElementById('ticketModal').style.display='none'">Close <i class='fa fa-remove'></i></button>
                </div>
            </div>
        </div>
        <div id="resultModal" class='w3-modal'>
            <div class='w3-modal-content w3-animate-top w3-card-4'>
                <header class='w3-container w3-teal w3-center w3-padding-32'>
                    <span onclick="document.getElementById('resultModal').style.display='none'" class='w3-button w3-teal w3-xlarge w3-display-topright'>×</span>
                    <h2 class='w3-wide'><i class='fa fa-suitcase w3-margin-right'></i>WOW</h2>
                </header>
                <div class='w3-container'>
                    <button class='w3-button w3-red w3-section' onclick="document.getElementById('resultModal').style.display='none'">Close <i class='fa fa-remove'></i></button>
                </div>
            </div>
        
        </div>
        <script>
            // Automatic Slideshow - change image every 3 seconds
            var myIndex = 0;
            carousel();
            function carousel() {
                var i;
                var x = document.getElementsByClassName('mySlides');
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = 'none';
                }
                myIndex++;
                if (myIndex > x.length) { myIndex = 1 }
                x[myIndex - 1].style.display = 'block';
                setTimeout(carousel, 3000);
            }

            // Used to toggle the menu on small screens when clicking on the menu button
            function myFunction() {
                var x = document.getElementById('navDemo');
                if (x.className.indexOf('w3-show') == -1) {
                    x.className += ' w3-show';
                } else {
                    x.className = x.className.replace(' w3-show', '');
                }
            }

            // When the user clicks anywhere outside of the modal, close it
            var modal = document.getElementById('ticketModal');
            var resultModal = document.getElementById('resultModal');
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                    console.log('test');
                } else if (event.target == resultModal) {
                    resultModal.style.display = 'none';
                    console.log('test2');
                }
            }
            
            function buyTicket() {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText)
                        document.getElementById('ticketModal').style.display='none';
                        document.getElementById('resultModal').style.display='block';
                    }
                };
                xmlhttp.open("POST", "../../service/attendant/changeStatus.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // xmlhttp.overrideMimeType('application/javascript; charset=utf-8')
                xmlhttp.send("event="+"<?php echo $event->id ?>"+"&user="+"<?php echo $_SESSION['current_user'] ?>");
            }
 

        </script>



        <!-- The Contact Section -->
        <div class='w3-container w3-content w3-padding-64' style='max-width:800px' id='contact'>
            <h2 class='w3-wide w3-center'>CONTACT</h2>
            <p class='w3-opacity w3-center'><i>Fan? Drop a note!</i></p>
            <div class='w3-row w3-padding-32'>
                <div class='w3-col m6 w3-large w3-margin-bottom'>
                    <i class='fa fa-map-marker' style='width:30px'></i> Chicago, US<br>
                    <i class='fa fa-phone' style='width:30px'></i> Phone: +00 151515<br>
                    <i class='fa fa-envelope' style='width:30px'> </i> Email: mail@mail.com<br>
                    <i class='fa fa-facebook-official w3-hover-opacity' style='width:30px'> </i><br>
                    <i class='fa fa-twitter w3-hover-opacity' style='width:30px'></i>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- import my js file -->
    <script src="js/home.js"></script>
</body>
</html>