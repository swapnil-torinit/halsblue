<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Category Edit</h3>
            </div>
			<?php echo form_open('category/edit/'.$category['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					
					<div class="col-md-6">
						<label for="cat_parent" class="control-label">Cat Parent</label>
						<div class="form-group">
							<select name="cat_parent" class="form-control">
								<option value="">select</option>
								<?php 
								$qu = $this->db->query("select * from categories where status = 1 and id != '".$category['id']."' and cat_parent != '".$category['id']."'");				
								$cat_parent_values = $qu->result();
								foreach($cat_parent_values as $display_text)
								{
									$selected = ($display_text->id == $category['cat_parent']) ? ' selected="selected"' : "";

									echo '<option value="'.$display_text->id.'" '.$selected.'>'.$display_text->cat_name.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cat_name" class="control-label"><span class="text-danger">*</span>Cat Name</label>
						<div class="form-group">
							<input type="text" name="cat_name" value="<?php echo ($this->input->post('cat_name') ? $this->input->post('cat_name') : $category['cat_name']); ?>" class="form-control" id="cat_name" />
							<span class="text-danger"><?php echo form_error('cat_name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label for="status" class="control-label">Status</label>
							<input type="checkbox" name="status" value="1" <?php echo ($category['status']==1 ? 'checked="checked"' : ''); ?> id='status' />
							
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