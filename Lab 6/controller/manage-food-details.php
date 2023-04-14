<?php  
session_start();
error_reporting(0);
include('./model/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } else{
if($_GET['action']=='delete'){
$bsid=intval($_GET['bsid']);
$query=mysqli_query($con,"delete from tblfood where ID='$bsid'");


}
?>


<!DOCTYPE html>
<head>
<title>Food Donation Managemet System|| Manage Food Detail </title>


</head>
<body>
<section id="container">
<!--header start-->
<?php include_once('./view/header.php');?>

<?php include_once('./view/sidebar.php');?>

<fieldset>
  <legend><h3>Food Details</h3></legend>

     

      <table >
        <thead>
          <tr>
            <th data-breakpoints="xs">S.NO</th>
            <th>Food Id</th>
            <th>Food Items</th>
            <th>Contact Person</th>
            <th> Mobile Number</th>
            <th>Division Name</th>
            <th>District Name</th>
            <th>Listing Date</th>

           
           
          </tr>
        </thead>
        <?php
        $did=$_SESSION['pgasoid'];

$ret=mysqli_query($con,"select * from  tblfood where DonorID='$did'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
        <tbody>
          <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
            <td><?php  echo $row['foodId'];?></td>
            <td><?php  echo $row['FoodItems'];?></td>
              <td><?php  echo $row['ContactPerson'];?></td>
              <td> +880 <?php  echo $row['CPMobNumber'];?></td>
                  <td><?php  echo $row['divisionName'];?></td>
                  <td><?php  echo $row['districtName'];?></td>
                  <td><?php  echo $row['CreationDate'];?></td>
                  
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
 </tbody>
            </table>
            
            
</fieldset>          


<?php include_once('./view/footer.php');?>  



</body>
</html>
<?php }  ?>
