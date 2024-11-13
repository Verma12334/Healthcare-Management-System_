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
    <img src="../Photos/admin_login.jpg" alt="Admin Login" class="admin-login">
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

   <?php
//    session_start(); // Start the session at the beginning

    require_once 'connect.php';
    $email="";
    $password="";

    // // Check if the user is already logged in
    // if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    //     // Redirect to the admin page if already logged in
    //     header("Location: admin_page.php");
    //     exit();
    // }
    
     if(isset($_POST['email']) && isset($_POST['password']))
     {   
         $email=$_POST["email"];
         $password=$_POST["password"];
         
         if($email=="saurabh@gmail.com" && $password=="saurabh@123")
          {
          header("Location:admin_page.php"); 
          exit();
          }
          else
          {
          header("Location:error.php"); 
          exit(); 
          }
     }
    ?>

    <div class="login-form-admin">
        <div class="login-form">
            <h1>Admin Login</h1>
             <form class="frm" method="POST">
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