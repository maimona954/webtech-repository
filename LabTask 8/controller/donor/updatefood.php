<?php  
require_once '../../model/food.php';


if (isset($_POST['updatefood'])) {
	$data['name'] = $_POST['name'];
	$data['description'] = $_POST['discription'];
	$data['date'] = $_POST['date'];
    $data['address'] =$_POST['address'];
    $data['person']=$_POST['person'];
    $data['phone']=$_POST['phone'];
	$data['image'] = basename($_FILES["image"]["name"]);

	$target_dir = "../uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);


  if (updatefood($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  	//redirect to showfood
  	header('Location: ../../view/donor/updatefood.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>

