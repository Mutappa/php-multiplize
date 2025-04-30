<?php 
    session_start();
    if(!isset($_SESSION['user']))header('location:login.php');

    //add all listings
    $user = $_SESSION['user'];
    // var_dump($listings);
    // die;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/dashboard.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" rel="stylesheet">
    <title>Main Dashboard</title>
    <script src="https://kit.fontawesome.com/83d4dd4455.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main_body">
        <?php include('partials/side_bar.php'); ?>
        <div class="content_body">
            <div class="content_box">
                <div class="content_header">
                    <div class="add_listing_form">
                        <a href="add_listing_form.php"><i class="fa-solid fa-plus"></i> Add Listing </a>
                    </div>
                </div>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>