<?php
  if(isset($_POST['submit'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $comment = $_POST['content'];
     $date = date('d-m-y');

      $query = "INSERT INTO comments(com_post_id, com_author, com_email, com_content, com_date) ";
      $query .= "VALUES('{$select_post_id}', '{$name}', '{$email}', '{$comment}', now() ) ";

      $add_comment_query = mysqli_query($conn,$query);

      if(!$add_comment_query){
        die("Query Faild" . mysqli_error($conn));
      }else{
        echo "<div class='alert alert-success' role='alert'>Well done! You successfully Added  the Comment</div>";
        header( "refresh:0.5;url=post.php?id={$select_post_id}" );
      }
  }

?>

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" action="" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" />
        </div>


        <div class="form-group">
            <label for="content">Comment</label>
            <textarea class="form-control" rows="3" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<hr>
<!-- Comment -->
<?php
$query = "SELECT * FROM comments WHERE com_post_id = $select_post_id";
              $select_all_comment = mysqli_query($conn, $query);
              while($row = mysqli_fetch_assoc($select_all_comment)){
                   $com_id = $row['com_id'];
                   $com_post_id = $row['com_post_id'];
                   $com_author = $row['com_author'];
                   $com_email = $row['com_email'];
                   $com_content = $row['com_content'];
                   $com_status = $row['com_status'];
                   $com_date = $row['com_date'];?>




<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $com_author; ?>
            <small><?php echo $com_date; ?></small>
        </h4>
         <?php echo $com_content; ?>
    </div>
</div>
<hr>
<?php }?>
