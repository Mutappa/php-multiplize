<?php

session_start();

include('../../connections.php');

try {
  $id = intval($_POST['renter-id']) ?? 0;

  if ($id <= 0) {
    throw new Exception('Invalid renter ID.');
  }

  $fields = [
    'name' => $_POST['renter-name'] ?? '',
    'phone' => $_POST['renter-phone'] ?? '',
    'building_name' => $_POST['renter-building'] ?? '',
    'locality' => $_POST['renter-locality'] ?? '',
    'address' => $_POST['renter-address'] ?? '',
    'pincode' => $_POST['renter-pincode'] ?? '',
    'configuration' => $_POST['renter-configuration'] ?? '',
    'parking' => $_POST['renter-parking'] ?? '',
    'rooms' => $_POST['renter-rooms'] ?? '',
    'sqft' => $_POST['renter-sqft'] ?? '',
    'price' => $_POST['renter-price'] ?? '',
    'ammenities' => isset($_POST['renter-ammenities']) ? implode(',', $_POST['renter-ammenities']) : '',
    'remarks' => $_POST['renter-remarks'] ?? ''
  ];

  $stmt = $conn->prepare("UPDATE renters SET
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
    WHERE id = :id
  ");

  $fields['id'] = $id;

  $stmt->execute($fields);

  echo "<script>
    alert('Renter updated successfully.');
    window.location.href = '/php-multiplize/html/tables/renters.php';
  </script>";
  exit;

} catch (Exception $e) {
  echo "<script>
    alert('Error: " . $e->getMessage() . "');
    window.location.href = '/php-multiplize/html/tables/renters.php';
  </script>";
  exit;
}
?>
