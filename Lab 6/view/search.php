<?php  
session_start();
error_reporting(0);
include('./model/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } else{

?>


<!DOCTYPE html>
<head>
<title>Food Donation Management System||Search Food Listed Details </title>

</head>
<body>
<section id="container">
<!--header start-->
<?php include_once('./view/header.php');?>

<?php include_once('./view/sidebar.php');?>



       <form  method="post" action="" name="search">
                                   
     
     <label for="username" class="control-label col-lg-6">Search by Request Number / Requester Name / Requester No:</label>

       <input type="text" name="searchdata" id="searchdata" class="form-control" value="" required="true">
  

  <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="search">Search</button></p>
                                           


 </form>
  <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  
<div class="panel-heading">
   
          Result against "<?php echo $sdata;?>" keyword</div>

      <table>
        <thead>

       <thead>
          <tr>
            <th>S.NO</th>
            <th>Request Id</th>
            <th>Request By</th>
            <th>Requester Mobile Number</th>
            <th>Food Item</th>
            <th>Request Date</th>
            <th>Status</th>
            <th>Action</th>
           
           
          </tr>
        </thead>
          
         <?php
        $donarid=$_SESSION['pgasoid'];
$ret=mysqli_query($con,"select tblfoodrequests.id as frid,tblfood.ID as foodid,tblfood.FoodItems,tblfoodrequests.requestNumber,tblfoodrequests.fullName,tblfoodrequests.mobileNumber,tblfoodrequests.message,tblfoodrequests.requestDate,tblfoodrequests.status from
tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where (tblfood.DonorID='$donarid') and (tblfoodrequests.requestNumber like '%$sdata%' || tblfoodrequests.fullName  like '%$sdata%' || tblfoodrequests.mobileNumber like '%$sdata%') ");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){
while ($row=mysqli_fetch_array($ret)) {

?>
        
          <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              <td><?php  echo $row['requestNumber'];?></td>
                  <td><?php  echo $row['fullName'];?></td>
                  <td><?php  echo $row['mobileNumber'];?></td>
                  <td><?php  echo $row['FoodItems'];?></td>
                  <td><?php  echo $row['requestDate'];?></td>
                   <?php if($row['status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $row['status'];?></td><?php } ?>
                  <td><a href="view-requestdetails.php?frid=<?php echo $row['frid'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}} else {?>
<tr>
  <td colspan="9" style="color:red">No Record Found</td>
</tr>

<?php } ?>  
 </tbody>
   </table>
  <?php } ?>
            
          

  <?php include_once('./view/footer.php');?>

</body>
</html>
<?php }  ?>