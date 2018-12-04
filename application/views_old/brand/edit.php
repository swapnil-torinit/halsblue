<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Brand Edit</h3>
            </div>			
			<form action="<?php echo base_url(); ?>brand/edit/<?php echo $brand['id']; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">            
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $brand['name']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="logo" class="control-label">Logo</label>
						<div class="form-group">							
							<input type="file" name="logo" class="form-control" id="logo" />
		                    <input type="hidden" value="<?php echo ($this->input->post('logo') ? $this->input->post('logo') : $brand['logo']); ?>" name="image_copy" />
                            <?php if(!empty($brand['logo'])){ ?>
                                <image src="<?php echo base_url(); ?>upload/brand/<?php echo $brand['logo']; ?>" width="50" alt="<?php echo $brand['logo']; ?>" />
                            <?php } ?>
						</div>
					</div>
					<div class="col-md-6">
						<label for="remark" class="control-label">Remark</label>
						<div class="form-group">
							<textarea name="remark" class="form-control" id="remark"><?php echo ($this->input->post('remark') ? $this->input->post('remark') : $brand['remark']); ?></textarea>
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