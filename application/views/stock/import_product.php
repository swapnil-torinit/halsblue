<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Product Export Import</h3>
            </div>
            Labels Should be in following order:
            <br>
            SKU,  Name  , Consumer_price , retailer_price , wholesaler_price , HSN Code,  Quantity  ,  tax_class  , Category Name ,  Brand Name,  Car Make  , image  ,description<br>
            <a href="<?php echo base_url();?>resources/format/products.csv" target="_blank" download>Find a sample file here</a>

            <form action="<?php echo base_url(); ?>stock/import_product" method="post" accept-charset="utf-8" enctype="multipart/form-data">            
            <div class="box-body">
                <div class="row clearfix">
                    
                    <div class="col-md-6">
                        <label for="logo" class="control-label">Import CSV File</label>
                        <div class="form-group">
                            <input type="file" name="products" class="form-control" id="products" required="" />
                            <span class="text-danger"><?php echo form_error('products');?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
            </form>


        </div>
    </div>
</div>
