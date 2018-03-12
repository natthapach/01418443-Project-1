<?php include("../../service/admin/server.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../app.css">
    <link rel="stylesheet" href="style.css">
<<<<<<< HEAD

=======
 
</head><html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
>>>>>>> 1d42022ee355998bcbac6adae0ca4c3f05a1dd0f
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
<<<<<<< HEAD
              <span class="navbar-toggler-icon"></span>
          </button>
=======
                          <span class="navbar-toggler-icon"></span>
                      </button>
>>>>>>> 1d42022ee355998bcbac6adae0ca4c3f05a1dd0f

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <!-- menu -->
<<<<<<< HEAD
                  <li class="nav-item">
                      <a class="nav-link" href="checkin.html">Check in</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="createEvent.html">Create Event</a>
                  </li>

              </ul>
              <div class="nav-item">
                  <a style="color:black" class="nav-link" href="profile.html">Profile</a>
              </div>

              <button id="logout-btn" type="button" class="btn btn-danger" style="font-size:15px;">Logout</button>
          </div>
      </nav>


=======
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                                  Category
                                  </a>
                      <div class="dropdown-menu" id="categories" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="home.html">All event</a>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="showbuying.php">Buying</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="joined.html">Joined</a>
                  </li>
                  <li clss="nav-item">
                      <a class="nav-link" href="ticket-list.html">Ticket-list</a>
                  </li>
                         <li class="nav-item dropdown">

                     <a class="nav-link dropdown-toggle search-bar" href="#" id="search-bar" role="button" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false">
                                 <!-- Search -->
                                 <i class="fas fa-search"></i> Search <span id="search-bar-content">  <input type="text" id="search-keyword"></span>
                      </a>
                     <div class="dropdown-menu search-content" id="search-content" aria-labelledby="navbarDropdown">
                         <div class="row"><div class="col-3">location: </div><div class="col-9"><input id="search-location"></div></div>
                         <div class="row"><div class="col-3">organizer: </div><div class="col-9"><input id="search-organizer"></div></div>
                         <div class="row"><div class="col-3">from: </div><div class="col-9"><input type="date" id="search-from"></div></div>
                         <div class="row"><div class="col-3">to: </div><div class="col-9"><input type="date" id="search-to"></div></div>
                         <div class="row"><div class="col-3"><input class="btn btn-primary" type="submit" id="search-submit"></div></div>
                     </div>
                 </li>
              </ul>
          </div>
      </nav>
   
>>>>>>> 1d42022ee355998bcbac6adae0ca4c3f05a1dd0f


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
<<<<<<< HEAD
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
=======
     
>>>>>>> 1d42022ee355998bcbac6adae0ca4c3f05a1dd0f



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
<<<<<<< HEAD


=======
    <!-- import my js file -->
    <!-- <script src="app.js"></script> -->
>>>>>>> 1d42022ee355998bcbac6adae0ca4c3f05a1dd0f
</body>
</html>
