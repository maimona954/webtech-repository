<?php
session_start();
error_reporting(0);
include('./model/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update tbldonor set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
   }
  
  }
  ?>


<!DOCTYPE html>
<head>
<title>Food Donation Management System | Forgot </title>


</head>
<body>

	<h2>Recover Password</h2>
		<form action="" method="post" name="changepassword" onsubmit="return checkpass();">
			<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
			<input type="password" required="true" name="newpassword" placeholder="New Password">
      <input type="password" name="confirmpassword" required="true" placeholder="Confirm Your Password">
			
			
			

				<input type="submit" value="Reset" name="submit">
		</form>
		<p><a href="login.php">Sign In</a></p>

   
     <i ><a href="../index.php">Home Page</a></i>


</body>
</html>
