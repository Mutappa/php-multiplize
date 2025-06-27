<?php 

    session_start();
    // var_dump($_POST);
    
    // $table_name = $_SESSION['table'];

    $res_name = $_POST['res-name'];
    $phone_number = $_POST['res-phone'];
    $building_name = $_POST['res-building_name'];
    $locality = $_POST['res-locality'];
    $address = $_POST['res-address'];
    $pincode = $_POST['res-pincode'];
    $configuration = $_POST['res-configuration'];
    $rooms = $_POST['res-rooms'];
    $sqft = $_POST['res-sqft'];
    $parking = $_POST['res-parking'];
    $availability = $_POST['res-availability'];
    $price = $_POST['res-price'];
    //convert ammenities to string
    $ammenities = implode(',', $_POST['res-ammenities']);
    $remarks = $_POST['res-remarks'];
    // die;
    
    try {    
        $insert_method = "INSERT INTO
                            potential(res_name,
                                        res_phone,
                                        building_name,
                                        locality,
                                        address,
                                        pincode,
                                        configuration,
                                        rooms,
                                        sqft,
                                        parking,
                                        availability,
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
                             '".$availability."',
                             '".$ammenities."',
                             '".$price."',
                             '".$remarks."',
                                NOW())";

        include('connections.php');
        // var_dump($insert_method);
        $conn->exec($insert_method);
        $response = [
            'success' => true,
            'message' => 'Listing has been added succesfully'
            ];
    } catch (PDOException $e){
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    
    $_SESSION['response'] = $response;
    header('location:../html/residential_table.php');
    // var_dump($insert_method);

?>