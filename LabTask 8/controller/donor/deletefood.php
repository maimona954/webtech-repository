<?php 

require_once '../../model/food.php';

if (deletefood($_GET['id'])) {
    header('Location: ../showAllfoods.php');
}

 ?>
