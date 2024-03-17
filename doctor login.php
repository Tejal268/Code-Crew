<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to bottom, #2980b9, #3498db);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .login-container {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        max-width: 350px;
        width: 100%;
    }
    .login-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    .login-container label {
        display: block;
        margin-bottom: 5px;
        color: #333;
        font-weight: bold;
    }
    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        background-color: #f9f9f9;
        color: #333;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .login-container input[type="submit"],
    .login-container input[type="reset"],
    .login-container input[type="button"] {
        width: calc(33.33% - 5px); 
        background-color: #2ecc71;
        color: #fff;
        padding: 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .login-container input[type="submit"]:hover,
    .login-container input[type="reset"]:hover,
    .login-container input[type="button"]:hover {
        background-color: #27ae60;
    }
    .login-container .button-group {
        display: flex;
        justify-content: space-between;
        gap: 5px; 
    }
</style>
</head>
<body>
<?php
    // Database configuration
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "patiet_details";

    
    // Establishing connection
    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Handling form submission
    if(isset($_POST['login'])){
        $email = $_POST['username'];
        $password = $_POST['password'];
        
        // Using prepared statement to prevent SQL injection
        $stmt = $mysqli->prepare("SELECT * FROM `doctor registration` WHERE email=? AND password=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            session_start();
            $_SESSION['email'] = $email; // Storing email in session for further use
            //header("Location: doctor registration.php"); // Redirect to dashboard.php after successful login
            echo"<script>alert('Login Successfully');</script>";
            exit();
        } else {
            echo "<script>alert('Your Username and Password are invalid');</script>";
        }
    }
    
?>
<div class="login-container">
    <h2>Login</h2>
    <form method="post" action="#">
        <label for="username">Doctor Email</label>
        <input type="text" id="username" name="username" placeholder="Enter your email" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <div class="button-group">
            <input type="reset" value="Reset" onclick="clearFunc()">
            <input type="submit" name="login" value="Login">
            <input type="button" value="Cancel" onclick="home()">
        </div>
    </form>
</div>
</body>
</html>
<script>
	//Reset Inputfield code.
	function clearFunc()
	{
		document.getElementById("email").value="";
		document.getElementById("pwd1").value="";
	}	
    function home()
            {
               var a= confirm("Do you want to Cancel It");
               if(a)
               {
                window.location="Homepage.php";
               }
            }
        </script>
