<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Payment Listing</h3>            	
            </div>
            <div class="box-body">
                <table class="table table-striped" id="table_wrapper_id">
                    <?php //echo "<pre>"; print_r($customers); ?>
                    <thead>
                        <tr>    
                            <th class="dn">ID</th>                    
    						<th>Srno.</th>
                            <th>Payment Date</th>
    						<th>Company name</th>
    						<th>Amount Paid</th>
                            
                            <th>Payment Mode</th>
                           
                            <th width="35%">Invoice Details</th> 
                            <th>Remarks</th>  
                            <th>Detail</th>                     
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach($receipts as $c){
                    $curr_date = date('Y-m-d'); ?>                    
                        <tr>
                            <td class="dn"><?=$c->id?></td>
    						<td><?php echo $i; ?></td>
    						<td><?php echo date('d/m/y', strtotime($c->pay_date)); ?></td>
                            <td><?php echo $c->company_name; ?></td>
                            <td><?php echo $c->pay_amount; ?></td>
                            <td><?php echo $c->pay_mode;
                             if($c->pay_mode=='Cheque'){
                        echo '<img src="'.base_url().'resources/img/'.$c->pay_realisation.'.png">';

                      }
                      ?></td>
                            <td><?php $inv  = json_decode($c->pay_invoices); 
                            foreach ($inv as $value) {
                                echo "Invoice: #$value->invoice_id, Rs $value->amount_paid ($value->status) <br>";
                            }
                            ?></td>
                             <td><?php echo $c->pay_remark; ?></td>
                            <td>
                                <a href="<?php echo site_url('ledger/receipt_detail/'.$c->id); ?>" class="btn btn-success btn-xs"><span class="fa fa-bookmark-o"></span> Show Details</a>                                 
                            </td>
                           
                        </tr>
                    <?php $i++;} ?>
                    <tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
