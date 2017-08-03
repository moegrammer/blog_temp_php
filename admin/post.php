<?php include('include/admin_header.php'); ?>
    <div id="wrapper">

        <!-- Navigation -->
      <?php include("include/admin_nav.php"); ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts page
                            <small>Subheading</small>
                        </h1>

                        <table class="table table-hover" >
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <?php
                                 $query = "SELECT * FROM posts";
                                    $select_all_post = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_assoc($select_all_post)){
                                        $post_id = $row['post_id'];
                                        $post_cat_id =  $row['post_cat_id'];
                                        $post_title = $row['post_title'];
                                        $post_author = $row['post_author'];
                                        $post_date = $row['post_date'];
                                        $post_img = $row['post_img'];
                                        $post_content = $row['post_content'];
                                        $post_comment_count = $row['post_comment_count'];
                                        $post_status = $row['post_status'];
                                        $post_tags = $row['post_tags']; ?>
                                       <tr>
                                        <td><?php echo $post_id ; ?></td>
                                         <td><?php echo $post_author ; ?></td>
                                         <td> <?php echo $post_title ?></td>

                                         <?php
                                           $query = "SELECT * FROM categories WHERE cat_id = $post_cat_id ";
                                             if(!$query){
                                                 die("Query Faild" . mysqli_error($conn));
                                             }
                                                 $select_all_cat_by_id = mysqli_query($conn,$query);
                                                 while ($row = mysqli_fetch_assoc($select_all_cat_by_id)){
                                                     $cat_id = $row['cat_id'];
                                                      $cat_title = $row['cat_title'];?>
 <td><?php $cat_title ; ?></td>
                                             <?php    }  ?>
                                            
                                             
                                         
                                        
                                        
                                         <td><?php $post_status ; ?></td>
                                         <td><img src='image/<?php echo $post_img ; ?>'></td>
                                         <td><?php echo $post_tags ?></td>
                                         <td><?php echo $post_comment_count ?></td>
                                         <td><?php echo $post_date ;?></td>
                                         </tr>

                             <?php  } ?>
                                   
                                  
                                
                            </tbody>
                        </table>



                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include ("include/admin_footer.php"); ?>