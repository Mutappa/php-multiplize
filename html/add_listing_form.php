<?php 
    session_start();
    if(!isset($_SESSION['user'])) header('location:login.php');

    // $_SESSION['table'] = 'listingresidential';
    $user = $_SESSION['user'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Property Submission Form</title>
  <link rel="stylesheet" href="../assets/css/form.css" />
</head>
<body>
    <div class="form-container">
        <h2>Residential Property Submission</h2>
        <form action="../database/add_listing.php" class="listing_form" id="res-listing_form" method="POST">
            <!-- Name & Phone -->
            <div class="form-row res-name_phone">
                <div class="form-group res-name_group">
                    <label for="res-name">Name</label>
                    <input type="text" id="res-name" name="res-name" required />
                </div>
                <div class="form-group res-phone_group">
                    <label for="res-phone">Phone</label>
                    <input type="tel" id="res-phone" name="res-phone" maxlength="10" required />
                </div>
            </div>

            <!-- Building Name & Locality -->
            <div class="form-row res-building_locality">
                <div class="form-group res-building_group">
                    <label for="res-building_name">Building Name</label>
                    <input type="text" id="res-building_name" name="res-building_name" required />
                </div>
                <div class="form-group res-locality_group">
                    <label for="res-locality">Locality</label>
                    <input type="text" id="res-locality" name="res-locality" required />
                </div>
            </div>

            <!-- Address -->
            <div class="form-group res-address_group">
                <label for="res-address">Address</label>
                <textarea id="res-address" name="res-address" required></textarea>
            </div>

            <!-- Pincode -->
            <div class="form-group res-pincode_group">
                <label for="res-pincode">Pincode</label>
                <input type="text" id="res-pincode" name="res-pincode" required />
            </div>

            <!-- Configuration Radio and parking -->
            <div class="form-row res-parking_configuration"> 
                <div class="form-group res-configuration_group">
                    <label >Configuration</label>
                    <div class="res-radio-group" aria-required="true">
                        <label>
                            <input type="radio" class="res-configuration" name="res-configuration" value="Villa" /> 
                            Villa</label>
                        <label>
                            <input type="radio" class="res-configuration"  name="res-configuration" value="Apartment" /> Apartment</label>
                        <label>
                            <input type="radio" class="res-configuration"  name="res-configuration" value="Row House" /> Row House</label>
                    </div>
                </div>
                <!-- Parking -->
                <div class="form-group res-parking_group">
                    <label for="res-parking">Parking</label>
                    <select id="res-parking" name="res-parking" required>
                        <option value="None">None</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5+">5+</option>
                    </select>
                </div> 
            </div>
            <!-- Rooms and Sqft -->
            <div class="form-row res-rooms_sqft">
                <!-- Rooms Dropdown -->
                <div class="form-group res-rooms_group">
                    <label for="res-rooms">Rooms</label>
                    <select id="res-rooms" name="res-rooms" required>
                        <option value="">Select</option>
                        <option value="Studio">Studio</option>
                        <option value="1BHK">1BHK</option>
                        <option value="2BHK">2BHK</option>
                        <option value="3BHK">3BHK</option>
                        <option value="4BHK">4BHK</option>
                        <option value="Penthouse">Penthouse</option>
                    </select>
                </div>

                <!-- Sqft -->
                <div class="form-group res-sqft_group">
                    <label for="res-sqft" >Sqft</label>
                    <input type="number" id="res-sqft" name="res-sqft" required />
                </div>
            </div>

            <!-- availability and price -->
             <div class="form-row res-availability_price">
                <!-- Availability Slider -->
                <div class="form-group res-availability_group">
                    <label>Availability</label>
                    <div class="res-slider-group">
                        <label class="res-availability_slider">
                            <input type="radio" class="res-availability" name="res-availability" value="For Rent" required /> 
                            For Rent
                        </label>
                        <label class="res-availability_slider">
                            <input type="radio" class="res-availability" name="res-availability" value="To Buy" /> 
                            To Buy
                        </label>
                    </div>
                </div>
                <!-- Price -->
                <div class="form-group res-price_group">
                    <label for="res-price">Price</label>
                    <input type="number" id="res-price" name="res-price" required />
                </div>
            </div>

            <!-- ammenities -->
            <div class="form-group res-ammenities_group">
                <!-- checkbox -->
                <label>Ammenities</label> 
                <div class="res-ammentities_group">
                    <label class="res-ammenities_checkbox">
                        <input type="checkbox" name="res-ammenities[]" value="Gym" /> 
                        Gym</label>
                    <label class="res-ammenities_checkbox">
                        <input type="checkbox" name="res-ammenities[]" value="Pool" /> 
                        Pool</label>
                    <label class="res-ammenities_checkbox">
                        <input type="checkbox" name="res-ammenities[]" value="Garden" /> 
                        Garden</label>
                    <label class="res-ammenities_checkbox">
                        <input type="checkbox" name="res-ammenities[]" value="Security" /> 
                        Security</label>
                    <label class="res-ammenities_checkbox">
                        <input type="checkbox" name="res-ammenities[]" value="Playground" /> 
                        Playground</label>
                    <label  class="res-ammenities_checkbox">
                        <input type="checkbox" name="res-ammenities[]" value="Clubhouse" /> 
                        Clubhouse'</label>
                </div>
            </div>
            <!-- Remarks -->
            <div class="form-group res-remarks_group">
                <label for="res-remarks">Remarks</label>
                <textarea id="res-remarks" name="res-remarks"></textarea>
            </div>

            <button class="res-button" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

