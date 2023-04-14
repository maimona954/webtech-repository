<?php
session_start();
//error_reporting(0);
include('./model/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    $donorid=$_SESSION['pgasoid'];
    $divisionname=$_POST['division'];
    $districtname=$_POST['district'];
    $description=$_POST['description'];
    $pdate=$_POST['pdate'];
    $padd=$_POST['padd'];
    $contactperson=$_POST['contactperson'];
    $cpmobnum=$_POST['cpmobnum'];
    $fid=mt_rand(100000000, 999999999);
     $pic=$_FILES["images"]["name"];
     $extension = substr($pic,strlen($pic)-4,strlen($pic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$foodpic=md5($pic.time()).$extension;
     move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$foodpic);

//Getting post values
$fitem=$_POST["fitem"]; 
$fitemarray=implode(",",$fitem);
    $query=mysqli_query($con, "insert into tblfood(DonorID,foodId,divisionName, districtName, FoodItems, Description, PickupDate,PickupAddress,ContactPerson,CPMobNumber,Image) value('$donorid','$fid','$divisionname','$districtname','$fitemarray','$description','$pdate','$padd','$contactperson','$cpmobnum','$foodpic')");

    if ($query) {
    echo "<script>alert('Food Detail added successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'add-food-details.php'; </script>";
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
<title>Food Donation Management System  | Add Food Detail </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->

<script src="js/jquery2.0.3.min.js"></script>

<script>
function getdistrict(val) { 
  $.ajax({
type:"POST",
url:"get-district.php",
data:'sateid='+val,
success:function(data){
$("#district").html(data);
}});
}
 </script>
<script>
$(document).ready(function(){
var i=1;
$('#add').click(function(){
i++;
$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="fitem[]" placeholder="Enter Food Items" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
});
    
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
$('#row'+button_id+'').remove();
});
});
</script>
</head>
<body>


<?php include_once('./view/header.php');?>

<?php include_once('./view/sidebar.php');?>


<fieldset>

            <legend style="text-align: center;"><h3>List Your Food Details</h3></legend>
            

                
                <form class="form-horizontal bucket-form" method="post" enctype="multipart/form-data">

                        <label >Food Item</label>

                            <table id="dynamic_field">
<tr>
<td><input type="text" name="fitem[]" placeholder="Enter Food Items" class="form-control name_list" /></td>
<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
</tr>
</table>


               
<br>
                        <label >Description</label>
                       
                            <textarea  id="description" name="description" type="text" required="true" value="">
</textarea>                  
                    
                    <br>

                        <label >Pickup Date</label>
 
                            <input  id="pdate" name="pdate" type="date" required="true" value="">

                            <br>



                        <label >Pickup Address</label>

                             <textarea id="padd" name="padd" type="text" required="true" value="">
</textarea>



                    <br>

                        <label for="inputSuccess">Choose Division</label>

                            <select name="division" id="division" onChange="getdistrict(this.value);">
                                <option value="">Choose Division</option>
                                <?php $query=mysqli_query($con,"select * from tbldivision");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['divisionName'];?>"><?php echo $row['divisionName'];?></option>
                  <?php } ?> 
                            </select>

                           

  
                    <br>

                        <label  for="inputSuccess">Choose District</label>

                            <select  name="district" id="district" required="true">
              
                            </select>

                           



                    <br>

                        <label>Contact Person</label>

                            <input  name="contactperson" type="text" required="true" value="">


                    <br>

                        <label>Contact Person Mobile Number</label>

                            <input type="text"  name="cpmobnum" id="cpmobnum" required="true" value="" maxlength="10" pattern="[0-9]+">


                   <br>

                        <label >Pictures</label>

                             <input type="file" name="images" id="images" value="">


                
                    

                    <hr />

                                    
                                        <button type="submit" name="submit">Submit</button>
 


                </form>


</fieldset>

          <?php include_once('./view/footer.php');?>



</body>
</html>
<?php  } ?>
