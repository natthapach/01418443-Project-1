
<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../app.css">
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
                            <a class="nav-link" href="#">Buying</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="joined.html">Joined</a>
                        </li>
                        <li clss="nav-item">
                            <a class="nav-link" href="ticket-list.html">Ticket-list</a>
                        </li>

                    </ul>
                </div>
            </nav>

            <!-- content start here -->

            <div class="container">
                <div class="row" id="event-table">
                </div>
            </div>

            <div class="row">
              <!-- <h3 style="align:center;">Buying Event</h3> -->
                <h1 class="table-head">Buying Event</h1>

                      <table class="table"  style="text-align:center;">

                         <thead>
                           <tr>
                             <th>Event Name</th>
                             <th>Place</th>
                             <th>Date and Time</th>
                             <th>Price</th>
                             <th>Purchase status</th>
                           </tr>
                         </thead>

                         <tbody class="tbody">

                           <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <form method="post" action="../../service/attendant/cancelEvent.php">
      <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Cancel Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        ต้องการยกเลิกการจองหรออออออ
      </div>
      <div class="modal-footer">
        <input type="hidden" name="eventid" value="<?php
             session_start();
            $_SESSION["eventid"] = $_GET['eventid'];?>">
        <button type="button" class="btn btn-primary" id="confirm">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
                </div>
              </div>
            </div>
                         </tbody>
                       </table>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- import my js file -->
        <script>
            $(function () {
                $("#header").load("header.html");
            });
        </script>
        <script src="js/buying.js"></script>
    </body>
    </html>
