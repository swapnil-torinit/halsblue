<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Payment Listing</h3>            	
            </div>
            <div class="box-body">
                <table class="table table-striped" id="category_wrapper">
                    <?php //echo "<pre>"; print_r($customers); ?>
                    <thead>
                        <tr>                        
    						<th>Srno.</th>
    						<th>Customer name</th>
    						<th>Total Amount</th>
                            <th>Total Pending As per Due Date</th>
                            <th>Total Sales</th>
                            <th>Make Payment</th>
    						<th>Action</th> 
                            <th>Pending Invoices</th>                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach($customers as $c){
                    $curr_date = date('Y-m-d'); ?>                    
                        <tr>
    						<td><?php echo $i; ?></td>
    						<td><?php echo $c['name']; ?></td>
                            <td>
                                <?php
                                    $qu = $this->db->query("select sum(balance_amount) as total_cost from invoices where customer_id = '".$c['id']."' and payment_status != 'completed'");                
                                    $pending_amt = $qu->row();                        

                                    $ctotal_pending_amt = '';
                                    $qu = $this->db->query("select id from invoices where customer_id = '".$c['id']."' and payment_status != 'completed'");                
                                    $total_pending_amt = $qu->result();           
                                    foreach($total_pending_amt as $total_pending_amts){
                                        if($ctotal_pending_amt == ""){
                                            $ctotal_pending_amt .= $total_pending_amts->id;
                                        }
                                        else{
                                            $ctotal_pending_amt .= ",".$total_pending_amts->id;
                                        }
                                    }
                                ?>
                                <a href="javascript:void(0);" data-toggle="tooltip" title="<?php echo "Invoice ID #".$ctotal_pending_amt; ?>"><?php echo $pending_amt->total_cost; ?></a>
                            </td>
    						<td>
                                <?php
                                    
                                    $qu = $this->db->query("select sum(balance_amount) as pending_due_date from invoices where customer_id = '".$c['id']."' and  invoice_due_date < '".$curr_date."' and payment_status != 'completed'");                
                                    $pending_due_date = $qu->row();                        

                                    $ctotal_pending_due_date = '';
                                    $qu = $this->db->query("select id from invoices where customer_id = '".$c['id']."' and  invoice_due_date < '".$curr_date."' and payment_status != 'completed'");                
                                    $total_pending_due_date = $qu->result();           
                                    foreach($total_pending_due_date as $total_pending_due_dates){
                                        if($ctotal_pending_due_date == ""){
                                            $ctotal_pending_due_date .= $total_pending_due_dates->id;
                                        }
                                        else{
                                            $ctotal_pending_due_date .= ",".$total_pending_due_dates->id;
                                        }
                                    }
                                ?>
                                <a href="javascript:void(0);" data-toggle="tooltip" title="<?php echo "Invoice ID #".$ctotal_pending_due_date; ?>"><?php echo $pending_due_date->pending_due_date; ?></a>
                            </td>
                            <td>
                                <?php
                                    $qu = $this->db->query("select sum(total_cost) as total_sales from invoices where customer_id = '".$c['id']."'");                
                                    $total_sales = $qu->row();           

                                    $ctotal_sales_id = '';
                                    $qu = $this->db->query("select id from invoices where customer_id = '".$c['id']."'");                
                                    $total_sales_id = $qu->result();           
                                    foreach($total_sales_id as $total_sales_ids){
                                        if($ctotal_sales_id == ""){
                                            $ctotal_sales_id .= $total_sales_ids->id;
                                        }
                                        else{
                                            $ctotal_sales_id .= ",".$total_sales_ids->id;
                                        }
                                    }
                                ?>
                                <a href="javascript:void(0);" data-toggle="tooltip" title="<?php echo "Invoice ID #".$ctotal_sales_id; ?>"><?php echo $total_sales->total_sales; ?></a>                                
                            </td>
                            <td> <a href="<?php echo site_url('pay/add/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-inr"></span>Pay</a>   </td>
    						<td>
                                <a href="<?php echo site_url('ledger/showuser/'.$c['id']); ?>" class="btn btn-success btn-xs"><span class="fa fa-bookmark-o"></span> Show Ledger</a>                                 
                            </td>
                            <td>
                                <a href="<?php echo site_url('ledger/showPendingInvoices/'.$c['id']); ?>" class="btn btn-success warning"><span class="fa fa-bookmark-o"></span> Pending Invoices</a>                                 
                            </td>
                            
                        </tr>
                    <?php $i++;} ?>
                    <tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
