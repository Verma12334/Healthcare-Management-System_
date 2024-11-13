<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pharmacy</title>
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

    // Fetch all medicines from the database
    $stmt1 = $conn->query("SELECT * FROM $myDB.medicine");

    echo '
    <div class="px-4 -mt-20 ml-8">
        <h3 class="text-4xl font-medium leading-6 text-teal-600">Pharmacy</h3>
    </div>
    <div class="p-8 md:col-span-2 md:mt-0">
        <div>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-teal-700 h-24 text-center">
                        <th class="text-dark border-[#E8E8E8] bg-#06B2B6-600 py-5 px-2 text-center text-base font-medium">
                            Medicine ID
                        </th>
                        <th class="text-dark border-[#E8E8E8] bg-#06B2B6-600 py-5 px-2 text-center text-base font-medium">
                            Medicine Name
                        </th>
                        <th class="text-dark border-[#E8E8E8] bg-#06B2B6-600 py-5 px-2 text-center text-base font-medium">
                            Company Name
                        </th>
                        <th class="text-dark border-b border-l border-[#E8E8E8] bg-#06B2B6-600 py-5 px-2 text-center text-base font-medium">
                            Medicine Cost
                        </th>
                    </tr>
                </thead>
                <tbody>';

    // Loop through each medicine record and display it in a table row
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        echo '
        <tr>
            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">' . $row['mid'] . '</td>
            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">' . $row['med_name'] . '</td>
            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">' . $row['company'] . '</td>
            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">' . $row['med_cost'] . '</td>
        </tr>';
    }

    echo '
                </tbody>
            </table>
        </div>
    </div>';

    // Insert a new medicine record if form data is provided
    if (isset($_POST['name']) && isset($_POST['cost']) && isset($_POST['company'])) {
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $company = $_POST['company'];

        try {
            // Set PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL insert statement
            $sql = "INSERT INTO $myDB.medicine (med_name, med_cost, company) VALUES (:name, :cost, :company)";
            $stmt = $conn->prepare($sql);

            // Bind parameters to the SQL statement
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':cost', $cost);
            $stmt->bindParam(':company', $company);

            // Execute the statement
            $stmt->execute();

            // Redirect to pharmacy.php
            header("Location: pharmacy.php");
            exit();
        } catch (PDOException $e) {
            // Display error message if insertion fails
            echo "Error: " . $e->getMessage();
        }
    }
    ?>


    <!-- ------------------Medicine Form---------------- -->
    <div class="mx-12 my-20">

        <div class="sm:mt-0">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0 ">
                <h3 class="text-4xl font-medium leading-6 text-teal-600">Add Medicine</h3>
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
                          class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" your name" required>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                        <label for="cost" class="block text-sm font-medium text-gray-700">Cost</label>
                        <input type="number" name="cost" id="cost"
                          class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder="Enter cost" required>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                        <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                        <input type="text" name="company" id="company"
                          class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Company name" required>
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