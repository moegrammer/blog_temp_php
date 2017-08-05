
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



                             <?php Selet_all_post_table() ;

                                    if(isset($_GET['delete'])){
                                      $delet_post_id =  $_GET['delete'];

                                      $query = "DELETE FROM posts WHERE post_id = {$delet_post_id} ";
                                      $delete_query = mysqli_query($conn, $query);
                                       if(!$delete_query){
                                         die("Query Faild" . mysqli_error($conn));
                                       }else{
                                         header("Location: post.php");
                                       }
                                    }


                             ?>



                            </tbody>
                        </table>
