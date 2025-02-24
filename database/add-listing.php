<?php 

    session_start();
    
    // $table_name = $_SESSION['table'];
    // var_dump($table_name);

        $owner_name = $_POST['owner_name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['owner_email'];
        $address = $_POST['address'];
        $property_type = $_POST['property_type'];
        $building_location = $_POST['building_location'];
        $pincode = $_POST['pincode'];
        $price = $_POST['price'];
        $listing_date = $_POST['listing_date'];
    // var_dump($owner_name,$phone_number,$email, $address, $property_type, $building_location , $pincode , $price, $listing_date);
    
    try {    
        $insert_method = "INSERT INTO
                            listings (owner_name,
                                    phone_number , 	
                                    owner_email , 
                                    address , 
                                    property_type , 
                                    building_location , 
                                    pincode ,
                                    price,
                                    listing_date)
                     VALUES 
                            ('".$owner_name."', 
                            '".$phone_number."', 
                            '".$email."', 
                            '".$address."', 
                            '".$property_type."', 
                            '".$building_location."', 
                            '".$pincode."', 
                            '".$price."',
                            NOW())";

        include('connections.php');

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
    header('location:../html/mainDashboard.php');
    // var_dump($insert_method);

?>