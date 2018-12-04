<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Variations Add</h3>
            </div>
            <?php echo form_open('variations/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
                <div class="col-md-6">
                  <label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
                  <div class="form-group">
                    <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
                    <span class="text-danger"><?php echo form_error('name');?></span>
                  </div>
                </div>
      					<div class="col-md-6">
      						<label for="name_value" class="control-label"><span class="text-danger">*</span>Value</label>
      						<div class="form-group">
      							<input type="text" name="name_value" value="<?php echo $this->input->post('name_value'); ?>" class="form-control" id="name_value" />
      							<span class="text-danger"><?php echo form_error('name_value');?></span>
      						</div>
      					</div>
      				</div>
      			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>