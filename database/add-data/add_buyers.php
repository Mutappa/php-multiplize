<?php 

    session_start();
    // var_dump($_POST);
    
    // $table_name = $_SESSION['table'];

    $res_name = $_POST['buyer-name'];
    $phone_number = $_POST['buyer-phone'];
    $building_name = $_POST['buyer-building_name'];
    $locality = $_POST['buyer-locality'];
    $address = $_POST['buyer-address'];
    $pincode = $_POST['buyer-pincode'];
    $configuration = $_POST['buyer-configuration'];
    $rooms = $_POST['buyer-rooms'];
    $sqft = $_POST['buyer-sqft'];
    $parking = $_POST['buyer-parking'];
    $price = $_POST['buyer-price'];
    //convert ammenities to string
    $ammenities = implode(',', $_POST['buyer-ammenities']);
    $remarks = $_POST['buyer-remarks'];
    // die;
    
    try {    
        $insert_method = "INSERT INTO
                            buyers(name,
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
                                        remarks,
                                        date)
                     VALUES 
                            ('".$res_name."',
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
                             '".$remarks."',
                                NOW())";

        include('../../connections.php');
        // var_dump($insert_method);
        $conn->exec($insert_method);
        echo "<script>window.location.href = '/php-multiplize/html/tables/buyers.php'; alert('Buyer added successfully.');</script>";
        exit;
    } catch (PDOException $e){
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

?>