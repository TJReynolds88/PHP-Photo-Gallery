<link href="https://fonts.googleapis.com/css?family=IM+Fell+French+Canon:400i" rel="stylesheet">
<link href="../stylesheets/main.css" rel="stylesheet">
<?php
include '../layouts/head.php';
?>
 <section class="body">
<?php

$target_dir = "..//images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
         echo '<div id="msg"> File is an image - </div>';
        $uploadOk = 1;
    } else {
        echo '<div id="errormsg"> File is not an image <br></div>';
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo '<div id="errormsg"> This file already exists.<br></div>';
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo '<div id="errormsg"> File is too large. <br></div>';
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpeg" && $imageFileType != "gif") {
    echo  '<div id="errormsg"> Only JPEG & GIF files are allowed.<br></div>';
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<div id="errormsg"> Sorry, your file was not uploaded.<br></div>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo '<div id="errormsg"> Sorry, there was an error uploading your file.<br></div>';
    }
}

?>
</section>

<?php

include '../layouts/footer_admin.php';
?>

