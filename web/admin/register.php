<?php include("../../service/admin/server.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../app.css">
    <link rel="stylesheet" href="style.css">

</head>
<body class="background-dark">
    <div class="container background-light">
      <div class="banner">

      </div>
      <nav class="row navbar navbar-expand-lg navbar-light primary">
          <!-- web name -->
          <a class="navbar-brand" href="index.php">EVENT PUSH</a>
          <!-- hamberger icon menu (3 line icon, show when small screen) -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
              aria-expanded="false" aria-label="Toggle navigation">

                          <span class="navbar-toggler-icon"></span>
                      </button>


          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <!-- menu -->
<!-- 
                  <li class="nav-item">
                      <a class="nav-link" href="checkin.html">Check in</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="createEvent.html">Create Event</a>
                  </li> -->

              </ul>
              <!-- <div class="nav-item">
                  <a style="color:black" class="nav-link" href="profile.html">Profile</a>
              </div> -->

              <!-- <button id="logout-btn" type="button" class="btn btn-danger" style="font-size:15px;">Logout</button> -->
          </div>
      </nav>

        <div class="header">
            <h1>Register</h1>
        </div>

        <form method="post" action="register.php">
                <div class="input-group">
                    <label>Register for</label>
                    <input type="radio" name="position" value="Organizer" >Organizer
                    <input type="radio" name="position" value="Attendant" checked/>Attendant
                </div>

                <div class="input-group">
                    <button type="submit" name="next" class="btn">Next</button>
                </div>

                <p>
                    Already a member? <a href="index.php">Sign in</a>
                </p>
        </form>



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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/logout.js"></script>
</body>
</html>
