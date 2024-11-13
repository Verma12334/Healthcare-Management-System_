<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Employees</title>
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

        /* Adding padding to the body to account for the fixed header */
        body {
            padding-top: 50px; /* This should be at least the height of your header */
        }

        /* Footer styling */
        footer {
            background-color: #009688;
            color: white;
            text-align: center;
            margin-top: 227px; /* Adjust the value as needed */
            padding: 1em 0;
        }

    </style> 
    </head>

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

    <body>

        <?php 	

require_once 'connect.php';
		
// $servername = "localhost";
// $username = "Ananya13";
// $password = "Ananya@13";
// $dbname = "health";
   
 $stmt1 = $conn->query("SELECT * FROM $myDB.employee");

 echo '<div class="px-4 mt-12 ml-8">
            <h3 class="text-4xl font-medium leading-6 text-teal-600">Employees</h3>
        </div>
        <div class="p-8 md:col-span-2 md:mt-0">
        <div>';
        
echo '<table class="w-full table-auto">
                    <thead>';

	echo '<tr class="bg-teal-700 h-24 text-center">
                            
                            <th
                                class="text-dark  border-[#E8E8E8] bg-teal-600 py-5 px-2 text-center text-base font-medium">
                                Employee id
                            </th>
                        
                            <th
                                class="text-dark  border-[#E8E8E8] bg-teal-600 py-5 px-2 text-center text-base font-medium">
                                Name
                            </th>
                            <th
                                class="text-dark border-b border-l border-[#E8E8E8] bg-teal-600 py-5 px-2 text-center text-base font-medium">
                                Gender
                            </th>
                            <th
                                class="text-dark border-b border-l border-[#E8E8E8] bg-teal-600 py-5 px-2 text-center text-base font-medium">
                                Role
                            </th>
                             <th
                                class="text-dark border-b border-l border-[#E8E8E8] bg-teal-600 py-5 px-2 text-center text-base font-medium">
                                Joining date
                            </th>
                            
                            
                        </tr>';
  echo 	'</thead>';
  echo 	'<tbody>';
	while ($row=$stmt1->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['eid'];
		echo '</td> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['name'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['gender'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['e_type'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['joining_date'];
	echo "</td></tr>";
}
 echo 	'</tbody>';
echo 	"</table>";
echo "</div>";
echo "</div>";

?>

<!-- Footer -->
<footer>
    <p>Contact us at +91 8787898765 | info@homeopathyclinic.com</p>
</footer>
          
    </body>

</html>