<?php 

require_once ('../../model/food.php');

function fetchAllfoods(){
	return showAllfoods();

}
function fetchfood($id){
	return showfood($id);

}
