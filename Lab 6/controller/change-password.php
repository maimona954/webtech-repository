<?php
session_start();
include('./model/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$donorid=$_SESSION['pgasoid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbldonor where ID='$donorid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbldonor set Password='$newpassword' where ID='$donorid'");
echo '<script>alert("Your password successully changed.")</script>';
} else {

echo '<script>alert("Your current password is wrong.")</script>';
}



}

  
  ?>




<!DOCTYPE html>
<head>
<title>Food Donation Management System|| Change Password  </title>


</head>
<body>


<?php include_once('./view/header.php');?>

<?php include_once('./view/sidebar.php');?>




<fieldset>
    <legend style="text-align:center;"><h3>Change Password</h3></legend>

    <form method="post" action="" name="changepassword" onsubmit="return checkpass();">

        <label for="adminname" >Current Password: </label>
        <input type="password" name="currentpassword" required= "true" value="">

        <br><br>

        <label for="lastname" >New Password:</label>
        <input type="password" name="newpassword" value="">

        <br><br>

        <label for="username">Confirm Password:</label>
        <input type="password" name="confirmpassword" value="">

        <br><br><br>

        <p style="text-align: center;"> <button type="submit" name="submit">Change</button></p>

    </form>
</fieldset>



<?php include_once('./view/footer.php');?>




</body>
</html>
<?php }  ?>