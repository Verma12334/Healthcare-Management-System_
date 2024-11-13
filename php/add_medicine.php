<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pharmacy</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link href="style.css" rel="stylesheet">
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

        /* Footer styling */
        footer {
            background-color: #009688;
            color: white;
            text-align: center;
            padding: 1em 0;
            margin-top: 2em;
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
// $servername = "localhost";
// $username = "Ananya13";
// $password = "Ananya@13";
// $dbname = "health";

$stmt1 = $conn->query("SELECT * FROM $myDB.medicine");
	
  echo '<div class="px-4 mt-12 ml-8">
        <h3 class="text-4xl font-medium leading-6 text-red-600">Pharmacy</h3>
    </div>
    <div class="p-8 md:col-span-2  md:mt-0">
        <div>
        <table class="w-full table-auto">
                <thead>
                    <tr class="bg-blue-700 h-24 text-center">

                        <th class="text-dark  border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                            Medicine id
                        </th>

                        <th class="text-dark  border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                            Medicine Name
                        </th>
                        <th class="text-dark  border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                            Company Name
                        </th>
                        <th
                            class="text-dark border-b border-l border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                            Medicine Cost
                        </th>
                    </tr>
                </thead>
                <tbody>';
    
                while ($row=$stmt1->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['mid'];
		echo '</td> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['med_name'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['med_cost'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['company'];
	echo "</td></tr>";
}
 echo 	'</tbody>';
echo 	"</table>";
echo "</div>";
echo "</div>";


		$name = $cost = $company = "";
    
    
    if(isset($_POST['name'])&& isset($_POST['name']) && isset($_POST['name']))
    {  
            $name = $_POST["name"];
		    $cost = $_POST["cost"];
		    $company = $_POST["company"];

		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $sql = "INSERT INTO $myDB.medicine (`med_name`,`med_cost`,`company`)VALUES('$name', '$cost', '$company')";
		  $stmt=$conn->prepare($sql);
      $stmt->execute();
		 header("Location:pharmacy.php"); 
            exit();
		}	
?>

    <!-- ------------------Medicine Form---------------- -->
    <div class="mx-12 my-20">

        <div class="sm:mt-0">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0 ">
                <h3 class="text-4xl font-medium leading-6 text-red-600">Add Medicine</h3>
                <p class="mt-2 text-lg text-gray-800">Fill the details accurately and avoid filling redundant data.</p>
              </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
    
    
              <form class="frm" method="POST">
    
                <div class="overflow-hidden shadow sm:rounded-md">
                  <div class="bg-white px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
    
                      <div class="col-span-6 sm:col-span-3">
                        <label for="first-name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name"
                          class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" your name">
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                        <label for="cost" class="block text-sm font-medium text-gray-700">Cost</label>
                        <input type="number" name="cost" id="cost"
                          class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder="Enter cost">
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                        <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                        <input type="text" name="company" id="company"
                          class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Company name">
                      </div>
    
                    </div>
                  </div>
                </div>
                
            </div>
          </div>
        </div>
    
        
        <div class="text-dark  border-r border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
            <button
                class="border-primary text-primary bg-green-500 hover:bg-primary inline-block rounded border py-2 px-6 hover:text-white">
                Add medicine
        </button>
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