<?php session_start(); ?>
<?php include "db.php"; ?>


<?php

    if(isset($_REQUEST['submit'])){
        
        $email    = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        
//        $email=mysqli_real_escape_string($connection, $email);
//        $password=mysqli_real_escape_string($connection, $password);
        
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
                   
//        $password = crypt($password,$db_user_password);
        
        
        if($email === $db_user_email && $password === $db_user_password){
            
             $_SESSION['email'] = $db_user_email;
             $_SESSION['firstname'] = $db_user_firstname;
             $_SESSION['lastname'] = $db_user_lastname;
             $_SESSION['image'] = $db_user_image;
             $_SESSION['user_role'] = $db_user_role;

             header("Location: ../admin");
           
        }else{
            
            header("Location: ../SignInPage.php");
        }
            
              
        }
        
     
   ?>  
    
     