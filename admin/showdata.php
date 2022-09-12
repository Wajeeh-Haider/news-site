<!doctype html>
<html lang="en">

<head>
    <title>Show data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include '../include/header.php' ;
    if($_SESSION['role']=='0'){
        include "../include/config.php";
           header("Location:post.php");
    }
    ?>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="users.php" class="float-right btn btn-outline-primary mb-3">Add User</a>
                <?php
                include "../include/config.php";
                $limit = 4 ;
                if(isset($_GET['pages'])){
                    $page = $_GET['pages'];
                }else{
                    $page=1;
                }
                $offset = ($page - 1) * $limit;
                $sql = "SELECT * FROM `user-table` ORDER BY user_id DESC ";
                $result = mysqli_query($con, $sql) or die("Quert Failed");
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr.No</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['user_id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['last_name'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php if ($row['role'] == 1) {
                                            echo 'Admin';
                                        } else {
                                            echo "Normal User";
                                        } ?></td>
                                   
                                    <td><a href="edit.php?id=<?php echo $row['user_id'] ?>"><i class="fa fa-edit fa-2x text-info"></i></a></td>
                                     <td><a href="delete.php?id=<?php echo $row['user_id'] ?>"><i class="fa fa-trash-o fa-2x text-danger "></i></a></td>   
                                </tr>
                            <?php }  ?>
                        </tbody>
                    </table>
                <?php }

                    $sqli = "SELECT * FROM `user-table`";
                    $result1 = mysqli_query($con,$sqli) or die(mysqli_error( $sqli));
                    if(mysqli_num_rows($result1)> 0){
                        $total_rec = mysqli_num_rows($result1);
                        $limit = 4 ;
                        $total_page = ceil($total_rec/$limit);
                      
                        echo '<ul class="pagination justify-content-center">';
                        if($page > 1){
                        echo '<a href="showdata.php?pages='.($page -1) .'"  class="btn btn-outline-primary"><li>Prev</li></a>';
                            
                        }

                        for($i=1; $i<= $total_page; $i++){
                            if($i==$page){
                                $active = "active";
                            }
                            else{
                                $active = "";
                            }
                            echo '<li class="'.$active.' page-item"><a href="showdata.php?pages='.$i.'" class="page-link">'.$i.'</a></li>';
                        };
                        if($page <  $total_page){
                            echo '<a  href="showdata.php?pages='.($page +1) .'"  class="btn btn-outline-primary"><li>Next</li></a>';

                        }
                        echo '</ul>';

                    }
                    
                ?>

            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>