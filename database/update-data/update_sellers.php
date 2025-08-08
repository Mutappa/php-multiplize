<?php 
session_start();

include('../../connections.php');

try {
  $id = intval($_POST['seller-id'] ?? 0);
  if (!$id) {
    throw new Exception("No valid seller ID.");
  }

  $fields = [
    'name' => $_POST['seller-name'] ?? '',
    'phone' => $_POST['seller-phone'] ?? '',
    'building_name' => $_POST['seller-building_name'] ?? '',
    'locality' => $_POST['seller-locality'] ?? '',
    'address' => $_POST['seller-address'] ?? '',
    'pincode' => $_POST['seller-pincode'] ?? '',
    'configuration' => $_POST['seller-configuration'] ?? '',
    'parking' => $_POST['seller-parking'] ?? '',
    'rooms' => $_POST['seller-rooms'] ?? '',
    'sqft' => $_POST['seller-sqft'] ?? '',
    'price' => $_POST['seller-price'] ?? '',
    'site_visit' => $_POST['seller-site_visit'] ?? '',
    'ammenities' => isset($_POST['seller-ammenities']) ? implode(',', $_POST['seller-ammenities']) : '',
    'remarks' => $_POST['seller-remarks'] ?? ''
  ];

  $stmt = $conn->prepare("UPDATE sellers SET 
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
    site_visit = :site_visit,
    ammenities = :ammenities,
    remarks = :remarks
    WHERE id = :id");

  $fields['id'] = $id;
  $stmt->execute($fields);

  echo "<script>alert('Seller updated successfully.'); window.location.href = '/php-multiplize/html/tables/sellers.php';</script>";
  exit;

} catch (Exception $e) {
  echo "<script>alert('Error: " . addslashes($e->getMessage()) . "'); window.location.href = '/php-multiplize/html/tables/sellers.php';</script>";
  exit;
}
