<?php 
    session_start();
    if(!isset($_SESSION['user'])) header('location:../login.php');

    // $_SESSION['table'] = 'listingresidential';
    $user = $_SESSION['user'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Buyers Form Submission</title>
  <link rel="stylesheet" href="../../assets/css/form.css" />
</head>
<body>
    <div class="form-container">
        <h2>Buyers Form Submission</h2>
        <form action="../../database/add-data/add_buyers.php" class="listing_form" method="POST">
            <!-- Name & Phone -->
            <div class="form-row buyer-name_phone">
                <div class="form-group buyer-name_group">
                    <label for="buyer-name">Name</label>
                    <input type="text" id="buyer-name" name="buyer-name" />
                </div>
                <div class="form-group buyer-phone_group">
                    <label for="buyer-phone">Phone</label>
                    <input type="tel" id="buyer-phone" name="buyer-phone" maxlength="10" />
                </div>
            </div>

            <!-- Building Name & Locality -->
            <div class="form-row buyer-building_locality">
                <div class="form-group buyer-building_group">
                    <label for="buyer-building_name">Building Name</label>
                    <input type="text" id="buyer-building_name" name="buyer-building_name" />
                </div>
                <div class="form-group buyer-locality_group">
                    <label for="buyer-locality">Locality</label>
                    <input type="text" id="buyer-locality" name="buyer-locality" />
                </div>
            </div>

            <!-- Address -->
            <div class="form-group buyer-address_group">
                <label for="buyer-address">Address</label>
                <textarea id="buyer-address" name="buyer-address"></textarea>
            </div>

            <!-- PINCODE/CONFIG/PARKING -->
            <div class="form-row">
                
                <!-- Pincode -->
                <div class="form-group buyer-pincode_group">
                    <label for="buyer-pincode">Pincode</label>
                    <input type="text" id="buyer-pincode" name="buyer-pincode" />
                </div>

                <!-- Configuration -->
                <div class="form-group buyer-configuration_group">
                        <label for="buyer-configuration">Configuration</label>
                        <select id="buyer-configuration" name="buyer-configuration">
                            <option value="">Select</option>
                            <option value="Villa">Villa</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Row House">Row House</option>
                            <option value="Office">Office</option>
                            <option value="Warehouse">Warehouse</option>
                            <option value="Commercial">Commercial</option>
                        </select>
                </div>

                <!-- Parking -->
                <div class="form-group buyer-parking_group">
                    <label for="buyer-parking">Parking</label>
                    <select id="buyer-parking" name="buyer-parking">
                        <option value="None">None</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5+">5+</option>
                    </select>
                </div>
            </div>

            <!-- Rooms -->
            <div class="form-row">
                <!-- Rooms Dropdown -->
                <div class="form-group buyer-rooms_group">
                    <label for="buyer-rooms">Rooms</label>
                    <select id="buyer-rooms" name="buyer-rooms">
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

                <!-- Sqft -->
                <div class="form-group buyer-sqft_group">
                    <label for="buyer-sqft" >Sqft</label>
                    <input type="number" id="buyer-sqft" name="buyer-sqft" />
                </div>

                <!-- Price -->
                <div class="form-group buyer-price_group">
                    <label for="buyer-price">Price</label>
                    <input type="number" id="buyer-price" name="buyer-price" />
                </div>
            </div>

            <!-- ammenities -->
            <div class="form-group buyer-ammenities_group">
                <!-- checkbox -->
                <label>Ammenities</label> 
                <div class="buyer-ammentities_group">
                    <label class="buyer-ammenities_checkbox">
                        <input type="checkbox" name="buyer-ammenities[]" value="Gym" /> 
                        Gym</label>
                    <label class="buyer-ammenities_checkbox">
                        <input type="checkbox" name="buyer-ammenities[]" value="Pool" /> 
                        Pool</label>
                    <label class="buyer-ammenities_checkbox">
                        <input type="checkbox" name="buyer-ammenities[]" value="Garden" /> 
                        Garden</label>
                    <label class="buyer-ammenities_checkbox">
                        <input type="checkbox" name="buyer-ammenities[]" value="Security" /> 
                        Security</label>
                    <label class="buyer-ammenities_checkbox">
                        <input type="checkbox" name="buyer-ammenities[]" value="Playground" /> 
                        Playground</label>
                    <label  class="buyer-ammenities_checkbox">
                        <input type="checkbox" name="buyer-ammenities[]" value="Clubhouse" /> 
                        Clubhouse'</label>
                </div>
            </div>

            <!-- Remarks -->
            <div class="form-group buyer-remarks_group">
                <label for="buyer-remarks">Remarks</label>
                <textarea id="buyer-remarks" name="buyer-remarks"></textarea>
            </div>

            <button class="buyer-button" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

