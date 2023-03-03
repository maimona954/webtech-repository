<?php
$name = "";
$l = $img = ""; 
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
               $img = $Info->Image ;

              }
            }
?>
<!DOCTYPE html>
<html>
<body style="width:650px;">
  <fieldset>
  <?php include('./Middle.php');?>


  <fieldset>
    <span> <h1 align="left">X Company</h1><h3 align="right">
      <a href='ProfilePage.php'>Logged in as <?php echo $name ?>, |</a> <a href='LogOut.php'>Logout</a>
    </h3></span>
  </fieldset>

<form action="upload.php" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend><h2>CHANGE PROFILE PICTURE</h2></legend>
    <img src="girl.png" style="width:150px; height:150px;"><br>

    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <span class="underline">_________________________________</span><br>
    <input type="submit" value="Submit" name="submit">
     
    
  </fieldset>

</form>
<?php include('./Footer.php');?>
</fieldset>  
</body>
</html>

<?php
$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"]) && isset($_FILES["fileToUpload"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
     if ($_FILES["fileToUpload"]["size"] > 4000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      else{
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        else{
          if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
          } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $img = "images/".htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
                               require("user.class.php");
                               $user = new User('data.json');
                              $user->updateUser($name,'Image',$img);
                    header("location:ProfilePage.php");
                    $l =  "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                  } else {
                      echo "Sorry, there was an error uploading your file.";
                    }
                  }
                }
        }
      }
   else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
?>