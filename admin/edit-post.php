<!doctype html>
<html lang="en">
<head>
  <title>Add Post</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../links/bootstrap.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Update POST</h3>
          </div>
          <div class="card-body">
            <?php
            include("../include/config.php");
            $post_id = $_GET['edit_post'];
            $sql = "SELECT post.category , post.post_img , post.post_id ,
            post.title , post.description , category.cat_id
             FROM post 
             LEFT JOIN category ON `post`.`category` = `category`.`cat_id` 
            LEFT JOIN `user-table` ON `post`.`author` = `user-table`.`user_id`
            Where post_id = '{$post_id}'";
            if($result = mysqli_query($con,$sql) or die("Query Failed")){
                while($row = mysqli_fetch_assoc($result)){
            ?>
          <form action="update-post.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="">Title</label>
                <input type="hidden" name="postid" value="<?php echo $row['post_id'] ?>">
                <input type="text" name="post_titlee" class="form-control" value="<?php echo $row['title'] ?>" placeholder="Title">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea type="text" name="description" value="" class="form-control" rows="4" placeholder="Description"><?php echo $row['description'] ?></textarea>
              </div>
              <div class="form-group">
                <label for="">Category</label>
                <select name="category" class="form-control">
                  <option >Select</option>
                  <?php
                  include("../include/config.php");
                  $sql1 ="SELECT * FROM category";
                  $result1 = mysqli_query($con,$sql1)or die("Query Failed");
                  if(mysqli_num_rows($result1) > 0) {
                    while($row1 = mysqli_fetch_assoc($result1)){
                      if($row['category'] == $row['cat_id']){
                        $selected = 'selected';
                      }
                      else{
                        $selected = ""; 
                      }
                      echo "<option {$selected} value='{$row1['cat_id']}'>{$row1['category_name']}</option>";
                    }
                  }
                   ?>
                  </select>
              </div>
              <div class="form-group">
                <label for="">Image</label> <br>
                <input type="file" name="image" id="" placeholder=""><br>
                <img src="images/<?php echo $row['post_img']?>" alt="Image" height="200px">
                <input type="hidden" name="old_img" value="<?php echo $row['post_img']?>" > 
              </div>
              <button class="btn btn-primary mt-1" name="update-post">Update Post</button>
            </form>
            <?php 
            
        }
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