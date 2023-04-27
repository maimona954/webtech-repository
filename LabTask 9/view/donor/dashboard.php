<?php

require_once '../../model/donor.php';

error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header('Location:login.php');
}


$P_id = $_SESSION["P_id"];



?>

<html>
    <head>
        <title>Donor Dashboard</title>
    </head>
    <body>
    <?php include '../donor/header.php'; ?>

    <?php include '../donor/sideber.php'; ?>
    

    <p style="text-align: center;"><b>Welcome </b> to <b>Food Donation Management System</b></p>

    <?php include '../donor/footer.php'; ?>
    </body>
</html>