<?php
	$conn=mysqli_connect("localhost","root","","patiet_details");

	if($conn)
		{
			echo"connection sucessful";
		}
	else
		{
			echo"error";
			
		}
			
			
#mysql_close($conn);
?>