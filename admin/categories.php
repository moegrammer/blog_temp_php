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
                            Blank Page
                            <small>Subheading</small>
                        </h1>


                        <div class='col-xs-6'>

                        <?php insert_categories() ;?>


                            <form action="" method="post">
                              <div class="form-group">
                             
                                <label for="cat_title">Category Name</label>
                                <input type="text" name="cat_title" class="form-control">
                              </div>
                              <div class="form-group">
                                <input type="submit"  name="submit" value="Add Category" class="btn btn-primary">
                              </div>
                            
                            
                            </form>

                             <?php 
                                      if(isset($_GET['edit'])){
                                        $cat_id = $_GET['edit'];

                                        $query = "SELECT * FROM categories WHERE cat_id  =  $cat_id ";
                                         $select_query_cat = mysqli_query($conn,$query);
                                          if(!$query){
                                              die("Query Faild " . mysqli_error($conn));
                                           }else{
                                               while($row = mysqli_fetch_assoc($select_query_cat)){
                                                    $cat_id = $row['cat_id'];
                                                    $cat_title = $row['cat_title'];
                                               }
                                           }


                                            if(isset($_POST['update'])){

                                    $a_cat_title = $_POST['a_cat_title'];
                                     if($a_cat_title == " " || empty($a_cat_title)){
                                    echo "This faield should be empty";
                                   }else{
                                    
                                         $query = "UPDATE categories SET cat_title = '{$a_cat_title}' WHERE cat_id = {$cat_id} ";
                                        

                                         $update_query = mysqli_query($conn, $query);
                                          if(!$update_query){
                                              die("Query Faild" . mysqli_error($conn));
                                          }else{
                                               header("Location: categories.php");
                                           }
                                     }
                              }


                                      ?>
                                     <form action="" method="post">
                                            <div class="form-group">
                                            
                                                <label for="cat_title">Category Name</label>
                                                <input type="text" name="a_cat_title" class="form-control" value='<?php echo  $cat_title ;  ?>'>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit"  name="update" value="Update Category" class="btn btn-primary">
                                            </div>

                                    </form>
                               <?php }   ?>
                             
                          
                            
                        
                        </div>
                        <div class="col-xs-6">
                           <table class="table table-hover">
                               <thead>
                                   <tr>
                                       <th>Id</th>
                                       <th>Category Name</th>
                                   </tr>
                               </thead>
                               <tbody>

                              <?php  selet_all_categories() ;  
                                     delete_CategoriesById() ;
                                 ?>
                           
                                  
                               </tbody>
                           </table>
                        </div>
                        
                       
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