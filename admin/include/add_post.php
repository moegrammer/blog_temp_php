<?php
   if(isset($_POST['create_post'])){
     $title = $_POST['p_title'];
     $author = $_POST['p_author'];
     $cat_id = $_POST['p_cat'];
     $status = $_POST['p_status'];

     $img = $_FILES['p_img']['name'];
     $img_temp = $_FILES['p_img']['tmp_name'];

     $tags = $_POST['p_tags'];
     $content = $_POST['p_content'];
     $date = date('d-m-y');
     $comment_count = 4;

        move_uploaded_file($img_temp, "../images/$img");

        $query = "INSERT INTO posts(post_cat_id, post_title, post_author, post_date, post_img, post_content, post_tags, post_comment_count, post_status) ";
        $query .= "VALUES( '{$cat_id}', '{$title}', '{$author}', now(), '{$img}', '{$content}', '{$tags}', '{$comment_count}', '{$status}' ) ";

          $create_post_query = mysqli_query($conn,$query);

          if(!$create_post_query){
            die("Query Faild" . mysqli_error($conn));
          }else{
            echo "<div class='alert alert-success' role='alert'>Well done! You successfully Added  the psot</div>";
            header( "refresh:0.5;url=post.php" );
          }

   }


?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
         <lable for="p_title">Post Title</lable>
         <input type="text" class="form-control" name="p_title" />
    </div>

    <div class="form-group">
         <select name="p_cat" id="">
           <?php
           $query = "SELECT * FROM categories";
            $select_query_cat = mysqli_query($conn,$query);
             if(!$query){
                 die("Query Faild " . mysqli_error($conn));
              }else{
                  while($row = mysqli_fetch_assoc($select_query_cat)){
                       $cat_id = $row['cat_id'];
                       $cat_title = $row['cat_title'];
                       echo "<option value='$cat_id' >{$cat_title}</option>";

                  }
              }



           ?>

         </select>
    </div>




    <div class="form-group">
         <lable for="p_author">Post Author</lable>
         <input type="text" class="form-control" name="p_author" />
    </div>

    <div class="form-group">
         <lable for="p_status">Post Status</lable>
         <input type="text" class="form-control" name="p_status" />
    </div>


    <div class="form-group">
         <lable for="p_img">Post Image</lable>
         <input type="file" name="p_img" />
    </div>

    <div class="form-group">
         <lable for="p_tags">Post Tags</lable>
         <input type="text" class="form-control" name="p_tags" />
    </div>

    <div class="form-group">
         <lable for="p_content">Post Content</lable>
        <textarea class="form-control" name="p_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_post" value="Add Post" />
    </div>



</form>
