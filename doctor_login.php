<html>
  <head>
  <title>User Login</title>
  <head>
    <style type="text/css">
     body
   {
     margin:0px; 
	 background:url('./UserLogin1.jpg') no-repeat;
	 background-size:cover;
	 color:#f7f7f7; 
	 font-family:Arial, Helvetica, sans-serif;
   }
   #main
   {
	background-color:rgba(0,0,0,0.2);
     width:600px; 
	 height:260px; 
	 margin-left:auto; 
	 margin-right:auto; 
	 border-radius:5px; 
	 padding-left:10px; 
	 margin-top:200px;
     border-top:3px double #f1f1f1; 
	 border-bottom:3px double #f1f1f1; 
	 padding-top:20px;
   }
   #main table
   {
     font-family:"Comic Sans MS", cursive;
   } 
  /* css code for textbox */
  #main .tb
  {
    height:28px; 
	width:230px; 
	border:1px solid #27a465; 
	color:black;
	font-weight:bold; 
	border-left:5px solid #f7f7f7; 
	opacity:0.9;
  }
   /* css code for button*/
   #main .btn
   {
    width:80px;
    height:32px; 
	outline:none; 
    font-weight:bold; 
	border:0px solid #27a465; 
	text-shadow: 0px 0.5px 0.5px #fff;	
    border-radius: 2px; 
	font-weight: 600; 
	color: black; 
	letter-spacing: 1px; 
	font-size:14px; 
	-webkit-transition: 1s;
	 -moz-transition: 1s; 
	 transition: 1s;
   }
   #main .btn:hover
   {
    background-color:#27a465; 
	outline:none;  
	border-radius: 2px; 
	color:#f1f1f1; 
	border:1px solid #f1f1f1;
   }
    </style>
  </head>

	<body>
	<!-- Main div code -->
	<div id="main">
	<div class="h-tag">
	<h2>User Login</h2>
	</div>
	<!-- Login box -->
	<form method="POST" action="">
	<div class="login">
	<table cellspacing="2" align="center" cellpadding="8" border="0">
	<tr>
	<td>Enter Doctor Email :</td>
	<td><input type="text" placeholder="Enter user name here" name="email" id="email" value=""class="tb" /></td>
	</tr>
	<tr>
	<td>Enter Password :</td>
	<td><input type="password" placeholder="Enter Password here" name="password"id="pwd1" value=""class="tb" /></td>
	</tr>
	<tr>
	<td></td>
	<td>
	<input type="button" value="Reset" name="reset" onclick="clearFunc()" class="btn" />
	<input type="submit" value="Login" name="login" class="btn"/>
    <input type="button" value="Cancel" class="btn" onclick="home()"/></td>
	</tr>
	</table>
	</div>
    </form>
  	 <!-- login box div ending here.. -->
	</div>
	<!-- Main div ending here... -->
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
  </body>
  </html>
  <?php
    include("config.php");
    if(isset($_POST['login'])){
		$uname=$_POST['email'];
		$password=$_POST['password'];
		$res = mysqli_query($mysqli, "select * from `doctor registration` where email='$uname' and password='$password'");
		$result=mysqli_fetch_array($res);
		if($result){
			echo"<script>alert('Registration Successfully');</script>";
			header("location:Comaplaint1.php");
		}
		else{
			echo"<script>alert('Your Username and Password is invalid');</script>";
		}
	}
	
  ?>