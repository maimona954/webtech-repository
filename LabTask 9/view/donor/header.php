<?php
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    // die("You are not logged in");
    header("Location: ../../view/donor/login.php");
}


?>

<header>


            <ul>

                <li><a
                        href="../../view/donor/profile.php"><?php echo $_SESSION["loginUser_Name"]; ?></a>
                </li>
                <li><a href="../../controller/donor/logout_action.php">Logout</a></li>
            </ul>

    </header>