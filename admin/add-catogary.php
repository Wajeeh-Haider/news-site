<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php include "../include/header.php";
if($_SESSION['role']=='0'){
    include "../include/config.php";
    header("Location:post.php");
}
?>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Add Category</h3>
                    </div>
                    <div class="card-body">
                    <?php  
                    if(isset($_POST['add-category'])){  
                        include("../include/config.php");
                        $name_cat = $_POST['cat_name'];
                        $sql = "SELECT category_name FROM `category` WHERE category_name = '{$name_cat}'"; 
                        $result = mysqli_query($con, $sql) or die('query failed');
                        if (mysqli_num_rows($result) > 0) {
                            echo "<p class='alert alert-danger'>Category Is Already Taken</p>";
                        } else {
                            $insert = "INSERT INTO `category`(`category_name`) VALUES ('{$name_cat}')" or die("Quert Failed");
                            if (mysqli_query($con, $insert)) {
                                header("Location:category.php");
                            }
                        }
                    }
                    ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <label for="">Category Name</label>
                            <input type="text" name="cat_name" value="<?php if (isset($_POST['cat_name'])) echo ($_POST['cat_name']) ?>" placeholder="Category Name" class="form-control" id="">
                            <button class="btn btn-primary mt-1" name="add-category">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>