<!DOCTYPE html>
<html lang="en">

<head>

  <title>Register</title>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="logo.png">
  <script src="https://cdn.tailwindcss.com"></script>


  <style>
      /* Header styling */
      header {
            background-color: #009688;
            color: #fff;
            padding: 1em 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 10;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Header content */
        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: auto;
            padding: 0 1em;
        }

        .logo h1 {
            font-size: 1.5em;
        }

        .contact-info {
            font-size: 0.9em;
            text-align: right;
        }

        .contact-info p {
            margin-bottom: 0.2em;
        }

        .navbar {
            display: flex;
            gap: 1em;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 0.5em 1em;
        }

        .navbar a:hover {
            background-color: #00796b;
            border-radius: 5px;
        }

        .appointment-button {
            background-color: #00796b;
            color: white;
            padding: 0.5em 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .appointment-button:hover {
            background-color: #004d40;
        }

                /* Adding padding to the body to account for the fixed header */
                body {
            padding-top: 20px; /* This should be at least the height of your header */
        }

        /* Footer styling */
        footer {
            background-color: #009688;
            color: white;
            text-align: center;
            padding: 1em 0;
            margin-top: 317px;
        }

    </style>  

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

<?php 	

require_once 'connect.php';
		$specialisation = $qualification ="";
    
    if(isset($_POST['specialisation']) && isset($_POST['qualification']))
    {  
      
		    $specialisation= $_POST["specialisation"];
		    $qualification = $_POST["qualification"];
	
    // $servername = "localhost";
		// $username = "Ananya13";
		// $password = "Ananya@13";
		// $dbname = "health";
		  
		 
		  // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //       $val = "SELECT MAX(eid) $myDB.employee";
		  // $sql = "INSERT INTO $myDB.doctor (`did`,`specialisation`,`qualification`) VALUES (`$val`,'$specialisation','$qualification')";
		  // $stmt=$conn->prepare($sql);
      // $stmt->execute();
		  // header("Location:doctor_login.php"); 
			// $conn = null;

try {
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Step 1: Get the maximum `eid` value
    $valQuery = "SELECT MAX(eid) AS max_eid FROM $myDB.employee";
    $stmt = $conn->query($valQuery);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if `eid` was retrieved successfully
    if ($result && isset($result['max_eid'])) {
        $maxEid = $result['max_eid'];
    } else {
        // Handle the case if `eid` was not found (set a default or handle the error)
        throw new Exception("Failed to retrieve maximum employee ID.");
    }

    // Step 2: Insert into the `doctor` table using the max `eid`
    $sql = "INSERT INTO $myDB.doctor (did, specialisation, qualification) VALUES (:did, :specialisation, :qualification)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':did', $maxEid, PDO::PARAM_INT); // Bind max `eid` as `did`
    $stmt->bindParam(':specialisation', $specialisation, PDO::PARAM_STR);
    $stmt->bindParam(':qualification', $qualification, PDO::PARAM_STR);

    // Execute the insert statement
    $stmt->execute();

    // Redirect to doctor login page
    header("Location: doctor_login.php");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Close the connection
    $conn = null;
}


		// }
    }		
?>

<!-- -------------------------------------------------------------------- -->

  <div class="mx-12 my-20">

    <div class="sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0 ">
            <h3 class="text-4xl font-medium leading-6 text-teal-600">Personal Information</h3>
            <p class="mt-2 text-lg text-gray-800">Fill your personal details </p>
          </div>
        </div>
        <div class="mt-5 md:col-span-2 md:mt-0">

          <form class="frm" method="POST">
            <div class="overflow-hidden shadow sm:rounded-md">
              <div class="bg-white px-4 py-5 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                                      <label for="first-name" class="block text-sm font-medium text-gray-700">Specialization</label>
                                      <input type="text" name="specialisation" id="specialisation"
                                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" " required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                      <label for="first-name" class="block text-sm font-medium text-gray-700">Qualification</label>
                                      <input type="text" name="qualification" id="qualification"
                                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" " required>
                  </div>

                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
      <div class="py-5">
        <div class="border-t border-gray-200"></div>
      </div>
    </div>

    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:col-span-2 md:mt-0">
            <div class="overflow-hidden shadow sm:rounded-md">
              <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <button type="submit"
                  class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
        <!-- Footer -->
        <footer>
    <p>Contact us at +91 8787898765 | info@homeopathyclinic.com</p>
</footer>
</body>

</html>
