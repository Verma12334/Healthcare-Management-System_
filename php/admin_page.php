<!DOCTYPE html>

<html lang="en">

<head>

  <title>Admin</title>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/x-icon" href="logo.png">
  <link href="../style.css" rel="stylesheet">

  <script src="https://cdn.tailwindcss.com"></script>

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
<!-- <------------------------------------------php---------------------------------------------------------- -->
<?php
session_start(); // Start the session at the beginning

// Check if the user is already logged in
if (isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // Redirect to the admin page if already logged in
  header("Location: admin_login.php");
  exit();
}

require_once 'connect.php';
		
   
 $stmt1 = $conn->query("SELECT COUNT(pid) as cnt1 FROM $myDB.patient");
 $val1=$stmt1->fetch(PDO::FETCH_ASSOC);

 $stmt2 = $conn->query("SELECT COUNT(did) as cnt2 FROM $myDB.doctor");
 $val2=$stmt2->fetch(PDO::FETCH_ASSOC);

 $stmt3 = $conn->query("SELECT COUNT(id) as cnt3 FROM $myDB.appointment");
 $val3=$stmt3->fetch(PDO::FETCH_ASSOC);

 $stmt4 = $conn->query("SELECT COUNT(nid) as cnt4 FROM $myDB.nurse");
 $val4=$stmt4->fetch(PDO::FETCH_ASSOC);
?>

<!-- <------------------------------------------php---------------------------------------------------------- -->
 <body>
   <div class="admin-page">

  <div class="flex bg-gray-100 min-h-screen" x-data="{panel:false, menu:true}">
  <aside class="flex flex-col">
    <a href="#" class="inline-flex items-start justify-start pt-2 h-20 w-full bg-white shadow-md">


      <img class="w-14 h-14 mt-2 pl-2"
        src="../Photos/logo.png" alt="">
      <h6 class="pt-4 pl-2 text-black font-semibold">Welcome to IITG <br>Hospital Portal</h6>

    </a>

    <div class="flex-grow flex flex-col justify-between text-black bg-white">
      <nav class="flex flex-col mx-12 my-6 space-y-2">
        <a href="pharmacy.php"
          class="inline-flex items-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg px-2">
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
          </svg>
          <span class="ml-2" x-show="menu">Pharmacy</span>
        </a>
        <a href="add_test.php"
          class="inline-flex items-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg px-2">
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
          </svg>
          <span class="ml-2" x-show="menu">Pathology</span>
        </a>
        <!-- <a href="room.php"
          class="inline-flex items-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg px-2">
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
          </svg>
          <span class="ml-2" x-show="menu">Rooms</span>
        </a> -->
        <a href="view_employee.php"
          class="inline-flex items-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg px-2">
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
          </svg>
          <span class="ml-2" x-show="menu">Employees</span>
        </a>
        
      </nav>
      
    </div>
  </aside>
  <div class="flex-grow text-black">
    <!-- <header class="flex items-center h-16 px-6 sm:px-10 bg-white shadow-md"> -->
      <div class="flex flex-shrink-0 items-center ml-auto">
          <div class="hidden md:flex md:flex-col md:items-end md:leading-tight">
            <span class="font-semibold ">Admin</span>
          </div>
      </div>
    <!-- </header> -->
    <main class="p-6 sm:p-10 space-y-6">

      <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="flex items-center p-8 h-28 bg-white shadow rounded-lg">
          <div
            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <div>
            <span class="block text-2xl font-bold">
<?php
            echo $val1['cnt1']; ?>

            </span>
            <span class="block text-gray-500">Patients</span>
          </div>
        </div>
        <div class="flex items-center p-8 h-28 bg-white shadow rounded-lg">
          <div
            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <div>
            <span class="block text-2xl font-bold">
            <?php echo $val2['cnt2']; ?>
            
            </span>
            <span class="block text-gray-500">Doctors</span>
          </div>
        </div>

        <div class="flex items-center p-8 h-28 bg-white shadow rounded-lg">
          <div
            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
          </div>
          <div>
            <span class="block text-2xl font-bold">
            <?php echo $val3['cnt3'];?>
            </span>
            <span class="block text-gray-500">Total Appointments</span>
          </div>
        </div>
        <div class="flex items-center p-8 h-28 bg-white shadow rounded-lg">
          <div
            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-teal-600 bg-teal-100 rounded-full mr-6">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <span class="block text-2xl font-bold">
            <?php echo $val4['cnt4']; ?>
            </span>
            <span class="block text-gray-500">Total Nurse</span>
          </div>
        </div>
      </section>
      <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
        <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
          <div class="flex justify-between">
            <div>
              <h2 class="px-6 py-5 font-bold  border-gray-100">Appointment</h2>
            </div>
          </div>
          <div class="p-4 flex-grow">
            <div>

              <!-- ====== Table Section Start -->


              <table class="w-full table-auto">
                <thead class="border-b">
                  <tr class=" text-center">
                    <th class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-bold">
                      Pid
                    </th>
                    <th class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-bold">
                      Did
                    </th>
                    <th class="text-dark   bg-white   py-5 px-2 text-center text-gray-600 font-bold">
                      Patient's Name
                    </th>
                    <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                      Gender
                    </th>
                  </tr>
                </thead>
                <tbody>

