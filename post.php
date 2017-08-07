<?php include('include/header.php');  ?>
    <!-- Navigation -->
  <?php include('include/nav.php'); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">


                <!-- Blog Post Content Column -->
                <div class="col-lg-8">
                  <?php
                   if(isset($_GET['id'])){
                    $select_post_id = $_GET['id'];

                     $query = "SELECT * FROM posts WHERE post_id = $select_post_id";
                                   $select_all_post = mysqli_query($conn, $query);
                                   if(!$select_all_post){
                                     die("Query Faild" . mysqli_error($conn));
                                   }
                                   while($row = mysqli_fetch_assoc($select_all_post)){
                                       $post_id = $row['post_id'];
                                       $post_cat_id =  $row['post_cat_id'];
                                       $post_title = $row['post_title'];
                                       $post_author = $row['post_author'];
                                       $post_date = $row['post_date'];
                                       $post_img = $row['post_img'];
                                       $post_content = substr($row['post_content'],0,100);
                                       $post_comment_count = $row['post_comment_count'];
                                       $post_status = $row['post_status'];
                                       $post_tags = $row['post_tags'];
                                     }?>

                    <!-- Blog Post -->
                    <!-- Title -->
                    <h1><?php echo $post_title;  ?></h1>
                    <!-- Author -->
                    <p class="lead">
                        by <a href="#"><?php echo $post_author ; ?></a>
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-responsive" src="images/<?php echo $post_img; ?>" alt="">

                    <hr>

                    <!-- Post Content -->
                    <p class="lead">
                      <?php echo $post_content; ?>
                    </p>

                    <hr>
        <?php     }  ?>
                    <!-- Blog Comments -->


                    <!-- Posted Comments -->

                    <!-- Comment -->
                  <?php include("include/comment.php"); ?>

                </div>



                 <!-- Pager
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->



            <!-- Blog Sidebar Widgets Column -->
            <?php include('include/sidebar.php'); ?>

        </div>
        <!-- /.row -->

        <hr>
<?php include('include/footer.php'); ?>
