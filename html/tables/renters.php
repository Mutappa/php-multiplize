<?php 
    session_start();
    if(!isset($_SESSION['user']))header('location:login.php');

    //add all listings
    $user = $_SESSION['user'];
    $renters = include('../../database/fetch-data/fetch_renters.php');
    // var_dump($commerlistings);
    // die;

    // Function to format numbers in Indian style
    function indian_number_format($num) {
    $num = (string) $num;
    $len = strlen($num);
    if($len > 3){
        $last3 = substr($num, -3);
        $restUnits = substr($num, 0, $len - 3);
        $restUnits = preg_replace("/\B(?=(\d{2})+(?!\d))/", ",", $restUnits);
        $formatted = $restUnits . "," . $last3;
    } else {
        $formatted = $num;
    }
    return $formatted;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/css/dashboard.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" rel="stylesheet">
    <title>Commercial Listings</title>
    <script src="https://kit.fontawesome.com/83d4dd4455.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main_body">
        <?php include('../partials/side_bar.php'); ?>
        <div class="content_body">
            <div class="content_box">
                <div class="content_header">
                    <h2>Renters list</h2>
                    <div class="add_listing_form">
                        <a href="../forms/renters_form.php"><i class="fa-solid fa-plus"></i> Add Listing </a>
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
                                    <th>Config</th>
                                    <th>Sqft</th>
                                    <th>Ammenities</th>
                                    <th>Price</th>
                                    <th>Site Visit</th>
                                    <th>Remarks</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($renters as $index => $user){?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $user['name'] ?>
                                            <br>
                                            <span class="sub_span"><?= $user['phone'] ?></span></td>
                                        </td>
                                        <td><?= $user['building_name'] ?>
                                            <br>
                                            <span class="sub_span"><?= $user['locality'] ?></span></td>
                                        <td><?= $user['address'] ?>
                                            <br>
                                            <span class="sub_span"><?= $user['pincode'] ?></span>
                                        </td>
                                        <td><?= $user['configuration'] ?>
                                            <br>
                                            <span class="sub_span"><?= $user['rooms'] ?></span>
                                        </td>
                                        <td><?= ($user['sqft'] === null || $user['sqft'] === '' || $user['sqft'] == 0)
                                                ? '----------'
                                                : indian_number_format($user['sqft']) ?>
                                        </td>
                                        <td><?= $user['ammenities'] ?>
                                            <br>
                                            <span class="sub_span"><i class="fas fa-parking"></i><?= $user['parking'] ?></span>
                                        </td>
                                        <td>
                                            ₹<?= ($user['price'] === null || $user['price'] === '' || $user['price'] == 0)
                                                ? '----------'
                                                : indian_number_format($user['price']) ?>
                                        </td>
                                        <td><?= $user['site_visit'] ?></td> 
                                        <td><?= $user['remarks'] ?></td>
                                        <td class="options_box">
                                            <a href="/php-multiplize/html/forms/edit_rentersForm.php?id=<?= $user['id'] ?>" class="dropdown-item edit_icon">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="../../database/delete-data/renters_del.php" class="dropdown-item del_icon delete_listing  del_renters" data-userid="<?= $user['id'] ?>">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
    <script src="../../assets/js/script.js"></script>
</body>
</html>