<!-- <----------------------------php for appointments----------------------------->
<?php
$stmt6 = $conn->query("SELECT * FROM $myDB.appointment A JOIN $myDB.patient P WHERE  A.pid=P.pid;");
 while ($row1=$stmt6->fetch(PDO::FETCH_ASSOC)) {
      ?> 
       
 		<tr><td class="text-dark   bg-white py-5 px-2 text-center text-gray-600 font-medium">
                     <?php echo $row1['pid']?>
                    </td><td class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-medium">
                       <?php echo $row1['did']?>
                    </td><td class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-medium">
                     <?php echo $row1['name']?>
                    </td><td class="text-dark   bg-white py-5 px-2 text-center text-gray-600 font-medium">
                     <?php echo $row1['gender']?>
                    </td></tr>
<?php } ?>

  <!-- <----------------------------------php end--------------------------------------->


                </tbody>
              </table>
            </div>
          </div>
        </div>

<!-- <-------------------------------------------doctors------------------------------------->
        <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
          <div class="flex justify-between">
            <div>
              <h2 class="px-6 py-5 font-bold  border-gray-100">Doctors</h2>
            </div>
            <div>
            </div>
          </div>
          <div class="p-4 flex-grow">
            <div>
              <table class="w-full table-auto">
                <thead class="border-b">
                  <tr class=" text-center">
                    <th class="text-dark text-left  bg-white pl-8   py-5 px-2  text-gray-600 font-bold">
                      Did
                    </th>
                    <th class="text-dark text-left  bg-white pl-8   py-5 px-2  text-gray-600 font-bold">
                      Name
                    </th>
                    <th class="text-dark text-left  bg-white pl-8   py-5 px-2  text-gray-600 font-bold">
                      Gender
                    </th>
                    <th class="text-dark text-left  bg-white pl-8   py-5 px-2  text-gray-600 font-bold">
                      Working Hours
                    </th>
                    <th class="text-dark   bg-white  py-5 px-2 text-left text-gray-600 font-bold">
                      Specialization
                    </th>
                    
                  </tr>
                </thead>
                <tbody>

<!-- <----------------------------------------php starts-------------------------------> 
<?php
// $stmt7 = $conn->query("SELECT * FROM $myDB.doctor");
$stmt7 = $conn->query("SELECT * FROM $myDB.doctor D JOIN $myDB.employee E WHERE  D.did=E.eid;");
 while ($row2=$stmt7->fetch(PDO::FETCH_ASSOC)) {
      ?> 
       
 		<tr><td class="text-dark pl-8 bg-white py-5 px-2 text-left text-gray-600 font-medium">
                      <?php echo $row2['did']?>
 		                <td class="text-dark pl-8 bg-white py-5 px-2 text-left text-gray-600 font-medium">
                      <?php echo $row2['name']?>
                    </td><td class="text-dark    bg-white py-5 px-2 text-left text-gray-600 font-medium">
                      <?php echo $row2['gender']?>
                    </td><td class="text-dark    bg-white py-5 px-2 text-left text-gray-600 font-medium">
                     <?php echo $row2['availability']?>
                    </td><td class="text-dark    bg-white py-5 px-2 text-left text-gray-600 font-medium">
                      <?php echo $row2['specialisation']?>
                    </td></tr>
<?php }?>
<!-- <----------------------------------------php ends------------------------------->
                  
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </section>  

    </main>
        <!-- Footer -->
        <footer>
          <p>Contact us at +91 2134567890 | info@homeopathyclinic.com</p>
      </footer>

    </div>

  </div>

</body>

</html>