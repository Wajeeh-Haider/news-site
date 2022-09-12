<?php include  "../include/config.php" ?>
<?php $cat_id = $_GET['catid'];
$sel = "DELETE FROM `category` WHERE `cat_id` =  $cat_id";
$result = mysqli_query($con,$sel);
header("Location:category.php")
?>