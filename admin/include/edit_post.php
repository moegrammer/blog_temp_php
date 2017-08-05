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
 ?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
         <lable for="p_title">Post Title</lable>
         <input type="text" class="form-control" name="p_title"   value="<?php echo $post_title; ?>" />
    </div>

    <div class="form-group">
         <select name="" id="">
           <?php
           $query = "SELECT * FROM categories ";
            $select_query_cat = mysqli_query($conn,$query);
             if(!$query){
                 die("Query Faild " . mysqli_error($conn));
              }else{
                  while($row = mysqli_fetch_assoc($select_query_cat)){
                       $cat_id = $row['cat_id'];
                       $cat_title = $row['cat_title'];
                       echo "<option value=''>{$cat_title}</option>";

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
      <input class="btn btn-primary" type="submit" name="create_post" value="Add Post" />
    </div>



</form>
