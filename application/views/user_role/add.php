<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">User Role Add</h3>
            </div>
            <?php echo form_open('user_role/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="rolename" class="control-label"><span class="text-danger">*</span>Rolename</label>
						<div class="form-group">
							<input type="text" name="rolename" value="<?php echo $this->input->post('rolename'); ?>" class="form-control" id="rolename" />
							<span class="text-danger"><?php echo form_error('rolename');?></span>
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