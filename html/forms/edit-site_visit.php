<?php 
session_start();
if(!isset($_SESSION['user'])) header('location:../login.php');
$user = $_SESSION['user'];

// connect to database
include('../../connections.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$visited = [
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
  'visit_date' => '',
  'price' => '',
  'ammenities' => '',
  'remarks' => ''
];

if ($id > 0) {
  $stmt = $conn->prepare("SELECT * FROM site_visit WHERE id = :id");
  $stmt->execute(['id' => $id]);
  $visited = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$visited) {
    echo "Sites Visited not found.";
    exit;
  }
}

$ammenitiesArray = [];
if (!empty($visited['ammenities'])) {
  $ammenitiesArray = explode(',', $visited['ammenities']);
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
  <h2 class="form-title">Edit Sites Visited Listings</h2>

  <form action="/php-multiplize/database/update-data/update-site_visit.php" method="POST" class="listing_form" autocomplete="on">
    <input type="hidden" name="visited-id" value="<?= htmlspecialchars($visited['id']) ?>">

    <!-- Input row for name and phone -->
    <div class="form-row">
        <div class="form-group">
            <label for="edit_visited-name">Name</label>
            <input type="text" id="edit_visited-name" name="visited-name" class="input-field" value="<?= htmlspecialchars($visited['name']) ?>">
        </div>

        <div class="form-group">
            <label for="edit_visited-phone">Phone</label>
            <input type="text" id="edit_visited-phone" name="visited-phone" class="input-field" value="<?= htmlspecialchars($visited['phone']) ?>" maxlength="10" pattern="\d{10}" title="Please enter a valid 10-digit phone number">
        </div>
    </div>

    <!-- Input row for Building name and Locality -->
    <div class="form-row">
      <div class="form-group">
        <label for="edit_visited-building">Building Name</label>
        <input type="text" id="edit_visited-building" name="visited-building" class="input-field" value="<?= htmlspecialchars($visited['building_name']) ?>">
      </div>

      <div class="form-group">
        <label for="edit_visited-locality">Locality</label>
        <input type="text" id="edit_visited-locality" name="visited-locality" class="input-field" value="<?= htmlspecialchars($visited['locality']) ?>">
      </div>
    </div>

    <!-- Input for adress -->
    <div class="form-group">
      <label for="edit_visited-address">Address</label>
      <textarea id="edit_visited-address" name="visited-address" class="input-field" value="<?= ($visited['address']) ?>"></textarea> 
    </div>

    <!-- Input for Pincode -->
    <div class="form-row">

      <!-- CONFIGURATION -->
      <div class="form-group">
        <label for="visited-configuration">Configuration</label>
        <select name="visited-configuration" class="input-field edit_config">
          <option value="">Select</option>
          <option value="Villa" <?= $visited['configuration'] == 'Villa' ? 'selected' : '' ?>>Villa</option>
          <option value="Apartment" <?= $visited['configuration'] == 'Apartment' ? 'selected' : '' ?>>Apartment</option>
          <option value="Flat" <?= $visited['configuration'] == 'Flat' ? 'selected' : '' ?>>Flat</option>
          <option value="Office" <?= $visited['configuration'] == 'Office' ? 'selected' : '' ?>>Office</option>
          <option value="Warehouse" <?= $visited['configuration'] == 'Warehouse' ? 'selected' : '' ?>>Warehouse</option>
          <option value="Commercial" <?= $visited['configuration'] == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
          <!-- Add more configurations as needed -->
        </select>
      </div>
      
      <!-- PINCODE -->
      <div class="form-group">
        <label for="edit_visited-pincode">Pincode</label>
        <input type="text" id="edit_visited-pincode" name="visited-pincode" class="input-field" maxlength="6" value="<?= htmlspecialchars($visited['pincode']) ?>">
      </div>
    </div>

    <!-- INPUT FOR ROOMS AND SQFT -->
    <div class="form-row">
      <!-- ROOMS -->
      <div class="form-group">
        <label for="visited-rooms">Rooms</label>
        <select name="visited-rooms" class="input-field">
          <option value="">Select</option>
          <option value="None" <?= $visited['rooms'] == 'None' ? 'selected' : '' ?>>None</option>
          <option value="studio" <?= $visited['rooms'] == 'studio' ? 'selected' : '' ?>>Studio</option>
          <option value="1bhk" <?= $visited['rooms'] == '1bhk' ? 'selected' : '' ?>>1BHK</option>
          <option value="2bhk" <?= $visited['rooms'] == '2bhk' ? 'selected' : '' ?>>2BHK</option>
          <option value="3bhk" <?= $visited['rooms'] == '3bhk' ? 'selected' : '' ?>>3BHK</option>
          <option value="4bhk" <?= $visited['rooms'] == '4bhk' ? 'selected' : '' ?>>4BHK</option>
          <option value="penthouse" <?= $visited['rooms'] == 'penthouse' ? 'selected' : '' ?>>Penthouse</option>
        </select>
      </div>
      <!-- SQFT -->
      <div class="form-group">
        <label for="edit_visited-sqft">Sqft</label>
        <input type="text" id="edit_visited-sqft" name="visited-sqft" class="input-field" value="<?= htmlspecialchars($visited['sqft']) ?>">
      </div>
      
    </div>
    
    <!-- INPUT FOR PRICE AND PARKING -->
     <div class="form-row">
      
     <!-- PRICE -->
      <div class="form-group">
        <label for="edit_visited-price">Price</label>
        <input type="text" id="edit_visited-price" name="visited-price" class="input-field" value="<?= htmlspecialchars($visited['price']) ?>">
      </div>
      
      <!-- PARKING  -->
      <div class="form-group">
        <label for="edit_visited-parking">Parking</label>
        <input type="text" id="edit_visited-parking" name="visited-parking" class="input-field" value="<?= htmlspecialchars($visited['parking']) ?>">
      </div>

    </div>

    <!-- SITE VISIT -->
    <div class="form-group">
      <label for="visited-date">Site Visit Date</label>
      <input type="date" id="visited-date" name="visited-date" class="input-field" value="<?= htmlspecialchars($visited['visit_date']) ?>">
    </div>

    <div class="form-group">
      <div class="edit_visited">
        <label>Ammenities</label><br>
        <label><input type="checkbox" name="visited-ammenities[]" value="Gym" <?= in_array('Gym', $ammenitiesArray) ? 'checked' : '' ?>> Gym</label>
        <label><input type="checkbox" name="visited-ammenities[]" value="Pool" <?= in_array('Pool', $ammenitiesArray) ? 'checked' : '' ?>> Pool</label>
        <label><input type="checkbox" name="visited-ammenities[]" value="security" <?= in_array('security', $ammenitiesArray) ? 'checked' : '' ?>> Security</label>
        <label><input type="checkbox" name="visited-ammenities[]" value="Clubhouse" <?= in_array('Clubhouse', $ammenitiesArray) ? 'checked' : '' ?>> Clubhouse</label>
        <label><input type="checkbox" name="visited-ammenities[]" value="Garden" <?= in_array('Garden', $ammenitiesArray) ? 'checked' : '' ?>> Garden</label>
        <label><input type="checkbox" name="visited-ammenities[]" value="Play Area" <?= in_array('Play Area', $ammenitiesArray) ? 'checked' : '' ?>> Play Area</label>
        <!-- Add more amenities as needed -->
      </div>
    </div>


    <div class="form-group">
      <label for="edit_visited-remarks">Remarks</label>
      <textarea id="edit_visited-remarks" name="visited-remarks" class="input-field"><?= htmlspecialchars($visited['remarks']) ?></textarea>
    </div>

    <button type="submit" class="btn-submit">Submit</button>
  </form>
  </div>
</body>
</html>
