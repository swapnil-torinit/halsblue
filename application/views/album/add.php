<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Album Add</h3>
            </div>
            <?php echo form_open('album/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="party_name" class="control-label"><span class="text-danger">*</span>Party Name</label>
						<div class="form-group">
							<input type="text" name="party_name" value="<?php echo $this->input->post('party_name'); ?>" class="form-control" id="party_name" />
							<span class="text-danger"><?php echo form_error('party_name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="amount" class="control-label">Amount</label>
						<div class="form-group">
							<input type="text" name="amount" value="<?php echo $this->input->post('amount'); ?>" class="form-control" id="amount" />
							<span class="text-danger"><?php echo form_error('amount');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="bilty_number" class="control-label">Bilty Number</label>
						<div class="form-group">
							<input type="text" name="bilty_number" value="<?php echo $this->input->post('bilty_number'); ?>" class="form-control" id="bilty_number" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="comment" class="control-label">Comment</label>
						<div class="form-group">
							<textarea name="comment" class="form-control" id="comment"><?php echo $this->input->post('comment'); ?></textarea>
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