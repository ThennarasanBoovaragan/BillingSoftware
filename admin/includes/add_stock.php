<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>     
<style>
    input[type=text]{
        width: 100%;
        height: 40px;
        border: 2px solid #aaa;
        border-radius: 4px;
        margin: 8px 0;
        outline: none;
        padding: 8px;
        box-sizing: border-box;
        transition: 3s;
    }

    input[type=text]:focus{
        border-color: dodgerblue;
        box-shadow: 0 0 8px 0 dodgerblue;
    }
    
    input[type=date]{
        width: 100%;
        height: 40px;
        border: 2px solid #aaa;
        border-radius: 4px;
        margin: 8px 0;
        outline: none;
        padding: 8px;
        box-sizing: border-box;
        transition: 3s;
    }

    input[type=date]:focus{
        border-color: dodgerblue;
        box-shadow: 0 0 8px 0 dodgerblue;
    }
    
 select[type=text]{
        width: 100%;
        border: 2px solid #aaa;
        border-radius: 4px;
        margin: 8px 0;
        outline: none;
        padding: 8px;
        box-sizing: border-box;
        transition: 3s;
    }

    select[type=text]:focus{
        border-color: dodgerblue;
        box-shadow: 0 0 8px 0 dodgerblue;
    }

</style>
<div class="card-body">            
      <h4 class="page-header">
         Add New Stock
      </h4>

     <?php 
 
          if(isset($_POST['create_stock'])){
           
                $barcode_no=$_FILES['image']['name'];
                $barcode_no_tempname = $_FILES['image']['tmp_name'];
                $product_name =  $_POST['product_name'];
                $product_category =  $_POST['product_category'];
                $product_type =  $_POST['product_type'];
                $product_cost =  $_POST['product_cost'];
                $quantity =  $_POST['quantity'];
                $supplier =  $_POST['supplier'];
                $onhand_qty =  $_POST['onhand_qty'];
                $expiry_date =  $_POST['expiry_date'];
                $date_arrival =  $_POST['date_arrival'];

         if(!preg_match('/^[0-9 +-]*$/', $product_cost)){
     //variable contains char not allowed 

    $query="INSERT into stock".
    '(barcode_no, product_name, product_category, product_type, product_cost,quantity, supplier, onhand_qty, expiry_date, date_arrival)'.
"VALUES('".$barcode_no."','".$product_name."','".$product_category."','".$product_type."','".$product_cost."','".$quantity."','".$supplier."','".$onhand_qty."','".$expiry_date."','".$date_arrival."') ";       
        
                    
        $add_stock_query=mysqli_query($connection,$query);
           
        confirmQuery($add_stock_query);
           
    echo "Stock Created:"." "."<a href='inventory.php'>View Stock?</a>";
          
            move_uploaded_file($barcode_no_tempname,"../images/$barcode_no");
             
       }else{
           $message="only numbers accepted";
} 
       }
      
   ?>  

<div class="card-body">           
  <form action="" method="post" enctype="multipart/form-data" class="form-sample" autocomplete="">                       
     
        <div class="row">
          <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="barcode_no"><h4>Barcode*</h4></label>
                <div class="col-sm-9">
                  <input type="file" name="image" />
                </div>
              </div>
            </div>
        </div>            
        <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="title"><h4>Product Name*</h4></label>
                <div class="col-sm-9">
                  <input type="text" size="115" maxlength="115" name="product_name">
                </div>
              </div>
            </div>
        </div>
        <div class="row">
           <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="category"><h4>Product Category*</h4></label>
                  <div class="col-sm-9">
                    <select type="text" name="product_category"id="product_category">
                      
                        <?php      

                            $query="SELECT * FROM categories";
                            $select_categories=mysqli_query($connection,$query);

                                confirmQuery($select_categories);  

                            while($row=mysqli_fetch_assoc($select_categories)){

                            $cat_title=$row['cat_title'];               

                            echo "<option value='$cat_title'>$cat_title</option>";
                            } 

                          ?>   
                    </select>
                  </div>
                </div>
            </div>
         </div>  
        <div class="row">
           <div class="col-md-6">
              <div class="form-group row">
                 <label class="col-sm-3 col-form-label" for="Product_type"><h4>Product Type</h4></label>
                 <div class="col-sm-9">
                    <input type="text" maxlength="100" name="product_type" />
                 </div>
              </div>
           </div>
        </div> 
        <div class="row">
           <div class="col-md-6">
              <div class="form-group row">
                 <label class="col-sm-3 col-form-label" for="product_cost"><h4>Product Cost*</h4></label>
                  <div class="col-sm-9">
                     <input type="text" name="product_cost" />
                      <h6 class="" style="color:#ff0000"><?php echo $message; ?></h6>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="quantity"><h4>Quantity*</h4></label>
                   <div class="col-sm-9">
                      <input type="text" name="quantity" />
                   </div>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-md-6">
                <div class="form-group row">
                   <label class="col-sm-3 col-form-label" for="Supplier"><h4>Supplier*</h4></label>
                    <div class="col-sm-9">
                       <input type="text" name="supplier" />
                    </div>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-md-6">
                <div class="form-group row">
                   <label class="col-sm-3 col-form-label" for="onhand_qty"><h4>Onhand Qty</h4></label>
                    <div class="col-sm-9">
                       <input type="text" name="onhand_qty" />
                    </div>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-md-6">
                <div class="form-group row">
                   <label class="col-sm-3 col-form-label" for="date_arrival"><h4>Arrival Date</h4></label>
                    <div class="col-sm-9">
                       <input type="date" id="futDate" name="date_arrival"/>
                    </div>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-md-6">
                 <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="expiry_date"><h4>Expiry Date</h4></label>
                     <div class="col-sm-9">
                        <input type="date" id="txtDate" name="expiry_date" />
                     </div>
                 </div>
              </div>
           </div>
             <br>
               <div class="col-sm-9">
                  <input class="btn btn-primary" type="submit" name="create_stock" value="Add Stock">
               </div>
      
            </form>       
         </div>
      </div>
<script>
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#txtDate').attr('min', minDate);
});
    
    $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#futDate').attr('max', maxDate);
});
    
</script>