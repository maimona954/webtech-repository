<?php
session_start();
error_reporting(0);
include('./model/dbconnection.php');

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbldonor where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['pgasoid']=$ret['ID'];
     header('location:./view/dashboard.php');
    }
    else{
   echo "<script>alert('Invalid Details.');</script>";
    }
  }
  ?>
<!DOCTYPE html>
<head>
<title>Food Donation Management System | Donor Login </title>

</head>
<body>

	<h2 >Sign In Now</h2>
		<form action="#" method="post" name="login">
			<label>E-mail</label><br>
			<input type="email" name="email" placeholder="E-MAIL" required="true"><br>
      <label>Password</label><br>
			<input type="password"  name="password" placeholder="PASSWORD" required="true"><br><br>
			
			<a href="forgot-password.php">Forgot Password?</a>

				<input type="submit" value="Sign In" name="login">
		</form>
		<p>Don't Have an Account ?<a href="donor-registration.php">Create an account</a></p>
    <p class="mb-1">
   
     <i class="fa fa-home" aria-hidden="true"><a href="../index.php">Home Page</a></i>
      </p>


</body>
</html>
