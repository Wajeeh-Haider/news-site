<!doctype html>
<html lang="en">
  <head>
    <title>Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
     <?php include "../include/header.php"?>
     <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center float-left">All POSTS</h4>
                        <a href="add-post.php" class="btn btn-primary float-right ">Add-Posts</a>
                    </div>
                    <div class="card-body p-0 m-0">
                    <?php 
                    include("../include/config.php");
                    if($_SESSION['role']=='1'){
                        $sql = "SELECT * From `post` 
                        LEFT JOIN category ON `post`.`category` = `category`.`cat_id` 
                        LEFT JOIN `user-table` ON `post`.`author` = `user-table`.`user_id` ORDER BY `post`.`post_id` DESC";
                     }
                     elseif($_SESSION['role']=='0'){
                        $sql = "SELECT * From `post` 
                        LEFT JOIN category ON `post`.`category` = `category`.`cat_id` 
                        LEFT JOIN `user-table` ON `post`.`author` = `user-table`.`user_id` WHERE `post`.`author` = {$_SESSION['user_id']} ORDER BY `post`.`post_id` DESC";
                        }
                        else{
                            echo "QUERY CAN'T BE RUN";
                        }
                    $result= mysqli_query($con,$sql) or die("query failed");    
                    if(mysqli_num_rows($result)){ 
                    ?>
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.NO</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Author</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['post_id']?></td>
                                    <td><?php echo $row['title']?></td>
                                    <td><?php echo $row['category_name']?></td>
                                    <td><?php echo $row['post_date']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><a href="edit-post.php?edit_post=<?php echo $row['post_id'] ?>"><i class="fa fa-edit fa-2x text-info"></i></a></td>
                                    <td><a href="delete-post.php?postdel=<?php echo $row['post_id'] ?>&catid=<?php echo $row['cat_id'] ?>"><i class="fa fa-trash-o fa-2x text-danger "></i></a></td>   
                                </tr>
                             <?php }?>
                            </tbody>
                        </table>
                        <?php }?>
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