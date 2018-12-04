<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>

  <link rel="stylesheet" href="<?php echo site_url('resources/css/pdf.css');?>">
</head>

<body>
 
<div class="invoive">
  <h4 style="text-align: center;">Invoice - <?=$inv_type?></h4>
  <div>
  <div style="width: 15%; float: left;"><br><img src="<?=base_url();?>/resources/img/halslogo.jpg"></div>
   
    <div style="width: 58%; float: left; margin-left: 5px;">
      <div style="width: 80%">
    <p style="font-size: 10px;"><b><?php echo $owner["name"]; ?></b><br>
    
                <?php echo $owner["address"]; ?><br>
                Email: <?php echo $owner["notification_email"]; ?> | Website: <?php echo $owner["website"]; ?><br>
                GSTIN: <?=$owner['GSTIN'];?>
                
              </p>
      </div>
    </div>
    <div style="width: 20%; float: right;">
      <p style="font-size: 10px;"><br>
        <strong>Invoice No</strong>: <?php echo $invoice["id"]; ?><br><br>
                <strong>Date</strong>: <?php echo date('d/m/Y', strtotime($invoice["invoice_date"])); ?>
                
      </p>
    </div>
    
    <div style="clear: both"></div>
</div>
<div style="height: 2px" style="border-top: solid 1px #74859A; "></div>
 <div>
  <div style="width: 60%; float: left;">
     <p style="font-size: 10px;">
                      <strong>Customer Details</strong> <br><br>
                      <strong>Name</strong>: <?php echo $customer["company_name"]; ?><br>
                      <strong>Address</strong>: <?php echo $customer["company_address"]; ?><br>
                      <?php echo (isset($customer["company_address2"]) && $customer["company_address2"]!='')?$customer["company_address2"].'<br>':''; ?>
                      <strong>State</strong>: <?php echo $state["state_name"]; ?><br>
                      <strong>State Code</strong>: <?php echo $state["state_code"]; ?><br>
                      <strong>GSTIN</strong>: <?php echo $customer["company_gst_no"]; ?>
    </p>
  </div>
   <div style="width: 40%; float: left;">
      <p style="font-size: 10px;">
         
         <strong>No of Packages</strong> : <?php echo isset($invoice["no_of_packages"])?$invoice["no_of_packages"]:''; ?><br>
         <strong>Vehical No</strong> : <?php echo $invoice["vehicle_number"]; ?><br>
         <strong>Company Marka No</strong> : <?php echo $customer["company_marka_no"]; ?><br>
        <strong>Company Transport</strong> : <?php echo $customer["company_transport"]; ?><br>
                 

                 <strong>Mode of Transport</strong> : <?php echo $customer["company_transport_mode"]; ?><br>
                 
                 
                 <strong>Date & Time of Supply</strong> : <?php echo date('d/m/Y h:i A', strtotime($invoice["supplydate"])); ?>  <br>
                 <strong>Place of Supply</strong> : <?php echo $invoice["place_supply"]; ?><br>
                  <strong>Electronic Reference No</strong> : <?=$invoice['electronic_ref_no']?>
               </p>
      </div>
    <div style="clear: both"></div>
</div>


