<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Product Add</h3>
            </div>            
			<form action="<?php echo base_url(); ?>product/add" method="post" accept-charset="utf-8" enctype="multipart/form-data">            
          	<div class="box-body">
          		<div class="row clearfix">
					         			
					<div class="col-md-6">
						<label for="sku" class="control-label">Sku</label>
						<div class="form-group">
							<input type="text" name="sku" value="<?php echo $this->input->post('sku'); ?>" class="form-control" id="sku" />
							<span class="text-danger"><?php echo form_error('sku');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="hsncode" class="control-label"><span class="text-danger">*</span>HSN Code</label>
						<div class="form-group">
							<input type="text" name="hsncode" value="<?php echo $this->input->post('hsncode'); ?>" class="form-control" id="hsncode" />
							<span class="text-danger"><?php echo form_error('hsncode');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="wholesaler_price" class="control-label">WholeSaler Price</label>
						<div class="form-group">
							<input type="text" name="wholesaler_price" value="<?php echo $this->input->post('wholesaler_price'); ?>" class="form-control" id="wholesaler_price" />
							<span class="text-danger"><?php echo form_error('wholesaler_price');?></span>
						</div>
					</div>

                                      
                    
                    
					<div class="col-md-6">
						<label for="retailer_price" class="control-label">Retailer Price</label>
						<div class="form-group">
							<input type="text" name="retailer_price" value="<?php echo $this->input->post('retailer_price'); ?>" class="form-control" id="retailer_price" />
							<span class="text-danger"><?php echo form_error('retailer_price');?></span>
						</div>
					</div>  

					<div class="col-md-6">
						<label for="consumer_price" class="control-label">Consumer Price</label>
						<div class="form-group">
							<input type="text" name="consumer_price" value="<?php echo $this->input->post('consumer_price'); ?>" class="form-control" id="consumer_price" />
							<span class="text-danger"><?php echo form_error('consumer_price');?></span>
						</div>
					</div>                   					
                    <div class="col-md-6">
                    	<div class="col-md-6">
							<label for="quantity" class="control-label">Quantity</label>
							<div class="form-group">
								<input type="text" name="quantity" value="<?php echo $this->input->post('quantity'); ?>" class="form-control" id="quantity" />
								<span class="text-danger"><?php echo form_error('quantity');?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label for="quantity" class="control-label">Unit</label>
							<div class="form-group">
								<select name="unit" class="form-control">
									<option>Pcs</option>
									<option>Pair</option>
									<option>Kits</option>
								</select>
							</div>
						</div>
					</div>                    
					<div class="col-md-6">
						<label for="tax_class" class="control-label"><span class="text-danger">*</span>Tax Class</label>
						<div class="form-group">
							<select name="tax_class" class="form-control">
								<?php 
								foreach($all_tax_class as $tax_clas)
								{
									$selected = ($tax_clas['id'] == $this->input->post('tax_class')) ? ' selected="selected"' : "";
									echo '<option value="'.$tax_clas['id'].'" '.$selected.'>'.$tax_clas['tax_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('tax_class');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="category_id" class="control-label">Select Category</label>
						<div class="form-group">
							<select name="category_id" class="form-control">
								<option value="0">None</option>
								<?php 
								foreach($all_category as $category)
								{
									$selected = ($category['id'] == $this->input->post('category_id')) ? ' selected="selected"' : "";
									echo '<option value="'.$category['id'].'" '.$selected.'>'.$category['cat_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('category_id');?></span>
						</div>
					</div>
					
					<div class="col-md-6">
						<label for="car_make_id" class="control-label">Select Car make</label>
						<div class="form-group">
							<select name="car_make_id" id="get_car_model" class="form-control">
								<option value="">--Select one--</option>
								<option value="all">All</option>
								<?php 
								foreach($all_car_make as $car_make)
								{
									$selected = ($car_make['id'] == $this->input->post('car_make_id')) ? ' selected="selected"' : "";
									echo '<option value="'.$car_make['id'].'" '.$selected.'>'.$car_make['name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('car_make_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="car_model_id" class="control-label">Select Car model</label>
						<div class="form-group">
							<select name="car_model_id" id="car_model_id" class="form-control">								
								<option value="">--Select one--</option>
							</select>
							<span class="text-danger"><?php echo form_error('car_model_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="brand_id" class="control-label">Select Brand</label>
						<div class="form-group">
							<select name="brand_id" class="form-control">
							<option value="0">None</option>
								<?php 
								foreach($all_brand as $brand)
								{
									$selected = ($brand['id'] == $this->input->post('brand_id')) ? ' selected="selected"' : "";
									echo '<option value="'.$brand['id'].'" '.$selected.'>'.$brand['name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('brand_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="image" class="control-label">Thumbnail</label>
						<div class="form-group">
							<input type="file" name="image" class="form-control" id="image" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="description" class="control-label">Description</label>
						<div class="form-group">
							<textarea name="description" class="form-control" id="description"><?php echo $this->input->post('description'); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="remark" class="control-label">Remarks</label>
						<div class="form-group">
							<textarea name="remark" class="form-control" id="remark"><?php echo $this->input->post('remark'); ?></textarea>
						</div>
					</div>

					<div class="col-md-6">
						<label for="product_type" class="control-label">Product Type</label>
						<div class="form-group">
							<input type="radio" name="product_type" id="product_type_simple" value="0" <?php if(empty($this->input->post('product_type')) || $this->input->post('product_type') == 0){ ?> checked="checked" <?php } ?> />&nbsp;Simple&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="product_type" id="product_type_variations" value="1" <?php if($this->input->post('product_type') == 1){ ?> checked="checked" <?php } ?> />&nbsp;Variations
						</div>
					</div> 

					<?php 
						if($this->input->post('product_type') == 1){ 
							$cls_variations = "display:block"; 
						} 
						else{
							$cls_variations = "display:none"; 	
						}
					?>	          		
					<div class="col-md-6" style="<?php echo $cls_variations; ?>" id="div_variation">
						<label for="" class="control-label"></label>
						<div class="form-group">
							<div class="row clearfix" >
								<div class="col-md-6">
									<select id="variations_id" name="variations_id" class="form-control">
										<option value="" <?php if($this->input->post('variations_id') == ""){ echo 'selected="selected"'; } ?>>--Select One--</option>
										<?php if(!empty($all_variations)){
												foreach($all_variations as $key => $value){ 																									
 										?>
													<option value="<?php echo $value["id"]; ?>" <?php if($this->input->post('variations_id') == $value["id"]){ echo 'selected="selected"'; } ?> ><?php echo $value['name']; ?></option>
										<?php
												}
											}																				
										?>
									</select>
								</div>
								<div class="col-md-6">
				            		<button type="button" class="btn btn-success" id="add_variation">Add Variations</button>
				            	</div>
				            </div>
						</div>
					</div>
					<div id="add_div_variation" style="display:none;">	
						<?php if($this->input->post('variations_id') != ""){
						        $this->load->model('Variations_model');
						        $variations = $this->Variations_model->get_variations($this->input->post('variations_id'));						      
						        $name_value = json_decode($variations["name_value"]);						        
						 ?>
			            <div class="col-md-6">			            	
			                <label for="variations" class="control-label">&nbsp;</label>
			                <div class="form-group">
			                <?php foreach($name_value as $key => $val){ ?>
			                    <input type="checkbox" id="name_value_<?php echo $key; ?>" value="<?php echo $key; ?>" name="name_value_<?php echo $key; ?>" <?php if($this->input->post("name_value_$key") == "on"){ echo 'checked="checked"'; } ?> />
			                    <?php echo $val; ?><br/>
			                <?php } ?>
			                </div>
			            </div>                    
						<?php } ?>
					</div>	
				</div>
			</div>
			<div class="row clearfix" >
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
