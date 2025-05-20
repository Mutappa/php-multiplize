<?php 
    $data = $_POST;
    $user_id = (int)$data['user_id'];

    try {    
        $delete_method = "DELETE FROM listingresidential WHERE id={$user_id}";
        include('connections.php');

        $conn->exec($delete_method);

        echo json_encode([
            'success' => true,
            'message' => 'Listing Deleted Succesfully.'
        ]);

    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error processing your request!'
        ]);
        
        }


