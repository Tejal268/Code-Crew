<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #container {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 30px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="password"],
        input[type="tel"],
        input[type="email"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url('data:image/svg+xml;utf8,<svg fill="#555" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>') no-repeat right 10px center;
            background-size: 20px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
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
            width:33%;
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
            width:31%;
            padding: 15px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;

        }

        button:hover {
            background-color: #45a049;
        }

        button:focus {
            outline: none;
        }

        .error {
            color: red;
        }
        
    </style>
</head>
<body>
    <div id="container">
        <h2>Patient Registration Form</h2>
        <form id="registrationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
                <label for="name">Patient Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="input-group">
                <label for="mobile">Mobile Number:</label>
                <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required>
            </div>
            
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="input-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            
            <div class="input-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            
            <div class="input-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
            </div>
            
            <div class="input-group">
                <label for="bloodGroup">Blood Group:</label>
                <input type="text" id="bloodGroup" name="bloodGroup" required>
            </div>
            
            <div class="input-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <input type="reset" id="b1" value="Reset" name="reset" onclick="clearFunc()" class="btn" />
            <button type="submit" name="login" onsubmit="login()">Submit</button>
            <input type="button" id="b2" value="Login" class="btn" onclick="home()"/></td>
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
    if(isset($_POST['name'], $_POST['password'], $_POST['mobile'], $_POST['email'], $_POST['dob'], $_POST['gender'], $_POST['age'], $_POST['bloodGroup'], $_POST['address']))
    {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $bloodGroup = $_POST['bloodGroup'];
    $address = $_POST['address'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO registration (patient_name, password, mobile_no, email, dob, geder, age, blood_group, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssiss", $name, $password, $mobile, $email, $dob, $gender, $age, $bloodGroup, $address);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('New record created successfully');</script>";
        
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
    $conn->close();
}
    
}
?>