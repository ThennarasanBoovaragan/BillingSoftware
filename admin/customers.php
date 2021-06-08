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

                    case 'add_customer';
                    include "includes/add_customer.php";
                    break;
//
                    case 'edit_customer';
                    include "includes/edit_customer.php";
                    break;

                    case '200';
                    echo "NICE 200";
                    break;

                    default:
                        include "includes/view_all_customers.php";
                        break;

                    }

        ?>

                    </div>
                </div>
                

    <?php include "includes/admin_footer.php"; ?>