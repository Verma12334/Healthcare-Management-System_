<!DOCTYPE html>
<html lang="en">

    <head>
        <title>AddTest</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="icon" type="image/x-icon" href="logo.png">
        <link href="../style.css" rel="stylesheet">
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
        <?php 	

require_once 'connect.php';
   
 $stmt1 = $conn->query("SELECT * FROM $myDB.test");
 echo '<div class="px-4 -mt-20 ml-8">
            <h3 class="text-4xl font-medium leading-6 text-teal-600">Pathology</h3>
        </div>
        <div class="p-8 md:col-span-2 md:mt-0">
        <div>
        
       <table class="w-full table-auto">
                    <thead>

	      <tr class="bg-teal-700 h-24 text-center">
                            
                            <th
                                class="text-dark  border-[#E8E8E8] bg-teal-600 py-5 px-2 text-center text-base font-medium">
                                Test id
                            </th>
                        
                            <th
                                class="text-dark  border-[#E8E8E8] bg-teal-600 py-5 px-2 text-center text-base font-medium">
                                Test Name
                            </th>
                            <th
                                class="text-dark border-b border-l border-[#E8E8E8] bg-teal-600 py-5 px-2 text-center text-base font-medium">
                                Test Cost
                            </th>
                            
                        </tr>
        </thead>
        <tbody>';
	while ($row=$stmt1->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['tid'];
		echo '</td> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['t_name'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['t_cost'];
	echo "</td></tr>";
}
 echo 	'</tbody>';
echo 	"</table>";
echo "</div>";
echo "</div>";


		// $name = $cost ="";

    if(isset($_POST['name']) && isset($_POST['cost']))
    {  
        $name = $_POST["name"];
		    $cost = $_POST["cost"];

		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $sql = "INSERT INTO $myDB.test (`t_name`,`t_cost`)VALUES('$name', '$cost')";

		  $stmt=$conn->prepare($sql);
      $stmt->execute();

      header("Location:add_test.php");
      exit();
	
		}	
?>

<!-- <------------------------------------------form---------------------------------->
        <div class="mx-12 my-20">

            <div class="sm:mt-0">
              <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                  <div class="px-4 sm:px-0 ">
                    <h3 class="text-4xl font-medium leading-6 text-teal-600">Add Test</h3>
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
                              class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" test name">
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                            <label for="first-cost" class="block text-sm font-medium text-gray-700">Cost</label>
                            <input type="number" name="cost" id="cost"
                              class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder="Enter cost">
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
                    Add test
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