<?php

require_once '../../model/donor.php';

error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header('Location:login.php');
}


$P_id = $_SESSION["P_id"];



?>

<!DOCTYPE html>
<html>
<head>
	<title>FDMS | Add Food </title>

    <script>  
		function validateform(){  
            var name=document.myform.name.value;
            var person=document.myform.person.value; 
            var phone= document.myform.phone.value;
		  
		if (name==null || name==""){  
		  alert("Name can't be blank");  
		  return false;

		}else if(person==null || person ==""){
            alert("Person Name can't be blank"); 
            return false;  
     
        }else if (phone==null  || phone ==""){
            alert("Phone Number can't be blank");
            return false;  

        }else if (phone.length==11){
            alert("Phone Number must be 11 digit.");  
		  return false;
        }
		}
        function checkName() {
			if (document.getElementById("name").value == "") {
			  	document.getElementById("nameErr").innerHTML = "Food Name can't be blank";
			  	document.getElementById("name").style.borderColor = "red";
			}else{
			  	document.getElementById("nameErr").innerHTML = "";
			  	document.getElementById("name").style.borderColor = "black";

			}
			
        }


        function checkPerson(){
        	if (document.getElementById("person").value == "") {
			  	document.getElementById("personErr").innerHTML = "Person Name can't be blank";
			  	document.getElementById("person").style.borderColor = "red";
			}else{
				document.getElementById("personErr").innerHTML = "";
			  	document.getElementById("person").style.borderColor = "black";
			}
        }
        function checkPhone(){
        	if (document.getElementById("phone").value == "") {
			  	document.getElementById("phoneErr").innerHTML = "Phone Number can't be blank";
			  	document.getElementById("phone").style.borderColor = "red";
			}else{
				document.getElementById("phoneErr").innerHTML = "";
			  	document.getElementById("phone").style.borderColor = "black";
			}
        }
</script> 
</head>
<body>


<?php include '../donor/header.php'; ?>

<?php include '../donor/sideber.php'; ?>
    
<fieldset>
    <legend>Add Food Items</legend>


 <form name="myform"  onsubmit="validateform();" action="../../controller/donor/createfood.php" method="POST" enctype="multipart/form-data">
  <label for="name">Food Item Name:</label><br>
  <input type="text" id="name" name="name" onblur="checkName()" onkeyup="checkName()" ><p id="nameErr"></p>
  <label for="description">Description:</label><br>
  <input type="text" id="description" name="description"><br><br>
  <label for="date">Pickup Date:</label><br>
  <input type="date" id="date" name="date"><br><br>
  <label for="address">Pickup Address:</label><br>
  <input type="text" id="address" name="address"><br><br>
  <label for="person">Contact Person:</label><br>
  <input type="text" id="person" name="person" onblur="checkPerson()" onkeyup="checkPerson()"><p id="personErr"></p>
  <label for="phone">Contact Person Phone Number:</label><br>
  <input type="text" id="phone" name="phone" onblur="checkPhone()" onkeyup="checkPhone()"><p id="phoneErr"></p>

  <label for="image">Image</label><br>

  <input type="file" name="image"><br><br>
  <input type="submit" name = "createfood" value="Create">
  <input type="reset"> 



</form> 
</fieldset><br>
<?php include '../donor/footer.php'; ?>
</body>
</html>