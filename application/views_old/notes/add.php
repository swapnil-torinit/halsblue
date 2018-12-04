<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Notes Add</h3>
            </div>
            <?php echo form_open('notes/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="title" class="control-label"><span class="text-danger">*</span>Title</label>
						<div class="form-group">
							<input type="text" name="title" value="<?php echo $this->input->post('title'); ?>" class="form-control" id="title" />
							<span class="text-danger"><?php echo form_error('title');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="remark" class="control-label">Remark</label>
						<div class="form-group">
							<textarea name="remark" class="form-control" id="remark"><?php echo $this->input->post('remark'); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="reminder_date" class="control-label">Reminder Date</label>
						<div class="form-group">
							<input type="text" name="reminder_date" value="<?php echo $this->input->post('reminder_date'); ?>" class="has-datetimepicker form-control" id="reminder_date" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<select name="status" class="form-control">								
								<option value="1" <?php if($this->input->post('status') == "1"){ ?> selected="selected" <?php } ?>>Open</option>
								<option value="0" <?php if($this->input->post('status') == "0"){ ?> selected="selected" <?php } ?>>Close</option>
							</select>
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