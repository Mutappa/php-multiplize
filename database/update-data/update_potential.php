<?php 
session_start();

include('../../connections.php');

try {
  $id = intval($_POST['potential-id'] ?? 0);
  if (!$id) {
    throw new Exception("No valid Potential Listing ID.");
  }

  $fields = [
    'name' => $_POST['potential-name'] ?? '',
    'phone' => $_POST['potential-phone'] ?? '',
    'configuration' => $_POST['potential-configuration'] ?? '',
    'rooms' => $_POST['potential-rooms'] ?? '',
    'sqft' => $_POST['potential-sqft'] ?? '',
    'price' => $_POST['potential-price'] ?? '',
    'remarks' => $_POST['potential-remarks'] ?? ''
  ];

  $stmt = $conn->prepare("UPDATE potential SET 
    name = :name,
    phone = :phone,
    configuration = :configuration,
    rooms = :rooms,
    sqft = :sqft,
    price = :price,
    remarks = :remarks
    WHERE id = :id");

  $fields['id'] = $id;
  $stmt->execute($fields);

  echo "<script>alert('Potential Client updated successfully.'); window.location.href = '/php-multiplize/html/tables/potential-buyers.php';</script>";
  exit;

} catch (Exception $e) {
  echo "<script>alert('Error: " . addslashes($e->getMessage()) . "'); window.location.href = '/php-multiplize/html/tables/potential-buyers.php';</script>";
  exit;
}
