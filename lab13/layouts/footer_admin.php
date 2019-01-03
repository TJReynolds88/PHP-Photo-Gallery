<footer class="footer">
    <?php


date_default_timezone_set('UTC'); //Gets Current Date

$MDY = date("F j, Y"); // Month/Day/Year
$Y = date("Y"); // Year
$MY = date("F, Y"); // Month / Year

define("Copy_Format", "F"); // Creates Constant

// Displays which format set
switch (Copy_Format) {
    case "Y":
        echo "Copyright $MDY";
        break;
    case "F":
        echo "Copyright $MY";
        break;
    case "M":
        echo $Y;
        break;
    default:
        echo "&copy $MDY";
        break;
}


?>
</footer>