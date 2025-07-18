<?php 

    session_start();
    // var_dump($_POST);
    
    include('../../connections.php'); 
    // $table_name = $_SESSION['table'];

    $name = $_POST['potential-name'];
    $phone_number = $_POST['potential-phone'];
    $configuration = $_POST['potential-configuration'];
    $rooms = $_POST['potential-rooms'];
    $sqft = $_POST['potential-sqft'];
    $price = $_POST['potential-price'];
    $remarks = $_POST['potential-remarks'];
    // die;

    try {
    $stmt = $conn->prepare("INSERT INTO potential
                                (name, 
                                phone,
                                configuration,
                                rooms, 
                                sqft, 
                                price, 
                                remarks, 
                                date)
                            VALUES 
                                (:name, 
                                 :phone, 
                                 :configuration,
                                 :rooms, 
                                 :sqft, 
                                 :price, 
                                 :remarks, 
                                 NOW())"
    );

    $stmt->execute([
        ':name' => $name,
        ':phone' => $phone_number,
        ':configuration' => $configuration,
        ':rooms' => $rooms,
        ':sqft' => $sqft,
        ':price' => $price,
        ':remarks' => $remarks
    ]);

    echo "<script>
      alert('Potential Buyer added successfully.');
      window.location.href = '/php-multiplize/html/tables/potential-buyers.php';
    </script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>