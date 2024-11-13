<!DOCTYPE html>

<html lang="en">

<head>

    <title>Login</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">

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
            padding-top: 50px; /* This should be at least the height of your header */
        }

        /* Additional styling for the section */
        section {
            height: calc(100vh - 100px); /* Adjust the height of the section if needed */
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
        $login="";

        if(isset($_POST['login']))
        {
            $login=$_POST["login"];
        
            if($login=="Receptionist")
            {
            header("Location:staff_login.php");  
            }
            else if($login=="Guard")
            {
            header("Location:staff_login.php"); 
            }
            else if($login=="Cleaner")
            {
            header("Location:staff_login.php"); 
            }
            
        }
        // echo($login);
        ?>

    <section class="w-full h-screen bg-cover bg-center">
        <div class="container flex flex-col items-center justify-center">
            <div class="bg-white rounded mt-4 lg:w-1/4 md:w-1/2 w-1/2 p-10">
                <div>
                    <div class="h-full flex justify-center">
                        <img class="w-14 h-14 mt-2"
                            src="../Photos/iitg.png" alt="">
                    </div>
                    <div class="text-2xl font-semibold mt-2 ml-2">
                        Select a Role
                    </div>
                </div>

                <form class="frm" method="POST">
                    <div class="col-span-6 sm:col-span-3">
                        <div class="pl-2 mt-2">
                            <select id="login" name="login" autocomplete="login"
                                class="mt-1 block w-full rounded-md border border-gray-400 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option>Select a option</option>
                                <option>Receptionist</option>
                                <option>Guard</option>
                                <option>Cleaner</option>
                            </select>
                        </div>
                    </div>

                    <div class="justify-end mt-4 ml-24">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ">
                            Continue
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

<!-- Footer -->
<footer>
    <p>Contact us at +91 8787898765 | info@homeopathyclinic.com</p>
</footer>

</body>

</html>