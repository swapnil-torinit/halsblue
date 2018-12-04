<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Export Products in CSV Format</h3>
            	
            </div>
            <div class="box-body">
                <?php echo form_open('stock/export_stock_sub/', array('method'=>'get')); ?>
                <div class="col-md-6">
                        <label for="cat_parent" class="control-label">Select Category</label>
                        <div class="form-group">
                            <select name="cat" class="form-control">
                                <option value="0">All Categories</option>
                                <?php 
                                $qu = $this->db->query("select * from categories where status = 1 and cat_parent=0");                
                                $cat_parent_values = $qu->result();
                                foreach($cat_parent_values as $display_text)
                                {
                                   

                                    echo '<option  value="'.$display_text->id.'">'.$display_text->cat_name.'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="cat_parent" class="control-label">Select Brand</label>
                        <div class="form-group">
                            <select name="brand" class="form-control">
                                <option value="0">All Brands</option>
                                <?php 
                                $qu = $this->db->query("select * from brands where status = 1");                
                                $cat_parent_values = $qu->result();
                                foreach($cat_parent_values as $display_text)
                                {
                                    

                                    echo '<option value="'.$display_text->id.'">'.$display_text->name.'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="box-footer">
                <button type="submit" class="btn btn-success" name="filter" value="Generate">
                    <i class="fa fa-check"></i> Generate CSV
                </button>
            </div>  

             <?php echo form_close(); ?>
           
            </div>

        </div>
    </div>
</div>
