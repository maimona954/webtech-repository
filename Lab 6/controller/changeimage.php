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
   $cid=$_GET['editid'];

     $pgpic=$_FILES["images"]["name"];
     $extension = substr($pgpic,strlen($pgpic)-4,strlen($pgpic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//r
$foodpic=md5($pgpic).$extension;
     move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$foodpic);
    $query=mysqli_query($con, "update tblfood set Image='$foodpic' where ID='$cid'");
    if ($query) {
  
      echo "<script>alert('Donating food Image has been Update');</script>";
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
<title>Food Donation Management System  | Image </title>





</head>
<body>


<?php include_once('./view/header.php');?>

<?php include_once('./view/sidebar.php');?>



      
<fieldset>
  <legend>
    <h3>Update Image</h3>
  </legend>

         

  <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblfood where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
      <form method="post" enctype="multipart/form-data">
                                    
                  

   <label >Pictures</label>

       <img src="images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>">
 <label >Pictures</label>

      <input type="file"  name="images" id="images" value="">

<?php  } ?>
                    <hr />

=
       <button type="submit" name="submit">Update</button>


     </form>




    </fieldset>
    <?php include_once('./view/footer.php');?>



</body>
</html>

<?php  } ?>
