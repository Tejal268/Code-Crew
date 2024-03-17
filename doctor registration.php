<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

      
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        #bt{
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button {
            width: 33%;
            padding: 15px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        #b1{
            
            width: 30%;
            padding: 15px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        
        }

        #b2{
    
            width: 33%;
            padding: 15px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="tel"],
        .form-group input[type="email"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            resize: vertical;
        }

        .form-group input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: inline-block; 
}

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Doctor Registration</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="doctor_name">Doctor Name:</label>
            <input type="text" id="doctor_name" name="doctor_name" placeholder="Enter doctor name" required>
        </div>
        <div class="form-group">
            <label for="qualification">Specialization:</label>
            <input type="text" id="qualification" name="qualification" placeholder="Enter qualification" required>
        </div>
        <div class="form-group">
            <label for="mobile_number">Mobile Number:</label>
            <input type="tel" id="mobile_number" name="mobile_number" placeholder="Enter mobile number" required>
        </div>
       
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="3" placeholder="Enter address" required></textarea>
        </div>
        <div class="form-group">
    <label for="password">Password:</label>
    <input type="text" id="password" name="password" placeholder="Enter password" required>
</div>

        <div class="form-group">
            
            <input type="reset" id="b1" value="Reset" name="reset" onclick="clearFunc()" class="btn" />
            <button type="submit" name="login" onsubmit="login()">Submit</button>
            <input type="button" id="b2" value="Login" class="btn" onclick="home()"/></td>
        </div>
    </form>
</div>
</body>
</html>
<script>
	//Reset Inputfield code.
	function clearFunc()
	{
		document.getElementById("doctor_name").value="";
		document.getElementById("qualification").value="";
        document.getElementById("mobile_number").value="";
		document.getElementById("email").value="";
        document.getElementById("address").value="";
		document.getElementById("password").value="";
	}	
    function home()
            {
               var a= confirm("Do you want to cancel It");
               if(a)
               {
                window.location="patitent_login.php";
               }
            }
    function login()
    {
               var b= confirm("Do you want to submit It");
               if(b)
               {
                window.location="patitent_login.php";
               }
            }
            
        </script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "patiet_details";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $d_name = $_POST['doctor_name'];
    $specialize = $_POST['qualification']; // corrected field name
    $mobile = $_POST['mobile_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password']; // Corrected key for password

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO `doctor registration` (doctor_name, specialization, mobile, email, address, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $d_name, $specialize, $mobile, $email, $address, $password); // Corrected number of placeholders
    

    // Prepare and bind SQL statement
   

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
    $conn->close();
}
?>
