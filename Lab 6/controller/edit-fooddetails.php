<?php
session_start();
error_reporting(0);
include('./model/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    $eid=$_GET['editid'];
    $donorid=$_SESSION['pgasoid'];
    $divisionname=$_POST['division'];
    $districtname=$_POST['district'];
    $description=$_POST['description'];
    $pdate=$_POST['pdate'];
    $padd=$_POST['address'];
    $contactperson=$_POST['contactperson'];
    $cpmobnum=$_POST['cpmobnum'];
     $fitem=$_POST["fitem"]; 
$fitemarray=implode(",",$fitem);
    $query=mysqli_query($con, "update tblfood set FoodItems='$fitemarray',divisionName='$divisionname', districtName='$districtname', Description='$description', PickupDate='$pdate', PickupAddress='$padd',ContactPerson='$contactperson',CPMobNumber='$cpmobnum' where ID='$eid'");
    if ($query) {
  
     echo "<script>alert('Donating food detail has been updated successfully');</script>";
  }
  else
    {
      echo "<script>alert('Something went wrong. Please try again.');</script>";
    }

  }
}
  ?>
<!DOCTYPE html>
<head>
<title>Food Donation Management System  | Food Updation </title>

</head>
<body>

<?php include_once('./view/header.php');?>

<?php include_once('./view/sidebar.php');?>



<fieldset>
    <legend>Update Food Details</legend>


<?php if($msg){ ?>
<div class="alert alert-info" role="alert">
                    <strong>Message !</strong>  
    <?php echo $msg;}  ?>
                </div>

 

     <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblfood where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <form method="post" enctype="multipart/form-data">

                        <label >Food Item</label>

                            <table >
<tr>
<td><input type="text" name="fitem[]" value="<?php  echo $row['FoodItems'];?>"  /></td>
<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
</tr>
</table>

                        <label >Description</label>

                            <textarea class="form-control" id="description" name="description" type="text" required="true" value=""><?php echo $row['Description'];?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Pickup Date</label>
                        <?php echo $row['PickupDate'];?>
                            <input  id="pdate" name="pdate" type="date" required="true" value=">">


                        <label for="inputSuccess">Choose division</label>

                           
                 <select  name="division" id="division" onChange="getdistrict(this.value);">
                                <option value="<?php echo $row['divisionName'];?>"><?php echo $row['divisionName'];?></option>
                                <?php $query1=mysqli_query($con,"select * from tbldivision");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['divisionName'];?>"><?php echo $row1['divisionName'];?></option>
                  <?php } ?> 
                            </select>

                        <label  for="inputSuccess">Choose district</label>

                          <select  name="district" id="district" required="true">
                 <option value="<?php echo $row['districtName'];?>"><?php echo $row['districtName'];?></option>
                            </select>  



                        <label >Pickup Address</label>

                            <textarea type="text"  name="address" id="address" required="true"><?php echo $row['PickupAddress'];?></textarea>
 

                        <label >Pictures</label>

                             <img src="images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"><a href="changeimage.php?editid=<?php echo $row['ID'];?>">Edit Image</a>

                        <label >Contact Person</label>

                            <input  id="contactperson" name="contactperson" type="text" required="true" value="<?php echo $row['ContactPerson'];?>">

                        <label >Contact Person Mobile Number</label>

                            <input type="text"  name="cpmobnum" id="cpmobnum" required="true" value="<?php echo $row['CPMobNumber'];?>" maxlength="10" pattern="[0-9]+">

                    <hr />


                                        <button  type="submit" name="submit">Update</button>
                                    </div>
                                </div>

                </form>
            </div>
            <?php } ?>



</fieldset>
<?php include_once('./view/footer.php');?>

</body>
</html>

