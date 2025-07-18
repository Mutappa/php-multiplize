<?php 
    session_start();
    if(!isset($_SESSION['user'])) header('location:../login.php');
    $user = $_SESSION['user'];

//conncect to database
include('../../connections.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$buyer = [
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
  'ammenities' => '',
  'remarks' => ''
];

if ($id > 0) {
  $stmt = $conn->prepare("SELECT * FROM buyers WHERE id = :id");
  $stmt->execute(['id' => $id]);
  $buyer = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$buyer) {
    echo "Buyer not found.";
    exit;
  }
}

$ammenitiesArray = [];
if (!empty($buyer['ammenities'])) {
  $ammenitiesArray = explode(',', $buyer['ammenities']);
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
  <h2 class="form-title">Edit Buyers Listing</h2>

  <form action="/php-multiplize/database/update-data/update_buyers.php" method="POST" class="listing_form" autocomplete="on">
    <input type="hidden" name="buyer-id" value="<?= htmlspecialchars($buyer['id']) ?>">

    <!-- Input row for name and phone -->
    <div class="form-row">
        <div class="form-group">
            <label for="edit_buyer-name">Name</label>
            <input type="text" id="edit_buyer-name" name="buyer-name" class="input-field" value="<?= htmlspecialchars($buyer['name']) ?>">
        </div>

        <div class="form-group">
            <label for="edit_buyer-phone">Phone</label>
            <input type="text" id="edit_buyer-phone" name="buyer-phone" class="input-field" value="<?= htmlspecialchars($buyer['phone']) ?>" maxlength="10" pattern="\d{10}" title="Please enter a valid 10-digit phone number">
        </div>
    </div>

    <!-- Input row for Building name and Locality -->
    <div class="form-row">
      <div class="form-group">
        <label for="edit_buyer-building">Building Name</label>
        <input type="text" id="edit_buyer-building" name="buyer-building_name" class="input-field" value="<?= htmlspecialchars($buyer['building_name']) ?>">
      </div>

      <div class="form-group">
        <label for="edit_buyer-locality">Locality</label>
        <input type="text" id="edit_buyer-locality" name="buyer-locality" class="input-field" value="<?= htmlspecialchars($buyer['locality']) ?>">
      </div>
    </div>

    <!-- Input for adress -->
    <div class="form-group">
      <label for="edit_buyer-address">Address</label>
      <textarea id="edit_buyer-address" name="buyer-address" class="input-field" value="<?= htmlspecialchars($buyer['address']) ?>"></textarea> 
    </div>

    <!-- Input for Pincode -->
    <div class="form-row">

      <!-- CONFIGURATION -->
      <div class="form-group">
        <label for="buyer-configuration">Configuration</label>
        <select name="buyer-configuration" class="input-field edit_config">
          <option value="">Select</option>
          <option value="Villa" <?= $buyer['configuration'] == 'Villa' ? 'selected' : '' ?>>Villa</option>
          <option value="Apartment" <?= $buyer['configuration'] == 'Apartment' ? 'selected' : '' ?>>Apartment</option>
          <option value="Flat" <?= $buyer['configuration'] == 'Flat' ? 'selected' : '' ?>>Flat</option>
          <option value="Office" <?= $buyer['configuration'] == 'Office' ? 'selected' : '' ?>>Office</option>
          <option value="Warehouse" <?= $buyer['configuration'] == 'Warehouse' ? 'selected' : '' ?>>Warehouse</option>
          <option value="Commercial" <?= $buyer['configuration'] == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
          <!-- Add more configurations as needed -->
        </select>
      </div>
      
      <!-- PINCODE -->
      <div class="form-group">
        <label for="edit_buyer-pincode">Pincode</label>
        <input type="text" id="edit_buyer-pincode" name="buyer-pincode" class="input-field" maxlength="6" value="<?= htmlspecialchars($buyer['pincode']) ?>">
      </div>
    </div>

    <!-- INPUT FOR ROOMS AND SQFT -->
    <div class="form-row">
      <!-- ROOMS -->
      <div class="form-group">
        <label for="buyer-rooms">Rooms</label>
        <select name="buyer-rooms" class="input-field">
          <option value="">Select</option>
          <option value="None" <?= $buyer['rooms'] == 'None' ? 'selected' : '' ?>>None</option>
          <option value="studio" <?= $buyer['rooms'] == 'studio' ? 'selected' : '' ?>>Studio</option>
          <option value="1bhk" <?= $buyer['rooms'] == '1bhk' ? 'selected' : '' ?>>1BHK</option>
          <option value="2bhk" <?= $buyer['rooms'] == '2bhk' ? 'selected' : '' ?>>2BHK</option>
          <option value="3bhk" <?= $buyer['rooms'] == '3bhk' ? 'selected' : '' ?>>3BHK</option>
          <option value="4bhk" <?= $buyer['rooms'] == '4bhk' ? 'selected' : '' ?>>4BHK</option>
          <option value="penthouse" <?= $buyer['rooms'] == 'penthouse' ? 'selected' : '' ?>>Penthouse</option>
        </select>
      </div>
      <!-- SQFT -->
      <div class="form-group">
        <label for="edit_buyer-sqft">Sqft</label>
        <input type="text" id="edit_buyer-sqft" name="buyer-sqft" class="input-field" value="<?= htmlspecialchars($buyer['sqft']) ?>">
      </div>
      
    </div>
    
    <!-- INPUT FOR PRICE AND PARKING -->
     <div class="form-row">
      
     <!-- PRICE -->
      <div class="form-group">
        <label for="edit_buyer-price">Price</label>
        <input type="text" id="edit_buyer-price" name="buyer-price" class="input-field" value="<?= htmlspecialchars($buyer['price']) ?>">
      </div>
      
      <!-- PARKING  -->
      <div class="form-group">
        <label for="edit_buyer-parking">Parking</label>
        <input type="text" id="edit_buyer-parking" name="buyer-parking" class="input-field" value="<?= htmlspecialchars($buyer['parking']) ?>">
      </div>

    </div>

    <div class="form-group">
      <div class="edit_ammenities">
        <label>Ammenities</label><br>
        <label><input type="checkbox" name="buyer-ammenities[]" value="Gym" <?= in_array('Gym', $ammenitiesArray) ? 'checked' : '' ?>> Gym</label>
        <label><input type="checkbox" name="buyer-ammenities[]" value="Pool" <?= in_array('Pool', $ammenitiesArray) ? 'checked' : '' ?>> Pool</label>
        <label><input type="checkbox" name="buyer-ammenities[]" value="security" <?= in_array('security', $ammenitiesArray) ? 'checked' : '' ?>> Security</label>
        <label><input type="checkbox" name="buyer-ammenities[]" value="Clubhouse" <?= in_array('Clubhouse', $ammenitiesArray) ? 'checked' : '' ?>> Clubhouse</label>
        <label><input type="checkbox" name="buyer-ammenities[]" value="Garden" <?= in_array('Garden', $ammenitiesArray) ? 'checked' : '' ?>> Garden</label>
        <label><input type="checkbox" name="buyer-ammenities[]" value="Play Area" <?= in_array('Play Area', $ammenitiesArray) ? 'checked' : '' ?>> Play Area</label>
        <!-- Add more amenities as needed -->
      </div>
    </div>


    <div class="form-group">
      <label for="edit_buyer-remarks">Remarks</label>
      <textarea id="edit_buyer-remarks" name="buyer-remarks" class="input-field"><?= htmlspecialchars($buyer['remarks']) ?></textarea>
    </div>

    <button type="submit" class="btn-submit">Update Buyer</button>
  </form>
  </div>
</body>
</html>