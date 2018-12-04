<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Ledger Statement for <?=$customer['name'];?>: (Total Receipts: <?=count($receipts);?> and Total Invoices: <?=count($invoices);?>)</h3>            	
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
                    <?php  // print_r($ledger);
                   // array_msort($ledger, array('id'=>SORT_DESC));
                    $ledger = array_merge($receipts, $invoices);
                    function cmp($a, $b)
                    {
                        if ($a["created_on"] == $b["created_on"]) {
                            return 0;
                        }
                        return ($a["created_on"] > $b["created_on"]) ? -1 : 1;
                    }
                    usort($ledger,"cmp");
                    ?>
                    <h4> </h4>
                   </div>

                <table class="table table-striped" id="">
                    
                    <thead>
                        <tr>                        
    						<th>Srno.</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Transaction Mode</th>
    						<th>Details</th>                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach($ledger as $c){
                    $curr_date = date('Y-m-d'); ?>                    
                        <tr class="<?php echo ($c['TType']=='payment')?'warning':'success'; ?>">
    						<td><?php echo $i; ?></td>
    						<td><?php echo date('d/m/y', strtotime($c['created_on'])); ?></td>
                            <td><?php echo date('h:i A', strtotime($c['created_on'])); ?></td>
                            <td><?php echo isset($c['pay_amount'])?'<i class="fa fa-inr" aria-hidden="true"></i>'.$c['pay_amount']:'-'; ?></td>
                            <td><?php echo isset($c['total_cost'])?'<i class="fa fa-inr" aria-hidden="true"></i>'.$c['total_cost']:'-'; ?></td>
                            <td><?php 
                            if(isset($c['payment_mode']) && $c['payment_mode']!='')
                            {
                                echo $c['payment_mode'];
                            }
                             elseif($c['pay_mode']){ 
                                echo $c['pay_mode'];
                                if($c['pay_mode']=='Cheque'){
                                    echo '<img src="'.base_url().'resources/img/'.$c['pay_realisation'].'.png">';

                                }
                            }
                      ?></td>
                            <td><?php 
                            //Print Invoice Details
                            if(isset($c['invoice_id']) && $c['invoice_id']!='')
                            {
                                echo 'Invoice Id: '.$c['invoice_id'].', Tax: '.$c['tax_amount'].', Payment Status: '.$c['payment_status'].',  Status: '.$c['invoice_status'];
                            }

                            //Print Payment Details
                            if(isset($c['pay_invoices']) && $c['pay_invoices']!='')
                            {
                                $inv  = json_decode($c['pay_invoices']); 
                                foreach ($inv as $value) {
                                    echo "Settled Invoice(s): #$value->invoice_id, Rs $value->amount_paid ($value->status) <br>";
                                }
                            }
                            ?></td>
                           
                        </tr>
                    <?php $i++;} ?>
                    <tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
