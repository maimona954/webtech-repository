<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <?php
    $UsernameErr = $PasswordErr ="";
    $Username = $Password ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST" )
    {
        if(empty($_POST['Username'])){
            $UsernameErr =" Pleasse Enter Your Name";

        }
        else{
            $Username =$_POST['Username'];
            if(!preg_match("/^[a-zA-Z- ]*$/", $Username)){
                $UsernameErr = "User Name can contain alpha numeric characters, period, dash or underscore only.Please Re-enter Your Name";
            }
            else{
                if(str_word_count($Username)<2){
                    $UsernameErr ="r Name must contain at least two(2) characters";

                }
                else{
                    $Username=$_POST['Username'];
                }
            }
        }

        if (empty($_POST['Password'])) {
            $PasswordErr ="Please Enter Password ";

        }

        else{
            $Password = $_POST['Password'];
            if(!preg_match( "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@#$%])[A-Za-z\d@@#$%]{8,}$/", $Password))
            {
                $PasswordErr ="Password should contain minimum eight(8) characters and at least one of the special characters (@, #, $,%)";
            }
            else{
                $Password = $_POST['Password'];
            }
        }
    }
    ?>
    <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <fieldset>
            <legend><label><b>LOGIN</b></label></legend>
            <label for="Username">User Name :</label>
            <input type="text" name="Username">
            <span style="color: red;">*<?php echo $UsernameErr?><br></span>
            <br>
            <label for="Password">Password :</label>
            <input type="Password" name="Password">
            <span style="color: red;">* <?php echo $PasswordErr?> <br></span><br>
            <span class="underline">__________________________________</span><br>
            <br>
            <input type="checkbox" name="rememberMe">
            <label for="rememberMe"> Remember me </label><br>
            <input type="submit" name="Submit" value="Submit">
            <a href="https://www.google.com">Forgot Password?</a>
    </fieldset>
    </form> 
    <?php
    echo $Username;
    echo "<br>";
    echo $Password;
    echo "<br>"
    ?>
</body>
</html>