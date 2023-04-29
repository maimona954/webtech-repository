<?php
session_start();
// error_reporting(0);  // This line will hide all the given errors in php


//  Variable Declarations
$nameError = "";
$emailError = "";
$passwordError = "";
$genderError = "";
$phoneError = "";
$addressError = "";
$professionError = "";

// $nameError = $_SESSION['S_nameError'];

if (isset($_SESSION['S_nameError'])) {
    // echo "<h1>Name Error found</h1>";
    $nameError = $_SESSION['S_nameError'];
    unset($_SESSION['S_nameError']);
}


if (isset($_SESSION['S_emailError'])) {
    $emailError = $_SESSION['S_emailError'];
    unset($_SESSION['S_emailError']);
}


if (isset($_SESSION['S_passwordError'])) {
    $passwordError = $_SESSION['S_passwordError'];
    unset($_SESSION['S_passwordError']);
}

if (isset($_SESSION['S_genderError'])) {
    $genderError = $_SESSION['S_genderError'];
    unset($_SESSION['S_genderError']);
}

if (isset($_SESSION['S_phoneError'])) {
    $phoneError = $_SESSION['S_phoneError'];
    unset($_SESSION['S_phoneError']);
}

if (isset($_SESSION['S_addressError'])) {
    $addressError = $_SESSION['S_addressError'];
    unset($_SESSION['S_addressError']);
}

if (isset($_SESSION['S_professionError'])) {
    $professionError = $_SESSION['S_professionError'];
    unset($_SESSION['S_professionError']);
}

// echo "<h1>Hii</h1>";


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>FDMS | Donor Registration</title>
   
    <script>  
		function validateform(){  
            var name=document.myform.name.value;
            var email=document.myform.email.value;
            var password=document.myform.password.value; 
            var phone= document.myform.phone.value;
		  
		if (name==null || name==""){  
		  alert("Name can't be blank");  
		  return false;
        }else if(email==null || email==""){  
		  alert("Email can't be blank");  
		  return false;  
		}else if(password==null || password ==""){
            alert("Password can't be blank"); 
            return false;  
        }else if(password.length<8){  
		  alert("Password must be at least 8 characters long.");  
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
			  	document.getElementById("nameErr").innerHTML = "Name can't be blank";
			  	document.getElementById("name").style.borderColor = "red";
			}else{
			  	document.getElementById("nameErr").innerHTML = "";
			  	document.getElementById("name").style.borderColor = "black";

			}
			
        }

		function checkMail() {
			if (document.getElementById("email").value == "") {
			  	document.getElementById("emailErr").innerHTML = "Name can't be blank";
			  	document.getElementById("email").style.borderColor = "red";
			}else{
			  	document.getElementById("emailErr").innerHTML = "";
			  	document.getElementById("email").style.borderColor = "black";

			}
			
        }
        function checkPass(){
        	if (document.getElementById("password").value == "") {
			  	document.getElementById("passErr").innerHTML = "Password can't be blank";
			  	document.getElementById("password").style.borderColor = "red";
			}else{
				document.getElementById("passErr").innerHTML = "";
			  	document.getElementById("password").style.borderColor = "black";
			}
        }
        function checkPhone(){
        	if (document.getElementById("phone").value == "") {
			  	document.getElementById("phoneErr").innerHTML = "Phone can't be blank";
			  	document.getElementById("phone").style.borderColor = "red";
			}else{
				document.getElementById("phoneErr").innerHTML = "";
			  	document.getElementById("phone").style.borderColor = "black";
			}
        }
</script> 
</head>

<body style="text-align: center; width:500px;position: absolute;top: 5%;
            left: 30%;" >

    <fieldset>
        <legend>
            <h2>Sign Up</h2>
        </legend>


        <form name="myform"  onsubmit="validateform();" action="../../controller/donor/registration_action.php" method="POST">


                <label>Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Your name"onblur="checkName()" onkeyup="checkName()" >
                <span class="required">&nbsp; * &nbsp;<?php echo $nameError; ?></span><p id="nameErr"></p>
                <br>


                <label>E-mail</label>
                <input type="text" name="email" id="email" placeholder="Enter Your Email" onblur="checkMail()"onkeyup="checkMail()">
                <span class="required">&nbsp; * &nbsp;<?php echo $emailError; ?></span><p id="emailErr"></p>
                <br>



                <label>Password</label>
                <input type="text" name="password" id="password" placeholder="Enter Your Password"onblur="checkPass()">
                <span class="required">&nbsp; * &nbsp;<?php echo $passwordError; ?></span><p id="passErr"></p>
                <br>




  

                <label>Phone</label>
                <input type="text" name="phone" id="phone" placeholder="Enter Your Phone"onblur="checkPhone()" onkeyup="checkPhone()">
                <span class="required">&nbsp; * &nbsp;<?php echo $phoneError; ?></span><p id="phoneErr"></p>
                <br>



                <button type="submit" class="signin-button">Signup</button>
                </span></p>

                <span><a href="../../index.php">HOME</a></span>
        </form>

    </fieldset>



</body>

</html>