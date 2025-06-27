<?php 

    session_start();
    var_dump($_POST);
    
    $table_name = $_SESSION['table'];

    $comm_name = $_POST['comm-name'];
    $phone_number = $_POST['comm-phone'];
    $building_name = $_POST['comm-building_name'];
    $locality = $_POST['comm-locality'];
    $address = $_POST['comm-address'];
    $pincode = $_POST['comm-pincode'];
    $configuration = $_POST['comm-configuration'];
    $sqft = $_POST['comm-sqft'];
    $parking = $_POST['comm-parking'];
    $availability = $_POST['comm-availability'];
    $price = $_POST['comm-price'];
    //convert ammenities to string
    $ammenities = implode(',', $_POST['comm-ammenities']);
    $remarks = $_POST['comm-remarks'];
    // die;
    
    try {    
        $insert_method = "INSERT INTO
                            $table_name(name,
                                        phone,
                                        building_lot,
                                        locality,
                                        address,
                                        pincode,
                                        configuration,
                                        sqft,
                                        parking,
                                        availability,
                                        price,
                                        perks,
                                        remarks,
                                        date)
                     VALUES 
                            ('".$comm_name."',
                             '".$phone_number."',
                             '".$building_name."',
                             '".$locality."',
                             '".$address."',
                             '".$pincode."',
                             '".$configuration."',
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
    header('location:../html/commercial_table.php');
    // var_dump($insert_method);

?>