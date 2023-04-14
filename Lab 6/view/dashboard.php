<?php
session_start();
error_reporting(0);
include('./model/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE html>
<head>
<title>Food Donation Management System | dashboard </title>

</head>
<body>

<?php include_once('./view/header.php');?>

<?php include_once('./view/sidebar.php');?>

                <?php
$donorid=$_SESSION['pgasoid'];
$ret=mysqli_query($con,"select FullName from  tbldonor where ID='$donorid'");
$row=mysqli_fetch_array($ret);
$name=$row['FullName'];

?>
					
					<?php 
$donarid=$_SESSION['pgasoid'];
					$query=mysqli_query($con,"Select * from  tblfood where DonorID='$donarid'");
$fcounts=mysqli_num_rows($query);

?>
					 


					 <a href="manage-food-details.php"><h4>Total Listed Food</h4></a>
					<h3><?php echo $fcounts;?></h3>
					

			<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where tblfood.DonorID='$donarid' and (tblfoodrequests.status='Food Take Away/ Request Completed')");
$completed=mysqli_num_rows($query);
?>

					<a href="completed-requests.php"><h5>Food Take Away/ Request Completed </h5></a>
						<h3><?php echo $completed;?></h3>

		
			<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where tblfood.DonorID='$donarid' and (tblfoodrequests.status='Request Rejected')");
$rejected=mysqli_num_rows($query);
?>


					<a href="rejected-requests.php"><h4>Rejected Requests </h4></a>
						<h3><?php echo $rejected;?></h3>


			<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where tblfood.DonorID='$donarid' ");
$allrequests=mysqli_num_rows($query);
?>



					<a href="all-requests.php"><h4>All Requests </h4></a>
						<h3><?php echo $allrequests;?></h3>


			<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where tblfood.DonorID='$donarid' and (tblfoodrequests.status is null || tblfoodrequests.status='')");
$newrequest=mysqli_num_rows($query);
?>




					<a href="new-requests.php"><h4>New Requests </h4></a>
						<h3><?php echo $newrequest;?></h3>




						<?php include_once('./view/footer.php');?>  

</body>
</html>
