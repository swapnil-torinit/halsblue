<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Customer Add</h3>
            </div>
            
            <form method="post" action="<?=base_url()?>customer/add" onsubmit="return validate_customer()">
          	<div class="box-body">
          		<div class="row clearfix">
					
					<div class="col-md-6">
						<label for="user_role" class="control-label"><span class="text-danger">*</span>User Role</label>
						<div class="form-group">
							<select name="user_role" class="form-control">
								<?php 
								$user_role_values = array(
									'1'=>'Wholeseller',
									'2'=>'Retailer',
									'3'=>'Consumer',
								);
								foreach($user_role_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('user_role')) ? ' selected="selected"' : "";
									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('user_role');?></span>
						</div>
					</div>
					
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Nick Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					
					<div class="col-md-6">
						<label for="email" class="control-label">Email</label>
						<div class="form-group">
							<input type="email" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mobile" class="control-label">Mobile</label>
						<div class="form-group">
							<input type="text" name="mobile" value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" pattern="\d{10}" required maxlength="10" />
							<span class="text-danger"><?php echo form_error('mobile');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="company_name" class="control-label"><span class="text-danger">*</span>Company Name</label>
						<div class="form-group">
							<input type="text" name="company_name" value="<?php echo $this->input->post('company_name'); ?>" class="form-control" id="company_name" />
							<span class="text-danger"><?php echo form_error('company_name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="company_gst_no" class="control-label"><span class="text-danger">*</span>Company Gst No</label>
						<div class="form-group">
							<input type="text" name="company_gst_no" value="<?php echo $this->input->post('company_gst_no'); ?>" class="form-control" id="company_gst_no" />
							<span class="text-danger"><?php echo form_error('company_gst_no');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="company_marka_no" class="control-label">Private Mark</label>
						<div class="form-group">
							<input type="text" name="company_marka_no" value="<?php echo $this->input->post('company_marka_no'); ?>" class="form-control" id="company_marka_no" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="company_transport" class="control-label">Company Transport</label>
						<div class="form-group">
							<input type="text" name="company_transport" value="<?php echo $this->input->post('company_transport'); ?>" class="form-control" id="company_transport" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="company_transport_mode" class="control-label">Transportation mode</label>
						<div class="form-group">
							<input type="text" name="company_transport_mode" value="<?php echo $this->input->post('company_transport_mode'); ?>" class="form-control" id="company_transport_mode" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="credit_limit_days" class="control-label">Credit Limit Days</label>
						<div class="form-group">
							<input type="text" name="credit_limit_days" value="<?php echo $this->input->post('credit_limit_days'); ?>" class="form-control" id="credit_limit_days" maxlength="2" />
							<span class="text-danger"><?php echo form_error('credit_limit_days');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="company_address" class="control-label">Company Address 1</label>
						<div class="form-group">
							<textarea name="company_address" id="company_address" class="form-control"><?php echo $this->input->post('company_address'); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="company_address" class="control-label">Company Address 2</label>
						<div class="form-group">
							<textarea name="company_address2" id="company_address2" class="form-control"><?php echo $this->input->post('company_address2'); ?></textarea>
						</div>
					</div>
										
					<div class="col-md-6">
						<label for="billing_state" class="control-label"><span class="text-danger">*</span>State</label>
						<div class="form-group">
							<select name="billing_state" class="form-control">
								<option value="">select state</option>
								<?php 
								foreach($all_state as $state)
								{
									$selected = ($state['id'] == $this->input->post('billing_state')) ? ' selected="selected"' : "";

									echo '<option value="'.$state['id'].'" '.$selected.'>'.$state['state_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('billing_state');?></span>
						</div>
					</div>

					<div class="col-md-6">
						<label for="billing_city" class="control-label">Place Of Supply</label>
						<div class="form-group">
							<input type="text" name="billing_city" value="<?php echo $this->input->post('billing_city'); ?>" class="form-control" id="billing_city" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="remarks" class="control-label">Remarks</label>
						<div class="form-group">
							<textarea name="remarks" class="form-control" id="remarks"><?php echo $this->input->post('remarks'); ?></textarea>
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
<script type="text/javascript">
	function validate_customer()
	{
		// alert('client Side validation');
		// return false;

	}
</script>
