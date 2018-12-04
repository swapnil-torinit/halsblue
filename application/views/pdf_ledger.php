<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
  <link rel="stylesheet" href="<?php echo site_url('resources/css/pdf.css');?>">
</head>

<body>
 
<div class="invoive">
  <h4 style="text-align: center;">Ledger Statement</h4>
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
    <td width="10%"  class="cntr"><p>Date</p></td>
    <td  width="30%" class="cntr"><p>Particulars</p></td>
    <td  width="20%" class="cntr"><p>Voucher Type</p></td>
    <!-- <td  width="15%" class="cntr"><p>Vch No</p></td> -->
    <td  width="20%" class="cntr"><p>Debit</p></td>
    <td  width="20%" class="cntr"><p>Credit</p></td>
  </tr>
  </thead>
    <tbody>    
     <?php  
          $ledger = array_merge($receipts, $invoices);
          function cmp($a, $b)
          {
              if ($a["created_on"] == $b["created_on"]) {
                  return 0;
              }
              return ($a["created_on"] < $b["created_on"]) ? -1 : 1;
          }
          usort($ledger,"cmp");
      
        foreach($ledger as $c){
          ?>
            <tr>
              <td  width="10%" class="cntr"><p><?php echo date('d/m/y', strtotime($c['created_on'])); ?></p></td>
              <td  width="30%" class="cntr"><p><?php echo ($c['pay_remark']!="") ? $c['pay_remark'] : $c['invoice_no']; ?></p></td>
              <td  width="20%" class="cntr"><p></p><?php if($c['total_cost']==""){echo "Receipt";}else {echo "Sales"; }?></td>
             <!--  <td  width="15%" class="cntr"><p></p></td> -->
              <td  width="20%" class="cntr"><p><?php if(isset($c['total_cost'])){echo number_format($c['total_cost'],2);} ?></p></td>
              <td  width="20%" class="cntr"><p><?php if(isset($c['pay_amount'])){echo number_format($c['pay_amount'],2); }?></p></td>
            </tr>
          <?php  }  ?>  

          <tr>
            <td width="60%" colspan="3" class="cntr">Total</td>
            <td width="20%" class="cntr"><p><?php echo number_format($debit[0]['debit'],2); ?></p></td>
            <td width="20%" class="cntr"><p><?php echo number_format($credit[0]['credit'],2); ?></p></td>
          </tr>
          <tr>
            <td width="80%" colspan="4" class="cntr"> Closing Balance </td>
            <td width="20%" class="cntr"><p><?php $closingBal = ($debit[0]['debit']-$credit[0]['credit']); echo number_format($closingBal,2); ?></p></td>
          </tr>
          <tr>
            <td width="60%" colspan="3" class="cntr"></td>
            <td width="20%" class="cntr"><p><?php echo number_format($debit[0]['debit'],2); ?></p></td>
            <td width="20%" class="cntr"><p><?php echo number_format($debit[0]['debit'],2); ?></p></td>
          </tr>
 </tbody>
</table>
          
<!-- <table class="bd pd20" width="100%">
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
</table> -->


  <div style="height: 100px"></div>
 

</div>
</body>
</html>
