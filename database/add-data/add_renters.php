<?php 

    session_start();
    var_dump($_POST);
    
    $table_name = $_SESSION['table'];

    $name = $_POST['renter-name'];
    $phone_number = $_POST['renter-phone'];
    $building_name = $_POST['renter-building_name'];
    $locality = $_POST['renter-locality'];
    $address = $_POST['renter-address'];
    $pincode = $_POST['renter-pincode'];
    $configuration = $_POST['renter-configuration'];
    $rooms = $_POST['renter-rooms'];
    $sqft = $_POST['renter-sqft'];
    $parking = $_POST['renter-parking'];
    $price = $_POST['renter-price'];
    //convert ammenities to string
    $ammenities = implode(',', $_POST['renter-ammenities']);
    $remarks = $_POST['renter-remarks'];
    // die;
    
    try {    
        $insert_method = "INSERT INTO
                            $table_name(name,
                                        phone,
                                        building_name,
                                        locality,
                                        address,
                                        pincode,
                                        configuration,
                                        rooms,
                                        sqft,
                                        parking,
                                        price,
                                        ammenities,
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
                             '".$price."',
                             '".$ammenities."',
                             '".$remarks."',
                                NOW())";

        include('../../connections.php');
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
    header('location:../../html/tables/renters.php');
    // var_dump($insert_method);

?>