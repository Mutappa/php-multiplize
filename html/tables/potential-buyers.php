<?php 
    session_start();
    if(!isset($_SESSION['user']))header('location:login.php');

    //add all listings
    $user = $_SESSION['user'];
    $potlistings = include('../../database/fetch-data/fetch_potential.php');
    // var_dump($listings);
    // die;

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
    <title>potential-buyers</title>
    <script src="https://kit.fontawesome.com/83d4dd4455.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main_body">
        <?php include('../partials/side_bar.php'); ?>
        <div class="content_body">
            <div class="content_box">
                <div class="content_header">
                    <div class="add_listing_form">
                        <a href="../forms/potential_listing_form.php"><i class="fa-solid fa-plus"></i> Add Listing </a>
                    </div>
                </div>
                <div class="listing_content">
                        <table cellspacing="0" id="listingTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Configuration</th>
                                    <th>rooms</th>
                                    <th>Sqft</th>
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
                                            <span class="sub_span"><?= $user['phone'] ?></span>
                                        </td>
                                        <td><?= $user['configuration'] ?></td>    
                                        <td><?= $user['rooms'] ?></td>    
                                        <td><?= $user['sqft'] ?></td>
                                        <td>
                                            <?= ($user['price'] === null || $user['price'] === '' || $user['price'] == 0)
                                                ? ''
                                                : indian_number_format($user['price']) ?>
                                        </td>

                                        <td><?= $user['remarks'] ?></td>
                                        <td class="options_box">
                                        <a href="/php-multiplize/html/forms/edit_potential.php?id=<?= $user['id'] ?>" class="edit_listing">
                                            <i class="fa fa-pencil"></i>Edit
                                        </a>
                                        <a href="../../database/delete-data/potential_del.php" class="delete_listing del_potential" data-userid="<?= $user['id']?>">
                                            <i class="fa fa-trash"></i>Delete
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
