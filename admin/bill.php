<?php include "includes/admin_header.php"; ?> 

    <link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

	<style type="text/css">
	textarea:hover,textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#fff; }
	.item-row td{min-height:100px;border:1px solid #000!important; vertical-align:middle }
	</style>
  

<?php

   if(isset($_POST['saveinv']))
   {
 
	$invnum = $_POST['invnum'];

	$custname = $_POST['custname'];
	$invdate = $_POST['invdate'];
	$numofprod = count($_POST['item']);
	
	$n=0;
	
	$item="";
	$descr="";
	$qty="";
	$cost="";
	$vat="";
    $discount="";
	$price="";
	
	while($n<$numofprod)
	{
		$item.=$_POST['item'][$n]."*#*";
		$descr.=$_POST['descr'][$n]."*#*";
		$qty.=$_POST['qty'][$n]."*#*";
		$cost.=$_POST['cost'][$n]."*#*";
		$vat.=$_POST['vat'][$n]."*#*";
        $discount.=$_POST['discount'][$n]."*#*";
		$price.=$_POST['price'][$n]."*#*";
		$n++;
	}
	$item;
	$descr;
	$qty;
	$cost;
	$vat;
    $discount;
	$price;
	
	$subtotal = $_POST['subtotal'];
	$tax = $_POST['tax'];
	$bill_type = $_POST['bill_type'];
	$payment_status = $_POST['payment_status'];
	$payment_mode = $_POST['payment_mode'];
	$total = $_POST['total'];
	$due = $_POST['due'];
	$rbdf = $_POST['rbdf'];
	$towords = $_POST['towords'];
    
     
    $query="INSERT INTO register".
        '(invnum, custname, invdate, numofprod, item, descr, qty, cost, vat, discount, price, subtotal, tax, bill_type, payment_status, payment_mode, total, due, rbdf)'.
        "VALUES ('".$invnum."','".$custname."','".$invdate."','".$numofprod."','".$item."','".$descr."','".$qty."','".$cost."','".$vat."','".$discount."','".$price."','".$subtotal."','".$tax."','".$bill_type."','".Paid."','".$payment_mode."','".$total."','".$due."','".$rbdf."')"; 
  
	$create_invoice_query=mysqli_query($connection,$query);
     confirmQuery($create_invoice_query);
     
 
   }


?>
     <div class="main-panel">
      <div class="card">
      <div class="card-body">
    <h5 class="text-center" style="color:blue"><?php echo "Invoice Created Succesfully"; ?></h5>
		<h3>RETAIL INVOICE</h3>
        <div style="border:1px solid #000">
		   <div style="clear:both"></div>
              <div id="customer">
                Consignee,<br />
                <textarea name="custname" tabindex="1" rows="4" style="font-size: 20px; float: left; " readonly="readonly"><?php echo $custname;?></textarea>
    
                <table id="meta">
                    <tr>
                        <td class="meta-head">Invoice #</td>
                        <td><span ><?php echo sprintf('%05d',$invnum);?></span></td>
                    </tr>
                    <tr>
    
                        <td class="meta-head">Date</td>
                        <td style="font: 14px Arial, Helvetica, sans-serif;"><?php echo $invdate;?></td>
                    </tr>
    
                </table>
            
            </div>
            
            <table id="items">
            
              <tr>
                  <th>Item</th>
                  <th>description</th>
                  <th width="100">Quantity</th>
                  <th width="150">Rate</th>
                  <th width="100">GST %</th>
                  <th width="100">Discount %</th>
                  <th width="100">Amount</th>
                  <th width="200">Price (with VAT)</th>
              </tr>
              <?php 
			  $item = explode("*#*",$item);
			  $descr = explode("*#*",$descr);
			  $qty = explode("*#*",$qty);
			  $cost = explode("*#*",$cost);
			  $vat = explode("*#*",$vat);
              $discount = explode("*#*",$discount);
			  $price = explode("*#*",$price);
			  
			  $count=0;
			  
			  while($count<$numofprod)
			  {
				?>
                
              <tr class="item-row"style="font: 14px Arial, Helvetica, sans-serif;">
                  <td class="item-name" ><?php echo $item[$count];?></td>
                  <td class="desciption"><?php echo $descr[$count];?></td>
                  <td align="right"><?php echo sprintf('%0.2f',$qty[$count]);?></td>
                  <td align="right"><?php echo sprintf('%0.2f',$cost[$count]);?></td>
                  <td align="right"><?php echo sprintf('%0.2f',$vat[$count]);?></td>
                  <td align="right"><?php echo sprintf('%0.2f',$discount[$count]);?></td>
                  <td align="right"><?php echo sprintf('%0.2f',$cost[$count]*$qty[$count]);?></td>
                  <td align="right"><?php echo sprintf('%0.2f',$price[$count]);?>&nbsp;</td>
              </tr>
			  	<?php
				$count++;
              }
			  ?>
              
              
              <tr>
                  <td colspan="3" class="blank"> </td>
                  <td colspan="4" class="total-line">Subtotal: </td>
                  <td class="total-value" align="right"><div id="subtotal"><?php echo sprintf('%0.2f',$subtotal);?></div>
                  </td>
              </tr>
              <tr>
                  <td colspan="3" class="blank"> </td>
                  <td colspan="4" class="total-line">TAX:</td>
                  <td class="total-value" align="right"><?php echo sprintf('%0.2f',$tax);?> %
                  </td>
              </tr> 
              <tr>
                  <td colspan="3" class="blank"> </td>
                  <td colspan="4" class="total-line">VAT:</td>
                  <td class="total-value" align="right">
				  <?php 
				  $temp=0;
				  foreach($price as $a)
				  $temp+=$a;
				  $temp-=$subtotal;
				  echo sprintf('%0.2f',$temp);
				  
				  ?>
                  </td>
                <tr>
                  <td colspan="3" class="blank"> </td>
                  <td colspan="4" class="total-line">Discount:</td>
                  <td class="total-value" align="right">
				<?php
				  $temp=0;
				  foreach($price as $a)
				  $temp+=$a;
				  $temp-=$subtotal;
				  echo sprintf('%0.2f',$temp);
				?>
                  </td>                
              </tr>  
              <tr> <td colspan="3" class=""><div id="total">
                    <label for="billtype">Bill Type:</label>
                      <?php echo $bill_type;?></div>
                 </td>

                  <td colspan="4" class="total-line">Total:</td>
                  <td class="total-value" align="right"><div id="total"><?php echo sprintf('%0.2f',$total);?></div></td>
              </tr>
                
<!--
                <tr>
                  <td colspan="3" class="blank"> </td>
                  <td colspan="4" class="total-line">Payment Status:</td>
                  <td class="total-value"><?php //echo $payment_status;?>
                  </td>
              </tr>
-->
                <tr>                
                  <td colspan="3" class=""><div id="total">
                      <label for="paymentmode">Payment Mode:</label>
                         <?php echo $payment_mode;?></div>
                    </td>

                  <td colspan="4" class="total-line">Balance Due:</td>
                  <td class="total-value" align="right"><div class="due"><?php echo sprintf('%0.2f',$due);?></div></td>
              </tr>
              <tr>
                  <td colspan="3" class="total-value" id="inwords" style="text-transform:capitalize"><?php echo $towords;?> </td>
                  <td colspan="4" class="total-line balance">Round Total:</td>
                  <td class="total-value balance" align="right"><div class="rtot"><?php echo sprintf('%0.2f',floor($rbdf));?></div></td>
              </tr>
            
            </table>
            
            <div id="terms" style="float:left;width:53%;border:1px solid #000; min-height:156px">
              <h4 style="border-bottom: 1px solid black; text-align:left; padding:5px 7px; font-weight:normal">TIN No. : <strong>24050704200</strong>&emsp;&emsp;&emsp;&emsp;&emsp;Dt.: 06-Aug-2013</h4>
              <h5>Terms</h5>
              <div>
              2% CD if payment within 7 days Strictly.<br />
              Price can change without prior notice during the scheme.<br />
              Higher wattage 6 month guarantee. No Breakage guarantee.
              </div>
            </div>
            <div style="float:left; text-align:center;width:19%;border:1px solid #000; min-height:156px; margin:20px 0 0 0;"> 
             <span style="display:block;height:115px;"></span>
             <span>Received Signature</span>
            </div>
            <div style="float:left;width:27%;border:1px solid #000; min-height:156px; margin:20px 0 0 0;"> 

              <span style="display:block;height:25px;"></span>
              <span style="margin:10px 10px; display:block">
              For, <strong>Talevent Tech</strong>
              <br />
              <br />
              <br />
              <br />
              &emsp;&nbsp;Authorized Signatory
              </span>
            </div>
             
		</div>
   <br>
    <center><button class="btn btn-primary" name="submit"><a href="viewbill.php?inv=<?php echo $invnum;?>"><h5 style="color:white">View Bill</h5></a></button></center>
        <br />
                <!-- Bootstrap Core CSS -->
<!--                <link href="./css/bootstrap.min.css" rel="stylesheet">-->

                <!-- Custom CSS -->
<!--                <link href="./css/sb-admin.css" rel="stylesheet">-->

                <!-- Custom Fonts -->
                <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

               <link href="./css/styles.css" rel="stylesheet">
                <link rel='stylesheet' type='text/css' href='css/style.css' />
                <link rel='stylesheet' type='text/css' href='css/print.css' media="print" />

               <script type="text/javascript" src="js/loader.js"></script>                              
	   </div>
    </div>
</div>
<?php include "includes/admin_footer.php"; ?>