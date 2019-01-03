<link href="https://fonts.googleapis.com/css?family=IM+Fell+French+Canon:400i" rel="stylesheet">
<link href="stylesheets/main.css" rel="stylesheet">
<?php
include 'layouts/head.php';
?>
 <section class="body">
<?php
require_once "../../../db_credentials.php";

$imageId = $_GET['id'];
$sql = "SELECT * FROM photographs WHERE id=$imageId";
$image = $pdo->query($sql)->fetch();

$imageSource = 'images';
$imageName = $image["filename"];
$description = $image["caption"];
$imageSrc = $imageSource . "/" . $imageName;

echo ("<a href='$imageSrc'> <img src='$imageSrc' alt ='photo' width='600' /> </a>");


?>
<div class="caption">
<?php
echo $description;
echo ("<h2>Comments</h2>");

$sql2 = "SELECT * FROM comments WHERE photograph_id = $imageId";


$result = $pdo->query($sql2);
foreach ($result as $row) {
  $date = $row['created'];
  $author = $row["author"];
  $comment = $row["body"];
  echo "Date: " . $date. ", Author: ". $author. ", Comment: " .$comment. "<br>";

}
//$comments = $pdo->query()

$pdo = null;
$result = null;
$image = null;



?>

</div>
  </section>
<?php

include 'layouts/footer_admin.php';
?>