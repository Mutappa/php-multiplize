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

                <!-- Sqft -->
            <div class="form-group comm-sqft_group">
                <label for="comm-sqft" >Sqft</label>
                <input type="number" id="comm-sqft" name="comm-sqft" required />
            </div>

                <!-- Price -->
            <div class="form-group comm-price_group">
                <label for="comm-price">Price</label>
                <input type="number" id="comm-price" name="comm-price" required />
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

