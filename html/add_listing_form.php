<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=""
    <title>Document</title>
</head>
<body>
    <form action="../database/add-listing.php" method="post" id="add_listingForm">
        <div class="formBody">
            <h2> Property Details</h2>
            <div class="form_elements">
                <label for="property-name">Property Name:</label>
                <input type="text" id="property-name" name="property-name" required><br><br>

                <label for="phone-number">Phone Number:</label>
                <input type="tel" id="phone-number" name="phone-number" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" cols="50" required></textarea><br><br>

                <label for="property-type">Property Type:</label>
                <input type="text" id="property-type" name="property-type" required><br><br>

                <label for="building-name">Building Name/Locality:</label>
                <input type="text" id="building-name" name="building-name" required><br><br>

                <label for="pincode">Pincode:</label>
                <input type="text" id="pincode" name="pincode" required><br><br>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required><br><br>

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br><br>

                <input type="submit" value="Submit">

            </div>
        </div>
    </form>
</body>
</html>