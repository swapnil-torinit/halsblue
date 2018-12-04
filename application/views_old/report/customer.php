<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Customer Report</h3>
                    </div>                         
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">   
                                <label for="customer_id" class="control-label">Select Customer</label>
                                <div class="form-group">
                                    <select name="customer_id" class="form-control" id="customer_id" >
                                        <option value="">All</option>
                                        <?php 
                                        foreach($all_customer as $customers)
                                        {   
                                            echo '<option value="'.$customers['id'].'">'.$customers['name'].'</option>';
                                        } 
                                        ?>
                                    </select>  
                                </div>                                  
                            </div>                      
                            <div class="col-md-3">
                                <label for="invoice_to" class="control-label">To Date</label>
                                <div class="form-group">
                                    <input type="text" name="invoice_to" value="<?php echo $invoice_to ?>" class="has-datetimepicker_new form-control" id="invoice_to" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="invoice_from" class="control-label">From Date</label>
                                <div class="form-group">
                                    <input type="text" name="invoice_from" value="<?php echo $invoice_from; ?>" class="has-datetimepicker_new form-control" id="invoice_from" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="invoice_c" class="control-label"></label>
                                <div class="form-group">
                                    <button type="button" class="btn btn-success" id="get_customer_report">
                                        <i class="fa fa-check"></i> Get Report
                                    </button>
                                </div>
                            </div>   
                        </div>
                    </div>                  
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>                       
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>State</th>                        
                            <th>Total Transaction</th>                        
                            <th>Total Paid</th>                        
                            <th>Total Pending</th>                        
                        </tr>
                    <thead>
                    <tbody id="tbody_customer_report">    
                        <?php if(!empty($customer_details)){
                            foreach($customer_details as $p){  
                                $qu = "select sum(total_cost) as total_cost from invoices where (created_on >= '".$invoice_to."' and created_on <= '".$invoice_from."') and customer_id = '".$p->id."'";
                                $query = $this->db->query($qu);
                                $total_transaction = $query->row();    

                                $qu = "select sum(total_cost) as total_cost from invoices where (created_on >= '".$invoice_to."' and created_on <= '".$invoice_from."') and customer_id = '".$p->id."' and payment_status = 'Completed'";
                                $query = $this->db->query($qu);
                                $total_paid = $query->row();    

                                $qu = "select sum(total_cost) as total_cost from invoices where (created_on >= '".$invoice_to."' and created_on <= '".$invoice_from."') and customer_id = '".$p->id."' and payment_status != 'Completed'";
                                $query = $this->db->query($qu);
                                $total_pending = $query->row();    

                                $qu = "select state_name from state where id = '".$p->billing_state."'";
                                $query = $this->db->query($qu);
                                $state = $query->row();    
                        ?>
                            <tr>
                                <td><?php echo $p->name; ?></td>
                                <td><?php echo $p->company_name; ?></td>                     
                                <td><?php echo $p->company_address; ?></td>                     
                                <td><?php echo $state->state_name; ?></td>                     
                                <td><?php echo $total_transaction->total_cost; ?></td>                      
                                <td><?php echo $total_paid->total_cost; ?></td>                      
                                <td><?php echo $total_pending->total_cost; ?></td>                      
                            </tr>
                        <?php } ?>
                            <tr>
                                <td colspan="7">
                                    <a href="<?php echo base_url(); ?>report/export_customer_report/<?php echo $invoice_to; ?>/<?php echo $invoice_from; ?>/0" class="btn btn-info btn-xs">
                                        <span class="fa fa-pencil"></span>Export CSV
                                    </a>
                                </td>
                            </tr>
                        <?php } else{ ?>
                            <tr>
                                <td colspan="7">No record Found.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>                               
            </div>
        </div>
    </div>
</div>
