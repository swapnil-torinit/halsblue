<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Invoice Report</h3>
                    </div>                         
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">   
                                                                 
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
                                    <button type="button" class="btn btn-success" id="get_invoice_report">
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
                            <th>Customer Name</th>                       
                            <th>Invoice Date</th>
                            <th>Invoice No</th>
                            <th>Payment Mode</th>                        
                            <th>Payment Status</th>                        
                            <th>Products Included [SKU’s]</th>                        
                            <th>total amount</th>                        
                            <th>amount</th>                        
                            <th>tax</th>                        
                        </tr>
                    <thead>
                    <tbody id="tbody_invoice_report">    
                        <?php if(!empty($invoice_details)){                            
                            foreach($invoice_details as $p){        
                                $invoice_ids = "";                            
                                $qu = "select sku from order_details where (created >= '".$invoice_to."' and created <= '".$invoice_from."') and invoice_id = '".$p->id."'";
                                $query = $this->db->query($qu);
                                $invoice_data = $query->result();    
                                foreach($invoice_data as $invoic){
                                    if($invoice_ids == ""){
                                        $invoice_ids = $invoic->sku;
                                    }
                                    else{
                                        $invoice_ids .= ",".$invoic->sku;   
                                    }
                                }   
                                $amt = $p->total_cost + $p->tax_amount;
                        ?>
                            <tr>
                                <td><?php echo $p->customer_name; ?></td>
                                <td><?php echo $p->invoice_date; ?></td>                     
                                <td><?php echo $p->id; ?></td>                     
                                <td><?php echo $p->payment_mode; ?></td>                     
                                <td><?php echo $p->payment_status; ?></td>                      
                                <td><?php echo $invoice_ids; ?></td>                      
                                <td><?php echo $amt; ?></td>                      
                                <td><?php echo $p->total_cost; ?></td>                      
                                <td><?php echo $p->tax_amount; ?></td>                      
                            </tr>
                        <?php } ?>
                            <tr>
                                <td colspan="9">
                                    <a href="<?php echo base_url(); ?>report/export_invoice_report/<?php echo $invoice_to; ?>/<?php echo $invoice_from; ?>" class="btn btn-info btn-xs">
                                        <span class="fa fa-pencil"></span>Export CSV
                                    </a>
                                </td>
                            </tr>
                        <?php } else{ ?>
                            <tr>
                                <td colspan="9">No record Found.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>                               
            </div>
        </div>
    </div>
</div>
