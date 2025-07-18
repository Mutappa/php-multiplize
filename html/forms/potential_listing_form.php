<?php 
    session_start();
    if(!isset($_SESSION['user'])) header('location:login.php');

    $_SESSION['table'] = 'potential-listing';
    $user = $_SESSION['user'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Property Submission Form</title>
  <link rel="stylesheet" href="../../assets/css/form.css" />
  <!-- font -->
   
</head>
<body>
    <div class="form-container">
        <h2>Potential Listing Submission</h2>
        <form action="../../database/add-data/add_potential.php" class="listing_form" id="potential-listing_form" method="POST">
            <!-- Name & Phone -->
            <div class="form-row potential-name_phone">
                <div class="form-group potential-name_group">
                    <label for="potential-name">Name</label>
                    <input type="text" id="potential-name" name="potential-name" />
                </div>
                <div class="form-group potential-phone_group">
                    <label for="potential-phone">Phone</label>
                    <input type="tel" id="potential-phone" name="potential-phone" maxlength="10" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group potential-configuration_group">
                    <label for="potential-configuration">Configuration</label>
                    <select id="potential-configuration" name="potential-configuration">
                        <option value="">Select</option>
                        <option value="Villa">Villa</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Row House">Row House</option>
                        <option value="Office">Office</option>
                        <option value="Warehouse">Warehouse</option>
                        <option value="Commercial">Commercial</option>
                    </select>
                </div>
                
                <div class="form-group potential-rooms_group">
                    <label for="potential-rooms">Rooms</label>
                    <select id="potential-rooms" name="potential-rooms">
                        <option value="">Select</option>
                        <options value="None">None</option>
                        <option value="Studio">Studio</option>
                        <option value="1BHK">1BHK</option>
                        <option value="2BHK">2BHK</option>
                        <option value="3BHK">3BHK</option>
                        <option value="4BHK">4BHK</option>
                        <option value="4BHK+">4BHk+</option>
                        <option value="Penthouse">Penthouse</option>
                    </select>
                </div>
            </div>

                <!-- Sqft -->
            <div class="form-row">
                <div class="form-group potential-sqft_group">
                    <label for="potential-sqft" >Sqft</label>
                    <input type="number" id="potential-sqft" name="potential-sqft" />
                </div>

                    <!-- Price -->
                <div class="form-group potential-price_group">
                    <label for="potential-price">Price</label>
                    <input type="number" id="potential-price" name="potential-price" />
                </div>
            </div>

            <!-- Remarks -->
            <div class="form-group potential-remarks_group">
                <label for="potential-remarks">Remarks</label>
                <textarea id="potential-remarks" name="potential-remarks"></textarea>
            </div>

            <button class="potential-button" type="submit">Submit</button>
        </form> 
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../../assets/js/script.js"></script>
</body>
</html>

