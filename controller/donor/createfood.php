<?php  
require_once '../../model/food.php';



if (isset($_POST['createfood'])) {
	$data['name'] = $_POST['name'];
	$data['description'] = $_POST['description'];
	$data['date'] = $_POST['date'];
	$data['address'] = $_POST['address'];
	$data['person'] = $_POST['person'];
	$data['phone'] = $_POST['phone'];



	$data['image'] = basename($_FILES["image"]["name"]);

	$target_dir = "../uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);

	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

  if (addfood($data)) {
  	echo 'Successfully added!!';
  }
} else {
	echo 'You are not allowed to access this page.';
}

?>
