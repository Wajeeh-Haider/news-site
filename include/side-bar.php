<div class="search-div p-3 shadow-lg" >
<label for="" class="pl-2">Search</label>
<div class="input-group">
<form action="search.php"method="GET" class="form-inline">
<input type="text" name="search" class="form-control" placeholder="Search">
<button  class="btn btn-primary btn-sm">Search <i class="fa fa-search text-white"></i></button>
</form>
  </div>

</div>
  <div class="search-div p-3 shadow-lg">
  
  <h4 class="font-weight-light mt-3">Recent Posts</h4>
  <?php
        include "include/config.php";
        $limit = 3 ;
        $sql = "SELECT `post`.`post_img` , `post`.`post_id` , `post`.`title` , `post`.`description`,`user-table`.`name`,`category`.`category_name`,`category`.`cat_id`, `post`.`post_date` , `post`.`author` From `post` 
          LEFT JOIN category ON `post`.`category` = `category`.`cat_id` 
          LEFT JOIN `user-table` ON `post`.`author` = `user-table`.`user_id` ORDER BY `post`.`post_id` DESC LIMIT {$limit}";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
          while ($row  = mysqli_fetch_assoc($result)) {
      ?>
  <div class="row mt-3">
  <div class="col-md-4 ">
                <img src="admin/images/<?php echo $row['post_img'] ?>" class="w-100" height="100px" alt="">
              </div>
              <div class="col-md-8">
              <a href="single-page.php?post_id=<?php echo $row['post_id']?>" class="text-decoration-none text-info"><h3 class=" font-weight-bold"><?php echo $row['title'] ?></h3></a>
              <a href="category.php?cid=<?php echo $row['cat_id']  ?>">  <i class="fa fa-tags text-info"> <span class="text-muted"><?php echo substr($row['category_name'], 0,8),'...'  ?></span></i></a>
                <i class="fa fa-tag text-info"> <span class="text-muted"><?php echo $row['post_date'] ?></span></i>
                <a href="single-page.php?post_id=<?php echo $row['post_id']?>" class="btn float-right text-primary">Read More &#187;</a>
            
              </div>
  </div>
  <?php
          }
        }
        ?>
  </div>


  </div>