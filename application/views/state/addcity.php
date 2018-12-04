<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">State Add</h3>
            </div>
            <?php echo form_open('state/addcity'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="type" class="control-label">State</label>
						<div class="form-group">
							<select name="stateid" class="form-control">
								<option value="">select</option>
								<?php 
								foreach($states as $state)
								{
									$selected = ($state->id == $this->input->post('stateid')) ? ' selected="selected"' : "";

									echo '<option value="'.$state->id.'" '.$selected.'>'.$state->state_name.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="state_name" class="control-label"><span class="text-danger">*</span>City Name</label>
						<div class="form-group">
							<input type="text" name="cityname" value="<?php echo $this->input->post('cityname'); ?>" class="form-control" id="state_name" />
							<span class="text-danger"><?php echo form_error('cityname');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="state_code" class="control-label">Tier Class</label>
						<div class="form-group">
							<input type="text" name="tier_class" value="I" class="form-control" id="state_code" />
							<span class="text-danger"><?php echo form_error('tier_class');?></span>
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