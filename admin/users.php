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
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        include "../include/config.php";
                        $name = mysqli_real_escape_string($con, $_POST['firstname']);
                        $username = mysqli_real_escape_string($con, $_POST['username']);
                        $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
                        $password = mysqli_real_escape_string($con, md5($_POST['password']));
                        $role = mysqli_real_escape_string($con, $_POST['role']);
                        $sql = "SELECT username FROM `user-table` WHERE username = '{$username}'";
                        $result = mysqli_query($con, $sql) or die('query failed');
                        if (mysqli_num_rows($result) > 0) {
                            echo "<p class='alert alert-danger'>Username Already Taken</p>";
                        } else {
                            $insert = "INSERT INTO `user-table`(`name`, `last_name`, `username`, `password`, `role`) VALUES ('{$name}','{$lastname}','{$username}','{$password}','{$role}')" or die("Quert Failed");
                            if (mysqli_query($con, $insert)) {
                                header("Location: showdata.php");
                            }
                        }
                    }
                    ?>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="firstname" value="<?php if (isset($_POST['firstname'])) echo ($_POST['firstname']) ?>" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" name="lastname" value="<?php if (isset($_POST['lastname'])) echo ($_POST['lastname']) ?>" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" value="<?php if (isset($_POST['username'])) echo ($_POST['username']) ?>" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" value="<?php if (isset($_POST['password'])) echo ($_POST['password']) ?>" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <select name="role" class="form-control">
                        <option selected disabled>Select</option>
                            <option value="1">Admin</option>
                            <option value="0">Normal User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>