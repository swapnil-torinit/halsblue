<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>

  <link rel="stylesheet" href="<?php echo site_url('resources/css/pdf.css');?>">
</head>

<body>
 
<div class="invoive">
  <h4 style="text-align: center;">Tax Invoice - <?=$inv_type?></h4>
  <div>
  <div style=" width: 15%; float: left;"><br><img src="<?=base_url();?>/resources/img/logo.jpg" style="width:100px"></div>
   
    <div style="width: 65%; float: left; margin-left: 5px;">
      <div style="width: 80%">
    <p style="font-size: 10px;"><b><?php echo $owner["name"]; ?></b><br>
    
                <?php echo $owner["address"]; ?><br>
                Email: <?php echo $owner["notification_email"]; ?> | Website: <?php echo $owner["website"]; ?><br>
                GSTIN: <?=$owner['GSTIN'];?><br>
                
                
              </p>
      </div>
    </div>
    <div style="width: 19%; float: right;">
      <p style="font-size: 10px;"><br>
        <strong>Invoice No</strong>: <?php echo $invoice["invoice_no"]; ?><br><br>
                <strong>Date</strong>: <?php echo date('d/m/Y', strtotime($invoice["invoice_date"])); ?>
                
      </p>
    </div>
    
    <div style="clear: both"></div>
</div>
<div style="height: 2px" style="border-top: solid 1px #74859A; "></div>
 <div>
  <div style="width: 60%; float: left;">
     <p style="font-size: 10px;">
      

                      <strong>Customer Details:</strong> <br><br>
                      <strong>Name</strong>: <?php echo $invoice["customer_name"]; ?><br>
                      <strong>Address</strong>: <?php echo $invoice["customer_address"]; ?><br>
                      <?php echo (isset($invoice["customer_address2"]) && $invoice["customer_address2"]!='')?$invoice["customer_address2"].'<br>':''; ?>
                      <strong>State</strong>: <?php echo $state["state_name"]; ?><br>
                      <strong>State Code</strong>: <?php echo $state["state_code"]; ?><br>
                      <strong>GSTIN</strong>: <?php echo $customer["company_gst_no"]; ?>
    </p>
  </div>
   <div style="width: 40%; float: left;">
      <p style="font-size: 10px;">
         
         <strong>No of Packages</strong> : <?php echo isset($invoice["no_of_packages"])?$invoice["no_of_packages"]:''; ?><br>
         <strong>Vehicle/LR No.</strong> : <?php echo $invoice["vehicle_number"]; ?><br>
         <strong>Private Mark</strong> : <?php echo $customer["company_marka_no"]; ?><br>
         <strong>Transport</strong> : <?php echo $customer["company_transport"]; ?><br>
                 

                 <!-- <strong>Mode of Transport</strong> : <?php echo $customer["company_transport_mode"]; ?><br> -->
                 
                 
                 <strong>Date & Time of Supply</strong> : <?php echo date('d/m/Y h:i A', strtotime($invoice["supplydate"])); ?>  <br>
                 <strong>Place of Supply</strong> : <?php echo $invoice["place_supply"]; ?><br>
                  <strong>Electronic Reference No</strong> : <?=$invoice['electronic_ref_no']?>
               </p>
      </div>
    <div style="clear: both"></div>
</div>


<div style="height: 2px" style="border-top: solid 1px #74859A; "></div><br>
<?php 
$product_per_page = 14;
$len = count($order_details);

//echo $len.'Hello';

//$od = array_chunk($order_details, $product_per_page);
$od[] = array_slice($order_details,0,14);

if(count($order_details)>14)
{
  $od[] = array_slice($order_details,14,22);
}
if(count($order_details)>36)
{
  $od[] = array_slice($order_details,36,22);
}
if(count($order_details)>58)
{
  $od[] = array_slice($order_details,58,22);
}
if(count($order_details)>80)
{
  $od[] = array_slice($order_details,80,22);
}
if(count($order_details)>102)
{
  $od[] = array_slice($order_details,102,22);
}
if(count($order_details)>124)
{
  $od[] = array_slice($order_details,124,22);
}
if(count($order_details)>146)
{
  $od[] = array_slice($order_details,146,count($order_details));
}


$total_page = count($od);
$total_page_counter=0;
$i = 1;
        $total_tax_amount = 0;
        $total_total_cost = 0;

        $total_sgst = $total_csgst = $total_igst = $total_taxable = 0;
        //echo count($od).'Count'; echo '<pre>'; print_r($od);
