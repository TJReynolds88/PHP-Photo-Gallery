<?php
session_start();
if($_SESSION["loggedIn"] == true) {
    
} else {
    header('Location: login.php');

}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=IM+Fell+French+Canon:400i" rel="stylesheet">
        <link href="../stylesheets/main.css" rel="stylesheet">
            <title>Lab - 5 Photo Gallery with Admin</title>
    </head>

    <body>


    <?php

?>
        <!-- Beginning of header.php -->
        <?php
include '../layouts/header_admin.php';
?>
        <!-- End of header.php -->
        <div>
        <h2 style="color: red;"> Unauthorized PHP Attemps </h2>
        <?php
        $myfile= fopen("unauthorized.txt", "w") or
        die ("Unable to open file");
        $txt = "Unauthorized access file cleared by administrator on ";
        fwrite($myfile, $txt);
        $today = date("l jS \of F Y h:i:s A");
        fwrite($myfile, $today);
        echo '<script>alert("Unauthorized attemps have been cleared")</script>';
        fclose($myfile);

                
                ?>
                
    </div>
        <!-- Begin footer.php -->
        <?php
include '../layouts/footer_admin.php';

?>
        <!-- End of footer.php-->

    </body>
</html>

