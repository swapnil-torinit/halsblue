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
                        return ($a["created_on"] < $b["created_on"]) ? -1 : 1;
                    }
                    usort($ledger,"cmp");
                    ?>
                    <h4> </h4>
                   </div>
                 <!-- Search functionality -->
                <div class="clearfix">  </div>   
                <form action="" method="post" accept-charset="utf-8">
                    <div class="col-md-2"> Select From Date</div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="from_date" value="<?php echo date('Y-m-d') ?>" class="has-datetimepicker_new form-control valid">
                        </div>
                    </div>
                    <div class="col-md-2">Select To Date</div>
                    <div class="col-md-3">  
                        <div class="form-group">
                            <input type="text" name="to_date" value="<?php echo date('Y-m-d') ?>" class="has-datetimepicker_new form-control valid">
                        </div></div>
                    <div class="col-md-1"><input type="submit" name="srearch" value="Search" class="btn btn-success btn-sm"></div>
                     <div class="col-md-1"><input type="submit" name="" value="All" class="btn btn-success btn-sm"></div>
                </form>
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
                                echo 'Invoice Id: '.$c['invoice_no'].', Tax: '.$c['tax_amount'].', Payment Status: '.$c['payment_status'].',  Status: '.$c['invoice_status'];
                            }

                            //Print Payment Details
                            if(isset($c['pay_invoices']) && $c['pay_invoices']!='')
                            {
                                $inv  = json_decode($c['pay_invoices']);
                                if(count($inv)>0)
                                { 
                                foreach ($inv as $value) {
                                    echo "Settled Invoice(s): #$value->invoice_id, Rs $value->amount_paid ($value->status) <br>";
                                }
                                }
                            }
                            ?></td>
                           
                        </tr>
                    <?php $i++;} ?>
                    <tr> 
                        <td colspan="3">Total</td>
                        <td><?php echo  $credit[0]['credit']; ?> </td>
                        <td><?php echo $debit[0]['debit']; ?></td>
                        <td>Balance</td>
                        <td><?php echo $credit[0]['credit']-$debit[0]['debit']; ?></td>
                    </tr>  
                    <tbody>
                </table>
                <div>
                    <div class="col-md-6">
                        <a href="<?php echo site_url('ledger/download_ladger/'.$this->uri->segment(3));?>" class="btn btn-primary btn-sm">Print</a>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>
