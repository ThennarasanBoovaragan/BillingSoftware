<?php 
            
      function confirmQuery($result){

          global $connection;

          if(!$result){
              die("Query Failed" . mysqli_error($connection));

          }

      }  


        function insert_categories() {
           global $connection;   

     if(isset($_POST['submit'])){
          $cat_title=$_POST['cat_title'];

          if($cat_title == "" || empty($cat_title)){
              ?>

    <h5 class="" style="color:#ff0000"><?php echo "This field should not be empty";?></h5>

        <?php
              
            }else{

           $query="INSERT INTO categories".
           '(cat_title)'.
           "VALUES('". $cat_title ."')";

           $create_category_query=mysqli_query($connection,$query);

        if(!$create_category_query){
        die('QUERY FAILED' . mysqli_error($connection));

           } 

        }

     } 
                
  }
                    
              // Find All Categories Query 

            function findAllCategories(){
               global $connection;
                 
                        
                    $query="SELECT * FROM categories";
                    $select_all_categories = mysqli_query($connection,$query);
                          
                    while($row=mysqli_fetch_assoc($select_all_categories)){
                        $cat_id=$row['cat_id'];     
                        $cat_title=$row['cat_title'];
                        echo "<tr>";    
                        echo "<td> {$cat_id} </td>";
                        echo "<td> {$cat_title} </td>";
                        echo "<td><input type='image' src='assets/icons/edit.svg' width='13' height ='13'><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                        echo "<td><input type='image' src='assets/icons/delete.svg' width='15' height ='15'><a onClick=\"javascript:return confirm('Are you Sure you want to delete');\" href='categories.php?delete={$cat_id}'>Delete</a></td>";
                        echo "</tr>";    
                    }
                      
            }


                   // DELETE QUERY

          function deleteCategories(){
             global $connection;
        
              if(isset($_GET['delete'])){
                                  
               $the_cat_id=$_GET['delete'];
                                  
                 $query="DELETE FROM categories WHERE cat_id={$the_cat_id}";
                 $delete_query=mysqli_query($connection,$query);
                   header("Location:categories.php");
                  
                }        
             }

       ?>
       

  
  
                      
                           