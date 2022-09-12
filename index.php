<!doctype html>
<html lang="en">

<head>
  <title>News</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <?php include "include/main-page-header.php" ?>
  <div class="container mt-5 pt-5">
    <div class="row">
      <div class="col-md-8">
        <?php
        include "include/config.php";
        $limit = 4 ;
        if(isset($_GET['pages'])){
            $page = $_GET['pages'];
        }else{
            $page=1;
        }
        $offset = ($page - 1) * $limit;
        $sql = "SELECT `post`.`post_img` , `post`.`post_id` , `post`.`title` , `post`.`description`,`user-table`.`name`,`category`.`category_name`, `post`.`post_date` , `post`.`author` , category.cat_id From `post` 
          LEFT JOIN category ON `post`.`category` = `category`.`cat_id` 
          LEFT JOIN `user-table` ON `post`.`author` = `user-table`.`user_id` ORDER BY `post`.`post_id` DESC LIMIT {$offset},{$limit}";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
          while ($row  = mysqli_fetch_assoc($result)) {
        ?>
            <div class="row mt-5">
              <div class="col-md-4 ">
                <img src="admin/images/<?php echo $row['post_img'] ?>" class="w-100 view overlay z-depth-1-half" height="200px" alt="">
              </div>
              <div class="col-md-8">
              <a href="single-page.php?post_id=<?php echo $row['post_id']?>" class="text-decoration-none text-info"><h3 class=" font-weight-bold"><?php echo $row['title'] ?></h3></a>
              <a href="author.php?author_id=<?php echo $row['author']  ?>">  <i class="fa fa-address-book-o text-info"> <span class="text-muted"><?php echo $row['name'] ?></span></i></a>
              <a href="category.php?cid=<?php echo $row['cat_id']  ?>">  <i class="fa fa-tags text-info"> <span class="text-muted"><?php echo $row['category_name'] ?></span></i></a>
                <i class="fa fa-tag text-info"> 
                <span class="text-muted"><?php echo $row['post_date'] ?></span></i>
                <p class="text-muted"><?php echo substr($row['description'], 0,200).'...' ?></p>
                <a href="single-page.php?post_id=<?php echo $row['post_id']?>" class="btn float-right text-primary">Read More &#187;</a>
              
              </div>
            </div>
            <hr style="height: 1px; background-color:gray">

        <?php
          }
        }
       $sqli = "SELECT * FROM `post`";
                    $result1 = mysqli_query($con,$sqli) or die(mysqli_error( $sqli));
                    if(mysqli_num_rows($result1)> 0){
                        $total_rec = mysqli_num_rows($result1);
                        $limit = 4 ;
                        $total_page = ceil($total_rec/$limit);
                      
                        echo '<ul class="pagination justify-content-center">';
                        if($page > 1){
                        echo '<a href="index.php?pages='.($page -1) .'"  class="btn btn-outline-primary"><li>Prev</li></a>';
                            
                        }

                        for($i=1; $i<= $total_page; $i++){
                            if($i==$page){
                                $active = "active";
                            }
                            else{
                                $active = "";
                            }
                            echo '<li class="'.$active.' page-item"><a href="index.php?pages='.$i.'" class="page-link">'.$i.'</a></li>';
                        };
                        if($page <  $total_page){
                            echo '<a  href="index.php?pages='.($page + 1) .'"  class="btn btn-outline-primary"><li>Next</li></a>';

                        }
                        echo '</ul>';
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