<!DOCTYPE html>
<html lang="en">
  <head>
  <title>User Login</title>
  <head>
    <style type="text/css">
  body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #2980b9, #3498db);
    background-image: url('background-image.jpg'); 
    background-position: center;
    margin: 0;
    padding: 0;
}


#login-container {
    background-color: rgba(255, 255, 255, 0.9);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    max-width: 400px;
    width: 100%;
    margin: auto; /* Center the login container horizontally */
    margin-top: 100px; /* Adjust as needed for vertical centering */
    display: flex;
    flex-direction: column;
    align-items: center; /* Center horizontally */
}

h2 {
    color: black;
    text-align: center;
    margin-bottom: 20px;

}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"],
input[type="reset"],
input[type="button"] {
    width: calc(33.33% - 10px); 
    background-color: #27a465;
    color: #fff;
    padding: 12px 20px;
    margin: 6px 3px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

#pname{
    font-weight: bold;
}

#ppass{
    font-weight: bold;
}

input[type="submit"]:hover,
input[type="reset"]:hover,
input[type="button"]:hover {
    background-color: #218c56;
}

.button-group {
    width:33%;
    display: flex;
    justify-content: center; /* Center buttons horizontally */
}

.error {
    color: #d63031;
    font-size: 14px;
    text-align: center;
}

    </style>
  </head>

	<body>
        <div id="login-container">
	<!-- Main div code -->
	<div id="main">
	<div class="h-tag">
	<h2>Patient Login</h2>
	</div>
    
	<!-- Login box -->
	<form method="POST" action="./record.php">
	<div class="login">
	<table cellspacing="2" text-align="center" cellpadding="8" table-border="0">
	<tr>
	<td id="pname">Patient Name:</td>
	<td><input type="text" placeholder="Enter user name here" name="email" id="email" value=""class="tb" /></td>
	</tr>
	<tr>
	<td id="ppass">Password:</td>
	<td><input type="password" placeholder="Enter Password here" name="password"id="pwd1" value=""class="tb" /></td>
	</tr>
	<tr>
	<td></td>
	<td>
	<input type="button" value="Reset" name="reset" onclick="clearFunc()" class="btn" />
	<input type="submit" value="Login" name="login" class="btn" onsubmit="myfun"/>
    <input type="button" value="Cancel" class="btn" onclick="home()"/></td>
	</tr>
	</table>
	</div>
    </form>
  	 <!-- login box div ending here.. -->
	</div>
	<!-- Main div ending here... -->
    
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
               var a= confirm("Do you want to go at home ");
               if(a)
               {
                window.location="Homepage.php";
               }
            }

            function myfun()
            {
               var b= confirm("Do you want to go at home ");
               if(b)
               {
                window.location="record.php";
               }
            }
        </script>
  <?php
    include("config.php");
    if(isset($_POST['login'])){

		$email = $_POST['email'];
		$password=$_POST['password'];
		$res = mysqli_query($mysqli, "select * from registration where email='$email' and password='$password'");
		$result=mysqli_fetch_array($res);
		if($result){
			echo"<script>alert('Login Successfully');</script>";
			header("patient registration.php");
		}
		else{
			echo"<script>alert('Your Username and Password is invalid');</script>";
		}
	}
	
  ?>