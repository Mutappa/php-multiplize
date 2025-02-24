<?php 
    session_start();
    if(!isset($_SESSION['user'])) header('location:login.php'); 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/form.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <form action="../database/add-listing.php" method="post" id="add_listingForm">
        <div class="formBody">
            <h2> Property Details</h2>
            <div class="form_elements">
                <div class="form_input">
                    <label for="owner_name">Name:</label>
                    <input type="text" id="owner_name" name="owner_name" required><br><br>
                </div>

                <div class="phone_email-box">
                    <div class="form_input phone">
                        <label for="phone_number">Phone Number:</label>
                        <input type="tel" id="phone_number" name="phone_number" required><br><br>
                    </div>
                    
                    <div class="form_input email">
                        <label for="owner_email">Email:</label>
                        <input type="email" id="owner_email" name="owner_email" required><br><br>
                    </div>
                </div>

                <div class="form_input">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" rows="4" cols="50" required></textarea><br><br>
                </div>

                <div class="form_input">
                    <label for="property_type">Property Type:</label>
                    <input type="text" id="property_type" name="property_type" required><br><br>
                </div>

                <div class="form_input">
                    <label for="building_location">Building Name/Locality:</label>
                    <input type="text" id="building_location" name="building_location" required><br><br>
                </div>

                <div class="pincode_price-box">
                    <div class="form_input pincode">
                        <label for="pincode">Pincode:</label>
                        <input type="text" id="pincode" name="pincode" required><br><br>
                    </div>
                    
                    <div class="form_input price">
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" required><br><br>
                    </div>
                </div>

                <!-- <label for="listing_date">Date:</label>
                <input type="datetime-local" id="listing_date" name="listing_date" required><br><br> -->

                
                <button type="submit" value="Submit">
                    submit
                </button>
            </div>
        </div>
    </form>
</body>
</html>