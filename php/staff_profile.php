<?php
    session_start(); // Start the session at the beginning

    // Check if the user is already logged in
    if (isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to the admin page if already logged in
    header("Location: staff_login.php");
    exit();
    }
    
   require_once 'connect.php';
     $email="";
     $password="";

     if(isset($_POST['email']) && isset($_POST['password']))
     {   
         $email=$_POST["email"];
         $password=$_POST["password"];
         
         $stmt1 = $conn->query("SELECT * FROM $myDB.employee WHERE email='$email'");
         $val=$stmt1->fetch(PDO::FETCH_ASSOC);
         if($val["pass_wrd"] != $password || $val["e_type"] != "Staff")
          {
          header("Location:error.php"); 
          exit();
          }
          else {
            $stmt1 = $conn->query("SELECT * FROM $myDB.staff S JOIN $myDB.employee E WHERE E.email='$email' AND E.pass_wrd='$password' AND S.sid=E.eid;");
            $data=$stmt1->fetch(PDO::FETCH_ASSOC);
          }
     }

     else
    {     
        $stmt2 = $conn->query("SELECT * FROM $myDB.staff S JOIN $myDB.employee E ORDER BY S.sid DESC LIMIT 1;");
        $data=$stmt2->fetch(PDO::FETCH_ASSOC);
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthCare</title>
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
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

    <div class="patient-container">

        <!-- Left Panel: Patient Details -->
        <div class="left-panel">
            <h2>Staff's Profile</h2>
            <p><strong>Id:</strong> <?php echo $data['sid']?></p>
            <p><strong>Name:</strong> <?php echo $data['name']; ?></p>
            <p><strong>Age:</strong> <?php echo $data['age'];?></p>
            <p><strong>Gender:</strong> <?php echo $data['gender'];?></p>
            <p><strong>Email:</strong> <?php echo $data['email'];?></p>
            <p><strong>Phone:</strong> <?php echo $data['contact_no']?></p>
            <p><strong>Date Of Birth:</strong> <?php echo $data['dob']?></p>
            <p><strong>Working hours:</strong> <?php echo $data['availability']?></p>
            <p><strong>Work Experience:</strong> <?php echo $data['work_experience']?></p>

            <button>Edit Profile</button>
        </div>

        <!-- Right Panel: Sections -->
        <div class="right-panel">
            <!-- First two sections: Pharmacy and Pathology -->
            <div class="section">
                <a href="pharmacy.php">
                    <h3>Pharmacy</h3>
                </a>
                <p>Manage prescriptions and view available medications.</p>
            </div>
            <div class="section">
                <a href="add_test.php">
                    <h3>Pathology</h3>
                </a>
                <p>Access lab tests, diagnostic results, and schedule pathology appointments.</p>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Contact us at +91 2134567890 | info@homeopathyclinic.com</p>
    </footer>

</body>
</html>
