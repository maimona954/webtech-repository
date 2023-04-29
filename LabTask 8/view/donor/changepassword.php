<?php 
    error_reporting(0);
    session_start();
    if(!isset($_SESSION["loginUser_Name"]) || $_SESSION["status"] === FALSE){
        header('Location:login.php');
    }

 
    $currPasswordError =$_SESSION["currPasswordError"];
    $newPasswordError =$_SESSION["newPasswordError"];
    $reTypePasswordError = $_SESSION["reTypePasswordError"];


?>



</head>

<body>
    <?php include './header.php';?>
    <?php include './sideber2.php';?>


<fieldset>
    <legend><h2>Change Password</h2></legend>

    


            <form action="../../controller/donor/changepassword_action.php" method="POST">


                <label for="currentPass">Current Password</label> <br>
                <input type="password" name="currentPass" id="currentPass" style="margin: 5px">
                <span class="required"> <br> &nbsp; &nbsp;
                    <?php if ($_SERVER['REQUEST_METHOD'] != 'POST'){echo $currPasswordError;} ?></span>
                <br>

                <label for="newPass" style="color: green">New Password</label> <br>
                <input type="password" name="newPass" id="newPass" style="margin: 5px">
                <span class="required"> <br> &nbsp; &nbsp;
                    <?php if ($_SERVER['REQUEST_METHOD'] != 'POST') {echo $newPasswordError; }?> </span> <br>

                <label for="reTypeNewPass" style="color: red">Retype New Password</label> <br>
                <input type="password" name="reTypeNewPass" id="reTypeNewPass" style="margin: 5px">
                <span class="required"> <br> &nbsp;
                    &nbsp;<?php if ($_SERVER['REQUEST_METHOD'] != 'POST'){echo $reTypePasswordError;} ?> </span>
                <br>
                <input type="submit" name="submit" value="Update" class="request-button" /> <br>

            </form>
            <!-- </form> -->

            </fieldset>


    <?php include './footer.php';?>
</body>

</html>
