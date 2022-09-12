<!doctype html>
<html lang="en">

<head>
    <title>Edit</title>
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
         
             if (isset($_POST['submit'])) {
                 include "../include/config.php";
                 $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
                 $name = mysqli_real_escape_string($con, $_POST['firstname']);
                 $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
                 $username = mysqli_real_escape_string($con, $_POST['username']);
                 $role = mysqli_real_escape_string($con, $_POST['role']);
                 $sql = "UPDATE `user-table` SET name = '{$name}',last_name='{$lastname}',username='{$username}',role='{$role}'WHERE user_id = '{$user_id}'";
                     if (mysqli_query($con,  $sql)) {
                         header("Location:showdata.php");
                     }
                    }
                 
            
            
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <p class="h4 text-center">Modify User Details</p>
                    </div>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <?php include  "../include/config.php";
                            $user_id = $_GET['id'];
                            $sel = "SELECT * FROM `user-table` WHERE user_id =  $user_id"; 
                            $result = mysqli_query($con , $sel); 
                            if(mysqli_num_rows($result) > 0){
                                while($row=mysqli_fetch_assoc($result)){
                            ?>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="hidden" name="user_id" value="<?php echo ($row['user_id']) ?>">
                                <input type="text" name="firstname" value="<?php echo ($row['name']) ?>" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" value="<?php echo ($row['last_name']) ?>" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" value="<?php echo ($row['username']) ?>" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <select name="role" class="form-control">
                                <?php if($row['role']==1) {
                                    echo "<option value='1'Selected>Admin</option>
                                    <option value='0'>Normal User</option>";}
                                    else{
                                        echo "<option value='1'>Admin</option>
                                        <option value='0'Selected>Normal User</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php }
                        } ?>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                    <button name="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>