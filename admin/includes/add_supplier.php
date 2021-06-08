 <div class="card-body">            
      <h4 class="page-header">
        New Supplier
      </h4>

<?php 
     
       if(isset($_POST['create_suuplier'])){
           
                $supplier_id = $_POST['supplier_id'];
                $firstname =  $_POST['firstname'];
                $lastname =  $_POST['lastname'];
                $phone =  $_POST['phone'];
                $email =  $_POST['email'];
                $company =  $_POST['company'];
                $display_name =  $_POST['display_name'];
                $website =  $_POST['website'];
                $other =  $_POST['other'];
                $gst_in =  $_POST['gst_in'];
                $address =  $_POST['address'];
                $comments =  $_POST['comments'];
                $tax_info =  $_POST['tax_info'];
                $amount_paid =  $_POST['amount_paid'];
                $amount_pending =  $_POST['amount_pending'];
                $payment_mode =  $_POST['payment_mode'];
                $payment_status =  $_POST['payment_status'];
                $attachments =  $_POST['attachments'];
                $pan_no =  $_POST['pan_no'];
                $adhaar_no =  $_POST['adhaar_no'];

    if(!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($email) && !empty($company) && !empty($display_name) && !empty($website) && !empty($other) && !empty($gst_in) && !empty($address) && !empty($comments) && !empty($tax_info)&& !empty($amount_paid) && !empty($amount_pending) && !empty($attachments) && !empty($pan_no) && !empty($adhaar_no)){
  
    if(preg_match("/^[0-9]{10}$/", $phone)) {
           
     $query="INSERT INTO suppliers".
         '(firstname,lastname,phone,email,company,display_name,website,other,gst_in,address,comments,tax_info,amount_paid,amount_pending,payment_mode,payment_status,attachments,pan_no,adhaar_no)'.   
    "VALUES('". $firstname ."', '". $lastname ."', '". $phone ."','". $email ."','". $company ."','". $display_name ."','". $website ."','". $other ."','". $gst_in ."','". $address ."','". $comments ."','". $tax_info ."','". $amount_paid ."','". $amount_pending ."','". none ."','". none ."','". $attachments ."','". $pan_no ."','". $adhaar_no ."') ";
                      
        $create_supplier_query=mysqli_query($connection,$query);
           
        confirmQuery($create_supplier_query);
           
            header("Location:suppliers.php"); 
        
        }else{
              $message_phone = "Invalid Phone No";        
       }
        
       }else {
          
          $message = "Invalid supplier details";
          
       } 
           
       }else{
         
         $message = "";  
      
    }

           
   ?>      
        
    <div class="col-12 grid-margin">
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data" class="form-sample">
                
                <h6 class="text-center" style="color:#ff0000"><?php echo $message; ?></h6>
                
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >First Name *</label>
                    <div class="col-sm-9">
                      <input type="text" size="65"  maxlength="65" class="form-control" name="firstname"/>
                    </div>
                  </div>
                  </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Last Name *</label>
                    <div class="col-sm-9">
                      <input type="text" size="65"  maxlength="65" class="form-control" name="lastname"/>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Phone no *</label>
                    <div class="col-sm-9">
                      <input type="phone no" class="form-control" name="phone"/>
                         <h6 class="" style="color:#ff0000"><?php echo $message_phone; ?></h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">E-mail *</label>
                    <div class="col-sm-9">
                      <input type="email"   class="form-control" name="email"/>
                    </div>                  
                  </div>
                </div>
             </div>                
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Company</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="company"/>
                    </div>
                  </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="Display name" class="col-sm-3 col-form-label">Display Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="display_name"/>
                    </div>
                  </div>
                </div>
            </div>
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="website" class="col-sm-3 col-form-label">Website</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="website"/>
                    </div>
                  </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="other" class="col-sm-3 col-form-label">Other</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="other"/>
                    </div>
                  </div>
                </div>
            </div>
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="gstin" class="col-sm-3 col-form-label">GST IN</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="gst_in"/>
                    </div>
                  </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="address" class="col-sm-3 col-form-label">address</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="address" id="body" cols="23" rows="4"></textarea>
                    </div>
                  </div>
                </div>
            </div>
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comments" class="col-sm-3 col-form-label">Comments</label>
                    <div class="col-sm-9">
                      <textarea class="form-control"  name="comments" id="body" cols="25" rows="4"></textarea>
                    </div>
                  </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="tax info" class="col-sm-3 col-form-label">Tax Info</label>
                    <div class="col-sm-9">
                      <input type="text"  class="form-control" name="tax_info"/>
                    </div>
                  </div>
                </div>
            </div>
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="amount" class="col-sm-3 col-form-label">Amount Paid</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="amount_paid"/>
                    </div>
                  </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="amount" class="col-sm-3 col-form-label">Amount Pending</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="amount_pending"/>
                    </div>
                  </div>
                </div> 
             </div>
               <div class="row">
                 <div class="col-md-6">
                  <div class="form-group row">
                    <label for="attachments" class="col-sm-3 col-form-label">Attachments</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="attachments"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="Pan no"  class="col-sm-3 col-form-label">Pan no</label>
                    <div class="col-sm-9">
                      <input type="text" size="70"  maxlength="70" class="form-control" name="pan_no"/>
                    </div>
                  </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="adhaar no" class="col-sm-3 col-form-label">Adhaar No</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="adhaar_no"/>
                    </div>
                  </div>
                </div>
            </div>
             <br>
               <center><input class="btn btn-primary" type="submit" name="create_suuplier" value="Add Supplier"></center>
          </form>
      </div>
   </div>
</div>

     
    