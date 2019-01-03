<?php
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started   
}
else{
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
        <h2 style="color: red;"> Unathorized PHP Attemps </h2>
        <?php
        $myfile = fopen("unauthorized.txt", "r") or 
        die ("Undable to open file!");
        while(!feof($myfile)) {
            echo fgets($myfile) . "<br>";

        }
        fclose($myfile);
                
                ?>
                <a id="rbutton" href ="./deleteUnauthorized.php">Remove Unathorized Attemps</a>
    </div>
        <!-- Begin footer.php -->
        <?php
include '../layouts/footer_admin.php';

?>
        <!-- End of footer.php-->

    </body>
</html>

