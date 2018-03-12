<?php include("../../service/admin/getEventList.php");?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Event List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/footable.js"></script>
        <script src="js/footable.sort.js"></script>
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
<body>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../app.css">
    
</head>
<body>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <!-- dropdown menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

    <div class="content">
        <h1>Event List</h1>
        <form method="get" action="../../service/admin/fpdf181/makePDF.php">
            <button type="submit">Report PDF</button>
        </form>

        <input type="button" onclick="location.href='userList.php'" value="User List" />

        Search: <input type="text" id="myInput">
  

                <table id="myTable">
                    <thead>
                        <tr>
                            <th>Start Date</th>
                            <th>Final Date</th>
                            <th>Event Name</th>
                            <th>Place</th>
                            <th>Organize By</th>
                            <th>Participant</th>
                        
                        </tr>
                        </thead>
                        <?php foreach ($events as $event): ?>
                    <tbody id="eventTable">
                        <tr>
                            <td><?= $event->event_start_date;?></td>
                            <td><?= $event->event_finish_date ?></td>
                            <td><?= $event->name;?></td>
                            <td><?= $event->place;?></td>
                            <td><?= $event->organizer_name;?></td>
                            <td><?= $event->attendant.'/'.$event->max_attendents;?></td>
                        
                        </tr>
                    </tbody>
                        <?php endforeach; ?>
                </table>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/home.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
                    $("#eventTable tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
    </script>
</body>
</html>
    
</body>
</html>