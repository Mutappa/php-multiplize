<?php 
    session_start();
    if(!isset($_SESSION['user']))header('location:login.php');

    //add all listings
    $_SESSION['table'] = 'listings';
    $user = $_SESSION['user'];
    $listings = include('../database/fetch_listing.php');
    // var_dump($listings);
    // die;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/dashboard.css" rel="stylesheet">
    <title>Main Dashboard</title>
    <script src="https://kit.fontawesome.com/83d4dd4455.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main_body">
        <div class="side_bar">
                <div class="dashboard_owner_container">
                    <img src="../assets/images/logo-1.webp" alt="owner Name">
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
                    <a href="logout.php">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                    logout
                    </a>
                </div>
        </div>
        <div class="content_body">
            <div class="content_box">
                <div class="content_header">
                    <div class="sub_box">
                        <div class="search_bar">
                            <input type="text" placeholder="Search...">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="filter_box">
                            <i class="fa-solid fa-filter"></i>
                            Filter
                        </div>
                    </div>
                    <div class="add_listing_form">
                        <a href="add_listing_form.php"><i class="fa-solid fa-plus"></i> Add Listing </a>
                    </div>
                </div>
                <?php include('listing_table.php'); ?>
            </div>
        </div>
        <div class="response_box">
                <?php 
                    if(isset($_SESSION['response'])){
                        $response_message = $_SESSION['response']['message'];
                        $listing_add = $_SESSION['response']['message'];
                    ?>
                    <div class="response_message">
                        <p class="<?= $listing_add ? 'responseMessage_success' : 'responseMessage_error ?' ?> ">
                        <?= $response_message ?>
                        </p>
                        <span onclick="this.parentElement.style.display='none';">
                        <i class="fa-regular fa-circle-xmark"></i>
                        </span>
                    </div>
                <?php unset($_SESSION['response']); } ?>
        
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>
</html>