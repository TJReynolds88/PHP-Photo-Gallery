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
            <title>Lab - 8 Photo Gallery with Admin</title>
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
        <h2 style="color: green;"> Authorized PHP Attemps </h2>
        <?php
        $myfile = fopen("access.txt", "r") or 
        die ("Undable to open file!");
        while(!feof($myfile)) {
            echo fgets($myfile) . "<br>";

        }
        fclose($myfile);
                
                ?>
                <a id="gbutton" href ="./deleteAuthorized.php" class="button">Remove Authorized Attemps</a>
    </div>
        <!-- Begin footer.php -->
        <?php
include '../layouts/footer_admin.php';

?>
        <!-- End of footer.php-->

    </body>
</html>

