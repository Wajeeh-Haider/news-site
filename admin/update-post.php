<?php 
           if(empty($_FILES['image']['name'])){
            $file_name=$_POST['old_img'];
        }else{
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
                move_uploaded_file($file_tmp,"images/".$file_name);
             }else{
                print_r($errors);
             }
          }  
        
            include("../include/config.php");


            $postid = mysqli_real_escape_string($con, $_POST['postid']);
            $title = mysqli_real_escape_string($con, $_POST['post_titlee']);
            $description = mysqli_real_escape_string($con, $_POST['description']);
            $category = mysqli_real_escape_string($con, $_POST['category']);
            $sql = "UPDATE `post` SET title = '{$title}',description='{$description}',category='{$category}',post_img ='{$file_name}' WHERE post_id = '{$postid}'";
            if (mysqli_query($con,$sql)) {
               header("Location:post.php");


            }
            else{
               echo "Query Failed";

            }
      
        
?>