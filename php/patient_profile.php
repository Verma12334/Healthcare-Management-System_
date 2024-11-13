<?php
    // session_start(); // Start the session at the beginning

    // // Check if the user is already logged in
    // if (isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    //   // Redirect to the admin page if already logged in
    //   header("Location: patient_login.php");
    //   exit();
    // }

   require_once 'connect.php';
     $email="";
     $password="";

     if(isset($_POST['email']) && isset($_POST['password']))
     {   
         $email=$_POST["email"];
         $password=$_POST["password"];
         
         $stmt1 = $conn->query("SELECT pass_wrd FROM $myDB.patient WHERE email='$email'");
         $val=$stmt1->fetch(PDO::FETCH_ASSOC);
         if($val["pass_wrd"]!=$password)
          {
          header("Location:error.php"); 
          exit();
          }
          else {
             $stmt1 = $conn->query("SELECT * FROM $myDB.patient WHERE email='$email' AND pass_wrd='$password';");
             $data=$stmt1->fetch(PDO::FETCH_ASSOC);
          }
     }

     else
   {        $pid = $_POST["pid"];
            $stmt2 = $conn->query("SELECT * FROM $myDB.patient WHERE pid = $pid;");
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
                // $did = $name = $issue = $symptom="";
            if(isset($_POST['did']) && isset($_POST['name']) && isset($_POST['issue']) && isset($_POST['symptom']) )
            {  
                $did = $_POST["did"];
                $name = $_POST["name"];
                $issue = $_POST["issue"];
                $symptom = $_POST["symptom"];
                $pid = $data['pid'];

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO $myDB.appointment (`pid`,`did`,`issue`,`symptomps`)VALUES('$pid', '$did', '$issue','$symptom')";
                $stmt2=$conn->prepare($sql);
                $stmt2->execute();
            }	
        ?>

        <!-- Left Panel: Patient Details -->
        <div class="left-panel">
            <h2>Patient Details</h2>
            <p><strong>Id:</strong> <?php echo $data['pid']; ?></p>
            <p><strong>Name:</strong> <?php echo $data['name']; ?></p>
            <p><strong>Age:</strong> <?php echo $data['age'];?></p>
            <p><strong>Gender:</strong> <?php echo $data['gender'];?></p>
            <p><strong>Email:</strong> <?php echo $data['email'];?></p>
            <p><strong>Phone:</strong> <?php echo $data['phone_no'];?></p>
            <p><strong>Date Of Birth:</strong> <?php echo $data['dob'];?></p>
            <p><strong>Blood Group:</strong> <?php echo $data['blood_group'];?></p>
            <p><strong>Course:</strong> <?php echo $data['course'];?></p>
            <p><strong>Hostel:</strong> <?php echo $data['hostel'];?></p>

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
                <a href="pathology.php">
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
                                    Issue
                                </th>
                                <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                    Treated by
                                </th>
                                <th class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-bold">
                                    Date
                                </th>
                                <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                    Prescription
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt1 = $conn->query("SELECT * FROM $myDB.prescription P JOIN $myDB.employee E ON P.did = E.eid WHERE P.pid = {$data['pid']};");
                            while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                            ?> 
                                <tr>
                                    <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row1['issue']; ?>
                                    </td>
                                    <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row1['name']; ?>
                                    </td>
                                    <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row1['date']; ?>
                                    </td>
                                    <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row1['pres']; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="section">
                <h3>Available Appointment</h3>
                <p>Check available appointment slots with doctors, including their specializations and timing.</p>
                <div class="p-4 flex-grow">
                    <table class="w-full table-auto">
                        <thead class="border-b">
                            <tr class=" text-center">
                                <th class="text-dark   bg-white   py-5 px-2 text-center text-gray-600 font-bold">
                                    Doctor's ID
                                </th>
                                <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                    Doctor's Name
                                </th>
                                <th class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-bold">
                                    Specialisation
                                </th>
                                <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                    Time
                                </th>   
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt2 = $conn->query("SELECT * FROM $myDB.doctor D JOIN $myDB.employee E WHERE D.did=E.eid;");
                            while ($row2=$stmt2->fetch(PDO::FETCH_ASSOC)) {
                            ?> 
                                <tr> 
                                    <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row2['did'];?>
                                    </td> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row2['name'];?>
                                    </td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row2['specialisation']; ?>
                                    </td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?php echo $row2['availability']; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h3>Book Appointment</h3>
                <p>Schedule an appointment with available doctors.</p>
                <div class="p-4 flex-grow">
                    <form class="frm" method="POST">
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">Doctor's ID</label>
                                        <input type="text" name="did" id="did"
                                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Enter here" required>
                                    </div>

                                    <input type="hidden" name="pid" id="pid" value="<?php echo $data['pid']; ?>">

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">Doctor's Name</label>
                                        <input type="text" name="name" id="name"
                                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Enter here" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">Issue</label>
                                        <input type="text" name="issue" id="issue"
                                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Enter here" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">Symptoms</label>
                                        <input type="text" name="symptom" id="symptom"
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
