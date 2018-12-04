<?php
$invoice_to =isset($_GET['invoice_to'])?$_GET['invoice_to']:'';
$invoice_from=isset($_GET['invoice_from'])?$_GET['invoice_from']:'';
$customer_id = isset($_GET['customer_id'])?$_GET['customer_id']:'';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Customer Purchase Behaviour Report</h3>
                    </div>                         
                    <div class="col-md-12">
                        <form method="get" action="">
                        <div class="row">
                                                
                            <div class="col-md-2">
                                <label for="invoice_to" class="control-label">To Date</label>
                                <div class="form-group">
                                    <input type="text" name="invoice_to" value="<?php echo $invoice_to ?>" class="has-datetimepicker_new form-control" id="invoice_to" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="invoice_from" class="control-label">From Date</label>
                                <div class="form-group">
                                    <input type="text" name="invoice_from" value="<?php echo $invoice_from; ?>" class="has-datetimepicker_new form-control" id="invoice_from" />
                                </div>
                            </div>


                            <div class="col-md-6" id="div_customer_id" >
                                <label for="customer_id" class="control-label">Select Customer</label>
                                <div class="form-group">
                                    <select name="customer_id" class="form-control" id="invoice_customer_id" >
                                        <option value="">select Customer</option>
                                        <?php 
                                        foreach($all_customer as $customers)
                                        {   
                                            $sel=($customers->id==$customer_id)?'selected':'';
                                            echo '<option value="'.$customers->id.'" '.$sel.'>'.$customers->company_name.'</option>';
                                        } 
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <label for="invoice_c" class="control-label"></label>
                                <div class="form-group">
                                    <input type="submit" value="Filter" class="btn btn-success">
                                    
                                    <a href="<?=base_url()?>report/get_product_sale_report" class="btn btn-success">Reset</a>
                                </div>
                            </div>   
                        </div>
                    </form>
                    </div>                  
                </div>
            </div>
           
            <div class="box-body">
                <table class="table table-striped" id="report_table">
                    <thead>
                        <tr>
                            <th>Customer Name</th>                       
                                         
                            <th>Product Name</th>  
                            <th>SKU</th>                      
                            <th>Total Purchased Quantity</th>                        
                                                   
                        </tr>
                    <thead>
                    <tbody id="tbody_invoice_report">    
                        <?php if(!empty($report)){                            
                            foreach($report as $p){        
                               
                        ?>
                            <tr>
                                <td><?php echo $p->company_name; ?></td>
                                <td><?php echo $p->title; ?></td>                     
                                <td><?php echo $p->sku; ?></td>                     
                                <td><?php echo $p->totalQty; ?></td>                     
                                                    
                            </tr>
                        <?php } ?>
                            
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
