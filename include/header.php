<?php 
session_start();
if(!isset($_SESSION['username'])){
include "../include/config.php";
header("Location:index.php");
}
?>

    <div class="container-fluid bg-dark p-3">
        <div class="row">
            <div class="col-md-6">
            <a href="post.php" class="text-white text-decoration-none"><img src="../images/news.jpg" height="70px" alt=""></a>

            </div>
            <div class="col-md-6">
                <h3 class="text-right text-white pt-3"><a href="../admin/logout.php"class="text-decoration-none text-white">Hello @<?php echo $_SESSION['username'] ?> Logout</a> </h3>
            </div>
        </div>  
    </div>
    <div class="container-fluid mt-1">
    <div class="row">
        <a href="post.php"class="btn btn-default text-info mr-3 font-weight-bolder">Post</a>
        <?php 
        if($_SESSION['role'] =='1'){
        ?>
        <a href="category.php" class="btn btn-default text-info font-weight-bolder">Category</a>
        <a href="showdata.php" class="btn btn-default text-info ml-3 font-weight-bolder">Users</a>
        <?php } ?>
    </div>
    </div>
