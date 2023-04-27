<?php 

require_once '../../controller/donor/foodInfo.php';
$food = fetchfood($_GET['id']);






 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include '../donor/header.php'; ?>

<?php include '../donor/sideber.php'; ?>



<fieldset style="text-align: center;"><legend><h2>Edit Food Details</h2></legend>

 <form action="../../controller/donor/updatefood.php" method="POST" enctype="multipart/form-data">
  <label for="name">Food Items :</label>
  <input value="<?php echo $food['name'] ?>" type="text" id="name" name="name"><br><br>
  <label for="description">Description :</label>
  <input value="<?php echo $food['description'] ?>" type="text" id="description" name="description"><br><br>
  <label for="date">Pickup Date :</label>
  <input value="<?php echo $food['date'] ?>" type="date" id="date" name="date"><br><br>
  <label for="address">Pickup Address :</label>
  <input value="<?php echo $food['address'] ?>" type="text" id="address" name="address"><br><br>
  <label for="person">Contact Person :</label>
  <input value="<?php echo $food['person'] ?>" type="text" id="person" name="person"><br><br>
  <label for="phone">Contact Person Phone Number :</label>
  <input value="<?php echo $food['phone'] ?>" type="text" id="phone" name="phone"><br><br>
  <label for="image">Image</label>
  <input type="file" name="image"><br><br>
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updatefood" value="Update">
  <input type="reset"> 
</form> 


</fieldset>
<?php include '../donor/footer.php'; ?>
</body>
</html>

