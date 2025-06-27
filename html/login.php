<?php

    session_start();

    if(isset($_SESSION['user']))header('location:mainDashboard.php');

    $error_message = '' ;
    if($_POST) {
        include('../database/connections.php');
        
        $username = $_POST['userName'];
        $password = $_POST['passName'];
        
        $query = 'SELECT * FROM users WHERE users.username= "' .$username.'" AND users.password= "'.$password.'"';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        
        if ($stmt->rowCount() > 0) {
            $stmt -> setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchALL()[0];
            $_SESSION['user'] = $user;
            var_dump($_SESSION['user']);
            
            header('Location:tables/residential_table.php');

        } else $error_message = 'PLease make sure that username and password are correct.';
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/login.css" rel="stylesheet">
    <title>Multiplize Login - Inventory Management System</title>
</head>
<body>
    <div class="mainBody">
        <?php 
            if(!empty($error_message)) {
        ?>
            <div id="errorMessage"  >
                <P>
                    Error: <?= $error_message ?>
                </p>
            </div>
        <?php } ?>
        <div class="logo_header">
            <img src="../assets/images/logo-1.webp" alt="logo and name">
        </div>
        <form action="login.php" method="POST">
            <div class="loginBody">
                <div class="title Loginrow">
                    <h4>Welcom And Login</h4>
                </div>
                <div class="userInput loginrow">
                    <label for="userName">Username</label>
                    <input type="text" id="userName" name="userName"
                    placeholder="Multiplize Investors">
                </div>
                <div class="passInput Loginrow">
                    <label for="passName">
                        Enter Your Password
                    </label>
                    <input type="password" id="passName" name="passName" placeholder="Abcd123@">
                </div>
                <div class="button Loginrow">
                    <button>
                        login
                    </button>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>