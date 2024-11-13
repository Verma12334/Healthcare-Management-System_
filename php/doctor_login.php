<?php
   session_start(); // Start the session at the beginning

    require_once 'connect.php';

    // Check if the user is already logged in
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        // Redirect to the admin page if already logged in
        header("Location: doctor_profile.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="logo.png">
        <link href="../style.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

<body>
    <img src="../Photos/doctor_login.jpg" alt="Admin Login" class="admin-login">
    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="logo">
                <h1>HealthCare</h1>
            </div>
            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="#about">About Us</a>
                <a href="#treatments">Treatments</a>
                <a href="#blog">Our Blog</a>
                <a href="#contact">Contact Us</a>
                <a href="#appointment" class="appointment-button">Book an Appointment</a>
            </nav>
        </div>
    </header>

    <div class="login-form-doctor">
        <div class="login-form">
            <h1>Login</h1>
            <p tabindex="0" class="focus:outline-none text-sm mt-4 font-medium leading-none text-white-500">
                Dont have account?
                <a href="employee_register.php">
                    <span class="focus:text-white-500 focus:outline-none focus:underline text-sm font-medium leading-none text-white-800">
                        Register now
                    </span>
                </a>
            </p>

            <form class="frm" action="doctor_profile.php" method="POST">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                
                <div class="button-group">
                    <button type="submit">Login</button>
                    <button type="button" onclick="clearFields()">Clear</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
	function clearFields() {
	    document.getElementById("email").value = "";
	    document.getElementById("password").value = "";
	}
    </script>
 
    <!-- Footer -->
    <footer>
        <p>Contact us at +91 8787898765 | info@homeopathyclinic.com</p>
    </footer>

</body>
</html>