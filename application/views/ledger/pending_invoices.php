<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pending Invoices: <strong>[<?=count($invoices);?>]</strong></h3>            	
            </div>
            <div class="box-body">
                <div class="col-md-6">
                     <div class="box-title">Customer Details</div>
                    <table class="table">
                      <tr><td>Name</td><td>:</td><td><?=$customer['name'];?></td></tr>
                      <tr><td>Email</td><td>:</td><td><?=$customer['email'];?></td></tr>
                      <tr><td>Mobile</td><td>:</td><td><?=$customer['mobile'];?></td></tr>
                    </table>
                     <h4></h4>
                  </div>
                   <div class="col-md-6">
                    <table class="table">
                        
                        <tr><td>Company Name</td><td>:</td><td><?=$customer['company_name'];?></td></tr>
                      <tr><td>Company GST</td><td>:</td><td><?=$customer['company_gst_no'];?></td></tr>
                      <tr><td>Address</td><td>:</td><td><?=$customer['company_address'];?></td></tr>
            
                    </table>
                    <?php  

                   
                     ?>
                   </div>
                <form method="post" action="<?=base_url()?>ledger/submitpendingInv">
                <table class="table table-striped" id="customer_wrapper">
                    
                    <thead>
                        <tr>                        
    						<th><input type="checkbox" onclick="selectall(this.checked)"></th>
                            <th>Invoice No</th>
                            <th>Invoice Date</th>
                            
                            <th>Due Date</th>
                            <th>Due Amount</th>
                            <th>Due Date</th>
                            <th>Payment Status</th> 
                            <th>OrderStatus</th>
                            <th>Invoices</th>
    						                       
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;$curr_date = date('Y-m-d');
                     foreach($invoices as $c){
                     ?>                    
                        <tr class="<?php echo ($c['id']=='pending')?'warning':''; ?>">
                            <td>
                                <?php if($curr_date>=$c['invoice_due_date']){$chk ='checked'; } else {$chk='';} ?>
                                <input type="checkbox" name="inv[]" value="<?=$c['id']?>" <?=$chk?>>
    						<td><?php echo $c['invoice_no']; ?></td>
    						<td><?php echo date('d/m/y', strtotime($c['invoice_date'])); ?></td>
                            <td><?php echo date('d/m/y', strtotime($c['invoice_due_date'])); ?></td>
                            <td><?php echo isset($c['balance_amount'])?'<i class="fa fa-inr" aria-hidden="true"></i>'.$c['balance_amount']:'-'; ?></td>
                            <td><?php echo date('d/m/y', strtotime($c['invoice_due_date'])); ?></td>
                            <td><?=$c['payment_status'];?></td>

                            <td><?=$c['invoice_status'];?></td>
                            <td><a href="<?=base_url().'upload/invoice_pdf/'.$c['pdf_original'];?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                           
                        </tr>
                    <?php $i++;} ?>
                    <tbody>
                </table>
                <br>
                <div class="col-md-6">
                <input type="submit" name="act" value="Print" class="btn btn-success btn-sm">
                </div>
                <div class="col-md-6 text-right">
                    <div class="form-group">
                        <input type="hidden" name="customer_id" value="<?=$customer['id']?>">
                    <!-- <input type="text" name="email" value="<?=$customer['email']?>" class="form"  class="form-control">
                <input type="submit" name="act" value="Send Email" class="btn btn-success btn-sm"> -->
            </div>
                </div>
            </form>
                                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function selectall(source) {
  checkboxes = document.getElementsByName('inv[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source;
  }
}

</script>


