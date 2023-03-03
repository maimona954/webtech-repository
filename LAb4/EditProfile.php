<?php
$name = $name = $email = $gender = $dob  = ""; 
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


              }
            }
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
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
        <legend> <h3 class="main-heading">Edit Profile</h3> </legend>
        <label for="name">Name  : </label><input type="text" name="name" value = "<?php echo $name?>" ><br>
        <span class="underline">_________________________________________</span><br> 
        <label for="email">Email  : </label><input type="text" name="email" value = "<?php echo $email?>" ><br>
        <span class="underline">_________________________________________</span><br> 
        <label for="gender">Gender  : </label>        
        <input type="radio" name="gender" value="Male" required <?php if($gender=="Male"){echo "checked";}?> >Male
        <input type="radio" name="gender" value="Female" required <?php if($gender=="Female"){echo "checked";}?> >Female
        <input type="radio" name="gender" value="Other" required <?php if($gender=="Other"){echo "checked";}?> >Other<br>
        <span class="underline">_________________________________________</span><br>
        <label for="dob">Date of Birth  : </label><input type="date" name="dob" value = "<?php echo $dob?>" ><br>
        <span class="underline">_________________________________________</span><br><br>          

        <input type="submit" name="Submit" value="Submit">
    </fieldset>
    <?php include('./Footer.php');?>
    </fieldset>


        
</body>
</html>