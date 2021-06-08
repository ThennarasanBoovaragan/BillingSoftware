<div class="card-body">            
      <h3 class="page-header">
         Update User
      </h3>
<?php 
     
       if(isset($_GET['edit_user'])){
           
        $the_user_id = $_GET['edit_user'];
           
           $query="SELECT * FROM users WHERE user_id = $the_user_id ";
           $select_users=mysqli_query($connection,$query);
                    
             while($row=mysqli_fetch_assoc($select_users)){

                    $user_id =  $row['user_id'];
                    $user_firstname =  $row['user_firstname'];
                    $user_lastname =  $row['user_lastname'];
                    $user_image=$row['user_image'];
                    $user_phone =  $row['user_phone'];
                    $user_email =  $row['user_email'];
                    $user_password =  $row['user_password'];
                    $user_confirmpassword =  $row['user_confirmpassword'];
                    $user_role =  $row['user_role'];
                 
             }
           }

       if(isset($_POST['edit_user'])){
           
            $user_firstname =  $_POST['user_firstname'];
            $user_lastname =  $_POST['user_lastname'];
            $user_image = $_FILES['image']['name'];
            $user_image_tempname = $_FILES['image']['tmp_name'];
            $user_phone=$_POST['user_phone'];
            $user_role =  $_POST['user_role'];        
            $user_email =  $_POST['user_email'];
            $user_password =  $_POST['user_password'];      
            $user_confirmpassword =  $_POST['user_confirmpassword'];  
           
            $user_password = mysqli_real_escape_string($connection,$_POST['user_password']);
            $user_confirmpassword = mysqli_real_escape_string($connection,$_POST['user_confirmpassword']);
            $user_password = md5($user_password);      
            $user_confirmpassword = md5($user_confirmpassword); 
           
         move_uploaded_file($user_image_tempname,"../images/$user_image");
           
         if(empty($user_image)){
            
            $query = "SELECT * FROM users WHERE user_id = $user_id ";
            $select_image = mysqli_query($connection,$query);
                
            while($row = mysqli_fetch_array($select_image)){
                
            $user_image = $row['user_image'];
              
               }
            
          }        
           
            $uppercase = preg_match('@[A-Z]@', $user_password);
            $lowercase = preg_match('@[a-z]@', $user_password);
            $number    = preg_match('@[0-9]@', $user_password);
            $character = preg_match('/[\'^£!$%&*()}{@#~?><>,|=_+-]/', $user_password);

//            if($uppercase && $lowercase && $number && $character) {

            if(strlen($user_password) >= 8) { 
            
         if($user_password==$user_confirmpassword){
             
        if(preg_match("/^[0-9]{10}$/", $user_phone)) {    
             
    $query="UPDATE users SET user_firstname= '{$user_firstname}', user_lastname= '{$user_lastname}',user_image= '{$user_image}', user_phone= '{$user_phone}', user_role= '{$user_role}', user_email= '{$user_email}', user_password= '{$user_password}', user_confirmpassword= '{$user_confirmpassword}' WHERE user_id= {$the_user_id} ";  
                      
        $edit_user_query=mysqli_query($connection,$query);
           
        confirmQuery($edit_user_query);
           
         header("Location:users.php");
            
        }else{
              $message_phone = "Invalid Phone No";        
         }   
  
        }else{
             
           $message_confirm="password did not match";
             
         }
          }else{
              $message_strnpassworad = "password contain atleast 8 characters";
              
       }
            
//         }else{
//              $message_password = "Password must contain a special character";
//            
//       }    
                
       
       }
      

   ?>      
                
   <form action="" method="post" enctype="multipart/form-data">      
       <div class="form-group">
          <img width='100' src ='../images/<?php echo $user_image; ?>' alt="">
          <input type="file" name="image">
       </div>
      
       <div class="row">
          <div class="col-md-6">
             <div class="form-group row">
                <label  class="col-sm-3 col-form-label" for="title">Firstname</label>
                 <div class="col-sm-9">
                   <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" size="115" name="user_firstname">
                 </div>
              </div>
           </div>
        </div>
         <br>
        <div class="row">
           <div class="col-md-6">
              <div class="form-group row">
                 <label  class="col-sm-3 col-form-label" for="title">Lastname</label>
                  <div class="col-sm-9">
                     <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
                  </div>
               </div>
            </div>
         </div>
          <br>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group row">
                  <label  class="col-sm-3 col-form-label" for="user_phone">Phone No</label>
                   <div class="col-sm-9">
                      <input type="no" value="<?php echo $user_phone; ?>" class="form-control" name="user_phone">
                         <h6 class="" style="color:#ff0000"><?php echo $message_phone; ?></h6>
                   </div>
                </div>
             </div>
          </div>  
           <br>
          <div class="row">
             <div class="col-md-6">
                <div class="form-group row">
                   <label  class="col-sm-3 col-form-label" for="user_role">Role</label>
                    <div class="col-sm-9">  
                       <select class="form-control" name="user_role"id="user_role">
            
                       <option value="<?php echo $user_role;?>"><?php echo $user_role; ?></option> 
            
                     <?php 
                            if($user_role == 'admin'){

                                echo "<option value='user'>user</option>";

                            }else{
                                echo "<option value='Super Admin'>Super Admin</option>";
                                echo "<option value='Admin'>Admin</option>";
                                echo "<option value='User'>User</option>";

                            }      

                        ?>

                       </select> 
                    </div>
                 </div>
              </div>
           </div>
            <br>
           <div class="row">
              <div class="col-md-6">
                 <div class="form-group row">
                    <label  class="col-sm-3 col-form-label" for="user_email">Email</label>
                     <div class="col-sm-9">
                        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
                     </div>
                  </div>
               </div>
            </div>
             <br>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group row">
                     <label  class="col-sm-3 col-form-label" for="user_password">Password</label>
                      <div class="col-sm-9">
                         <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
                      </div>
                   </div>
                </div>
             </div>         
                <h6 class="" style="color:#ff0000"><?php echo $message_strnpassworad; ?></h6>
                <h6 class="" style="color:#ff0000"><?php echo $message_password; ?></h6>
              <br>
             <div class="row">
                <div class="col-md-6">
                   <div class="form-group row">
                      <label  class="col-sm-3 col-form-label" for="user_confirmpassword">ConfirmPassword</label>
                       <div class="col-sm-9">
                          <input type="password" value="<?php echo $user_confirmpassword; ?>" class="form-control" name="user_confirmpassword">
                       </div>
                    </div>
                 </div>
              </div>
                 <h6 class="" style="color:#ff0000"><?php echo $message_confirm; ?></h6>
               <br>
              <div class="input-group">
                 <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
              </div>
          </form>       
   </div>  
     
    