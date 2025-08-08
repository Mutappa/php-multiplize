<?php 

    session_start();
    // var_dump($_POST);
    
    // $table_name = $_SESSION['table'];

    $name = $_POST['seller-name'];
    $phone_number = $_POST['seller-phone'];
    $building_name = $_POST['seller-building_name'];
    $locality = $_POST['seller-locality'];
    $address = $_POST['seller-address'];
    $pincode = $_POST['seller-pincode'];
    $configuration = $_POST['seller-configuration'];
    $rooms = $_POST['seller-rooms'];
    $sqft = $_POST['seller-sqft'];
    $parking = $_POST['seller-parking'];
    $price = $_POST['seller-price'];
    $site_visit = $_POST['seller-site_visit'] ;
    //convert ammenities to string
    $ammenities = implode(',', $_POST['seller-ammenities']);
    $remarks = $_POST['seller-remarks'];
    // die;
    
    try {    
        $insert_method = "INSERT INTO
                            sellers(name,
                                        phone,
                                        building_name,
                                        locality,
                                        address,
                                        pincode,
                                        configuration,
                                        rooms,
                                        sqft,
                                        parking,
                                        ammenities,
                                        price,
                                        site_visit,
                                        remarks,
                                        date)
                     VALUES 
                            ('".$name."',
                             '".$phone_number."',
                             '".$building_name."',
                             '".$locality."',
                             '".$address."',
                             '".$pincode."',
                             '".$configuration."',
                             '".$rooms."',
                             '".$sqft."',
                             '".$parking."',
                             '".$ammenities."',
                             '".$price."',
                             '".$site_visit."', 
                             '".$remarks."',
                                NOW())";

        include('../../connections.php');
        // var_dump($insert_method);
        $conn->exec($insert_method);
        echo "<script>window.location.href = '/php-multiplize/html/tables/sellers.php'; alert('seller added successfully.');</script>";
        exit;
    } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }

?>