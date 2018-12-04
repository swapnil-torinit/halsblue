<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
  <link rel="stylesheet" href="<?php echo site_url('resources/css/pdf.css');?>">
</head>

<body>
 
<div class="invoive">
  <h4 style="text-align: center;">Pending Invoices: (<?=count($invoices);?>)</h4>
  <div>
  <div style="width: 15%; float: left;"><br>
    <img src="<?=base_url();?>/resources/img/logo.jpg"></div>
   
    <div style="width: 58%; float: left; margin-left: 1px;">
      <div style="width: 80%">
    <p style="font-size: 10px;"><b><?php echo $owner["name"]; ?></b><br>
    
                <?php echo $owner["address"]; ?><br>
                Email: <?php echo $owner["notification_email"]; ?> | <?php echo $owner["website"]; ?><br>
                GSTIN: <?=$owner['GSTIN'];?>
                
              </p>
      </div>
    </div>
    <div style="width: 20%; float: right;">
      <p style="font-size: 10px;"><br>
                <strong>Date</strong>: <?php echo date('d/m/Y'); ?>
      </p>
    </div>
    
    <div style="clear: both"></div>
</div>
<hr>
 <div>
  <div style="width: 60%; float: left;">
     <p style="font-size: 10px;">
                      <strong>Customer Details</strong> <br>
                      <strong>Name</strong>: <?php echo $customer["company_name"]; ?><br>
                      <strong>Address</strong>: <?php echo $customer["company_address"]; ?><br>
                      <?php echo (isset($customer["company_address2"]) && $customer["company_address2"]!='')?$customer["company_address2"].'<br>':''; ?>
                      <strong>State</strong>: <?php echo $state["state_name"]; ?><br>
                      <strong>State Code</strong>: <?php echo $state["id"]; ?><br>
                      <strong>GSTIN</strong>: <?php echo $customer["company_gst_no"]; ?>
    </p>
  </div>
   <div style="width: 40%; float: left;">
      <p style="font-size: 10px;"><strong>Account Details</strong><br>
        <strong>Account Name</strong>: Hals Blue Overseas Private Limited
        <strong>Account No</strong>: 916020073217639<br>
        <strong>IFSC Code</strong>: UTIB0001180<br>
        <strong>Bank Name</strong>: Axis Bank<br>
        <strong>Bank Branch</strong>: Kashmere Gate<br>
               </p>
      </div>
    <div style="clear: both"></div>
</div>

<hr>
<div style="height: 2px"></div>


 <table  class="product maintab1" cellpadding="0px" cellspacing="0px" width="100%" autosize="0" style="font-style: 10px;">
  <thead>
    <tr>
    <td width="10%"  class="cntr"><p>S.no</p></td>
    <td  width="15%" class="cntr"><p>Invoice No</p></td>
    <td  width="15%" class="cntr"><p>Invoice Date</p></td>
    <td  width="15%" class="cntr"><p>Due Date</p></td>
    
    <td  width="20%" class="cntr"><p>Amount</p></td>
  </tr>
  </thead>
    <tbody>          
      <?php   
        $i = 1;
        $total=0;
        foreach($invoices as $invoice){
          $total = $total + $invoice["balance_amount"];
          ?>

            <tr>
              <td  width="10%" class="cntr"><p><?=$i?></p></td>
              <td  width="15%" class="cntr"><p><?php echo $invoice["invoice_no"]; ?></p></td>
              <td  width="15%" class="cntr"><p><?php echo date('d/m/Y', strtotime($invoice['created_on'])); ?></p></td>
              
              
              <td  width="15%" class="cntr"><p><?php echo date('d/m/Y', strtotime($invoice['invoice_due_date'])); ?></p></td>
              <td  width="20%" class="cntr"><p><?php echo $invoice["balance_amount"]; ?></p></td>
              
        

            </tr>
           

          <?php  $i++; }  
          
        ?>  

        <tr>
            <td width="60%" colspan="3" class="cntr"></td>
            <td width="20%" class="cntr"><p>Total Amount</p></td>
            <td width="20%" class="cntr"><p><?php echo number_format($total,2); ?></p></td>
          </tr>
 </tbody>
</table>
          
<table class="bd pd20" width="100%">
  <tr>
    <td width="70%">
      <p>
      <?php echo $owner["terms"]; ?>
      </p>
    </td>
    <td class="seperator"></td>
    <td width="28%" >
      <p>
      <center><strong><?php echo $owner["name"]; ?></strong></center>
      <br>
      <img src="<?=base_url()?>resources/img/signature.jpg" width="150px">
      <center>Authorised Signatory</center>
      </p>

    </td>
  </tr>
</table>


  <div style="height: 100px"></div>
 

</div>
</body>
</html>
