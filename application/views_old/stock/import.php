<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Product Export Import</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('product/add'); ?>" class="btn btn-success btn-sm">Add</a>

                </div>
            </div>
            <div class="box-body">
           <a href="<?=site_url('stock/export_stock');?>"  class="btn-info btn">Export Stock In CSV</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?=site_url('stock/import_product');?>" class="btn-success btn">Import Product from CSV</a> [
             <a href="<?php echo base_url();?>resources/format/products.csv" target="_blank" download>Find a sample file here</a>]<br><br>

             <!-- <a href="<?=site_url('stock/import_stock');?>">Import Stock from CSV</a> |&nbsp;
             <a href="<?php echo base_url();?>stockimport.csv" target="_blank">Find a sample file here</a><br> -->

             
             
            <div class=""></div>
            </div>

        </div>
    </div>
</div>
