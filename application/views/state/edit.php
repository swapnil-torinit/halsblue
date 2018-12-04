<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">State Edit</h3>
            </div>
			<?php echo form_open('state/edit/'.$state['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="type" class="control-label">Type</label>
						<div class="form-group">
							<select name="type" class="form-control">
								<option value="">select</option>
								<?php 
								$type_values = array(
									'state'=>'State',
									'ut'=>'UT',
								);

								foreach($type_values as $value => $display_text)
								{
									$selected = ($value == $state['type']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="state_name" class="control-label"><span class="text-danger">*</span>State Name</label>
						<div class="form-group">
							<input type="text" name="state_name" value="<?php echo ($this->input->post('state_name') ? $this->input->post('state_name') : $state['state_name']); ?>" class="form-control" id="state_name" />
							<span class="text-danger"><?php echo form_error('state_name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="state_code" class="control-label"><span class="text-danger">*</span>State Code</label>
						<div class="form-group">
							<input type="text" name="state_code" value="<?php echo ($this->input->post('state_code') ? $this->input->post('state_code') : $state['state_code']); ?>" class="form-control" id="state_code" />
							<span class="text-danger"><?php echo form_error('state_code');?></span>
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