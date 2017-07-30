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
                         <?php 
                           if(isset($_POST['submit'])){
                                $cat_title = $_POST['cat_title'];

                                if($cat_title == " " || empty($cat_title)){
                                    echo "This faield should be empty";
                                }else{
                                   $query = "INSERT INTO categories(cat_title) ";
                                   $query .="VALUE('{$cat_title}') ";

                                   $create_cat_query = mysqli_query($conn,$query);
                                    if(!$create_cat_query){
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
                                <input type="text" name="cat_title" class="form-control">
                              </div>
                              <div class="form-group">
                                <input type="submit"  name="submit" value="Add Category" class="btn btn-primary">
                              </div>
                            
                            
                            </form>

                             <?php 
                                if(isset($_GET['edit'])){?>


                                     <form action="" method="post">
                                            <div class="form-group">
                                            
                                                <label for="cat_title">Category Name</label>
                                                <input type="text" name="cat_title" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit"  name="update" value="Add Category" class="btn btn-primary">
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

                              <?php
          
                                 $query = "SELECT * FROM categories";
                                 $select_all_cat = mysqli_query($conn,$query);
                                 if(!$select_all_cat){
                                     die("Query Faild" . mysqli_error($conn));
                                 }
                                 while($row = mysqli_fetch_assoc($select_all_cat) ){
                                     $cat_id = $row['cat_id'];
                                     $cat_title = $row['cat_title'];

                                     echo "<tr>
                                             <td>{$cat_id}</td>
                                             <td>{$cat_title}</td>
                                             <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                                              <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
                                          </tr>";
                                 }
                              
                              
                               ?>
                               <?php
                                      if(isset($_GET['delete'])){
                                         $delet_cat_id = $_GET['delete'];

                                         $query = "DELETE FROM categories WHERE cat_id = {$delet_cat_id} ";
                                         $delet_query = mysqli_query($conn,$query);
                                           if(!$delet_cat_id){
                                               die("Query Faild" . mysqli_error($conn));
                                           }else{
                                               header("Location: categories.php");
                                           }
                                      }
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