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
        <div id="header">

        </div>
        <!-- content start here -->

        <?php
            session_start();
            // $_SESSION["current_user"] = "user2";
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
            $stmt = $conn->prepare("SELECT status_id FROM attendences JOIN attendants ON attendences.attendant_id = attendants.id WHERE attendants.user_name='".$_SESSION['current_username']."' AND attendences.event_id=".$_GET['event']);
            $stmt->execute();
            $status = $stmt->fetch(PDO::FETCH_OBJ);
            if ($status !== false) {
                $event->status = $status;
            }

            $stmt = $conn->prepare("SELECT birth_date, id FROM attendants WHERE user_name='".$_SESSION['current_username']."'");
            $stmt->execute();
            $birth = $stmt->fetch(PDO::FETCH_OBJ);
            if ($birth !== false) {
                $event->birth = $birth;
                $aid = $birth->id;
            }

            $stmt = $conn->prepare("SELECT pre_event_id FROM pre_condition_event JOIN event ON pre_condition_event.event_id = event.id WHERE pre_condition_event.event_id =" .$_GET['event']);
            $stmt->execute();
            $pre_events = $stmt->fetchAll(PDO::FETCH_OBJ);
            $event->pre_events = array();
            $notPassEvents = array();
            $isNotPass = FALSE;
            if ($pre_events !== false) {
                foreach ($pre_events as $pre_event) {
                    $stmt = $conn->prepare("SELECT name FROM event WHERE id=".$pre_event->pre_event_id);
                    $stmt->execute();
                    $name = $stmt->fetch(PDO::FETCH_OBJ)->name;

                    $stmt = $conn->prepare("SELECT * FROM attendences WHERE event_id=".$pre_event->pre_event_id." AND attendant_id=".$aid." AND status_id='C'");
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_OBJ);
                    if ($result === FALSE) {
                        $isNotPass = TRUE;
                        $notPassEvents[] = $name;
                    }
                }
            }
            // echo $isNotPass ? "TRUE" : "FALSE";

            // $stmt = $conn->prepare("SELECT e.*, count(at.event_id) as attendants
            //     from event as e
            //     join organizer as o
            //     ON o.id = e.organizer_id
            //     left join attendences as at
            //     ON at.event_id = e.id
            //     where a.user_name=:username
            //     GROUP BY e.d

            // ");

            // $stmt->execute();
            // $count_attendant = $stmt->fetchAll(PDO::FETCH_OBJ);
            // // if ($count_attendant !== false) {
            // //     $event->count_attendant = $count_attendant;
            // // }
            // $event->count_attendants = array();
            // if ($count_attendants !== false) {
            //     $event->count_attendants = $count_attendants;
            // }


            //  var_dump($event);

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
                        <p><?php echo $event->place ?></p>
                        <?php
                        $now_year = date("Y");
                        $birth = explode(" ",$event->birth->birth_date);
                        $year = explode("-", $birth[0]);
                        $old = $now_year - $year[0];
                        if ( $old > $event->max_age || $old < $event->min_age){
                            echo "<h3 class='cannot-buy'>อายุคุณไม่อยู่ในเกณฑ์ของ event นี้</h3>";
                        } else if ( $isNotPass ){
                            echo "<h3 class='cannot-buy'>คุณต้องเข้าร่วม event เหล่านี้ก่อน: [".join(", ", $notPassEvents)."]</h3>";
                        } else {
                            if ($status === false){
                                echo '<button class="btn w3-margin-bottom buy2-btn buy2-btn:hover" onclick="document.getElementById('."'ticketModal'".").style.display='block'".'">Get Ticket</button>';
                            
                            // else if($event->status->status_id != "W") {
                            //      echo '<button class="btn w3-margin-bottom buy2-btn buy2-btn:hover" onclick="document.getElementById('."'ticketModal'".").style.display='block'".'">Get Ticket</button>';    
                            // }
                            // else if ($event->status->status_id == "P"){
                            //     echo "<h3 class='cannot-buy'>You have already get this ticket.</h3>";
                            }else{

                                echo "<h3 class='cannot-buy'>You have already get this ticket.</h3>";
                            }
                        }



                        ?>
                        <!-- <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Get Ticket</button> -->
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
                        <p><label><i class='fa fa-shopping-cart'></i> Tickets,<?php echo $event->price ?> baht per person</label></p>
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
            <p class='w3-justify'><span class='w3-justify bold-font'> Number of attendants : </span><?php echo $event->max_attendents?> persons</p><br>
            <p class='w3-justify'><span class='w3-justify bold-font'> Event's information : </span><?php echo $event->information?></p><br>
            <p class='w3-justify'><span class='w3-justify bold-red-font'> Age : <?php echo $event->min_age?>-<?php echo $event->max_age?> years old</span></p><br>
            <p class='w3-justify'><span class='w3-justify bold-font'><i class='fa fa-map-marker'  style='width:30px'></i>Location : </span><span id="location"><?php echo $event->place?></span></p>
            <div id="map" style="width:100%;height:400px"></div>

            <?php
                // var_dump($event->google_map_link);
                $lat = preg_split("/ /", $event->google_map_link)[0];
                $lng = preg_split("/ /", $event->google_map_link)[1];

            ?>


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

    <!-- Comment -->
        <div class='w3-container w3-content w3-padding-64' style='max-width:800px' id='contact'>
            <h2 class='w3-wide w3-center'>COMMENT</h2>
            <p class='w3-opacity w3-center'><i>Fan? Drop a note!</i></p>

        </div>
        <?php
            include("comment.php");

        ?>
    </div>
    <footer class="primary-light">
<h3> contact us </h3>

<a href="#" class="twitter"><img src="../iconfooter/twitter.png" id="iconfooter"></img></a>
<a href="#" class="facebook"><img src="../iconfooter/facebook.png" id="iconfooter"></img></a>
<a href="#" class="instagram"><img src="../iconfooter/instagram.png" id="iconfooter"></img></a>
      <div class="footer-copyright primary">
          <div>© 2018 อกไก่ปั่น. All rights reserved.</div>
      </div>
  </footer>

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
                        location.reload(true);
                    }
                };
                xmlhttp.open("POST", "../../service/attendant/changeStatus.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // xmlhttp.overrideMimeType('application/javascript; charset=utf-8')
                xmlhttp.send("event="+"<?php echo $event->id ?>"+"&user="+"<?php echo $_SESSION['current_username'] ?>");
            }


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
                var geocoder = new google.maps.Geocoder;
                getGeocodeFromLatLng(geocoder, position, "location");
            }
            function getGeocodeFromLatLng(geocoder, latlng, domID) {
                geocoder.geocode({location: latlng}, (results, status)=>{
                    if (status === 'OK') {
                        if (results[0]) {
                            document.getElementById(domID).innerHTML = results[0].formatted_address
                        }
                    }
                })
            }

        </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQfdc8WProuGLQ9XDI3FarNXrmxB3ARjA&callback=initMap">
    </script>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- import my js file -->
    <script src="js/home.js"></script>
    <script src="js/comment.js"></script>
    <script>
        <?php
            echo "start('" . $event_id . "')";
        ?>
    </script>
       <script>
        $(function () {
            $("#header").load("header.html");
        });
    </script>
    <script src="../js/logout.js"></script>
</body>
</html>
