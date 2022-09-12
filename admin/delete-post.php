<?php include  "../include/config.php" ?>
<?php 
 

$post_id = $_GET['postdel'];
$cat_id = $_GET['catid'];

$sql = "SELECT * From `post` Where post_id = $post_id";   
$result= mysqli_query($con,$sql) or die("query failed");    
$row = mysqli_fetch_assoc($result);
unlink("images/".$row['post_img']);

$sql = "DELETE FROM post WHERE post_id =  $post_id ;";
$sql .="UPDATE category SET post = post - 1 WHERE cat_id= $cat_id ";
mysqli_multi_query($con,$sql);
 header("Location:post.php");
?>