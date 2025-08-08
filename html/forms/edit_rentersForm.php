<?php 
session_start();
if(!isset($_SESSION['user'])) header('location:../login.php');
$user = $_SESSION['user'];

// connect to database
include('../../connections.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$renter = [
  'id' => '',
  'name' => '',
  'phone' => '',
  'building_name' => '',
  'locality' => '',
  'address' => '',
  'pincode' => '',
  'configuration' => '',
  'parking' => '',
  'rooms' => '',
  'sqft' => '',
  'price' => '',
  'site_visit' => '',
  'ammenities' => '',
  'remarks' => ''
];

if ($id > 0) {
  $stmt = $conn->prepare("SELECT * FROM renters WHERE id = :id");
  $stmt->execute(['id' => $id]);
  $renter = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$renter) {
    echo "Renter not found.";
    exit;
  }
}

$ammenitiesArray = [];
if (!empty($renter['ammenities'])) {
  $ammenitiesArray = explode(',', $renter['ammenities']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/css/form.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
  <div class="form-container">
  <h2 class="form-title">Edit Renters Listing</h2>

  <form action="/php-multiplize/database/update-data/update_renters.php" method="POST" class="listing_form" autocomplete="on">
    <input type="hidden" name="renter-id" value="<?= htmlspecialchars($renter['id']) ?>">

    <!-- Input row for name and phone -->
    <div class="form-row">
        <div class="form-group">
            <label for="edit_renter-name">Name</label>
            <input type="text" id="edit_renter-name" name="renter-name" class="input-field" value="<?= htmlspecialchars($renter['name']) ?>">
        </div>

        <div class="form-group">
            <label for="edit_renter-phone">Phone</label>
            <input type="text" id="edit_renter-phone" name="renter-phone" class="input-field" value="<?= htmlspecialchars($renter['phone']) ?>" maxlength="10" pattern="\d{10}" title="Please enter a valid 10-digit phone number">
        </div>
    </div>

    <!-- Input row for Building name and Locality -->
    <div class="form-row">
      <div class="form-group">
        <label for="edit_renter-building">Building Name</label>
        <input type="text" id="edit_renter-building" name="renter-building" class="input-field" value="<?= htmlspecialchars($renter['building_name']) ?>">
      </div>

      <div class="form-group">
        <label for="edit_renter-locality">Locality</label>
        <input type="text" id="edit_renter-locality" name="renter-locality" class="input-field" value="<?= htmlspecialchars($renter['locality']) ?>">
      </div>
    </div>

    <!-- Input for adress -->
    <div class="form-group">
      <label for="edit_renter-address">Address</label>
      <textarea id="edit_renter-address" name="renter-address" class="input-field" value="<?= ($renter['address']) ?>"></textarea> 
    </div>

    <!-- Input for Pincode -->
    <div class="form-row">

      <!-- CONFIGURATION -->
      <div class="form-group">
        <label for="renter-configuration">Configuration</label>
        <select name="renter-configuration" class="input-field edit_config">
          <option value="">Select</option>
          <option value="Villa" <?= $renter['configuration'] == 'Villa' ? 'selected' : '' ?>>Villa</option>
          <option value="Apartment" <?= $renter['configuration'] == 'Apartment' ? 'selected' : '' ?>>Apartment</option>
          <option value="Flat" <?= $renter['configuration'] == 'Flat' ? 'selected' : '' ?>>Flat</option>
          <option value="Office" <?= $renter['configuration'] == 'Office' ? 'selected' : '' ?>>Office</option>
          <option value="Warehouse" <?= $renter['configuration'] == 'Warehouse' ? 'selected' : '' ?>>Warehouse</option>
          <option value="Commercial" <?= $renter['configuration'] == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
          <!-- Add more configurations as needed -->
        </select>
      </div>
      
      <!-- PINCODE -->
      <div class="form-group">
        <label for="edit_renter-pincode">Pincode</label>
        <input type="text" id="edit_renter-pincode" name="renter-pincode" class="input-field" maxlength="6" value="<?= htmlspecialchars($renter['pincode']) ?>">
      </div>
    </div>

    <!-- INPUT FOR ROOMS AND SQFT -->
    <div class="form-row">
      <!-- ROOMS -->
      <div class="form-group">
        <label for="renter-rooms">Rooms</label>
        <select name="renter-rooms" class="input-field">
          <option value="">Select</option>
          <option value="None" <?= $renter['rooms'] == 'None' ? 'selected' : '' ?>>None</option>
          <option value="studio" <?= $renter['rooms'] == 'studio' ? 'selected' : '' ?>>Studio</option>
          <option value="1bhk" <?= $renter['rooms'] == '1bhk' ? 'selected' : '' ?>>1BHK</option>
          <option value="2bhk" <?= $renter['rooms'] == '2bhk' ? 'selected' : '' ?>>2BHK</option>
          <option value="3bhk" <?= $renter['rooms'] == '3bhk' ? 'selected' : '' ?>>3BHK</option>
          <option value="4bhk" <?= $renter['rooms'] == '4bhk' ? 'selected' : '' ?>>4BHK</option>
          <option value="penthouse" <?= $renter['rooms'] == 'penthouse' ? 'selected' : '' ?>>Penthouse</option>
        </select>
      </div>
      <!-- SQFT -->
      <div class="form-group">
        <label for="edit_renter-sqft">Sqft</label>
        <input type="text" id="edit_renter-sqft" name="renter-sqft" class="input-field" value="<?= htmlspecialchars($renter['sqft']) ?>">
      </div>
      
    </div>
    
    <!-- INPUT FOR PRICE AND PARKING -->
     <div class="form-row">
      
     <!-- PRICE -->
      <div class="form-group">
        <label for="edit_renter-price">Price</label>
        <input type="text" id="edit_renter-price" name="renter-price" class="input-field" value="<?= htmlspecialchars($renter['price']) ?>">
      </div>
      
      <!-- PARKING  -->
      <div class="form-group">
        <label for="edit_renter-parking">Parking</label>
        <input type="text" id="edit_renter-parking" name="renter-parking" class="input-field" value="<?= htmlspecialchars($renter['parking']) ?>">
      </div>

    </div>

    <div class="form-row">
      <!-- AMMENITIES -->
      <div class="form-group">
        <div class="edit_renter">
          <label>Ammenities</label><br>
          <label><input type="checkbox" name="renter-ammenities[]" value="Gym" <?= in_array('Gym', $ammenitiesArray) ? 'checked' : '' ?>> Gym</label>
          <label><input type="checkbox" name="renter-ammenities[]" value="Pool" <?= in_array('Pool', $ammenitiesArray) ? 'checked' : '' ?>> Pool</label>
          <label><input type="checkbox" name="renter-ammenities[]" value="security" <?= in_array('security', $ammenitiesArray) ? 'checked' : '' ?>> Security</label>
          <label><input type="checkbox" name="renter-ammenities[]" value="Clubhouse" <?= in_array('Clubhouse', $ammenitiesArray) ? 'checked' : '' ?>> Clubhouse</label>
          <label><input type="checkbox" name="renter-ammenities[]" value="Garden" <?= in_array('Garden', $ammenitiesArray) ? 'checked' : '' ?>> Garden</label>
          <label><input type="checkbox" name="renter-ammenities[]" value="Play Area" <?= in_array('Play Area', $ammenitiesArray) ? 'checked' : '' ?>> Play Area</label>
          <!-- Add more amenities as needed -->
        </div>
      </div>

      <!-- SITE VISIT -->
       <div class="form-group">
        <label>Site Visit</label>
        <div class="renter-site_visit_group">
            <label class="renter-site_visit_checkbox">
                <input type="radio" name="renter-site_visit" value="Yes" <?= $renter['site_visit'] == 'Yes' ? 'checked' : '' ?> /> Yes
            </label>
            <label class="renter-site_visit_checkbox">
                <input type="radio" name="renter-site_visit" value="No" <?= $renter['site_visit'] == 'No' ? 'checked' : '' ?> /> No
            </label>
        </div>
      </div>
      
    </div>

    <div class="form-group">
      <label for="edit_renter-remarks">Remarks</label>
      <textarea id="edit_renter-remarks" name="renter-remarks" class="input-field"><?= htmlspecialchars($renter['remarks']) ?></textarea>
    </div>

    <button type="submit" class="btn-submit">Update Buyer</button>
  </form>
  </div>
</body>
</html>
