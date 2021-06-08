 <?php include "includes/admin_header.php"; ?>
<div class="main-panel">
   <div class="card">
      <div class="card-body">
       
                <!-- Page Heading -->
                        <h3 class="page-header" style="color:black"> 
                           Profile:
                            <small>
                        <h3  style="color:#1e90ff"> 
<?php 
                             if(isset($_SESSION['firstname'])){ 
                             echo $_SESSION['firstname'];   
                             } 
                    ?>
                    </h3> </small>
                        </h3>
            <button class="btn btn-default" style="float: right; width:70px; background-color: #adff2f;" name="submit"><a href="edit_profile.php">Edit</a></button>

         
                <?php
                    
                    if(isset($_SESSION['firstname'])){
        
                     $user_firstname =  $_SESSION['firstname'];       
        
     $query="SELECT * FROM users WHERE user_firstname = '{$user_firstname}' ";
     $select_user_profile = mysqli_query($connection,$query);
                        
             ?>
       
        <?php            
                        
         while($row=mysqli_fetch_array($select_user_profile)){

                $user_id=$row['user_id'];
                $email=$row['user_email'];
                $user_password=$row['user_password'];
                $user_confirmpassword=$row['user_confirmpassword'];
                $user_phone=$row['user_phone'];
                $user_firstname=$row['user_firstname'];
                $user_lastname=$row['user_lastname'];
                $user_role=$row['user_role'];
                $user_image=$row['user_image'];
                
               }
             }

      ?>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6"> 
                     <img class="rounded-circle" height=150 width=150 src ='../images/<?php echo $_SESSION['image'] ?>' alt="">
                  </div>          
               </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                   <label class="col-sm-3 col-form-label" for="title">First Name:</label>
                    <div class="col-sm-9">
                      <label class="col-sm-3 col-form-label" for="title"><?php echo $user_firstname ?></label>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group row">
                     <label class="col-sm-3 col-form-label" for="title">Last Name:</label>
                     <div class="col-sm-9">
                        <label class="col-sm-3 col-form-label" for="Product_type"><?php echo $user_lastname ?></label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group row">
                     <label class="col-sm-3 col-form-label" for="email">E-mail:</label>
                     <div class="col-sm-9">
                        <label class="col-sm-6 col-form-label" for="Product_type"><?php echo $email ?></label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group row">
                     <label class="col-sm-3 col-form-label" for="Phone no">Phone no:</label>
                     <div class="col-sm-9">
                        <label class="col-sm-3 col-form-label" for="Product_type"><?php echo $user_phone ?></label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group row">
                     <label class="col-sm-3 col-form-label" for="role"> Role:</label>
                     <div class="col-sm-9">
                        <label class="col-sm-3 col-form-label" for="Product_type"><?php echo $user_role ?></label>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    </div>   
</div>
    <?php include "includes/admin_footer.php"; ?>
                    
                    