<?php include "includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Talevent Tech</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body> 
  <?php session_start(); ?>
<?php include "db.php"; ?>

<?php
    
    if(isset($_REQUEST['submit'])){
         
        $email    = $_REQUEST['email'];
        $password = $_REQUEST['password'];
                        
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $password = md5($password);  
    
        $query = "SELECT * FROM users WHERE user_email = '{$email}' ";
        $select_user_query = mysqli_query($connection, $query);
        
        if(!$select_user_query){
            
            die("Query Failed" . mysqli_error($connection));
            
        }
          
          while($row = mysqli_fetch_array($select_user_query)){
              
               $db_id = $row['user_id'];
               $db_user_email = $row['user_email'];
               $db_user_password = $row['user_password'];
               $db_user_firstname = $row['user_firstname'];
               $db_user_lastname = $row['user_lastname'];
               $db_user_image = $row['user_image'];
               $db_user_role = $row['user_role'];
              
          }
        
        
        if($email === $db_user_email){
        if($password === $db_user_password){
     
            
             $_SESSION['email'] = $db_user_email;
             $_SESSION['firstname'] = $db_user_firstname;
             $_SESSION['lastname'] = $db_user_lastname;
             $_SESSION['image'] = $db_user_image;
             $_SESSION['user_role'] = $db_user_role;

             header("Location: ../code/admin");
           
        }else{
            
            $message_password = "Incorrect password";
        }
         
        }else{
            $message_email = "Invalid email";   
              
        }
        
        }
    
    $file = "data_login.json";
    $json = json_decode(file_get_contents($file), true);
     $arr_data = array();
  try
  {
	   //Get form data
	   $formdata = array(           
         'email'=>  $_POST['email'],
         'password'=>  $_POST['password'],
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
              <p class="login-card-description">Sign in into your account</p>
              
               <h5  style="color:darkgreen"> 
               <?php
                
                if(isset($_SESSION['status'])){
                    
                    echo $_SESSION['status'];
                }
                
                ?>
                </h5>
                
                <form action=""method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email address">
                </div>
                    <h6 class="text-center" style="color:#ff0000"><?php echo $message_email; ?></h6> 
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="***********">
                      
                  </div>
                     <h6 class="text-center" style="color:#ff0000"><?php echo $message_password; ?></h6> 
                
                  
                  <span class="input-group-btn">
                        <button class="btn btn-block login-btn mb-4" name="submit" type="submit" id ="submit">login</button>
                  </span>
                </form>
                
                
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="registration.php" class="text-reset">Register here</a></p>
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
    
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
