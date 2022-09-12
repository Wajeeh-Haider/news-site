<!doctype html>
<html lang="en">
  <head>
    <title>Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <style>
  hr{
      height: 2px;
      background: #000;
  }
  </style>
  <body>
     <?php include "include/main-page-header.php" ?>
     <div class="container mt-5 pt-5 mb-5">
    <div class="row">
      <div class="col-md-8">
      <?php 
        include "include/config.php";
             $catid = $_GET['cid'];
             $sql1 = "SELECT * FROM category Where cat_id = '{$catid}'";
             $result1 = mysqli_query($con,$sql1);
                $row1 =  mysqli_fetch_assoc($result1);
      ?>
      <h3><?php echo $row1 ['category_name']?></h3>
      <hr>
      <?php 
      ?>
      <?php 
        include "include/config.php";
        $cat_id = $_GET['cid'];
        $sql = "SELECT * FROM post
         LEFT JOIN category ON `post`.`category` = `category`.`cat_id` 
          LEFT JOIN `user-table` ON `post`.`author` = `user-table`.`user_id` Where category = '{$cat_id}' ORDER BY `post`.`post_id` DESC ;";
            $result =  mysqli_query($con , $sql);
        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="row mt-5">
              <div class="col-md-4">
                <img src="admin/images/<?php echo $row['post_img'] ?>" class="w-100" height="200px" alt="">
              </div>
              <div class="col-md-8">
              <h3 class=" font-weight-bold text-decoration-none text-info"><?php echo $row['title'] ?></h3>
                <i class="fa fa-address-book-o text-info"> <span class="text-muted"><?php echo $row['name'] ?></span></i>
                <a href="category.php?cid=<?php echo $row['cat_id']  ?>">  <i class="fa fa-tags text-info"> <span class="text-muted"><?php echo $row['category_name'] ?></span></i></a>

                <i class="fa fa-tag text-info"> <span class="text-muted"><?php echo $row['post_date'] ?></span></i>
                <p class="text-muted"><?php echo substr($row['description'], 0,200).'...' ?></p>
                <a href="single-page.php?post_id=<?php echo $row['post_id']?>" class="btn float-right text-primary">Read More &#187;</a>
              
              </div>
            </div>
                 <?php 
                  }
                }
                 ?> 
      </div>
      <!-- sidebar -->
      <div class="col-md-4">
        <?php include "include/side-bar.php" ?>
      </div>

    </div>


  </div>

  <?php include "include/footer.php" ?>
  
  
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</html>