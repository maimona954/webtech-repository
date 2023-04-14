<?php
error_reporting(0);
?>
<header >
<!--logo start-->
<fieldset>
    <a href="dashboard.php"> Donor </a>


<!--logo end-->


    <!--search & user info start-->
    <ul >
        
        <!-- user login dropdown start-->


                <?php
$donorid=$_SESSION['pgasoid'];
$ret=mysqli_query($con,"select FullName from  tbldonor where ID='$donorid'");
$row=mysqli_fetch_array($ret);
$name=$row['FullName'];

?>

                <br>

                <span class="username"><?php echo $name; ?></span>
            </a>
            <ul style ="text-align:right;">
                <ul><a href="donor-profile.php">Profile</a></ul>
                <ul><a href="change-password.php"> Change Password</a></ul>
                <ul><a href="logout.php"> Log Out</a></ul>
            </ul>


       
    </ul>

</<fieldset>
</header>
