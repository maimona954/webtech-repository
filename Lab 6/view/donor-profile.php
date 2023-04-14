<?php
session_start();
error_reporting(0);
include('./model/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $donorid=$_SESSION['pgasoid'];
    $fullname=$_POST['fullname'];
  $mobno=$_POST['contactnumber'];

     $query=mysqli_query($con, "update tbldonor set FullName ='$fullname', MobileNumber='$mobno' where ID='$donorid'");
  
  }
  ?>

<!DOCTYPE html>
<head>
<title>Food Donation Management System|| Donor Profile  </title>


</head>
<body>

<?php include_once('./view/header.php');?>

<?php include_once('./view/sidebar.php');?>

<fieldset>
    <legend style="text-align:center;"><h3>Donor Profile</h3></legend>
    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
}  ?> </p>


<?php
$donorid=$_SESSION['pgasoid'];
$ret=mysqli_query($con,"select * from tbldonor where ID='$donorid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<form method="post" action="">

    <label for="donorname">Full Name</label>

    <br>

    <input id="fullname" name="fullname" type="text" value="<?php  echo $row['FullName'];?>" required="true">

    <br>

    <label for="email" >Email</label>

    <br>

    <input class="form-control " id="email" name="email" type="email" value="<?php  echo $row['Email'];?>" readonly="true">

    <br>

    <label for="username">Mobile Number</label>

    <br>

    <input  id="contactnumber" name="contactnumber" type="text" value="<?php  echo $row['MobileNumber'];?>" required="true">

    <br>

    <label for="username" c>Registration Date</label>

    <br>

    <input id="regDate" name="regdate" type="text" value="<?php  echo $row['RegDate'];?>" readonly="true">
    <?php } ?>
    <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="submit">Update</button></p>

</form>
		     

</fieldset>

<?php include_once('./view/footer.php');?>
</body>
</html>
<?php }  ?>