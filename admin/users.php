<?php include "includes/admin_header.php"; ?>
<div class="main-panel">
<div class="card">

        <?php 

            if(isset($_GET['source'])){

            $source=$_GET['source'];

            } else {

            $source= '';

            }
                        
            switch($source) {

                    case 'add_user';
                    include "includes/add_user.php";
                    break;

                    case 'edit_user';
                    include "includes/edit_user.php";
                    break;

                    case '200';
                    echo "NICE 200";
                    break;

                    default:
                        include "includes/view_all_users.php";
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

    <?php include "includes/admin_footer.php"; ?>