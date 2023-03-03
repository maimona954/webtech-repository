<?php 

	session_start();

	if (isset($_SESSION['username'])) {
		session_destroy();
		header("location:LogInPage.php");
	}
	else{
		header("location:LogInPage.php");
	}

 ?>