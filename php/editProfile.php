<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student : Dr. Nanda</title>
    <style>
	* {
	    margin: 0;
	    padding: 0;
	    box-sizing: border-box;
	}

	body {
	    font-family: Arial, sans-serif;
	    background-color: #f2f2f2;
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    height: 100vh;
	}

	.container {
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    height: 100%;
	}

	.login-form {
	    background: white;
	    padding: 2rem;
	    border-radius: 8px;
	    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	    width: 300px;
	}

	.login-form h1 {
	    margin-bottom: 1rem;
	    font-size: 24px;
	    color: #333;
	    text-align: center;
	}

	.login-form label {
	    display: block;
	    margin-bottom: 0.5rem;
	    font-size: 14px;
	    color: #555;
	}

	.login-form input {
	    width: 100%;
	    padding: 0.5rem;
	    margin-bottom: 1rem;
	    border: 1px solid #ddd;
	    border-radius: 4px;
	}

	.button-group {
	    display: flex;
	    justify-content: space-between;
	}

	.login-form button {
	    width: 48%;
	    padding: 0.5rem;
	    border: none;
	    border-radius: 4px;
	    color: white;
	    font-size: 16px;
	    cursor: pointer;
	    transition: background-color 0.3s;
	}

	.login-form button[type="submit"] {
	    background-color: #4CAF50;
       	    color: white;
    	    border: none;
    	    cursor: pointer;
    	    transition: background-color 0.3s ease, transform 0.2s ease;
	}

	.login-form button[type="submit"]:hover {
	    background-color: #45a049;
            transform: scale(1.05);
	}

	.login-form button[type="button"] {
	    background-color: #f44336;
            color: white;
    	    border: none;
    	    cursor: pointer;
    	    transition: background-color 0.3s ease, transform 0.2s ease;
	}

	.login-form button[type="button"]:hover {
	        background-color: #d32f2f;
                transform: scale(1.05);
	}

    
    </style>
</head>
<body>
	<?php

	require_once 'connect.php';
	  $email="";
	  $password="";
	 
	  if(isset($_POST['email']) && isset($_POST['password']))
	  {   
		  $email=$_POST["email"];
		  $password=$_POST["password"];
		  
		  if($email=="saurabh@gmail.com" && $password=="saurabh@123")
		   {
		   header("Location:admin_page.php"); 
		   exit();
		   }
		   else
		   {
		   header("Location:error.php"); 
		   exit(); 
		   }
	  }
	 ?>
	 
   <div class="container">
        <div class="login-form">
            <h1>Login</h1>
             <form class="frm" method="POST">
                <label for="email">Username</label>
                <input type="text" id="email" name="email" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                
                <div class="button-group">
                    <button type="submit">Login</button>
                    <button type="button" onclick="clearFields()">Clear</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
	function clearFields() {
	    document.getElementById("email").value = "";
	    document.getElementById("password").value = "";
	}
    </script>

</body>
</html>
