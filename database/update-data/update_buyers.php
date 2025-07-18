<?php 
session_start();

include('../../connections.php');

try {
  $id = intval($_POST['buyer-id'] ?? 0);
  if (!$id) {
    throw new Exception("No valid buyer ID.");
  }

  $fields = [
    'name' => $_POST['buyer-name'] ?? '',
    'phone' => $_POST['buyer-phone'] ?? '',
    'building_name' => $_POST['buyer-building_name'] ?? '',
    'locality' => $_POST['buyer-locality'] ?? '',
    'address' => $_POST['buyer-address'] ?? '',
    'pincode' => $_POST['buyer-pincode'] ?? '',
    'configuration' => $_POST['buyer-configuration'] ?? '',
    'parking' => $_POST['buyer-parking'] ?? '',
    'rooms' => $_POST['buyer-rooms'] ?? '',
    'sqft' => $_POST['buyer-sqft'] ?? '',
    'price' => $_POST['buyer-price'] ?? '',
    'ammenities' => isset($_POST['buyer-ammenities']) ? implode(',', $_POST['buyer-ammenities']) : '',
    'remarks' => $_POST['buyer-remarks'] ?? ''
  ];

  $stmt = $conn->prepare("UPDATE buyers SET 
    name = :name,
    phone = :phone,
    building_name = :building_name,
    locality = :locality,
    address = :address,
    pincode = :pincode,
    configuration = :configuration,
    parking = :parking,
    rooms = :rooms,
    sqft = :sqft,
    price = :price,
    ammenities = :ammenities,
    remarks = :remarks
    WHERE id = :id");

  $fields['id'] = $id;
  $stmt->execute($fields);

  echo "<script>alert('Buyer updated successfully.'); window.location.href = '/php-multiplize/html/tables/buyers.php';</script>";
  exit;

} catch (Exception $e) {
  echo "<script>alert('Error: " . addslashes($e->getMessage()) . "'); window.location.href = '/php-multiplize/html/tables/buyers.php';</script>";
  exit;
}
