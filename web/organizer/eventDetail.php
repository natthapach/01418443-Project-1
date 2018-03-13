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
    <link rel="stylesheet" href="css/comment.css">
</head>

<body class="background-dark">
    <div class="container background-light">
        <div class="banner">

        </div>
        <nav class="row navbar navbar-expand-lg navbar-light primary">
            <!-- web name -->
            <a class="navbar-brand" href="home.html">Event Push</a>
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


        <?php
            session_start();
            
            $username = $_SESSION["current_username"];
            $conn = new PDO(
                "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
                "root",
                ""
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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
            $stmt = $conn->prepare("SELECT category.name FROM category INNER JOIN event ON category.id=event.category_id");
            $stmt->execute();
            $category = $stmt->fetch(PDO::FETCH_OBJ);
            if ($category !== false) {
                $event->category = $category;
            }
            $stmt = $conn->prepare("SELECT profile FROM account WHERE user_name='".$event->organizer->user_name."';");
            $stmt->execute();
            $organizer_profile = $stmt->fetch(PDO::FETCH_OBJ);
            if ($organizer_profile !== false) {
                $event->organizer_profile = $organizer_profile;
            }


            //svar_dump($event);

        ?>


        <div class='event-detail' id='tour'>
            <div class='w3-container w3-content w3-padding-64' style='max-width:800px'>
                <h2 class='w3-wide w3-center'> <?php echo $event->name ?></h2>
                <p class='w3-opacity w3-center'><i>Remember to book your tickets!</i></p><br>
                <div class='w3-one w3-margin-bottom'>
                    <?php for ($x = 0; $x < count($event->pictures); $x++) {
                        echo "<div class='mySlides w3-display-container w3-center'>
                        <img src='../../service/pictures/".$event->pictures[$x]->path."' style='width:100% ;height:50%'>
                        </div>";
                    }?>
                    <div class='w3-container w3-white'>
                        <p><b><?php echo $event->name ?></b></p>
                        <p class='w3-opacity'><?php echo $event->event_start_date ?></p>
                        <p><?php echo $event->information ?></p>
                        <!-- <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Buy Ticket</button> -->
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
                        <p><label><i class='fa fa-shopping-cart'></i> Tickets,<?php echo $event->price ?> per person</label></p>
                        <button class='w3-button w3-block w3-teal w3-padding-16 w3-section w3-right' id="buy-ticket" onclick="buyTicket()">Buy ticket<i class='fa fa-check'></i></button>
                        <button class='w3-button w3-red w3-section' onclick="document.getElementById('ticketModal').style.display='none'">Close <i class='fa fa-remove'></i></button>
                    </div>
                </div>
            </div>
            <div id="resultModal" class='w3-modal'>
                <div class='w3-modal-content w3-animate-top w3-card-4'>
                    <header class='w3-container w3-teal w3-center w3-padding-32'>
                        <span onclick="document.getElementById('resultModal').style.display='none'" class='w3-button w3-teal w3-xlarge w3-display-topright'>×</span>
                        <h2 class='w3-wide'><i class='fa fa-suitcase w3-margin-right'></i>Confirm booking the ticket</h2>
                    </header>
                <div class='w3-container'>
                    <p>You have book the ticket already!</p>
                    <button class='w3-button w3-red w3-section' onclick="document.getElementById('resultModal').style.display='none'">Close <i class='fa fa-remove'></i></button>
                </div>
            </div>
        </div>



        <div class='event-detail-info w3-container w3-content w3-center w3-padding-64' style='max-width:800px' id='band'>

            <p class='w3-justify'><span class='w3-justify bold-font'> Event's Name : </span><?php echo $event->name?></p><br>
            <p class='w3-justify'><span class='w3-justify bold-font'> Category : </span><?php echo $event->category->name?></p><br>
            <p class='w3-justify'><span class='w3-justify bold-font'> Starting Date : </span><?php echo $event->event_start_date?></p><br>
            <p class='w3-justify'><span class='w3-justify bold-font'> Ending Date : </span><?php echo $event->event_finish_date?></p><br>
            <p class='w3-justify'><span class='w3-justify bold-font'> Price : </span><?php echo $event->price?> baht</p><br>
            <p class='w3-justify'><span class='w3-justify bold-font'> Number of attendants : </span><?php echo $event->max_attendents?></p><br>
            <p class='w3-justify'><span class='w3-justify bold-font'> Event's information : </span><?php echo $event->information?></p><br>
            <p class='w3-justify'><span class='w3-justify bold-red-font'> Age : <?php echo $event->min_age?>-<?php echo $event->max_age?> years old</span></p><br>
            <p class='w3-justify'><span class='w3-justify bold-font'><i class='fa fa-map-marker'  style='width:30px'></i>Location : </span><?php echo $event->place?></p>

            <div id="map" style="width:100%;height:400px"></div>
            <?php
                // echo $event->google_map_link;
                $lat = preg_split("/ /", $event->google_map_link)[0];
                $lng = preg_split("/ /", $event->google_map_link)[1];
                // echo "lat".$lat;
                // echo "lng".$lng;
            ?>
            <script>
            function initMap() {
                var position = {lat: <?php echo $lat;?>, lng: <?php echo $lng;?>};
                var map = new google.maps.Map(document.getElementById('map'), {
                                                zoom: 15,
                                                center: position
                                            });
                var marker = new google.maps.Marker({
                                                        position: position,
                                                        map: map
                                                    });
            }
            </script>
            <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQfdc8WProuGLQ9XDI3FarNXrmxB3ARjA&callback=initMap">
            </script>

        </div>
        <!-- The Contact Section -->
        <div class='event-detail-contact w3-container w3-content w3-padding-64' style='max-width:800px' id='band'>
            <h2 class='w3-wide w3-center'>CONTACT</h2>
            <div class='w3-row w3-padding-32'>
                <div class="w3-col m6 w3-padding-large w3-hide-small">
                    <img src="../../service/profile/<?php echo $event->organizer_profile->profile ?>" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:80%;" float:"right">
                </div>
                    <p class='w3-justify'><span class='w3-justify bold-font'><i class='fa fa-user' style='width:30px'></i> Organizer's Name : </span><?php echo $event->organizer->name?></p><br>
                    <p class='w3-justify'><span class='w3-justify bold-font'><i class='fa fa-phone' style='width:30px'></i> Tel : </span><?php echo $event->organizer->phone?></p><br>
                    <p class='w3-justify'><span class='w3-justify bold-font'><i class='fa fa-envelope' style='width:30px'></i> Email : </span><?php echo $event->organizer->email?></p><br>
                    <p class='w3-justify'><span class='w3-justify bold-font'><i class='fa fa-facebook-official' style='width:30px'></i> Facebook : </span><?php echo $event->organizer->facebook?></p>
            </div>
        </div>
    <!-- Attendant -->
    <div class='w3-container w3-content w3-padding-64' style='text-align:center;max-width:800px'>
            <h2>Attendants</h2>
            <a href=<?php echo '"event-attendants.php?event_id='.$_GET['event'].'"';?>>
                <button class="btn" ้ id="attendants-btn">
                    VIEW ATTENDANTS
                </button>
            </a>

    </div>

    <!-- <div class='w3-container w3-content w3-padding-64' style='text-align:center;max-width:800px'>
            <h2>Google Form</h2>
            <button class="btn" id="google-form-btn">SEND GOOGLE FORM</button>
    </div> -->
    <!-- Comment -->
        <div class='w3-container w3-content w3-padding-64' style='max-width:800px' id='contact'>
            <h2 class='w3-wide w3-center'>COMMENT</h2>
            <p class='w3-opacity w3-center'><i>Fan? Drop a note!</i></p>

        </div>
        <?php
            include("comment.php");
        ?>
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
                } else if (event.target == resultModal) {
                    resultModal.style.display = 'none';

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
                xmlhttp.send("event="+"<?php echo $event->id ?>"+"&user="+"<?php echo $_SESSION['current_username'] ?>");
            }

        </script>
        <footer class="primary-light">
      <h3> contact us </h3>

      <a href="#" class="twitter"><img src="../iconfooter/twitter.png" id="iconfooter"></img></a>
      <a href="#" class="facebook"><img src="../iconfooter/facebook.png" id="iconfooter"></img></a>
      <a href="#" class="instagram"><img src="../iconfooter/instagram.png" id="iconfooter"></img></a>
          <div class="footer-copyright primary">
              <div>© 2018 อกไก่ปั่น. All rights reserved.</div>
          </div>
      </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- import my js file -->
    <script src="js/eventDetail.js"></script>
    <script src="js/comment.js"></script>
    <script src="../js/logout.js"></script>
    <script>
        <?php
            echo "start('" . $event_id . "')";
        ?>
    </script>
    <script>
        <?php
            echo "let event_id = '$event_id';";
        ?>
    </script>
    <script src="../js/logout.js"></script>
    <<script src="js/sendForm.js"></script>
</body>
</html>
