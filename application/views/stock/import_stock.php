<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Product Export Import</h3>
            </div>
            Labels Should be in following order:
            <br>
            SKU Name  , Consumer_price , retailer_price , wholeseller_price ,  Quantity  ,  tax_class  , Category Name ,  Brand Name,  Car Make  , image  , description
            <form action="<?php echo base_url(); ?>stock/import_stock" method="post" accept-charset="utf-8" enctype="multipart/form-data">            
            <div class="box-body">
                <div class="row clearfix">
                    
                    <div class="col-md-6">
                        <label for="stock" class="control-label">Stock File in CSV Format</label>
                        <div class="form-group">
                            <input type="file" name="stock" class="form-control" id="stock" required="" />
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
