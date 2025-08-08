<?php 
    session_start();
    if(!isset($_SESSION['user'])) header('location:../login.php');
    $user = $_SESSION['user'];

//conncect to database
include('../../connections.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$seller = [
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
  $stmt = $conn->prepare("SELECT * FROM sellers WHERE id = :id");
  $stmt->execute(['id' => $id]);
  $seller = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$seller) {
    echo "Seller not found.";
    exit;
  }
}

$ammenitiesArray = [];
if (!empty($seller['ammenities'])) {
  $ammenitiesArray = explode(',', $seller['ammenities']);
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
  <h2 class="form-title">Edit sellers Listing</h2>

  <form action="/php-multiplize/database/update-data/update_sellers.php" method="POST" class="listing_form" autocomplete="on">
    <input type="hidden" name="seller-id" value="<?= htmlspecialchars($seller['id']) ?>">

    <!-- Input row for name and phone -->
    <div class="form-row">
        <div class="form-group">
            <label for="edit_seller-name">Name</label>
            <input type="text" id="edit_seller-name" name="seller-name" class="input-field" value="<?= htmlspecialchars($seller['name']) ?>">
        </div>

        <div class="form-group">
            <label for="edit_seller-phone">Phone</label>
            <input type="text" id="edit_seller-phone" name="seller-phone" class="input-field" value="<?= htmlspecialchars($seller['phone']) ?>" maxlength="10" >
        </div>
    </div>

    <!-- Input row for Building name and Locality -->
    <div class="form-row">
      <div class="form-group">
        <label for="edit_seller-building">Building Name</label>
        <input type="text" id="edit_seller-building" name="seller-building_name" class="input-field" value="<?= htmlspecialchars($seller['building_name']) ?>">
      </div>

      <div class="form-group">
        <label for="edit_seller-locality">Locality</label>
        <input type="text" id="edit_seller-locality" name="seller-locality" class="input-field" value="<?= htmlspecialchars($seller['locality']) ?>">
      </div>
    </div>

    <!-- Input for adress -->
    <div class="form-group">
      <label for="edit_seller-address">Address</label>
      <textarea id="edit_seller-address" name="seller-address" class="input-field" value="<?= htmlspecialchars($seller['address']) ?>"></textarea> 
    </div>

    <!-- Input for Pincode -->
    <div class="form-row">

      <!-- CONFIGURATION -->
      <div class="form-group">
        <label for="seller-configuration">Configuration</label>
        <select name="seller-configuration" class="input-field edit_config">
          <option value="">Select</option>
          <option value="Villa" <?= $seller['configuration'] == 'Villa' ? 'selected' : '' ?>>Villa</option>
          <option value="Apartment" <?= $seller['configuration'] == 'Apartment' ? 'selected' : '' ?>>Apartment</option>
          <option value="Flat" <?= $seller['configuration'] == 'Flat' ? 'selected' : '' ?>>Flat</option>
          <option value="Office" <?= $seller['configuration'] == 'Office' ? 'selected' : '' ?>>Office</option>
          <option value="Warehouse" <?= $seller['configuration'] == 'Warehouse' ? 'selected' : '' ?>>Warehouse</option>
          <option value="Commercial" <?= $seller['configuration'] == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
          <!-- Add more configurations as needed -->
        </select>
      </div>
      
      <!-- PINCODE -->
      <div class="form-group">
        <label for="edit_seller-pincode">Pincode</label>
        <input type="text" id="edit_seller-pincode" name="seller-pincode" class="input-field" maxlength="6" value="<?= htmlspecialchars($seller['pincode']) ?>">
      </div>
    </div>

    <!-- INPUT FOR ROOMS AND SQFT -->
    <div class="form-row">
      <!-- ROOMS -->
      <div class="form-group">
        <label for="seller-rooms">Rooms</label>
        <select name="seller-rooms" class="input-field">
          <option value="">Select</option>
          <option value="None" <?= $seller['rooms'] == 'None' ? 'selected' : '' ?>>None</option>
          <option value="studio" <?= $seller['rooms'] == 'studio' ? 'selected' : '' ?>>Studio</option>
          <option value="1bhk" <?= $seller['rooms'] == '1bhk' ? 'selected' : '' ?>>1BHK</option>
          <option value="2bhk" <?= $seller['rooms'] == '2bhk' ? 'selected' : '' ?>>2BHK</option>
          <option value="3bhk" <?= $seller['rooms'] == '3bhk' ? 'selected' : '' ?>>3BHK</option>
          <option value="4bhk" <?= $seller['rooms'] == '4bhk' ? 'selected' : '' ?>>4BHK</option>
          <option value="penthouse" <?= $seller['rooms'] == 'penthouse' ? 'selected' : '' ?>>Penthouse</option>
        </select>
      </div>
      <!-- SQFT -->
      <div class="form-group">
        <label for="edit_seller-sqft">Sqft</label>
        <input type="text" id="edit_seller-sqft" name="seller-sqft" class="input-field" value="<?= htmlspecialchars($seller['sqft']) ?>">
      </div>
      
    </div>
    
    <!-- INPUT FOR PRICE AND PARKING -->
     <div class="form-row">
      
     <!-- PRICE -->
      <div class="form-group">
        <label for="edit_seller-price">Price</label>
        <input type="text" id="edit_seller-price" name="seller-price" class="input-field" value="<?= htmlspecialchars($seller['price']) ?>">
      </div>
      
      <!-- PARKING  -->
      <div class="form-group">
        <label for="edit_seller-parking">Parking</label>
        <input type="text" id="edit_seller-parking" name="seller-parking" class="input-field" value="<?= htmlspecialchars($seller['parking']) ?>">
      </div>

    </div>

    
    <div class="form-row">
      <!-- AMMENITIES -->
      <div class="form-group">
        <div class="edit_ammenities">
          <label>Ammenities</label><br>
          <label><input type="checkbox" name="seller-ammenities[]" value="Gym" <?= in_array('Gym', $ammenitiesArray) ? 'checked' : '' ?>> Gym</label>
          <label><input type="checkbox" name="seller-ammenities[]" value="Pool" <?= in_array('Pool', $ammenitiesArray) ? 'checked' : '' ?>> Pool</label>
          <label><input type="checkbox" name="seller-ammenities[]" value="security" <?= in_array('security', $ammenitiesArray) ? 'checked' : '' ?>> Security</label>
          <label><input type="checkbox" name="seller-ammenities[]" value="Clubhouse" <?= in_array('Clubhouse', $ammenitiesArray) ? 'checked' : '' ?>> Clubhouse</label>
          <label><input type="checkbox" name="seller-ammenities[]" value="Garden" <?= in_array('Garden', $ammenitiesArray) ? 'checked' : '' ?>> Garden</label>
          <label><input type="checkbox" name="seller-ammenities[]" value="Play Area" <?= in_array('Play Area', $ammenitiesArray) ? 'checked' : '' ?>> Play Area</label>
          <!-- Add more amenities as needed -->
        </div>
      </div>

      <!-- SITE VISIT -->
      <div class="form-group">
        <label>Site Visit</label>
        <div class="seller-site_visit_group">
            <label class="seller-site_visit_checkbox">
                <input type="radio" name="seller-site_visit" value="Yes" <?= $seller['site_visit'] == 'Yes' ? 'checked' : '' ?> /> Yes
            </label>
            <label class="seller-site_visit_checkbox">
                <input type="radio" name="seller-site_visit" value="No" <?= $seller['site_visit'] == 'No' ? 'checked' : '' ?> /> No
            </label>
        </div>
      </div>
      
    </div>


    <div class="form-group">
      <label for="edit_seller-remarks">Remarks</label>
      <textarea id="edit_seller-remarks" name="seller-remarks" class="input-field"><?= htmlspecialchars($seller['remarks']) ?></textarea>
    </div>

    <button type="submit" class="btn-submit">Update seller</button>
  </form>
  </div>
</body>
</html>