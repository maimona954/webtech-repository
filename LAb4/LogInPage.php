<?php session_start() ?>


<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Login</title>
</head>

<?php 
 if(isset($_SESSION['status']))
 {
  echo $_SESSION['status'];
 }
?>




<?php 

 $username = "";
 $password = "";


 if($_SERVER['REQUEST_METHOD'] === "POST"){

  $f = fopen("data.json", 'r');

  $s = fread($f, filesize("data.json"));

  $data = json_decode($s);

  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
  }

  $username = test_input($_POST['username']);
  $password = test_input($_POST['password']);

  $message = "";
  if(empty($username)){
    $message .= "Username can't be Empty";
    $message .= "<br>";
   }

  if(empty($password)){
    $message .= "Password can't be Empty";
    $message .= "<br>";
  }

  $a = true;
  
  $flag = false;
  if ($message === ""){

   for($i=0; $i<sizeof($data); $i++)
   {
    if($data[$i]->username === $username and $data[$i]->password === $password){
     $flag = true;


     
     $_SESSION['username'] = $data[$i]->username;
     $_SESSION['password'] = $data[$i]->password;

     break; 
    }
   }
  }
  else{
   echo "$message";
   echo "<br>";
   echo "<br>";

   $a = false;
   
  }

  
  
  

  if(!$flag){

   if($a){

    echo "Username / Password incorrect. Try again...";

    echo "<br>";
    echo "<br>";

   }

   
  }

  
  else
  {
   echo "<br>";
   echo "<br>";
   header("location:Dashboard.php");
   
  }
 }



?>



<body style="width:650px;" >
  <fieldset>
  <fieldset>
    <span> <h1 align="left">X Company</h1><h3 align="right">
      <a href='PublicHome.php'>Home| </a><a href='Login.php'>Login|</a> <a href='Registration.php'>Registration</a>
    </h3></span>
  </fieldset>

 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
  <fieldset>
   <legend>LOGIN</legend>

   <label>Username :</label>
   <input type="text" name="username" required value = "<?php echo $username; ?>">
   <br><br>
   <label>Password:</label>
   <input type="text" name="password" required value = "<?php echo $password; ?>">
   <br><br>
   <input type="checkbox" name="remember" value =1 > <label for="remember"> Remember me</label><br>

   <input type="submit" name="submit" value="Login">
   <br><br>



  </fieldset>


 </form>


<?php include('./Footer.php');?>
  </fieldset>
</body>
</html>