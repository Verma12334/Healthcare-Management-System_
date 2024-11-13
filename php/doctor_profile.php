<?php
    // session_start(); // Start the session at the beginning

    // // Check if the user is already logged in
    // if (isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    //   // Redirect to the admin page if already logged in
    //   header("Location: doctor_login.php");
    //   exit();
    // }

   require_once 'connect.php';
     $email="";
     $password="";

     if(isset($_POST['email']) && isset($_POST['password']))
     {   
         $email=$_POST["email"];
         $password=$_POST["password"];
         
         $stmt1 = $conn->query("SELECT * FROM $myDB.employee WHERE email='$email'");
         $val=$stmt1->fetch(PDO::FETCH_ASSOC);
         if($val["pass_wrd"] != $password || $val["e_type"] != "Doctor")
          {
          header("Location:error.php"); 
          exit();
          }
          else {
            $stmt1 = $conn->query("SELECT * FROM $myDB.doctor D JOIN  $myDB.employee E  ON D.did= E.eid WHERE E.email='$email' AND E.pass_wrd='$password';");
             $data=$stmt1->fetch(PDO::FETCH_ASSOC);
          }
     }

     else
    {        $did = $_POST["did"];
            $stmt2 = $conn->query("SELECT * FROM $myDB.doctor D JOIN $myDB.employee E ON D.did = E.eid WHERE D.did = $did;");
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
        <?php 	
                // $did = $pid = $dname=$issue ==$pres="";
            if(isset($_POST['pid']) && isset($_POST['issue']) && isset($_POST['pres']))
            {  
                $did = $data['did'];
                $pid = $_POST["pid"];
                $issue = $_POST["issue"];
                $pres = $_POST["pres"];

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO $myDB.prescription (`pid`,`did`,`issue`,`pres`)VALUES('$pid', '$did', '$issue','$pres')";
                $stmt2=$conn->prepare($sql);
                $stmt2->execute();
                
            }	
        ?>

        <!-- Left Panel: Patient Details -->
        <div class="left-panel">
            <h2>Doctor's Profile</h2>
            <p><strong>Id:</strong> <?php echo $data['did']?></p>
            <p id="did" name="did"><strong>Name:</strong> <?php echo $data['name']; ?></p>
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

            <!-- Additional sections stacked below -->
            <div class="section">
                <h3>Medical History</h3>
                <p>View the patient's medical history, including past issues, treatments, and prescriptions.</p>
                <div class="p-4 flex-grow">
                    <table class="w-full table-auto">
                        <thead class="border-b">
                            <tr class=" text-center">
                                <th class="text-dark   bg-white   py-5 px-2 text-center text-gray-600 font-bold">
                                    Patient ID
                                </th>
                                <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                    Patient Name
                                </th>
                                <th class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-bold">
                                    Gender
                                </th>
                                <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                    Issue
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt1 = $conn->query("SELECT * FROM $myDB.appointment A JOIN $myDB.patient P ON A.pid = P.pid WHERE A.did = {$data['did']};");
                            while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                            ?> 
                                <tr>
                                    <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row1['pid']; ?>
                                    </td>
                                    <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row1['name']; ?>
                                    </td>
                                    <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row1['gender']; ?>
                                    </td>
                                    <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row1['issue']; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="section">
                <h3>Write Prescription</h3>
                <p>Schedule an appointment with available doctors.</p>
                <div class="p-4 flex-grow">
                    <form class="frm" method="POST">
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">Patient's ID</label>
                                        <input type="text" name="pid" id="pid"
                                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Enter here" required>
                                    </div>

                                    <input type="hidden" name="did" id="did" value="<?php echo $data['did']; ?>">
                                    
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">Issue</label>
                                        <input type="text" name="issue" id="issue"
                                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Enter here" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">Prescription</label>
                                        <input type="text" name="pres" id="pres"
                                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Enter here" required>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                        <button type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Contact us at +91 2134567890 | info@homeopathyclinic.com</p>
    </footer>

</body>
</html>
