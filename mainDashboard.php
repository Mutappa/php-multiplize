<?php 
    session_start();
    if(!isset($_SESSION['user']))header('location:login.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <title>Main Dashboard</title>
    <script src="https://kit.fontawesome.com/83d4dd4455.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main_body">
        <div class="side_bar">
                <div class="dashboard_owner_container">
                    <img src="assets/images/logo-1.webp" alt="owner Name">
                </div>
                <ul class="sidebar_items">
                    <li class="side_bar-tab1 a_tags">   
                        <a href=""><i class="fa-solid fa-list" aria-hidden="true"></i> 
                        Listings
                        </a>
                    </li>  
                    <li class="side_bar-tab2 a_tags">
                        <a href=""><i class="fa-solid fa-database" aria-hidden="true"></i>
                        Dashboard
                        </a>
                    </li>
                </ul>
                <div class="logout_button">
                <a href="database/logout.php"><i class="fa fa-power-off" aria-hidden="true"></i>
                logout
                </a>
                </div>
        </div>
        <div class="content_body">
            <div class="dummy">

            </div>
        </div>
    </div>
</body>
</html>