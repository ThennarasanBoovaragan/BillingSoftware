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

                    case 'add_stock';
                    include "includes/add_stock.php";
                    break;

                    case 'edit_stock';
                    include "includes/edit_stock.php";
                    break;

                    case '200';
                    echo "NICE 200";
                    break;

                    default:
                        include "includes/stock_list.php";
                        break;

                    }

        ?>

                    </div>
                </div>


    <?php include "includes/admin_footer.php"; ?>