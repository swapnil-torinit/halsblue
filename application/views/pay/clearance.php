<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Clearance Listing</h3>            	
            </div>
            <div class="box-body">
                <table class="table table-striped" id="table_wrapper_id">
                    <thead>
                        <tr>    
                            <th class="dn">ID</th>                    
    						<th>Payment Date</th>
                            <th>Customer Name</th>
    						<th>Amount</th>
    						<th>Invoice Details</th>
                            <th>Remark</th>
                            <th>Mode</th>

                            
    						<th>Action</th>                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach($pay as $c){
                        
                     ?>     
                     <?php if($c->pay_realisation == 0){ ?>               
                        <tr>
                            <td class="dn"><?=$c->id;?></td>
    						<td><?php echo date('d/m/y', strtotime($c->pay_date)); ?></td>
                            <td><?php echo $c->customer_name; ?></td>
                            <td><?php echo $c->pay_amount; ?></td>
                            <td><?php $inv = json_decode($c->pay_invoices);
                            foreach ($inv as $value) {
                                echo 'Invoice: '.$value->invoice_id.', Amount:'.$value->amount_paid.'<br>';
                                # code...
                            }

                            ?>
                            

                            </td> 

                            
                            <td><?php echo $c->pay_remark; ?></td>
                            <td><?php echo $c->pay_mode; ?></td>
    						<td>
                                
                                <a onclick="return confirm('Are You Sure make payment realisation true!!')" href="<?php echo site_url('pay/pay_realisation/'.$c->id); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Set Payment Realisation</a>                                
                                
                            </td>
                        </tr>
                    <?php $i++;}
                    }
                     ?>
                    <tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
