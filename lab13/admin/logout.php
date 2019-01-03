<?php
session_start();
if($_SESSION["loggedIn"] == true) {
    
} else {
    header('Location: login.php');

}
$_SESSION["loggedIn"] = false;
header("Location: ../admin/login.php");

?>