<?php  
require_once '../../controller/donor/foodInfo.php';

$food = fetchfood($_GET['id']);


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include '../donor/header.php'; ?>

<?php include '../donor/sideber.php'; ?>

<table>
	<tr>
        <th>Food Items</th>
        <th>Description</th>
        <th>Pickup Date</th>
        <th>Pickup Address</th>
        <th>Contact Person</th>
        <th> Phone Number</th>

	</tr>
	<tr style="text-align: center;">
        <td><?php echo $food['name'] ?></a></td>
        <td><?php echo $food['description'] ?></td>
        <td><?php echo $food['date'] ?></td>
        <td><?php echo $food['address'] ?></td>
        <td><?php echo $food ['person'] ?></td>
        <td><?php echo $food ['phone'] ?></td>


	</tr>

</table>
<?php include '../donor/footer.php'; ?>

</body>
</html>
