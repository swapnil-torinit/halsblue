<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Setting Edit</h3>
            </div>
            <?php $attributes = array( 'id' => 'validate_setting'); echo form_open('setting/index/', $attributes); ?>
			<div class="box-body">
				<div class="row clearfix">					
					<div class="col-md-6">
						<label for="state_id" class="control-label"><span class="text-danger">*</span>State</label>
						<div class="form-group">
							<select name="state_id" class="form-control">
								<option value="">select state</option>
								<?php 
								foreach($all_state as $state)
								{
									$selected = ($state['id'] == $setting['state_id']) ? ' selected="selected"' : "";
									echo '<option value="'.$state['id'].'" '.$selected.'>'.$state['state_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Company Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo  $setting['name']; ?>" class="form-control" id="name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="address" class="control-label"><span class="text-danger">*</span>Address</label>
						<div class="form-group">
							<input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $setting['address']); ?>" class="form-control" id="address" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="notification_email" class="control-label"><span class="text-danger">*</span>Notification email</label>
						<div class="form-group">
							<input type="text" name="notification_email" value="<?php echo ($this->input->post('notification_email') ? $this->input->post('notification_email') : $setting['notification_email']); ?>" class="form-control" id="notification_email" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="notification_email" class="control-label"><span class="text-danger">*</span>GSTIN</label>
						<div class="form-group">
							<input type="text" name="GSTIN" value="<?php echo ($this->input->post('GSTIN') ? $this->input->post('GSTIN') : $setting['GSTIN']); ?>" class="form-control" id="GSTIN" />
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