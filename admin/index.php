<?php 
session_start();
if(isset($_SESSION['username'])){
include "../include/config.php";
header("Location:{$hostname}/admin/post.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Site</title>
</head>

<body>
    <div class="container  mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 bg-dark">
            <h2 class="pt-5 pb-5 text-center text-white"> Sign In </h2>
        </div>
    </div>
    </div>
    <div class="container mt-5 mb-5 pb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?php  if(isset($_POST['username'])) echo ($_POST['username'])  ?>" name="username" id="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" value="<?php  if(isset($_POST['password'])) echo ($_POST['password'])  ?>" name="password" id="">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-dark" name="login">Sign In</button>
                    </div>
                </form>
                <?php
                if(isset($_POST['login'])){
                include '../include/config.php';
                $username= mysqli_real_escape_string($con,$_POST['username']);
                $password= mysqli_real_escape_string($con,md5($_POST['password']));
                $sel = "SELECT user_id, username ,role FROM `user-table` WHERE username='{$username}' AND password='{$password}'";
                $res= mysqli_query($con,$sel);
                    if(mysqli_num_rows($res)>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            session_start();
                            $_SESSION['username']= $rows['username'];
                            $_SESSION['user_id']= $rows['user_id'];
                            $_SESSION['role']= $rows['role'];
                            header("location:showdata.php");
                        }
                    }
                    else{
                        echo"<div class='alert alert-danger'> Please Enter Correct Username an password </div>";

                    }
                }

                ?>
            </div>
        </div>
</body>

</html>