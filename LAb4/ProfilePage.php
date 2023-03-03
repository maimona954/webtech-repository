<?php
$name = $name = $email = $gender = $dob = ""; 
session_start();
if(isset( $_SESSION['username'])){
    $name = $_SESSION['username'];
}
if(empty($name)){
    header("location:LogInPage.php");
}

            $info = file_get_contents("data.json");
            $info = json_decode($info);
            foreach ($info as $Info) {
              $username = $Info->username;
            if($username==$name){
               $name = $Info->name;
               $email = $Info->email ;
               $gender = $Info->gender ;
               $dob =$Info->dob ;
               $img =$Info->Image;


              }
            }
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Profile</title>

</head>
<body style="width: 650px;" >
    <fieldset>
    <fieldset>
          <span> <h1 align="left">X Company</h1><h3 align="right">
            <a href='ProfilePage.php'>Logged in as <?php echo $name ?>, |</a> <a href='Logout.php'>Logout</a>
        </h3></span>
    </fieldset>
    <?php include('./Middle.php');?>      

    <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset>
        <legend> <h2 class="main-heading">Profile</h2> </legend>
        
        <img src="<?php echo $img?> " alt = "<?php echo $name?> ">
        <a href="ChangeProfilePicture.php" style= "color:darkred;">Change picture</a>

        
        <label for="name">Name  : <?php echo $name?> </label><br>
        <span class="underline">______________________</span><br> 
        <label for="email">Email  : <?php echo $email?> </label><br>
        <span class="underline">______________________</span><br> 
        <label for="gender">Gender  : <?php echo $gender?> </label><br>
        <span class="underline">______________________</span><br>
        <label for="dob">Date of Birth  : <?php echo $dob?> </label><br>
        <span class="underline">______________________</span><br><br>          
        <a href="EditProfile.php" style= "color:darkred;">Edit Profile</a>
    </fieldset>
    
    <?php include('./Footer.php');?>
       
    </fieldset>
</form>



              
</body>
</html>