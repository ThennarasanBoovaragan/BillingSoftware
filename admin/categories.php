<?php include "includes/admin_header.php"; ?>

 <div class="main-panel">     
    <div class="card">  
       <div class="card-body">    
          <h3 class="page-header">
               Categories
            </h3>

                 
        <div class="row">
           <div class="col-md-4">
              <h6>Add Category</h6>
                <?php insert_categories(); ?>
                 <form action=""method="post" autocomplete="off">
                    <div class="input-group">
                       <input type="text" class="form-control" name="cat_title">
                    </div>
                    <br>
                    <div class="form-group">
                       <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                    </div>
                              
               </form>
                        
                        <?php 
                            //UPDATE AND INCLUDE QUERY
                            
                            if(isset($_GET['edit'])){
                                $cat_id=$_GET['edit'];
                                include "includes/update_categories.php"; 
                            }
                            
                           ?>
                    
                      </div> <!-- Add Category -->

                      <table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th style="color:blue">ID</th>
                                  <th style="color:blue">Category Name</th>
                                  <th style="color:blue">Action</th>
                                  <th style="color:blue">Action</th>
                              </tr>
                          </thead>
                          <tbody>

                        <?php findAllCategories(); ?>
                        <?php deleteCategories(); ?>

               </tbody>
            </table>
         </div>             
      </div>
   </div>
</div>


 <?php include "includes/admin_footer.php"; ?>