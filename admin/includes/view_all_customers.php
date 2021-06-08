<div class="card-body">  
   <div class="row">
      <div class="col-lg-12">
         <h3 class="page-header">
             Customers
         </h3>
   <div class="table-responsive">
            <table class="table table-bordered table-hover">
              
                <thead>
                    <tr>
                        <th style="color:blue">Id</th>
                        <th style="color:blue">Firstname</th>
                        <th style="color:blue">Lastname</th>
                        <th style="color:blue">Phone No</th>
                        <th style="color:blue">Email</th>
                        <th style="color:blue">Address</th>
                        <th style="color:blue">Amount paid</th>
                        <th style="color:blue">Amount pending</th>
                        <th style="color:blue">Payment Mode</th>
                        <th style="color:blue">Payment status</th>
                        <th style="color:blue">Comments</th>
                        <th style="color:blue">Action</th>
                        <th style="color:blue">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                            
     <?php 
          
                    
             $query="SELECT * FROM customers ";
             $select_customers=mysqli_query($connection,$query);
                    
             while($row=mysqli_fetch_assoc($select_customers)){
                 
                    $customer_id = $row['customer_id'];
                    $firstname =  $row['firstname'];
                    $lastname =  $row['lastname'];
                    $phone =  $row['phone'];
                    $email =  $row['email'];
                    $address =  $row['address'];
                    $amount_paid =  $row['amount_paid'];
                    $amount_pending =  $row['amount_pending'];
                    $payment_mode =  $row['payment_mode'];
                    $payment_status =  $row['payment_status'];
                    $comments =  $row['comments'];
                 
                    echo "<tr>";
                 
                    echo "<td>$customer_id</td>";
                    echo "<td>$firstname</td>";
                    echo "<td>$lastname</td>";
                    echo "<td>$phone</td>";
                    echo "<td>$email</td>";
                    echo "<td>$address</td>";
                    echo "<td>$amount_paid</td>";
                    echo "<td>$amount_pending</td>";
                    echo "<td>$payment_mode</td>";
                    echo "<td>$payment_status</td>";                 
                    echo "<td>$comments</td>";
                 
             
                    echo "<td><input type='image' src='assets/icons/edit.svg' width='13' height ='13'> <a href='customers.php?source=edit_customer&edit_customer={$customer_id}'>Edit</a></td>";
                    echo "<td><input type='image' src='assets/icons/delete.svg' width='15' height ='15'><a onClick=\"javascript:return confirm('Are you Sure you want to delete CUSTOMER ??');\"href='customers.php?delete={$customer_id}'>Delete</a></td>";
                 
                    echo "</tr>";

                    }

                    ?>
                      
            </tbody>
        </table>
           
               <?php
 

                    if(isset($_GET['delete'])){
                        $the_customer_id=$_GET['delete'];
                        $query="DELETE FROM customers WHERE customer_id={$the_customer_id}";
                        $delete_query=mysqli_query($connection,$query);
                        header("Location:customers.php");
                     
                    }

                 ?> 
       
            </div>               
        </div>
    </div>
</div>
                      
                     
                    
                   