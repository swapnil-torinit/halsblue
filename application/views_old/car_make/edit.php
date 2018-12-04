<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Car make Edit</h3>
            </div>			
			<form action="<?php echo base_url(); ?>car_make/edit/<?php echo $car_make['id']; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">            
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $car_make['name']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="logo" class="control-label">Logo</label>

						<div class="form-group">
							
								<?php if(!empty($car_make['logo'])){ ?>
								<div class="col-md-6">
                                <image src="<?php echo base_url(); ?>upload/car_make/<?php echo $car_make['logo']; ?>" style="max-width: 100%;" alt="<?php echo $car_make['logo']; ?>" />
                                	</div>
                            <?php } ?>

							
						<div class="col-md-6">

							<input type="file" name="logo" class="form-control" id="logo" />
		                    <input type="hidden" value="<?php echo ($this->input->post('logo') ? $this->input->post('logo') : $car_make['logo']); ?>" name="image_copy" />
                                                    </div>
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