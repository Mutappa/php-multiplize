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
  <title>Sellers Form Submission</title>
  <link rel="stylesheet" href="../../assets/css/form.css" />
</head>
<body>
    <div class="form-container">
        <h2>Sellers Form Submission</h2>
        <form action="../../database/add-data/add_sellers.php" class="listing_form" method="POST">
            <!-- Name & Phone -->
            <div class="form-row seller-name_phone">
                <div class="form-group seller-name_group">
                    <label for="seller-name">Name</label>
                    <input type="text" id="seller-name" name="seller-name" />
                </div>
                <div class="form-group seller-phone_group">
                    <label for="seller-phone">Phone</label>
                    <input type="tel" id="seller-phone" name="seller-phone" maxlength="10" />
                </div>
            </div>

            <!-- Building Name & Locality -->
            <div class="form-row seller-building_locality">
                <div class="form-group seller-building_group">
                    <label for="seller-building_name">Building Name</label>
                    <input type="text" id="seller-building_name" name="seller-building_name" />
                </div>
                <div class="form-group seller-locality_group">
                    <label for="seller-locality">Locality</label>
                    <input type="text" id="seller-locality" name="seller-locality" />
                </div>
            </div>

            <!-- Address -->
            <div class="form-group seller-address_group">
                <label for="seller-address">Address</label>
                <textarea id="seller-address" name="seller-address"></textarea>
            </div>

            <!-- PINCODE/CONFIG/PARKING -->
            <div class="form-row">
                
                <!-- Pincode -->
                <div class="form-group seller-pincode_group">
                    <label for="seller-pincode">Pincode</label>
                    <input type="text" id="seller-pincode" name="seller-pincode" />
                </div>

                <!-- Configuration -->
                <div class="form-group seller-configuration_group">
                        <label for="seller-configuration">Configuration</label>
                        <select id="seller-configuration" name="seller-configuration">
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
                <div class="form-group seller-parking_group">
                    <label for="seller-parking">Parking</label>
                    <select id="seller-parking" name="seller-parking">
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
                <div class="form-group seller-rooms_group">
                    <label for="seller-rooms">Rooms</label>
                    <select id="seller-rooms" name="seller-rooms">
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
                <div class="form-group seller-sqft_group">
                    <label for="seller-sqft" >Sqft</label>
                    <input type="number" id="seller-sqft" name="seller-sqft" />
                </div>

                <!-- Price -->
                <div class="form-group seller-price_group">
                    <label for="seller-price">Price</label>
                    <input type="number" id="seller-price" name="seller-price" />
                </div>
            </div>

            <!-- ammenities -->
            <div class="form-row">
                <div class="form-group seller-ammenities_group">
                    <!-- checkbox -->
                    <label>Ammenities</label> 
                    <div class="seller-ammentities_group">
                        <label class="seller-ammenities_checkbox">
                            <input type="checkbox" name="seller-ammenities[]" value="Gym" /> 
                            Gym</label>
                        <label class="seller-ammenities_checkbox">
                            <input type="checkbox" name="seller-ammenities[]" value="Pool" /> 
                            Pool</label>
                        <label class="seller-ammenities_checkbox">
                            <input type="checkbox" name="seller-ammenities[]" value="Garden" /> 
                            Garden</label>
                        <label class="seller-ammenities_checkbox">
                            <input type="checkbox" name="seller-ammenities[]" value="Security" /> 
                            Security</label>
                        <label class="seller-ammenities_checkbox">
                            <input type="checkbox" name="seller-ammenities[]" value="Playground" /> 
                            Playground</label>
                        <label  class="seller-ammenities_checkbox">
                            <input type="checkbox" name="seller-ammenities[]" value="Clubhouse" /> 
                            Clubhouse'</label>
                    </div>
                </div>

                <!-- SITE VISIT -->
                <div class="form-group seller-site_visit_group">
                    <label for="seller-site_visit">Site visit</label>
                    <!-- radio button for yes and no -->
                    <div class="seller-site_visit_radio">
                        <label class="seller-site_visit_checkbox">
                            <input type="radio" name="seller-site_visit" value="Yes" /> Yes
                        </label>
                        <label class="seller-site_visit_checkbox">
                            <input type="radio" name="seller-site_visit" value="No" /> No
                        </label>
                    </div>
                </div>
            </div>

            <!-- Remarks -->
            <div class="form-group seller-remarks_group">
                <label for="seller-remarks">Remarks</label>
                <textarea id="seller-remarks" name="seller-remarks"></textarea>
            </div>

            <button class="seller-button" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

