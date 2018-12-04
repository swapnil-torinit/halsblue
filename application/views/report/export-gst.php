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
                        <h3 class="box-title">Export Customer Data</h3>
                    </div>                         
                    <div class="col-md-12">

                        <div class="row">
                            <form method="post" action="<?=base_url()?>report/export_gst_customer">
                            <div class="col-md-3">
                                <label  class="control-label">File Name</label>
                                <div class="form-group">
                                    <input type="text" name="filename" class="form-control">
                                </div>
                            </div>                
                            <div class="col-md-3">
                                <label  class="control-label">Group Name</label>
                                <div class="form-group">
                                    <input type="text" name="group_name" required="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="invoice_from" class="control-label">Dealer Type</label>
                                <div class="form-group">
                                    <input type="text" name="dealer_type" required="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="invoice_c" class="control-label"></label>
                                <div class="form-group">
                                    <input type="submit" value="Export Customers" class="btn btn-success">
                                    
                                  
                                </div>
                            </div> 
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Export Product Data</h3>
                    </div>                         
                    <div class="col-md-12">

                        <div class="row">
                            <form method="post" action="<?=base_url()?>report/export_gst_product">                
                            <div class="col-md-4">
                                <label for="invoice_to" class="control-label">File Name</label>
                                <div class="form-group">
                                    <input type="text" name="filename" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <label for="invoice_c" class="control-label"></label>
                                <div class="form-group">
                                    <input type="submit" value="Export Products" class="btn btn-success">
                                    
                                  
                                </div>
                            </div> 
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Export Sales Data</h3>
                    </div>                         
                    <div class="col-md-12">

                        <div class="row">
                            <form method="post" action="<?=base_url()?>report/export_gst_sales">                
                            <div class="col-md-3">
                                <label for="invoice_to" class="control-label">File Name</label>
                                <div class="form-group">
                                    <input type="text" name="filename" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="invoice_to" class="control-label">GST Series</label>
                                <div class="form-group">
                                    <input type="text" name="gstseries" class="form-control" required="">
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
                                    <input type="submit" value="Export Sales Data" class="btn btn-success">
                                    
                                  
                                </div>
                            </div> 
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
