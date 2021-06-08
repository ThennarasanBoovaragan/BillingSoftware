<div class="card-body">            
      <h3 class="page-header">
         Update Customer
      </h3>

<?php 
     
       if(isset($_GET['edit_customer'])){
           
        $the_customer_id = $_GET['edit_customer'];
           
           $query="SELECT * FROM customers WHERE customer_id = $the_customer_id ";
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

                  
             }
           }

       if(isset($_POST['edit_customer'])){
           
                $customer_id = $_POST['customer_id'];
                $firstname =  $_POST['firstname'];
                $lastname =  $_POST['lastname'];
                $phone =  $_POST['phone'];
                $email =  $_POST['email'];
                $address =  $_POST['address'];
                $amount_paid =  $_POST['amount_paid'];
                $amount_pending =  $_POST['amount_pending'];
                $payment_mode =  $_POST['payment_mode'];
                $payment_status =  $_POST['payment_status'];
                $comments =  $_POST['comments'];
 
    if(preg_match("/^[0-9]{10}$/", $phone)) {
          
    $query="UPDATE customers SET firstname= '{$firstname}', lastname= '{$lastname}', phone= '{$phone}', email= '{$email}', address= '{$address}', amount_paid='{$amount_paid}', amount_pending='{$amount_pending}', payment_mode='{$payment_mode}', payment_status='{$payment_status}', comments='{$comments}' WHERE customer_id= {$the_customer_id} ";  
       
        $edit_customer_query=mysqli_query($connection,$query);
           
        confirmQuery($edit_customer_query);
       
         header("Location:customers.php"); 
        
       }else{
              $message_phone = "Invalid Phone No";        
       }
       
       }
      

   ?>      

 <div class="col-12 grid-margin">
      <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data" class="form-sample" autocomplete="off">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" >First Name *</label>
                <div class="col-sm-9">
                  <input type="text" value="<?php echo $firstname; ?>" size="65"  maxlength="65" class="form-control" name="firstname"/>
                </div>
              </div>
              </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Last Name *</label>
                <div class="col-sm-9">
                  <input type="text" value="<?php echo $lastname; ?>" size="65"  maxlength="65" class="form-control" name="lastname"/>
                </div>
              </div>
            </div>
        </div>
            <br>
        <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Phone no *</label>
                <div class="col-sm-9">
                  <input type="phone no" value="<?php echo $phone; ?>" class="form-control" name="phone"/>
                    <h6 class="" style="color:#ff0000"><?php echo $message_phone; ?></h6>
                </div>
              </div>
            </div>    
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">E-mail *</label>
                <div class="col-sm-9">
                  <input type="email" value="<?php echo $email; ?>" class="form-control" name="email"/>
                </div>
              </div>
            </div>
        </div>
         <br>   
        <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label for="address" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                  <input type="address" value="<?php echo $address; ?>" class="form-control" name="address"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="comments" class="col-sm-3 col-form-label">Comments</label>
                <div class="col-sm-9">
                  <input type="text" value="<?php echo $comments; ?>" class="form-control" name="comments"/>
                </div>
              </div>
            </div> 
         </div>
            <br>
         <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label for="amount" class="col-sm-3 col-form-label">Amount Paid</label>
                <div class="col-sm-9">
                  <input type="text" value="<?php echo $amount_paid; ?>" class="form-control" name="amount_paid"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
               <div class="form-group row">
                  <label for="amount" class="col-sm-3 col-form-label">Amount Pending</label>
                  <div class="col-sm-9">
                     <input type="text" value="<?php echo $amount_pending; ?>" class="form-control" name="amount_pending"/>
                  </div>
               </div>
             </div>
          </div>
            <br>
          <div class="row">
             <div class="col-md-6">
                <div class="form-group row">
                   <label for="amount" class="col-sm-3 col-form-label">Payment Mode</label>
                   <div class="col-sm-9">
                      <select class="form-control" name="payment_mode"id="payment_mode">
            
                      <option value="<?php echo $payment_mode;?>"><?php echo $payment_mode; ?></option> 
            
                     <?php 
                            if($payment_mode == 'Cash'){

                                echo "<option value='Card'>Card</option>";
                                echo "<option value='Credit'>Credit</option>";

                            }elseif($payment_mode == 'Card'){

                                echo "<option value='Cash'>Cash</option>";
                                echo "<option value='Credit'>Credit</option>";

                            }elseif($payment_mode == 'Credit'){

                                echo "<option value='Cash'>Cash</option>";
                                echo "<option value='Card'>Card</option>";

                            }
                             else{

                                echo "<option value='Cash'>Cash</option>";
                                echo "<option value='Card'>Card</option>";
                                echo "<option value='Credit'>Credit</option>";

                            }      

                        ?>

                      </select>    
                   </div>
                </div>
             </div>
             <div class="col-md-6">
              <div class="form-group row">
                <label for="amount" class="col-sm-3 col-form-label">Payment Status</label>
                <div class="col-sm-9">
        <select class="form-control" name="payment_status"id="payment_status">
            
            <option value="<?php echo $payment_status;?>"><?php echo $payment_status; ?></option> 
            
         <?php 
                if($payment_status == 'Paid'){

                    echo "<option value='UnPaid'>UnPaid</option>";
                    echo "<option value='Partially Paid'>Partially Paid</option>";
                    
                }elseif($payment_status == 'UnPaid'){
                    
                    echo "<option value='Paid'>Paid</option>";
                    echo "<option value='Partially Paid'>Partially Paid</option>";
                    
                }elseif($payment_status == 'Partially Paid'){
                    
                    echo "<option value='Paid'>Paid</option>";
                    echo "<option value='UnPaid'>UnPaid</option>";
                    
                }
                 else{
                    
                    echo "<option value='Paid'>Paid</option>";
                    echo "<option value='UnPaid'>Unpaid</option>";
                    echo "<option value='Partially Paid'>Partially Paid</option>";

                }      

            ?>

         </select>      
                    
                    
                </div>
              </div>
            </div>
        </div>
            <br>
            <center><input class="btn btn-primary" type="submit" name="edit_customer" value="Update customer"></center>
          </form>
        </div>
    </div>
</div>

    
     
    