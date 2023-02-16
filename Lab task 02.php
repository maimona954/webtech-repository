<!DOCTYPE html>
<html>
<head>
	<title> Lab task 02</title>
</head>
<body>
	<?php
$nameErr = $emailErr = $genderErr = $degreeErr = $dobErr = $bloodErr = "";
$name = $email = $dob = $gen = $deg = $bld = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	  
	if(empty($_POST['name'])){
		$nameErr = "Please Enter Your Name";
	}
	else{
        $name = $_POST['name'];
		if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
		$nameErr =" Can contain a-z, A-Z, period, dash only. Please Re-enter Your Name";
	     }
	    else{
	     	if(str_word_count($name)<2){
	     		$nameErr = "Name should contains at least two words";
                 $name = $_POST['name'];
	     		
	     	}
	     }
	}
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
      } else {
        $email =$_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
	if(empty($_POST['dob'])){
		$dobErr = "Please choose birth date ";
	}
	else{
        $dob=$_POST['dob'];
		if($dob<1953-01-01 && $dob>1998-12-31){
       $dobErr = "Enter a valid birth date "; 
		}
	}
	

	if(empty($_POST['gender'])){
		$genderErr = "Please select one option";
	}
    else{
        $gen= $_POST['gender'];
    }

	if(count($_POST['degree'])<2){ 
        $degreeErr = "Please select two of them ";
 	 }
    else{
        $deg= $_POST['degree'];
    }
 	
 	if(empty($_POST['blood'])){
		$bloodErr = "Please select one option";
	}
    else{
        $bld= $_POST['blood'];
    }
 }
	
?>
<form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
        <legend>  <b>NAME</b> </legend>
        <label for="name"></label>
        <input type="text" name="name">
        <span style="color: red">*<?php echo $nameErr?><br></span>
        <br><br>
    </fieldset>
	<fieldset>
        <legend>  <b>EMAIL</b> </legend>
        <label for="email"></label>
        <input type="text" name="email">
        <span style="color: red">*<?php echo $emailErr?><br></span>
        <br><br>
    </fieldset>
	<fieldset>
        <legend>  <b>DATE OF BIRTH</b> </legend>
        <label for="dob"></label>
        <input type="date" name="dob" min="1953-01-01" max= "1998-12-31">
        <span style="color: red">*<?php echo $dobErr?><br></span>
        <br><br>
    </fieldset>
	<fieldset>
        <legend>  <b>GENDER</b> </legend>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Other">Other
        <span style="color: red">*<?php echo $genderErr?><br></span>
        <br><br>
    </fieldset>
	<fieldset>
        <legend>  <b>DEGREE</b> </legend>
        <input type="checkbox" name="degree[]" value="SSC">
        <label for="SSC">SSC</label>
        <input type="checkbox" name="degree[]" value="HSC">
        <label for="HSC">HSC</label>
        <input type="checkbox" name="degree[]" value="BSc">
        <label for="BSc">BSc</label>
        <input type="checkbox" name="degree[]" value="MSc">
        <label for="MSc">MSc</label>
        <span style="color: red">*<?php echo $degreeErr?><br></span>
        <br><br>
    </fieldset>
    <fieldset>
        <legend>  <b>BLOOD GROUP</b> </legend>
          <select name="blood">
          <option selected disabled ></option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          </select>
          <span style="color: red">*<?php echo $bloodErr?><br></span>
          <br><br>
        <input type="submit" name="Submit" value="Submit">
    </fieldset>
</form>
<?php
echo "Your Input:";
echo "<br>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob; 
echo "<br>";
echo $gen; 
echo "<br>";
foreach ($deg as $key => $value) 
{
 	echo $value . "  ";
 } 
echo "<br>";
echo $bld; 
?>
</body>
</html>