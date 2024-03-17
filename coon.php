<?php
   error_reporting(0);
   //if($_POST["button1"])
   //{
   $name = $_POST['patient_name'];
   $password = $_POST['password'];
   $mobile_no=$_POST['mobile_no'];
   $email = $_POST['email'];
   $dob = $_POST['dob'];
   $gender = $_POST['geder'];
   $age = $_POST['age'];
   $blood_group = $_POST['blood_group'];
   $address = $_POST['address'];
   $errors= array(); 
   if(empty($name)){
     $errors['u']="Name is Requires";
   }

   if($name !="" && $password !="" && $mobile_no !="" && $email !="" && $dob !="" && $gender !="" && $age !="" && $blood_group !="" && $address !="")
   
   {
   $conn = new mysqli('localhost','root','','patiet_details');
   if($conn->connect_error)
   {
      echo"connect";
   }else{
    echo"Error";
       $stmt =$conn->prepare("insert into registration(name,password,mobile_no,email,dob,gender,age,blood_group,address)
       values(?,?,?,?,?,?,?,?,?)");
       $stmt->bind_param("ssisisiss",$name,$password,$mobile_no,$email,$dob,$gender,$age,$blood_group,$address);
       $stmt->execute();
       echo"<script>alert('Registration Successfully');</script>";
       $stmt->close();
       $conn->close();
   }
}
//else{
  //echo"<script>alert('Fill the form first');</script>";
  //}
//}
?>