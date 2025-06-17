<?php 
    session_start();
    if(!isset($_SESSION['user']))header('location:login.php');

    //add all listings
    $user = $_SESSION['user'];
    $potlistings = include('../database/fetch_potential.php');
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
    <title>potential-buyers</title>
    <script src="https://kit.fontawesome.com/83d4dd4455.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main_body">
        <?php include('partials/side_bar.php'); ?>
        <div class="content_body">
            <div class="content_box">
                <div class="content_header">
                    <div class="add_listing_form">
                        <a href="potential_listing_form.php"><i class="fa-solid fa-plus"></i> Add Listing </a>
                    </div>
                </div>
                <div class="listing_content">
                        <table cellspacing="0" id="listingTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <!-- <th>Sqft</th> -->
                                    <th>Price</th>
                                    <th>Remarks</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($potlistings as $index => $user){?>
                                    <tr>
                                        <td><?= $index + 1?></td>
                                        <td><?= $user['name'] ?>
                                            <br>
                                            <span class="sub_span"><?= $user['phone_number'] ?></span>
                                        </td>
                                        <td><?= $user['sqft'] ?>
                                        </td>
                                        <td>
                                            <span class="sub_span">₹<?= $user['price'] ?>
                                            </span>
                                        </td>
                                        <td><?= $user['remarks'] ?></td>
                                        <td class="options_box">
                                        <a href="" class="edit_listing update_resListing"><i class="fa fa-pencil"></i>Edit</a>
                                        <a href="../database/delete_listing.php" class="delete_listing del_resListing" data-userid="<?= $user['id']?>"><i class="fa fa-trash"></i>Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
