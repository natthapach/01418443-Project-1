<?php include("server.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="header">
        <h2>Home page</h2>
    </div>

    <div class="content">
  	    <!-- notification message -->
  	    <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
            <h3>
                <?php 
          	        echo $_SESSION['success']; 
          	        unset($_SESSION['success']);
                ?>
      	    </h3>
            </div>
  	    <?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['current_username'])) : ?>
    	    <p>Welcome <strong><?php echo $_SESSION['current_username']; ?></strong></p>
    	    <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
        <?php endif ?>
    </div>

    
</body>
</html>