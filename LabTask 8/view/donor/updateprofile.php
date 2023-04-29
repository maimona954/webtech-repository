<?php
error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header('Location:Login.php');
}


$nameError = "";
$emailError = "";
$passwordError = "";
$phoneError = "";



$fileName = $_SESSION['donor_image'];



if (isset($_SESSION['S_nameError'])) {
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


if (isset($_SESSION['S_phoneError'])) {
    $phoneError = $_SESSION['S_phoneError'];
    unset($_SESSION['S_phoneError']);
}

if (isset($_SESSION['S_addressError'])) {
    $addressError = $_SESSION['S_addressError'];
    unset($_SESSION['S_addressError']);
}




$P_name = $_SESSION["P_name"];
$P_mail = $_SESSION["P_mail"];
$P_phone = $_SESSION["P_phone"];
$P_password = $_SESSION["P_password"];


?>

<html>
<head>
    <title>FDMS | Donor Update Profile</title>
</head>
<body>
    <!-- Header -->
    <?php include './header.php'; ?>
    <!-- SideBer -->
    <?php include './sideber2.php'; ?>
    <fieldset>
        <legend>
            <h2>Update Profile</h2>    
        </legend>
    
        <form action="../../controller/donor/profile_action.php" method="POST" enctype="multipart/form-data">

        <img src="<?php if ($_SERVER['REQUEST_METHOD'] === 'GET') 
        {
            if (!file_exists("../../images/donor_Images/$fileName")) {
                echo "../../images/donor_Images/temp.png";
            } else if ($fileName == "N/A") {
                echo "../../images/donor_Images/temp.png";
            } else {
                echo "../../images/donor_Images/$fileName";
            }
            echo "../../images/donor_Images/$fileName";
        } else {
            echo "../../images/donor_Images/temp.png";
            } ?>" alt="Profile Picture" width="75px" height="75px" style="border-radius: 50%"> <br>
            <input type="file" name="profilePic" id="profilePic" style="margin: 5px">

            <br><br>

            <label>Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Your name" value="<?php echo $P_name; ?>">
            <span class="required">&nbsp; * &nbsp;<?php echo $nameError; ?></span>

            <br><br>

            <label>E-mail</label>
            <input type="text" name="email" id="email" placeholder="Enter Your Email" value="<?php echo $P_mail; ?>" disabled>
            <span class="required">&nbsp; * &nbsp;<?php echo $emailError; ?></span>

            <br><br>

            <label>Phone</label>
            <input type="text" name="phone" id="phone" placeholder="Enter Your Phone" value="<?php echo $P_phone; ?>">
            <span class="required">&nbsp; * &nbsp;<?php echo $phoneError; ?></span>

            <br><br>

            <input type="submit" class="request-button" value="Update"></input>
        
        </form>





    </fieldset>
    <!--footer-->
    <?php include './footer.php'; ?>

</body>
</html>

