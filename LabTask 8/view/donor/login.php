<?php
session_start();
// error_reporting(0);  // This line will hide all the given errors in php


$mailError = "";
$passwordError = "";
$showErrorMail = "none";
$showErrorPass = "none";

$cookie_mail = "";
$cookie_pass = "";

if (isset($_SESSION['emailError'])) {
    $mailError = $_SESSION['emailError'];
    $showErrorMail = "inline";
    unset($_SESSION['emailError']);
} else {
    $showErrorMail = "none";
}
if (isset($_SESSION['passwordError'])) {
    $passwordError = $_SESSION['passwordError'];
    $showErrorPass = "inline";
    unset($_SESSION['passwordError']);
} else {
    $showErrorPass = "none";
}

// if(isset($_SESSION['cookie_mail'])   &&    isset($_SESSION['cookie_pass'])){
//     $cookie_mail = $_SESSION['cookie_mail'];
//     $cookie_pass = $_SESSION['cookie_pass'];
// }


if (isset($_COOKIE['email'])) {
    if (isset($_COOKIE['email'])) {
        // Use the cookie value
        $cookie_mail  = $_COOKIE['email'];
        $cookie_pass  = $_COOKIE['password'];
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>

<script>  
		function validateform(){  
		var mail=document.myform.mail.value;  
		var password=document.myform.password.value;  
		  
		if (mail==null || mail==""){  
		  alert("Email can't be blank");  
		  return false;  
		}else if(password==null || password ==""){
            alert("Password can't be blank"); 
            return false;  
        }else if(password.length<8){  
		  alert("Password must be at least 8 characters long.");  
		  return false;  
		  }  
		}
		function checkMail() {
			if (document.getElementById("mail").value == "") {
			  	document.getElementById("mailErr").innerHTML = "Name can't be blank";
			  	document.getElementById("mail").style.borderColor = "red";
			}else{
			  	document.getElementById("mailErr").innerHTML = "";
			  	document.getElementById("mail").style.borderColor = "black";

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
</script> 
    

</head>

<body style="text-align: center; width:600px;position: absolute;top: 5%; left: 30%;" >


        <fieldset>
            <legend>
                <h2>DONOR LOGIN</h2>
            </legend>
        

        <form name="myform"  onsubmit="validateform();" action="../../controller/donor/login_action.php" method="POST">
            <span>Email : </span>



                <input type="text" name="mail" id="mail" placeholder="Enter Your Email"  onblur="checkMail()" onkeyup="checkMail()">

                <span class="required-mail">&nbsp; * &nbsp;<?php echo $mailError; ?></span>
                <p id="mailErr"></p>
                <br><br>


                <span>Password : </span>



                <input type="password" name="password" id="password" placeholder="Enter Your Password" onblur="checkPass()">

                <span class="required-pass">&nbsp; * &nbsp;<?php echo $passwordError; ?></span><p id="passErr"></p>

                <p><input type="checkbox" name="rememberMe" id="rememberMe"> Remember Me</p>
                <p> <a href="#">Forgot Password?</a> </p>
                <button type="submit" class="signin-button">Sign in</button>
                <p> <span> Didn't have an account? <a href="registration.php">Signup</a>
                    </span></p>

        </form>

        <span><a href="../../index.php">HOME</a></span>
        </fieldset>




</body>

</html>