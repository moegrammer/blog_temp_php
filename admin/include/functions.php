<?php
include('../include/db.php');
function insert_categories(){
 global $conn;
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
                         

}

//////////////////////////////////////////////////////////////////////////////////

function selet_all_categories(){
    global $conn;
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
}

//////////////////////////////////////////////////////////////////////////////////
function delete_CategoriesById(){
     global $conn;
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
}

//////////////////////////////////////////////////////////////////////////////////
function Selet_all_post_table(){
    global $conn;
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
                        $post_tags = $row['post_tags'];

                                   echo "<tr>
                                        <td>{$post_id}</td>
                                         <td>{$post_author}</td>
                                         <td>{$post_title}</td>
                                         <td>{$post_cat_id}</td>
                                         <td>{$post_status}</td>
                                         <td><img class='img-responsive' src='images/{$post_img}'></td>
                                         <td>{$post_tags}</td>
                                         <td>{$post_comment_count}</td>
                                         <td>{$post_date}</td>
                                         </tr>" ;

                    }

}
//////////////////////////////////////////////////////////////////////////////////
?>