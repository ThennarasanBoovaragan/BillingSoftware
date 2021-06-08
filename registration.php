<?php include "includes/db.php"; ?>
<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--  <meta http-equiv="refresh" content="40; url=SignInPage.php">  -->
  <title>Talevent Tech</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

    
    <?php 

     if(isset($_POST['submit'])){
         
         $user_firstname=  $_POST['user_firstname'];
         $user_lastname=  $_POST['user_lastname'];
         $user_phone=  $_POST['user_phone'];
         $email    = $_POST['user_email'];    
         $password = $_POST['user_password'];
         $confirmpassword =$_POST['user_confirmpassword'];
         
         
      if(!empty($email) && !empty($password) && !empty($confirmpassword) && !empty($user_firstname) && !empty($user_lastname) && !empty($user_phone)){
          
      $password = mysqli_real_escape_string($connection,$_POST['user_password']);
      $confirmpassword = mysqli_real_escape_string($connection,$_POST['user_confirmpassword']);
      $password = md5($password);      
      $confirmpassword = md5($confirmpassword);        
     
      if(preg_match('/^[\p{L} ]+$/u', $user_firstname)) {
          
        if(preg_match('/^[\p{L} ]+$/u', $user_lastname)) {
            
            
        $uppercase  = preg_match('@[A-Z]@', $password);
        $lowercase  = preg_match('@[a-z]@', $password);
        $number     = preg_match('@[0-9]@', $password);
        $character  = preg_match('/[\'^£!$%&*()}{@#~?><>,|=_+-]/', $password);
            
//        if($uppercase && $lowercase && $number && $character) {

        if(strlen($password) >= 8) {

        if($password == $confirmpassword){
        
        if(preg_match("/^[0-9]{10}$/", $user_phone)) {   
        
        $query = "INSERT INTO users (user_firstname,user_lastname,user_image,user_phone,user_email,user_password,user_confirmpassword,user_role) ";
        $query .= "VALUES ('{$user_firstname}','{$user_lastname}','profile.jfif','{$user_phone}','{$email}','{$password}','{$confirmpassword}','User') ";
             
        $register_user_query = mysqli_query($connection,$query);
            
            move_uploaded_file($user_image_tempname,"images/$user_image");
      
        if(!$register_user_query) {
            
            die("Query Failed" . mysqli_error($connection) .' '. mysqli_error($connection));
        }
            
          $_SESSION['status'] = "Registration Was Successful Please Sign In";   
            
            header("Location:SignInPage.php"); 
            
          }else{
              $message_phone = "Invalid Phone No";
            
        }
   
          }else{
              $message_cpassworad = "Password Mismatch!";
            
        }
              
          }else{
              $message_strnpassworad = "password contain atleast 8 characters";
              
       }
            

//          }else{
//              $message_password = "Password must contain a special character";
//            
//       } 

            
          }else{
              $message_Lastname ="Only Alphabets are allowed in lastname";
            
       }

          }else{
              $message_Firstname ="Only Alphabets are allowed in firstname";
          
       }
          
          }else{
			  $message = "Fields cannot be Empty";
       }  
         
          }else {         
              $message = ""; 
       }
    
        $file = "data.json";
    $json = json_decode(file_get_contents($file), true);
     $arr_data = array();
  try
  {
	   //Get form data
	   $formdata = array(           
         'user_firstname'=>  $_POST['user_firstname'],
         'user_lastname'=>  $_POST['user_lastname'],
         'user_phone'=>  $_POST['user_phone'],
         'email'    => $_POST['user_email'],    
         'password' => $_POST['user_password'],
         'confirmpassword' => $_POST['user_confirmpassword'],
	   );


	   // Push user data to array
	   array_push($arr_data,$formdata);

       //Convert updated array to JSON
	   $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
	   
	   //write json data into data.json file
	   if(file_put_contents($file, $jsondata)) {
	        echo 'Data successfully saved';
	    }
	   else 
	        echo "error";

   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   }

  ?>
  
    
    
    <!-- Navigation  -->
    
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0"> 
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/logo.svg" alt="logo" class="logo">

              </div>
              <p class="login-card-description">Register your account</p>
        
            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="on">
 
             
                <h6 class="text-center" style="color:#ff0000"><?php echo $message; ?></h6>
            
      
          <div class="form-group">
                <label for="title">Firstname</label>
                <input type="text" class="form-control" name="user_firstname">
          </div>
                <h6 class="text-center" style="color:#ff0000"><?php echo $message_Firstname; ?></h6>
                

            <div class="form-group">
                <label for="title">Lastname</label>
                <input type="text" class="form-control" name="user_lastname">
            </div>
                <h6 class="text-center" style="color:#ff0000"><?php echo $message_Lastname; ?></h6> 
                
             <div class="form-group">
                <label for="phone">Phone no</label>
                <input type="phone no" class="form-control" name="user_phone">
            </div>   
                 <h6 class="text-center" style="color:#ff0000"><?php echo $message_phone; ?></h6> 
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="user_email" id="email" class="form-control" placeholder="somebody@example.com">
            </div>
                
            <div class="form-group">
                 <label for="password">Password</label>
                <input type="password" name="user_password" id="password" class="form-control" placeholder="***********">
            </div>
                <h6 class="text-center" style="color:#ff0000"><?php echo $message_strnpassworad; ?></h6>
                <h6 class="text-center" style="color:#ff0000"><?php echo $message_password; ?></h6>
                

            <div class="form-group mb-4">
                <label for="confirmpassword">ConfirmPassword</label>
                <input type="password" name="user_confirmpassword" id="password" class="form-control" placeholder="***********">
            </div>
                <h6 class="text-center" style="color:#ff0000"><?php echo $message_cpassword; ?></h6>
               
               <span class="input-group-btn">  
                  <input type="submit" name="submit" id="btn-login" class="btn btn-block login-btn mb-4" value="Register">
              </span>
                
        </form> 
                <p class="login-card-footer-text">Already have an account? <a href="SignInPage.php" class="text-reset">Sign In</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </main> 
</body>
</html>

		

