<?php

include('../../connections.php');

try {
  $id = intval($_POST['visited-id']) ?? 0;

  if ($id <= 0) {
    throw new Exception('Invalid visited ID.');
  }

  $fields = [
    'name' => $_POST['visited-name'] ?? '',
    'phone' => $_POST['visited-phone'] ?? '',
    'building_name' => $_POST['visited-building'] ?? '',
    'locality' => $_POST['visited-locality'] ?? '',
    'address' => $_POST['visited-address'] ?? '',
    'pincode' => $_POST['visited-pincode'] ?? '',
    'configuration' => $_POST['visited-configuration'] ?? '',
    'parking' => $_POST['visited-parking'] ?? '',
    'rooms' => $_POST['visited-rooms'] ?? '',
    'sqft' => $_POST['visited-sqft'] ?? '',
    'visit_date' => $_POST['visited-date'] ?? '',
    'price' => $_POST['visited-price'] ?? '',
    'ammenities' => isset($_POST['visited-ammenities']) ? implode(',', $_POST['visited-ammenities']) : '',
    'remarks' => $_POST['visited-remarks'] ?? ''
  ];

  $stmt = $conn->prepare("UPDATE site_visit SET
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
    visit_date = :visit_date,
    price = :price,
    ammenities = :ammenities,
    remarks = :remarks
    WHERE id = :id
  ");

  $fields['id'] = $id;

  $stmt->execute($fields);

  echo "<script>
    alert('Sites Visited updated successfully.');
    window.location.href = '/php-multiplize/html/tables/site_visit.php';
  </script>";
  exit;

} catch (Exception $e) {
  echo "<script>
    alert('Error: " . $e->getMessage() . "');
    window.location.href = '/php-multiplize/html/tables/site_visit.php';
  </script>";
  exit;
}
?>
