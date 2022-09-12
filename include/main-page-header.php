<div class="container-fluid ">
<div class="row bg-info p-4 justify-content-center">
<a href="index.php" class="text-white text-decoration-none"><img src="images/news.jpg" height="100px" alt=""></a>

</div>
<div class="row bg-dark p-2 justify-content-center">
<a href="index.php" role="button" class="btn btn-dark btn-md">Home</a>

<?php 
include "include/config.php";
$sql = "SELECT * From category Where post > 0 ";
$result = mysqli_query($con , $sql);
if(mysqli_num_rows($result)){
   while($row = mysqli_fetch_assoc($result)){   
?>
   <a href="category.php?cid=<?php echo $row['cat_id'] ?>" role="button" class="btn btn-dark btn-md"><?php echo $row['category_name'] ?></a>
<?php 
   }}
?>
</div>
</div>