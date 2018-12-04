<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tax Clas Add</h3>
            </div>
            <?php echo form_open('tax_clas/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tax_name" class="control-label"><span class="text-danger">*</span>Tax Name</label>
						<div class="form-group">
							<input type="text" name="tax_name" value="<?php echo $this->input->post('tax_name'); ?>" class="form-control" id="tax_name" />
							<span class="text-danger"><?php echo form_error('tax_name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tax_per" class="control-label"><span class="text-danger">*</span>Tax Per</label>
						<div class="form-group">
							<input type="text" name="tax_per" value="<?php echo $this->input->post('tax_per'); ?>" class="form-control" id="tax_per" />
							<span class="text-danger"><?php echo form_error('tax_per');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="remarks" class="control-label">Remarks</label>
						<div class="form-group">
							<input type="text" name="remarks" value="<?php echo $this->input->post('remarks'); ?>" class="form-control" id="remarks" />
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