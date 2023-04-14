
<?php 
session_start();
error_reporting(0);
include('./model/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['name'];
    $mobno=$_POST['mobilnumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbldonor where Email='$email'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email or Contact Number already associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tbldonor(FullName, MobileNumber, Email,  Password) value('$fname', '$mobno', '$email', '$password' )");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
}

 ?>


<!DOCTYPE html>
<head>
<title>Food Donation Management System | Donor Registration </title>




<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 

</script>

</head>
<body>

	<h2>Register Now</h2>
	<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
		<form action="#" method="post">
      <label> Name :</label>
			<input type="text"  name="name" placeholder="NAME" required="true">
      <br><br>
      <label>Email :</label>
			<input type="email"  name="email" placeholder="E-MAIL" required="true">
      <br><br>
      <label>Phone Number :</label>
			<input type="text"  name="mobilnumber" placeholder="PHONE" required="true" maxlength="13" pattern="[0-9]+">
      <br><br>
      <label>Password :</label>
			<input type="password" name="password" placeholder="PASSWORD" required="true">
      <br><br>
      <label>Conform Password :</label>
			<input type="password"  name="repeatpassword" placeholder="REPEAT PASSWORD" required="true">
      <br><br>
			<h4><input type="checkbox"  required="true" />I agree to the Terms of Service and Privacy Policy</h4>
			

				<input type="submit" value="submit" name="submit">
		</form>
		<p>Already Registered.<a href="login.php">Login</a></p>


</body>
</html>
