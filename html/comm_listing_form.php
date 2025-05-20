<?php 
    session_start();
    if(!isset($_SESSION['user'])) header('location:login.php');

    $_SESSION['table'] = 'listingcommercial';
    $user = $_SESSION['user'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Property Submission Form</title>
  <link rel="stylesheet" href="../assets/css/form.css" />
  <!-- font -->
   
</head>
<body>
    <div class="form-container">
        <h2>Commercial Property Submission</h2>
        <form action="../database/add_comm_listing.php" class="listing_form" id="comm-listing_form" method="POST">
            <!-- Name & Phone -->
            <div class="form-row comm-name_phone">
                <div class="form-group comm-name_group">
                    <label for="comm-name">Name</label>
                    <input type="text" id="comm-name" name="comm-name" required />
                </div>
                <div class="form-group comm-phone_group">
                    <label for="comm-phone">Phone</label>
                    <input type="tel" id="comm-phone" name="comm-phone" maxlength="10" required />
                </div>
            </div>

            <!-- Building Name & Locality -->
            <div class="form-row comm-building_locality">
                <div class="form-group comm-building_group">
                    <label for="comm-building_name">Building Name</label>
                    <input type="text" id="comm-building_name" name="comm-building_name" required />
                </div>
                <div class="form-group comm-locality_group">
                    <label for="comm-locality">Locality</label>
                    <input type="text" id="comm-locality" name="comm-locality" required />
                </div>
            </div>

            <!-- Address -->
            <div class="form-group comm-address_group">
                <label for="comm-address">Address</label>
                <textarea id="comm-address" name="comm-address" required></textarea>
            </div>

            <!-- Pincode -->
            <div class="form-group comm-pincode_group">
                <label for="comm-pincode">Pincode</label>
                <input type="text" id="comm-pincode" name="comm-pincode" required />
            </div>

            <!-- Configuration and Sqft -->
            <div class="form-row comm-configuration_sqft">
                <div class="form-group comm-configuration_group">
                    <label >Configuration</label>
                    <div class="comm-radio-group" aria-required="true">
                        <label>
                            <input type="radio" class="comm-configuration" name="comm-configuration" value="Office" /> 
                            Office</label>
                        <label>
                            <input type="radio" class="comm-configuration"  name="comm-configuration" value="Warehouse" /> Warehouse</label>
                    </div>
                </div>
                <!-- Sqft -->
                <div class="form-group comm-sqft_group">
                    <label for="comm-sqft" >Sqft</label>
                    <input type="number" id="comm-sqft" name="comm-sqft" required />
                </div>
            </div>

            <!-- availability and price -->
             <div class="form-row comm-availability_price">
                <!-- Availability Slider -->
                <div class="form-group comm-availability_group">
                    <label>Availability</label>
                    <div class="slider-group">
                        <label class="comm-availability_slider">
                            <input type="radio" class="comm-availability" name="comm-availability" value="For Rent" required /> 
                            For Rent
                        </label>
                        <label class="comm-availability_slider">
                            <input type="radio" class="comm-availability" name="comm-availability" value="To Buy" /> 
                            To Buy
                        </label>
                    </div>
                </div>
                <!-- Price -->
                <div class="form-group comm-price_group">
                    <label for="comm-price">Price</label>
                    <input type="number" id="comm-price" name="comm-price" required />
                </div>
            </div>

            <!-- ammenities and parking -->
            <div class="form-row comm-ammenities_parking">     
                <!-- ammenities -->
                <div class="form-group comm-ammenities_group">
                    <!-- checkbox -->
                    <label>Ammenities</label> 
                    <div class="comm-ammentities_group">
                        <label class="comm-ammenities_checkbox">
                            <input type="checkbox" name="comm-ammenities[]" value="Garden" /> 
                            Garden</label>
                        <label class="comm-ammenities_checkbox">
                            <input type="checkbox" name="comm-ammenities[]" value="Security" /> 
                            Security</label>
                    </div>
                </div>

                <!-- parking -->
                <div class="form-group comm-parking_group">
                    <label for="com-parking">Parking</label>
                    <select id="comm-parking" name="comm-parking" required>
                        <option value="None">None</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5+">5+</option>
                    </select>
                </div> 
            </div>
            <!-- Remarks -->
            <div class="form-group comm-remarks_group">
                <label for="comm-remarks">Remarks</label>
                <textarea id="comm-remarks" name="comm-remarks"></textarea>
            </div>

            <button class="comm-button" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

