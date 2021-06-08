<?php include "includes/admin_header.php"; ?>

<div class="main-panel">
<div class="card">    
<div class="content-wrapper">
<div class="row">
    <div class="col-md-4">
            <h6>Search Customer</h6>
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
                 <?php   echo "<td><a class='btn btn-primary' href='reports.php'>Clear</a></td>";   ?> 
                 </form> 
              </div>
        </div>
    </div>
    
<div class="card-body">   
    <h3 class="page-header">
        Invoice
    </h3>

	<style type="text/css">
	<!--
	@import url("style.css");
	-->
	</style>
	<script type="text/javascript">
    function funcdelete(id,name){
        var del=confirm("Are you sure you want to delete INVOICE #"+id+" of "+name+" ??");
        if(del==true)
        {
            window.location="delinvoice.php?id="+id;
            return false;
        }
    }
    </script>
<?php 		
		if(isset($_GET['action'])) {
			$mat=$_GET['action'];
			if($mat=='success')
			echo '<script type="text/javascript">alert("SUCCESSFULLY DELETED");</script>';
			
		}
?>
   <div class="dropdown toolbar-item">
     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownsorting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Day</button>
     <div class="dropdown-menu" aria-labelledby="dropdownsorting">
       <a class="dropdown-item" href="#">Last Day</a>
       <a class="dropdown-item" href="#">Last Month</a>
       <a class="dropdown-item" href="#">Last Year</a>
     </div>
   </div>   
    <div class="card">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col" style="color:blue">Invoice#</th>
                <th scope="col" style="color:blue">Customer Name</th>
                <th scope="col" style="color:blue">No.of Items</th>
                <th scope="col" style="color:blue">Invoice Date</th>
                <th scope="col" style="color:blue">Payment Status</th>
                <th scope="col" style="color:blue">Payment Mode</th>
                <th scope="col" style="color:blue">Due Date</th>
                <th scope="col" style="color:blue">Amount</th>
                <th scope="col" style="color:blue">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
  
            if (isset($_POST['submit'])){
              $search=$_POST['search'];
               
              $sql="SELECT * FROM register WHERE custname LIKE '%$search%' ";  
              $select_sql=mysqli_query($connection, $sql); 
                
                 if(!$select_sql){
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                $count=mysqli_num_rows($select_sql);
                if($count == 0){
                echo "<center><h3 style='color:#ffa500'>NO Invoices Are Available</h3><center>";
                    
            } 
            else{
            
             while($row=mysqli_fetch_assoc($select_sql)){

                    $invnum=$row['invnum'];
                    $invdate=$row['invdate'];
                    $custname=$row['custname'];
                    $numofprod=$row['numofprod'];
                    $total=$row['total'];
                 
       ?>
                <tr>
                <td><a href="viewbill.php?inv=<?php echo $row['invnum'];?>"><?php echo 'INV-';?><?php echo $row['invnum'];?></a></td>
                <td><?php echo $row['custname'];?></td>
                <td><?php echo $row['numofprod'];?></td>
                <td><?php echo $row['invdate'];?></td>
                <td><?php echo 'Paid';?></td>
                <td><?php echo 'Cash';?></td>
                <td><?php echo $row['invdate'];?></td>
                <td>Rs. <?php echo $row['rbdf'];?></td>
                <td><input type="image" src="assets/icons/delete.svg" width="15" height ="15" onclick="return funcdelete('<?php echo $row['invnum'];?>','<?php echo $row['custname'];?>')"/>
                    </td>
            </tr> 

            <?php  } } }
            

                 else{

            
             $query="SELECT * FROM register ORDER BY invnum DESC";
             $select_invoice=mysqli_query($connection,$query);
                    
             while($row=mysqli_fetch_assoc($select_invoice)){

                    $invnum=$row['invnum'];
                    $invdate=$row['invdate'];
                    $custname=$row['custname'];
                    $numofprod=$row['numofprod'];
                    $total=$row['total'];
                 
       ?>
                <tr>
                <td><a href="viewbill.php?inv=<?php echo $row['invnum'];?>"><?php echo 'INV-';?><?php echo $row['invnum'];?></a></td>
                <td><?php echo $row['custname'];?></td>
                <td><?php echo $row['numofprod'];?></td>
                <td><?php echo $row['invdate'];?></td>
                <td><?php echo 'Paid';?></td>
                <td><?php echo 'Cash';?></td>
                <td><?php echo $row['invdate'];?></td>
                <td>Rs. <?php echo $row['rbdf'];?></td>
                <td><input type="image" src="assets/icons/delete.svg" width="15" height ="15" onclick="return funcdelete('<?php echo $row['invnum'];?>','<?php echo $row['custname'];?>')"/>
                    </td>
            </tr> 

            <?php  } } ?>

        </tbody>
    </table>

</div>
    </div>
</div>
</div>
    </div>
<?php include "includes/admin_footer.php"; ?>