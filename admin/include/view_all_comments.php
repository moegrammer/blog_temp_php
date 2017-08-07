
                        <table class="table table-hover" >
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Post Title</th>
                                    <th>Comment</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date</th>

                                </tr>
                            </thead>
                            <tbody>



                             <?php Selet_all_comments_table() ;

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
