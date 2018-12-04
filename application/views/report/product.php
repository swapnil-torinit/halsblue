<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Product Sale Report</h3>
                    </div>                         
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">   
                                <label for="product_id" class="control-label">Select Product</label>
                                <div class="form-group">
                                    <select name="product_id" class="form-control" id="product_id" >
                                        <option value="">All</option>
                                        <?php 
                                        foreach($all_product as $products)
                                        {   
                                            echo '<option value="'.$products['id'].'">'.$products['name'].'</option>';
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
                                    <button type="button" class="btn btn-success" id="get_product_report">
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
                            <th>SKU</th>						
    						<th>Product name</th>
                            <th>Total Sale</th>
                            <th>Invoice#</th>
                            <th>Stock Availibility</th>                        
                        </tr>
                    <thead>
                    <tbody id="tbody_product_report">    
                        <?php if(!empty($order_details)){
                            foreach($order_details as $p){  
                                $qu = "select sum(qty) as qty from order_details where (created >= '".$invoice_to."' and created <= '".$invoice_from."') and product_id = '".$p->product_id."'";
                                $query = $this->db->query($qu);
                                $total_sale = $query->row();    

                                $qu = "select sku, name, quantity from products where id = '".$p->product_id."'";
                                $query = $this->db->query($qu);
                                $products = $query->row();    

                                $invoice_ids = "";
                                $qu = "select invoice_id from order_details where (created >= '".$invoice_to."' and created <= '".$invoice_from."') and product_id = '".$p->product_id."'";
                                $query = $this->db->query($qu);
                                $invoice_data = $query->result();    
                                foreach($invoice_data as $invoic){
                                    if($invoice_ids == ""){
                                        $invoice_ids = $invoic->invoice_id;
                                    }
                                    else{
                                        $invoice_ids .= ",".$invoic->invoice_id;   
                                    }
                                }
                        ?>
                            <tr>
                                <td><?php echo $products->sku; ?></td>
                                <td><?php echo $products->name; ?></td>                     
                                <td><?php echo $total_sale->qty; ?></td>                      
                                <td>Invoice ID#<?php echo $invoice_ids; ?></td>                     
                                <td><?php echo $products->quantity; ?></td>                      
                            </tr>
                        <?php } ?>
                            <tr>
                                <td colspan="5">
                                    <a href="<?php echo base_url(); ?>report/export_product_report/<?php echo $invoice_to; ?>/<?php echo $invoice_from; ?>/0" class="btn btn-info btn-xs">
                                        <span class="fa fa-pencil"></span>Export CSV
                                    </a>
                                </td>
                            </tr>
                        <?php } else{ ?>
                            <tr>
                                <td colspan="5">No record Found.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>                               
            </div>
        </div>
    </div>
</div>
