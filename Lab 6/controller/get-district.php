

<?php
session_start();
error_reporting(0);
include('./model/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['sateid'])){
 $sid=$_POST['sateid'];

  $query=mysqli_query($con,"select * from tbldistrict join tbldivision on tbldivision.id=tbldistrict.divisionID where divisionName='$sid'");
    while($rw=mysqli_fetch_array($query))
    {
     ?>      
 <option value="<?php echo $rw['district'];?>"><?php echo $rw['district'];?></option>
                  

<?php }}} ?>