<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=IM+Fell+French+Canon:400i" rel="stylesheet">
        <link href="stylesheets/main.css" rel="stylesheet">
            <title>Main Gallery</title>
    </head>

    <body>


    <?php

require_once "../../../db_credentials.php";

$sql = "SELECT * FROM photographs";
$imageSource = 'images';
?>
        <!-- Beginning of header.php -->
        <?php
include 'layouts/head.php';
?>
        <!-- End of header.php -->

<?php
$imageSource = 'images';

$result = $pdo->query($sql);
foreach ($result as $row) {
    $dbImageId = $row['id'];
    $imageName = $row["filename"];
    $description = $row["caption"];
    $imageSrc = $imageSource . "/" . $imageName;
    echo ("<a href='photo.php?id=$dbImageId'> <img src='$imageSrc' alt ='photo' width='316' /> </a>");
}

$pdo = null;
$result = null;
?>
        <!-- Begin footer.php -->
        <?php
            include 'layouts/footer_admin.php';
?>
        <!-- End of footer.php-->
    </body>
</html>

