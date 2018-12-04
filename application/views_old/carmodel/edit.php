<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Car model Edit</h3>
            </div>			
			<form action="<?php echo base_url(); ?>carmodel/edit/<?php echo $carmodel['id']; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">            
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Select Car make</label>
						<div class="form-group">
							<select name="car_make_id" class="form-control">
								<?php 
								foreach($all_car_make as $car_makes)
								{
									$selected = ($car_makes['id'] == $carmodel['car_make_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$car_makes['id'].'" '.$selected.'>'.$car_makes['name'].'</option>';
								} 
								?>
							</select>							
							<span class="text-danger"><?php echo form_error('car_make_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="model_no" class="control-label"><span class="text-danger">*</span>Model no.</label>
						<div class="form-group">							
							<input type="text" name="model_no" value="<?php echo ($this->input->post('model_no') ? $this->input->post('model_no') : $carmodel['model_no']); ?>" class="form-control" id="model_no" />
							<span class="text-danger"><?php echo form_error('model_no');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="remark" class="control-label">Remark</label>
						<div class="form-group">
							<textarea name="remark" class="form-control" id="remark"><?php echo ($this->input->post('remark') ? $this->input->post('remark') : $carmodel['remark']); ?></textarea>
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