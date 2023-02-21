<!DOCTYPE html>
<html>
<head>
    <title>Change password</title>
</head>
<body>
</body>
<?php
    
$Err = $currentpassErr = $newpassErr = $retypepassErr = "";
$currentpass = $newpass =$retypepass= "";
if(isset ($_POST['Submit']))
{
    $currentpass = $_POST['pass'];
    $newpass= $_POST['npass'];
    $retypepass = $_POST['rpass'];

    if(empty($currentpass) || empty($newpass) || empty($retypepass)){
        $Err = "Please fill up all the informations!";
    }
    else{
        if(!preg_match( "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $currentpass)){
        $currentpassErr=" Minimum eight characters, at least one letter, one number and one special character!";
         }
        if(!strcmp($currentpass, $newpass)){
          $newpassErr = "New Password should not be same as the Current Password";
         }
        if(strcmp($newpass, $retypepass))
         {
            $retypepassErr = "New Password must match with the Retyped Password";
         }
    }
}

?>  
    <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <fieldset>
            <legend><label><b>CHANGE PASSWORD</b></label></legend>
            <label for="pass">Current password :</label>
            <input type="text" name="pass">
            <span style="color: red;">*<?php echo $currentpassErr?><br></span>
            <br>
            <label for="npass"style="color: green">New Password :</label>
            <input type="text" name="npass">
            <span style="color: red;">*<?php echo $newpassErr?><br></span>
            <br>
            <label for="rpass"style="color: red;">Retype New Password :</label>
            <input type="text" name="rpass">
            <span style="color: red;">*<?php echo $retypepassErr?> <br></span><br>
            <span class="underline">__________________________________</span><br>
            <br>
            <input type="checkbox" name="rememberMe">
            <label for="rememberMe"> Remember me </label>
            <br>
            <input type="submit" name="Submit" value="Submit">
    </fieldset>
    </form> 

    <?php
    echo $currentpass;
    echo "<br>";
    echo $newpass;
    echo "<br>";
    echo $retypepass;
    echo "<br>";
?>
</body>
</html>