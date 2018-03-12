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
  <div id="header">

  </div>
        <!-- content start here -->
        <div class="row">
            <div style="margin:0% auto;width:400px;text-align:center;">
                <h1 class="table-head">แจ้งโอนเงิน</h1>
             <form enctype="multipart/form-data" class="form-horizontal" action="../../service/attendant/insertSlip.php" method="POST">
               <div class="form-group ">
                 <input type="hidden" name="eventid" value="<?php
                 session_start();
                $_SESSION["eventid"] = $_GET['eventid'];?>">
                   <label  class="control-label col-sm-3" for="Date">Date:</label>
                   <div class="col-sm-5">
                   <input type="date" class="form-control" id="date" name="date">
                    </div>
               </div>
               <div class="form-group ">
                   <label  class="control-label col-sm-3" for="Date">Time:</label>
                   <div class="col-sm-5">
                   <input type="time" class="form-control" id="time" name="time">
                    </div>
               </div>
               <div class="form-group">
                   <label  class="control-label col-sm-3" for="Date">Price:</label>
                   <div class="col-sm-5">
                   <input type="number" class="form-control" id="amount" name="amount">
                    </div>
               </div>
               <div class="form-group">
                   <label  class="control-label col-sm-3" for="Date">Slip:</label>
                   <div class="col-sm-5">
                   <input type="file" class="form-control-file" name="userfile" required>
                    </div>
               </div>
               <div class="form-group">
   <div class="col-sm-offset-2 col-sm-5">
     <button type="submit" class="btn btn-default"  name="submit" id="submit">Submit</button>
   </div>
 </div>
              </form>
            </div>
</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $("#header").load("header.html");
        });
    </script>
</body>
</html>
