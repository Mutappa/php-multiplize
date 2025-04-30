<?php 
    session_start();
    if(!isset($_SESSION['user']))header('location:login.php');

    //add all listings
    $user = $_SESSION['user'];
    $commerlistings = include('../database/fetch_commercial.php');
    // var_dump($commerlistings);
    // die;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/dashboard.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" rel="stylesheet">
    <title>Commercial Listings</title>
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
                <div class="listing_content">
                        <table cellspacing="0" id="listingTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <!-- <th>Phone Number</th> -->
                                    <th>Building</th>
                                    <!-- <th>Locality</th> -->
                                    <th>Address</th>
                                    <th>Pincode</th>
                                    <th>Config</th>
                                    <th>Sqft</th>
                                    <th>Ammenities</th>
                                    <th>Availabilty</th>
                                    <th>Remarks</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($commerlistings as $index => $user){?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $user['name'] ?>
                                            <br>
                                            <span class="sub_span"><?= $user['phone'] ?></span></td>
                                        </td>
                                        <td><?= $user['building_lot'] ?>
                                            <br>
                                            <span class="sub_span"><?= $user['locality'] ?></span></td>
                                        <td><?= $user['address'] ?></td>
                                        <td><?= $user['pincode'] ?></td>
                                        <td><?= $user['configuration'] ?></td>
                                        <td><?= $user['sqft'] ?></td>
                                        <td><?= $user['perks'] ?></td>
                                        <td><?= $user['availability'] ?>
                                            <br>
                                            <span class="sub_span">₹<?= $user['price'] ?>
                                            </span>
                                        </td>
                                        <td><?= $user['remarks'] ?></td>
                                        <td class="options_box">
                                        <a href="" class="edit_listing"><i class="fa fa-pencil"></i>Edit</a>
                                        <a href="" class="delete_listing del_commListing" data-userid="<?= $user['id']?>"><i class="fa fa-trash"></i>Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>
