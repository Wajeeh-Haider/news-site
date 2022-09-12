<!doctype html>
<html lang="en">
<head>
    <title>Catoegory</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center float-left">All Categories</h4>
                        <a href="add-catogary.php" class="btn btn-primary float-right ">Add-Category</a>
                    </div>
                    <div class="card-body p-0">
                    <?php  
                    include "../include/config.php";
                    $sql = "SELECT * FROM `category`";
                    $result = mysqli_query($con , $sql);

                    if(mysqli_num_rows($result) > 0){

                    ?> 
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.NO</th>
                                    <th>Category Name</th>
                                    <th>Number Of Posts</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                <tr>
                                    <td><?php echo $row['cat_id']?></td>
                                    <td><?php echo $row['category_name']?></td>
                                    <td><?php echo $row['post']?></td>
                                    <td><a href="delete-category.php?catid=<?php echo $row['cat_id']?>"><i class="fa fa-trash-o fa-2x text-danger "></i></a></td>   
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                        <?php 
                         }
                        ?>
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