<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../app.css">
    </head>
    <body class="background-dark">
        <div class="container event-detail">
          <div id="header">

          </div>

            <!-- content start here -->
            <div class="row event-detail">
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
        ต้องการยกเลิกการจองหรือไม่
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
          </tbody>
          </table>


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
        <script>
            $(function () {
                $("#header").load("header.html");
            });
        </script>
        <script src="js/buying.js"></script>
    </body>
    </html>
