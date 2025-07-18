<?php 
    session_start();
    if(!isset($_SESSION['user'])) header('location:../login.php');
    $user = $_SESSION['user'];

//conncect to database
include('../../connections.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$potential = [
  'id' => '',
  'name' => '',
  'phone' => '',
  'configuration' => '',
  'rooms' => '',
  'sqft' => '',
  'price' => '',
  'remarks' => ''
];

if ($id > 0) {
  $stmt = $conn->prepare("SELECT * FROM potential WHERE id = :id");
  $stmt->execute(['id' => $id]);
  $potential = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$potential) {
    echo "Potential Client not found.";
    exit;
  }
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
  <h2 class="form-title">Edit Potential Listing</h2>

  <form action="/php-multiplize/database/update-data/update_potential.php" method="POST" class="listing_form" autocomplete="on">
    <input type="hidden" name="potential-id" value="<?= htmlspecialchars($potential['id']) ?>">

    <!-- Input row for name and phone -->
    <div class="form-row">
        <div class="form-group">
            <label for="edit_potential-name">Name</label>
            <input type="text" id="edit_potential-name" name="potential-name" class="input-field" value="<?= htmlspecialchars($potential['name']) ?>">
        </div>

        <div class="form-group">
            <label for="edit_potential-phone">Phone</label>
            <input type="text" id="edit_potential-phone" name="potential-phone" class="input-field" value="<?= htmlspecialchars($potential['phone']) ?>" maxlength="10" placeholder="Please enter a valid 10-digit phone number">
        </div>
    </div>



      <!-- CONFIGURATION -->
        <div class="form-row">
            <div class="form-group">
                <label>Configuration</label>
                <select name="potential-configuration" class="input-field edit_config">
                    <option value="">Select</option>
                    <option value="Villa" <?= $potential['configuration'] == 'Villa' ? 'selected' : '' ?>>Villa</option>
                    <option value="Apartment" <?= $potential['configuration'] == 'Apartment' ? 'selected' : '' ?>>Apartment</option>
                    <option value="Flat" <?= $potential['configuration'] == 'Flat' ? 'selected' : '' ?>>Flat</option>
                    <option value="Office" <?= $potential['configuration'] == 'Office' ? 'selected' : '' ?>>Office</option>
                    <option value="Warehouse" <?= $potential['configuration'] == 'Warehouse' ? 'selected' : '' ?>>Warehouse</option>
                    <option value="Commercial" <?= $potential['configuration'] == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
                <!-- Add more configurations as needed -->
                </select>
            </div>

            <!-- ROOMS -->
            <div class="form-group">
                <label>Rooms</label>
                <select name="potential-rooms" class="input-field">
                    <option value="">Select</option>
                    <option value="None" <?= $potential['rooms'] == 'None' ? 'selected' : '' ?>>None</option>
                    <option value="studio" <?= $potential['rooms'] == 'studio' ? 'selected' : '' ?>>Studio</option>
                    <option value="1bhk" <?= $potential['rooms'] == '1bhk' ? 'selected' : '' ?>>1BHK</option>
                    <option value="2bhk" <?= $potential['rooms'] == '2bhk' ? 'selected' : '' ?>>2BHK</option>
                    <option value="3bhk" <?= $potential['rooms'] == '3bhk' ? 'selected' : '' ?>>3BHK</option>
                    <option value="4bhk" <?= $potential['rooms'] == '4bhk' ? 'selected' : '' ?>>4BHK</option>
                    <option value="penthouse" <?= $potential['rooms'] == 'penthouse' ? 'selected' : '' ?>>Penthouse</option>
                </select>
            </div>
        </div>
      
      <!-- SQFT -->
        <div class="form-row">
            
            <div class="form-group">
                <label for="edit_potential-sqft">Sqft</label>
                <input type="text" id="edit_potential-sqft" name="potential-sqft" class="input-field" value="<?= htmlspecialchars($potential['sqft']) ?>">
            </div>

            
            <!-- PRICE -->
                <div class="form-group">
                <label for="edit_potential-price">Price</label>
                <input type="text" id="edit_potential-price" name="potential-price" class="input-field" value="<?= htmlspecialchars($potential['price']) ?>">
                </div>
        </div>

    <div class="form-group">
      <label for="edit_potential-remarks">Remarks</label>
      <textarea id="edit_potential-remarks" name="potential-remarks" class="input-field"><?= htmlspecialchars($potential['remarks']) ?></textarea>
    </div>

    <button type="submit" class="btn-submit">Update Potential Listing</button>
  </form>
  </div>
</body>
</html>