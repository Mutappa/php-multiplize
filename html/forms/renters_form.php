<?php 
    session_start();
    if(!isset($_SESSION['user'])) header('location:login.php');

    $_SESSION['table'] = 'renters';
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
        <h2>Renters Listings</h2>
        <form action="../../database/add-data/add_renters.php" class="listing_form" id="renter-listing_form" method="POST">
            <!-- Name & Phone -->
            <div class="form-row renter-name_phone">
                <div class="form-group renter-name_group">
                    <label for="renter-name">Name</label>
                    <input type="text" id="renter-name" name="renter-name" />
                </div>
                <div class="form-group renter-phone_group">
                    <label for="renter-phone">Phone</label>
                    <input type="tel" id="renter-phone" name="renter-phone" maxlength="10" />
                </div>
            </div>

            <!-- Building Name & Locality -->
            <div class="form-row renter-building_locality">
                <div class="form-group renter-building_group">
                    <label for="renter-building_name">Building Name</label>
                    <input type="text" id="renter-building_name" name="renter-building_name" />
                </div>
                <div class="form-group renter-locality_group">
                    <label for="renter-locality">Locality</label>
                    <input type="text" id="renter-locality" name="renter-locality" />
                </div>
            </div>

            <!-- ADDRESS -->
            <div class="form-group renter-address_group">
                <label for="renter-address">Address</label>
                <textarea id="renter-address" name="renter-address"></textarea>
            </div>

            <!-- PINCODE/CONFIG/PARKING -->
            <div class="form-row">
                <!-- PINCODE -->
                <div class="form-group renter-pincode_group">
                    <label for="renter-pincode">Pincode</label>
                    <input type="text" id="renter-pincode" name="renter-pincode" />
                </div>

                <!-- CONFIG -->
                <div class="form-group renter-configuration_group">
                    <label for="renter-configuration">Configuration</label>
                    <select id="renter-configuration" name="renter-configuration">
                        <option value="">Select</option>
                        <option value="Villa">Villa</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Row House">Row House</option>
                        <option value="Office">Office</option>
                        <option value="Warehouse">Warehouse</option>
                        <option value="Commercial">Commercial</option>
                    </select>
                </div>

                <!-- PARKING -->
                <div class="form-group renter-parking_group">
                    <label for="renter-parking">Parking</label>
                    <select id="renter-parking" name="renter-parking">
                        <option value="None">None</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5+">5+</option>
                    </select>
                </div>

            </div>

            <!-- SQFT/PRICE/ROOMS -->
            <div class="form-row">
                
                <!-- ROOMS -->
                <div class="form-group renter-rooms_group">
                    <label for="renter-rooms">Rooms</label>
                    <select id="renter-rooms" name="renter-rooms">
                        <option value="">Select</option>
                        <option value="None">None</option>
                        <option value="studio">Studio</option>
                        <option value="1bhk">1BHK</option>
                        <option value="2bhk">2BHK</option>
                        <option value="3bhk">3BHK</option>
                        <option value="4bhk">4BHK</option>
                        <option value="4bhk+">4BHk+</option>
                        <option value="penthouse">Penthouse</option>
                    </select>
                </div>
                <!-- SQFT -->
                <div class="form-group renter-sqft_group">
                    <label for="renter-sqft" >Sqft</label>
                    <input type="number" id="renter-sqft" name="renter-sqft" maxlength="6" />
                </div>

                <!-- PRICE -->
                <div class="form-group renter-price_group">
                    <label for="renter-price">Price</label>
                    <input type="number" id="renter-price" name="renter-price" />
                </div>
                
            </div>

            <!-- AMMENITIES -->
            <div class="form-row">
                <div class="form-group renter-ammenities_parking">     
                    <!-- ammenities -->
                    <label class="renter-ammenities_label">Ammenities</label>
                    <div class="renter-ammenities_group">
                        <!-- checkbox -->
                        <label class="renter-ammenities_checkbox">
                            <input type="checkbox" name="renter-ammenities[]" value="Gym" /> 
                            Gym</label>
                        <label class="renter-ammenities_checkbox">
                            <input type="checkbox" name="renter-ammenities[]" value="Pool" /> 
                            Pool</label>
                        <label class="renter-ammenities_checkbox">
                            <input type="checkbox" name="renter-ammenities[]" value="Garden" /> 
                            Garden</label>
                        <label class="renter-ammenities_checkbox">
                            <input type="checkbox" name="renter-ammenities[]" value="Security" /> 
                            Security</label>
                        <label class="renter-ammenities_checkbox">
                            <input type="checkbox" name="renter-ammenities[]" value="Playground" /> 
                            Playground</label>
                        <label  class="renter-ammenities_checkbox">
                            <input type="checkbox" name="renter-ammenities[]" value="Clubhouse" /> 
                            Clubhouse'</label>
                    </div> 
                </div>  
            </div>
            <!-- Remarks -->
            <div class="form-group renter-remarks_group">
                <label for="renter-remarks">Remarks</label>
                <textarea id="renter-remarks" name="renter-remarks"></textarea>
            </div>

            <button class="renter-button" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

