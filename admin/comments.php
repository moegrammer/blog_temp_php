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
                     <?php

                        if(isset($_GET['sorce'])){
                            $sorce = $_GET['sorce'];
                        }else{
                            $sorce = '';
                        }

                        switch($sorce){
                            case 'add_post';
                           include "include/add_post.php";
                            break;

                            case 'edit_post';
                            include "include/edit_post.php";
                            break;


                            default:

                            include "include/view_all_comments.php";
                            break;

                        }




                     ?>

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
