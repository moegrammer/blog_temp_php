<?php
   if(isset($_GET['p_id'])){
      $edit_id =  $_GET['p_id'];
   }

$query = "SELECT * FROM posts WHERE post_id = '{$edit_id}' ";
              $select_post_by_id = mysqli_query($conn, $query);
              while($row = mysqli_fetch_assoc($select_post_by_id)){
                  $post_id = $row['post_id'];
                  $post_cat_id =  $row['post_cat_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_img = $row['post_img'];
                  $post_content = $row['post_content'];
                  $post_comment_count = $row['post_comment_count'];
                  $post_status = $row['post_status'];
                  $post_tags = $row['post_tags'];
}
if(isset($_POST['update_post'])){

  $title = $_POST['p_title'];
  $author = $_POST['p_author'];
  $cat_id = $_POST['p_cat'];
  $status = $_POST['p_status'];

  $img = $_FILES['p_img']['name'];
  $img_temp = $_FILES['p_img']['tmp_name'];

  $tags = $_POST['p_tags'];
  $content = $_POST['p_content'];

    move_uploaded_file($img_temp, "../images/$img");

      if(empty($img)){
        $query = "SELECT * FROM posts WHERE post_id = $edit_id ";
         $select_img = mysqli_query($conn,$query);

         while($row = mysqli_fetch_array($select_img)){
           $img = $row['post_img'];
         }

      }

    $query = "UPDATE posts SET ";
    $query .="post_title = '{$title}', ";
    $query .="post_cat_id = '{$cat_id}', ";
    $query .="post_date = now(), ";
    $query .="post_status = '{$status}', ";
    $query .= "post_author = '{$author}', ";
    $query .= "post_tags = '{$tags}', ";
    $query .= "post_content = '{$content}', ";
    $query .= "post_img = '{$img}' ";
    $query .= "WHERE post_id = {$edit_id} ";

    $edit_post_query = mysqli_query($conn,$query);
     if(!$edit_post_query){
       die("Query Faild" . mysqli_error($conn));
     }else{
       echo "<div class='alert alert-success' role='alert'>Well done! You successfully edite the psot</div>";
       header( "refresh:0.5;url=post.php" );
     }

}


 ?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
         <lable for="p_title">Post Title</lable>
         <input type="text" class="form-control" name="p_title"   value="<?php echo $post_title; ?>" />
    </div>

    <div class="form-group">
         <select name="p_cat" id="">
           <?php
           $query = "SELECT * FROM categories ";
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
         <input type="text" class="form-control" name="p_author" value="<?php echo $post_author; ?>" />
    </div>

    <div class="form-group">
         <lable for="p_status">Post Status</lable>
         <input type="text" class="form-control" name="p_status" value="<?php echo $post_status; ?>" />
    </div>


    <div class="form-group">
         <img width="100" src="../images/<?php echo $post_img ;?>" />

         <input type="file" name="p_img" />
    </div>

    <div class="form-group">
         <lable for="p_tags">Post Tags</lable>
         <input type="text" class="form-control" name="p_tags" value="<?php echo $post_tags; ?>" />
    </div>

    <div class="form-group">
         <lable for="p_content">Post Content</lable>
        <textarea class="form-control" name="p_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>

    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="update_post" value="Add Post" />
    </div>



</form>