foreach($od as $orderdetail){ 
$total_page_counter++;

 ?>
<?php //Check how many pages will exists and add break accordingly
if($total_page>1 && $total_page_counter>1)
{
echo '<pagebreak></pagebreak>';
}
?>

  <table class="product maintab1" cellpadding="0px" cellspacing="0px" width="100%" autosize="0">
            <thead>
              <tr>
              <td width="5%" class="cntr"><p style="font-size: 14px;">S.no</p></td>
              <td width="30%"><p style="font-size: 14px;">Description of Goods</p></td>
              <td width="5%" class="cntr"><p style="font-size: 14px;">HSN Code</p></td>
              <td width="5%" class="cntr"><p style="font-size: 14px;">Qty</p></td>
              <td width="5%" class="cntr"><p style="font-size: 14px;">UOM</p></td>
              <td width="5%" class="cntr"><p style="font-size: 14px;">Rate (INR)</p></td>
              <td width="5%" class="cntr"><p style="font-size: 14px;">Taxable value (INR)</p></td>
              <td width="10%"><table width="100%" style="border: none;" border="0">
                      <tbody>
                        <tr><td colspan="2" class="cntr" style="border: none;" border="0"><p style="font-size: 14px;" >CGST</p></td></tr>
                        <tr><td class="cntr" style="border: none;" border="0"><p style="font-size: 14px;">Rate</p></td>
                            
                            <td class="cntr" style="border: none;" border="0"><p style="font-size: 14px;">Amount</p></td>
                      </tr></tbody></table>
              </td>
              <td width="10%"><table width="100%" >
                      <tbody>
                        <tr><td colspan="2" class="cntr" style="border: none;" border="0"><p style="font-size: 14px;" >SGST</p></td></tr>
                        <tr><td class="cntr" style="border: none;" border="0"><p style="font-size: 14px;">Rate</p></td>
                            
                            <td class="cntr" style="border: none;" border="0"><p style="font-size: 14px;">Amount</p></td>
                      </tr></tbody></table>
              </td>
              <td width="10%"><table width="100%" style="border: none;" border="0">
                      <tbody>
                        <tr><td colspan="2" class="cntr" style="border: none;" border="0"><p style="font-size: 14px;" >IGST</p></td></tr>
                        <tr><td class="cntr" style="border: none;" border="0"><p style="font-size: 14px;">Rate</p></td>
                            
                            <td class="cntr" style="border: none;" border="0"><p style="font-size: 14px;">Amount</p></td>
                      </tr></tbody></table>
              </td>
              
              
              <td width="10%" class="cntr"><p style="font-size: 14px;">Amount (INR)</p></td>
            </tr>
          </thead>
          <tbody>
          
     
      <?php
        
        
        foreach($orderdetail as $product){
         // $product_info = $this->Common_model->get_sql_row_array('select * from products where id='.$product['product_id']);;

          $total_sgst = $total_sgst + (float)$product["sgst_amount"];
          $total_csgst = $total_csgst+ (float)$product["cgst_amount"];
          $total_igst = $total_igst + (float)$product["igst_amount"];
          $total_taxable = $total_taxable + (float)$product["taxable_value"];

            

            $total_tax_amount += $product["tax_amount"];
            $total_total_cost += $product["total_cost"];            
          ?>

            <tr>
              <td width="5%" class="cntr"><p style="font-size: 14px;"><?=$i?></p></td>
              <td width="30%"><p style="font-size: 14px;"><?php echo $product["title"]; ?></p></td>
              <td width="5%"><p style="font-size: 14px;"><?php echo $product["hsncode"]; ?></p></td>
              <td width="5%" class="cntr"><p style="font-size: 14px;"><?php echo $product["qty"]; ?></p></td>
              <td width="5%" class="cntr"><p style="font-size: 14px;"><?=$product['unit']?></p></td>
              <td width="5%" class="cntr"><p style="font-size: 14px;"><?php echo $product["product_cost"]; ?></p></td>
              <td width="5%" class="cntr"><p style="font-size: 14px;"><?php echo $product["taxable_value"]; ?></p></td>
              <td width="10%">
                  <table class="bdn" width="100%">
                    <tbody>
                      <tr>
                        <td class="cntr"><p style="font-size: 14px;"><?php echo $product["cgst"]; ?>%</p></td>
                        <td class="seperator"></td>
                        <td class="cntr"><p style="font-size: 14px;"><?php echo $product["cgst_amount"]; ?></p></td>
                      </tr>
                    </tbody>
                  </table>
              </td>
              <td width="10%">
                  <table class="bdn" width="100%">
                    <tbody>
                      <tr>
                        <td class="cntr" align="center"><p style="font-size: 14px;"><?php echo $product["sgst"]; ?>%</p></td>
                        <td class="seperator"></td>
                        <td class="cntr"><p style="font-size: 14px;"><?php echo $product["sgst_amount"]; ?></p></td>
                      </tr>
                    </tbody>
                  </table>
              </td>
              <td width="10%">
                  <table class="bdn" width="100%">
                    <tbody>
                      <tr>
                        <td class="cntr"><p style="font-size: 14px;"><?php echo $product["igst"]; ?>%</p></td>
                        <td class="seperator"></td>
                        <td class="cntr"><p style="font-size: 14px;"><?php echo $product["igst_amount"]; ?></p></td>
                      </tr>
                    </tbody>
                  </table>
              </td>
              
              <td width="10%" class="cntr"><p style="font-size: 14px;"><?=$product["total_cost"]?></p></td>

            </tr>
            <?php if ( ($total_page==1) and ($i == $len)) { //Check if this is last row and with first page ?>
<?php //Fill blank rows if less than 20

            $k = $product_per_page - $len;
          // echo 'Mod'.$k;
            for($j=1; $j<=$k; $j++){
              ?>
               <tr width="100%">
                <td>&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;</td>
             
            </tr>
              

              <?php 
            }
          }
          
          ?>
        <?php if ( $i == $len) { //Check for last row of last page ?>
        
        <tr>
            <td colspan="6"></td>
            <td class="cntr"><p style="font-size: 14px;"><?=$total_taxable?></p></td>
            <td class="cntr"><p style="font-size: 14px;"><?=$total_csgst?></p></td>
            <td class="cntr"><p style="font-size: 14px;"><?=$total_sgst?></p></td>
            <td class="cntr"><p style="font-size: 14px;"><?=$total_igst?></p></td>
            <td>
            </td>
          </tr>
          
        <tr>
            <td colspan="8"></td>
            <td class="cntr" colspan="2"><p style="font-size: 14px;">Round Off</p></td>
            <td class="cntr"><p style="font-size: 14px;"><?php $round = $total_total_cost - round($total_total_cost); ?>
              <?php
              if($total_total_cost<round($total_total_cost))
              {
                echo '+';
              }
              else
              {
                echo '-';
              }
              echo number_format($round,2);?>
                
              </p></td>
          </tr>

          <tr>
            <td colspan="8"></td>
            <td class="cntr" colspan="2"><p style="font-size: 14px;">Total Amount (INR)</p></td>
            <td class="cntr"><p style="font-size: 14px;"><?php echo number_format(round($total_total_cost),2); ?></p></td>
          </tr>
       <tr>
<?php } ?>
           

          <?php  $i++; }  ?>  
        
     
    </tbody>
      </table>
<?php } ?>
 <br>
            <table class="bd pd10" width="100%">
              <tr>
                <td width="42%">
                  <p style="font-size: 10px;">
                    <?php echo $owner["terms"]; ?>
                  </p>
              </td>
              <td class="seperator" width="2%"></td>
              <td width="25%" style="padding-left: 10px;">
                  <p style="font-size: 10px; margin-left: 8px;"><strong>Bank Details:</strong><br>
                    <strong>Hals Blue Overseas Pvt. Ltd.</strong><br>
                    <strong>A/c No.</strong>: 916020073217639<br>
                    <strong>Bank Name</strong>: Axis Bank<br>
                    <strong>Branch</strong>: Kashmere Gate, Delhi-6<br>
                    <strong>IFSC Code</strong>: UTIB0001180<br>
                  </p>
              </td>

              <td class="seperator" width="2%"></td>

              <td width="28%" >
                <p style="font-size: 10px;">
                <center><strong><?php echo $owner["name"]; ?></strong></center>
                <br>

                <img src="<?=base_url()?>resources/img/signature.jpg" width="100px" >
                <center>Authorised Signatory</center>
              </p>

              </td>
            </tr>
        </table>
 

  

</div>
</body>
</html>
