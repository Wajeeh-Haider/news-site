<?php include  "../include/config.php" ?>
<?php $user_id = $_GET['id'];
$sel = "DELETE FROM `user-table` WHERE user_id =  $user_id";
$result = mysqli_query($con , $sel);
header("Location:showdata.php")
?>