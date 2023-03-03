<?php
$name =""; 
session_start();
if(isset( $_SESSION['username'])){
        $name = $_SESSION['username'];
}
if(empty($name)){
        header("location:LogInPage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DashBoard</title>
</head>


<body style="width:650px;">
        <fieldset>
        <fieldset>
          <span> <h1 align="left">X Company</h1><h3 align="right">
            <a href='ProfilePage.php'>Logged in as <?php echo $name ?>, |</a> <a href='Logout.php'>Logout</a>
        </h3></span>
     </fieldset>
        
     <?php include('./Middle.php');?>



        <h2 align="center">Welcome <?php echo $name ?></h2>
        <br>
               
        <?php include('./Footer.php');?>
        
        </fieldset>
</body>
</html>