<div style="height: 2px" style="border-top: solid 1px #74859A; "></div><br>


 <table class="maintab1" width="100%">
    <tbody>
      <tr class="main-tab">
        <td>
          <table class="product" cellpadding="0px" cellspacing="0px">
            <tbody><tr>
              <td width="5%" class="cntr">S.no</td>
              <td width="25%">Description of Goods</td>
              <td width="5%">HSN Code</td>
              <td width="5%" class="cntr">Qty</td>
              <td width="5%" class="cntr">UOM</td>
              <td width="5%" class="cntr">Rate (INR)</td>
              <td width="5%" class="cntr">Taxable value (INR)</td>
              <td width="10%"><table class="bdn cntr"><tbody><tr><td colspan="2" class="cntr" style="text-align: center;">CGST</td></tr><tr><td>Rate</td><td class="seperator"></td><td>Amount</td></tr></tbody></table></td>
              <td width="10%"><table class="bdn cntr"><tbody><tr><td colspan="2" align="center">SGST</td></tr><tr><td>Rate</td><td class="seperator"></td><td>Amount</td></tr></tbody></table></td>
              <td width="10%"><table class="bdn cntr"><tbody><tr><td colspan="2" align="center">IGST</td></tr><tr><td>Rate</td><td class="seperator"></td><td>Amount</td></tr></tbody></table></td>
              
              <td width="10%" class="cntr">Amount (INR)</td>
            </tr>
          
     
      <?php
        
        $i = 1;
        $total_tax_amount = 0;
        $total_total_cost = 0;

        $total_sgst = $total_csgst = $total_igst = $total_taxable = 0;
        foreach($order_details as $product){
          $product_info = $this->Common_model->get_sql_row_array('select * from products where id='.$product['product_id']);;

          $total_sgst = $total_sgst + (float)$product["sgst_amount"];
          $total_csgst = $total_csgst+ (float)$product["cgst_amount"];
          $total_igst = $total_igst + (float)$product["igst_amount"];
          $total_taxable = $total_taxable + (float)$product["taxable_value"];

            

            $total_tax_amount += $product["tax_amount"];
            $total_total_cost += $product["total_cost"];            
          ?>

            <tr>
              <td width="5%" class="cntr"><p style="font-size: 20px;"><?=$i?></p></td>
              <td width="25%"><p style="font-size: 20px;"><?php echo $product["title"]; ?></p></td>
              <td width="5%"><p style="font-size: 20px;"><?php echo $product_info["hsncode"]; ?></p></td>
              <td width="5%" class="cntr"><p style="font-size: 20px;"><?php echo $product["qty"]; ?></p></td>
              <td width="5%" class="cntr"><p style="font-size: 20px;"><?=$product_info['unit']?></p></td>
              <td width="5%" class="cntr"><p style="font-size: 20px;"><?php echo $product["product_cost"]; ?></p></td>
              <td width="5%" class="cntr"><p style="font-size: 20px;"><?php echo $product["taxable_value"]; ?></p></td>
              <td width="10%">
                  <table class="bdn" width="100%">
                    <tbody>
                      <tr>
                        <td class="cntr"><p style="font-size: 20px;"><?php echo $product["cgst"]; ?>%</p></td>
                        <td class="seperator"></td>
                        <td class="cntr"><p style="font-size: 20px;"><?php echo $product["cgst_amount"]; ?></p></td>
                      </tr>
                    </tbody>
                  </table>
              </td>
              <td width="10%">
                  <table class="bdn" width="100%">
                    <tbody>
                      <tr>
                        <td class="cntr" align="center"><p style="font-size: 20px;"><?php echo $product["sgst"]; ?>%</p></td>
                        <td class="seperator"></td>
                        <td class="cntr"><p style="font-size: 20px;"><?php echo $product["sgst_amount"]; ?></p></td>
                      </tr>
                    </tbody>
                  </table>
              </td>
              <td width="10%">
                  <table class="bdn" width="100%">
                    <tbody>
                      <tr>
                        <td class="cntr"><p style="font-size: 20px;"><?php echo $product["igst"]; ?>%</p></td>
                        <td class="seperator"></td>
                        <td class="cntr"><p style="font-size: 20px;"><?php echo $product["igst_amount"]; ?></p></td>
                      </tr>
                    </tbody>
                  </table>
              </td>
              
              <td width="10%" class="cntr"><p style="font-size: 20px;"><?=$product["total_cost"]?></p></td>

            </tr>
           

          <?php  $i++; }  
          $totalrows = count($order_details);
          if($totalrows<15)
          {
            $k = 20 - $totalrows;
            for($i=1; $i<=$k; $i++){
              ?>
              <tr style="height: 30px;">
              <td width="5%"><p style="font-size: 20px;">&nbsp;</p></td>
              <td width="25%"><p style="font-size: 20px;">&nbsp;</p></td>
              <td width="5%"><p style="font-size: 20px;">&nbsp;</p></td>
              <td width="5%"><p style="font-size: 20px;">&nbsp;</p></td>
              <td width="5%"><p style="font-size: 20px;">&nbsp;</p></td>
              <td width="5%"><p style="font-size: 20px;">&nbsp;</p></td>
              <td width="5%"><p style="font-size: 20px;">&nbsp;</p></td>
              <td width="10%"><p style="font-size: 20px;">&nbsp;</p></td>
              <td width="10%"><p style="font-size: 20px;">&nbsp;</p></td>
              <td width="10%"><p style="font-size: 20px;">&nbsp;</p></td>
              
              <td width="10%"><p style="font-size: 20px;">&nbsp;</p></td>
            </tr>
              

              <?php 
            }
          }
        ?>  
        <tr>
            <td colspan="6"></td>
            <td class="cntr"><p style="font-size: 20px;"><?=$total_taxable?></p></td>
            <td class="cntr"><p style="font-size: 20px;"><?=$total_csgst?></p></td>
            <td class="cntr"><p style="font-size: 20px;"><?=$total_sgst?></p></td>
            <td class="cntr"><p style="font-size: 20px;"><?=$total_igst?></p></td>
            <td></td>
          </tr>
        <tr>
            <td colspan="8"></td>
            <td class="cntr" colspan="2"><p style="font-size: 20px;">Total Amount (INR)</p></td>
            <td class="cntr"><p style="font-size: 20px;"><?php echo number_format(round($total_total_cost),2); ?></p></td>
          </tr>
     
    </tbody>
      </table>
    </td>
  </tr>
          
       <tr>
        <td>
            <table class="bd pd20" width="100%">
              <tr>
                <td width="70%">
                  <p style="font-size: 20px;">
                <?php echo $owner["terms"]; ?>
                </p>
              </td>
              <td class="seperator"></td>
              <td width="28%" >
                <p style="font-size: 20px;">
                <center><strong><?php echo $owner["name"]; ?></strong></center>
                <br>

                <img src="<?=base_url()?>resources/img/signature.jpg" width="50%">
                <center>Authorised Signatory</center>
              </p>

              </td>
            </tr>
        </table>
     </td>
      </tr>
       
      
    </tbody>
  </table>

  <div style="height: 50px"></div>

</div>
</body>
</html>
