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

                    case 'add_supplier';
                    include "includes/add_supplier.php";
                    break;

                    case 'edit_supplier';
                    include "includes/edit_supplier.php";
                    break;

                    case '200';
                    echo "NICE 200";
                    break;

                    default:
                        include "includes/view_all_suppliers.php";
                        break;

                    }

        ?>

                    </div>
                </div>
                

    <?php include "includes/admin_footer.php"; ?>