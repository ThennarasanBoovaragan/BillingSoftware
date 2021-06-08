<div class="content-wrapper">
<div class="row">
    <div class="col-md-4">
            <h6>Search Stock</h6>
            <form action="" method="post" autocomplete="off">
                <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search">Search</span>
                        </button>
                        </span>
                        </div>
                         <br>
                 <?php   echo "<td><a class='btn btn-primary' href='inventory.php?source=stock_list.php'>Clear</a></td>";   ?> 
                 </form> 
              </div>
        </div>
    </div>
    <div class="card-body"> 
       <div class="row">
          <div class="col-lg-12">
             <h3 class="page-header">
                 Inventory List 
             </h3>

    <div class="table-responsive">
        <table   class="table table-bordered table-hover">
              <thead>
                    <tr>
                        <th style="color:blue">SNo</th>
                        <th style="color:blue">Barcode No</th>
                        <th style="color:blue">Product Name</th>
                        <th style="color:blue">Product Category</th>
                        <th style="color:blue">Product Type</th>
                        <th style="color:blue">Product Cost</th>
                        <th style="color:blue">Quantity</th>
                        <th style="color:blue">Supplier</th>
                        <th style="color:blue">Onhand Qty</th>
                        <th style="color:blue">Expiry Date</th>
                        <th style="color:blue">Date Arrival</th>
                        <th style="color:blue">Action</th>
                        <th style="color:blue">Action</th>
                    </tr>
                </thead>
                <tbody>
             
                    
     <?php 
                 
            if (isset($_POST['submit'])){
                $search=$_POST['search'];
               
              $product="SELECT * FROM stock WHERE product_name LIKE '%$search%' ";  
              $search_product=mysqli_query($connection, $product); 
                
                 if(!$search_product){
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                $count=mysqli_num_rows($search_product);
                if($count == 0){
                echo "<center><h3 style='color:#ffa500'>NO Stock Available</h3><center>";
                    
            } 
            else{
            
             while($row=mysqli_fetch_assoc($search_product)){

                    $stock_id=$row['stock_id'];
                    $barcode_no=$row['barcode_no'];
                    $product_name=$row['product_name'];
                    $product_category=$row['product_category'];
                    $product_type=$row['product_type'];
                    $product_cost=$row['product_cost'];
                    $quantity=$row['quantity'];
                    $supplier=$row['supplier'];
                    $onhand_qty=$row['onhand_qty'];
                    $expiry_date=$row['expiry_date'];
                    $date_arrival=$row['date_arrival'];
                 
                    echo "<tr>";
                 
                    echo "<td>$stock_id</td>";
                    echo "<td>$barcode_no</td>";
                    echo "<td>$product_name</td>";
                    echo "<td>$product_category</td>";
                    echo "<td>$product_type</td>";
                    echo "<td>$product_cost</td>";
                    echo "<td>$quantity</td>";
                    echo "<td>$supplier</td>";
                    echo "<td>$onhand_qty</td>";
                    echo "<td>$expiry_date</td>";
                    echo "<td>$date_arrival</td>";
                 
                 
                    echo "<td><input type='image' src='assets/icons/edit.svg' width='13' height ='13'><a href='inventory.php?source=edit_stock&edit_stock={$stock_id}'>Edit</a></td>";   
                 
                    echo "<td><input type='image' src='assets/icons/delete.svg' width='15' height ='15'><a onClick=\"javascript:return confirm('Are you Sure you want to delete');\"href='inventory.php?delete={$stock_id}'>Delete</a></td>";
                 
                    echo "</tr>";  
                    
                    } 
                  }
                }  
                 else{
                        
                    $query="SELECT * FROM stock ";
                    $select_query=mysqli_query($connection,$query);
                        
                    while($row=mysqli_fetch_assoc($select_query)){

                    $stock_id=$row['stock_id'];
                    $barcode_no=$row['barcode_no'];
                    $product_name=$row['product_name'];
                    $product_category=$row['product_category'];
                    $product_type=$row['product_type'];
                    $product_cost=$row['product_cost'];
                    $quantity=$row['quantity'];
                    $supplier=$row['supplier'];
                    $onhand_qty=$row['onhand_qty'];
                    $expiry_date=$row['expiry_date'];
                    $date_arrival=$row['date_arrival'];
                        
                    echo "<tr>";
               
                    echo "<td>$stock_id</td>";
                    echo "<td>$barcode_no</td>";
                    echo "<td>$product_name</td>";
                    echo "<td>$product_category</td>";
                    echo "<td>$product_type</td>";
                    echo "<td>$product_cost INR</td>";
                    echo "<td>$quantity</td>";
                    echo "<td>$supplier</td>";
                    echo "<td>$onhand_qty</td>";
                    echo "<td>$expiry_date</td>";
                    echo "<td>$date_arrival</td>";
                 
                 
                    echo "<td><input type='image' src='assets/icons/edit.svg' width='13' height ='13'><a href='inventory.php?source=edit_stock&edit_stock={$stock_id}'>Edit</a></td>";                 
                    echo "<td><input type='image' src='assets/icons/delete.svg' width='15' height ='15'><a onClick=\"javascript:return confirm('Are you Sure you want to delete');\"href='inventory.php?delete={$stock_id}'>Delete</a></td>";
                    echo "</tr>";  
                    
                    }
      
                 }    
//               $update="UPDATE stock set quantity=(quantity- new.qty) WHERE product_name =new.item";
//                $select_update=mysqli_query($connection,$update);
//                if(!$select_update){
//               die("Query Failed" . mysqli_error($connection)); 
//                               
//             }    

            ?> 
                    
        </tbody>      
    </table>
 </div> 
</div>
</div>
</div>


            <?php

               if(isset($_GET['delete'])){
                     $the_stock_id=$_GET['delete'];
                     $query="DELETE FROM stock WHERE stock_id={$the_stock_id}";
                     $delete_query=mysqli_query($connection,$query);
                     header("Location:inventory.php");
                 }
                  ?>   
                     

                 
                      
                     
                    
                   