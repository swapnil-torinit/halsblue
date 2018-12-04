<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Brand Add</h3>
            </div>            
			<form action="<?php echo base_url(); ?>brand/add" method="post" accept-charset="utf-8" enctype="multipart/form-data">            
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
						<label for="logo" class="control-label">Logo</label>
						<div class="form-group">
							<input type="file" name="logo" class="form-control" id="logo" />
							<span class="text-danger"><?php echo form_error('logo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="remark" class="control-label">Remark</label>
						<div class="form-group">
							<textarea name="remark" class="form-control" id="description"><?php echo $this->input->post('remark'); ?></textarea>
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