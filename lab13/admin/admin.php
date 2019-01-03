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
            <title>Lab - 7 Photo Gallery with Admin</title>
    </head>

    <body>


        <!-- Beginning of header.php -->
        <?php
include '../layouts/header_admin.php';
?>
        <!-- End of header.php -->
        <div>
        <img src="../images/man.png" style="float: left; margin-top: 12px;">
        <h2> Admin Page </h2>
            <h3>Select image to upload</h3><br>
            <form action="photo_upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form>
    </div>
        <!-- Begin footer.php -->
        <?php
include '../layouts/footer_admin.php';

?>
        <!-- End of footer.php-->

    </body>
</html>

