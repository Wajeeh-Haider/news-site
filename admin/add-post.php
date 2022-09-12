<!doctype html>
<html lang="en">
<head>
  <title>Add Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Add POST</h3>
          </div>
          <div class="card-body">

           <?php 
          if(isset($_FILES['image'])){
          $errors= array();
           $file_name = $_FILES['image']['name'];
           $file_size =$_FILES['image']['size'];
           $file_tmp =$_FILES['image']['tmp_name'];
           $file_type=$_FILES['image']['type'];
           $ext = explode('.',$file_name);
           $file_ext=strtolower(end($ext));

          //  $coverpic = rand(1000,1000000).".".$file_ext;
           
           $extensions= array("jpeg","jpg","png");
           
           if(in_array($file_ext,$extensions) === false){
              $errors[]="extension not allowed, please choose a JPEG or PNG file.";
           }
           
           if($file_size > 2097152){
              $errors[]='File size must be excately 2 MB';
           }
           if(empty($errors) == false){
            echo "Image Cant Uploaded";
         }
           if(empty($errors) == true){
              move_uploaded_file($file_tmp,"images/".$file_name );
           }else{
              print_r($errors);
           }
        }
     
            if(isset($_POST['add_post'])){
            session_start();
            include("../include/config.php");
            $title = mysqli_real_escape_string($con,$_POST['post_title']);
            $description = mysqli_real_escape_string($con,$_POST['description']);
            $category  = mysqli_real_escape_string($con,$_POST['category']);
            $date = date("d M, Y");
            $author =$_SESSION['user_id'];
            
            $sql = "INSERT INTO `post`(`title`,`description`,`category`,`post_date`,`author`,`post_img`) VALUES ('{$title}','{$description}','{$category}','{$date}','{$author}','{$file_name}');";
            $sql .="UPDATE category SET post = post + 1 WHERE cat_id = '{$category}'";
            if(mysqli_multi_query($con,$sql) or die("Query Failed")){ 
              header("location:post.php");
            }
        }
            ?>

          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="post_title"  class="form-control" placeholder="Title">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea type="text" name="description"  class="form-control" rows="4" placeholder="Description"></textarea>
              </div>
              <div class="form-group">
                <label for="">Category</label>
                <select name="category" class="form-control">
                  <option selected disabled>Select</option>
                  <?php
                  include("../include/config.php");
                  $sql ="SELECT * FROM category";
                  $result = mysqli_query($con,$sql)or die("Query Failed");
                  if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                      echo "<option value='{$row['cat_id']}'>{$row['category_name']}</option>";
                    }
                  }
                   ?>
                  </select>

              </div>
              <div class="form-group">
                <label for="">Image</label> <br>
                <input type="file" name="image" id="" placeholder="">
              </div>
              <button class="btn btn-primary mt-1" name="add_post">Add Post</button>
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