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
    <style>

table {
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th {
    cursor: pointer;
}

th, td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}
        </style>
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

              </ul>
              <div class="nav-item">
                  <a style="color:black" class="nav-link" href="profile.html">Profile</a>
              </div>

              <button id="logout-btn" type="button" class="btn btn-danger" style="font-size:15px;">Logout</button>
          </div>
      </nav>



        <div class="header">
            <h1>Register</h1>
        </div>

        <form method="post" action="attendantRegis.php">
            <?php include("../../service/admin/errors.php"); ?>

                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </div>


                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password_1">
                </div>

                <div class="input-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_2">
                </div>

                <div class="input-group">
                    <label>E-mail</label>
                    <input type="email" name="email" value="<?php echo $email; ?>">
                </div>

                <div class="input-group">
                    <label>Name</label>
                    <input type="text" name="name"value="<?php echo $name; ?>">
                </div>

                <div class="input-group">
                    <label>Surname</label>
                    <input type="text" name="surname" value="<?php echo $username; ?>">
                </div>

                <div class="input-group">
                    <label>Birthday</label>
                    <input type="date" name="birth" value=" <?php echo $birth; ?>">


                </div>

                <div class="input-group">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                </div>

                <div class="input-group">
                    <label>Phone</label>
                    <input type="text" name="phone" valu="<?php echo $phone; ?>">
                </div>

                <div class="input-group">
                    <label>Gender</label>
                    <input type="radio" name="gender" value="male" >Male
                    <input type="radio" name="gender" value="A" checked/>Female
                </div>



                <div class="input-group">
                    <button type="submit" name="registerAttendant" class="btn">Register</button>
                </div>

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
    <!-- import my js file -->
    <!-- <script src="app.js"></script> -->

</body>
</html>
