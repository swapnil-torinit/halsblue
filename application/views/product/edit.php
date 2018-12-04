<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Product Edit</h3>
            </div>			
			<form action="<?php echo base_url(); ?>product/edit/<?php echo $product['id']; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">            
			<div class="box-body">
				<div class="row clearfix">
					         			
					<div class="col-md-6">
						<label for="sku" class="control-label">Sku</label>
						<div class="form-group">
							<input type="text" name="sku" value="<?php echo ($this->input->post('sku') ? $this->input->post('sku') : $product['sku']); ?>" class="form-control" id="sku" />
							<span class="text-danger"><?php echo form_error('sku');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $product['name']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="hsncode" class="control-label"><span class="text-danger">*</span>HSN Code</label>
						<div class="form-group">
							<input type="text" name="hsncode" value="<?php echo ($this->input->post('hsncode') ? $this->input->post('hsncode') : $product['hsncode']); ?>" class="form-control" id="hsncode" />
							<span class="text-danger"><?php echo form_error('hsncode');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="wholesaler_price" class="control-label">WholeSaler Price</label>
						<div class="form-group">
							<input type="text" name="wholesaler_price" value="<?php echo ($this->input->post('wholesaler_price') ? $this->input->post('wholesaler_price') : $product['wholesaler_price']); ?>" class="form-control" id="wholesaler_price" />
							<span class="text-danger"><?php echo form_error('wholesaler_price');?></span>
						</div>
					</div>

					<div class="col-md-6">
						<label for="retailer_price" class="control-label">Retailer Price</label>
						<div class="form-group">
							<input type="text" name="retailer_price" value="<?php echo ($this->input->post('retailer_price') ? $this->input->post('retailer_price') : $product['retailer_price']); ?>" class="form-control" id="retailer_price" />
							<span class="text-danger"><?php echo form_error('retailer_price');?></span>
						</div>
					</div>	

                    <div class="col-md-6">
						<label for="consumer_price" class="control-label">Consumer Price</label>
						<div class="form-group">
							<input type="text" name="consumer_price" value="<?php echo ($this->input->post('consumer_price') ? $this->input->post('consumer_price') : $product['consumer_price']); ?>" class="form-control" id="consumer_price" />
							<span class="text-danger"><?php echo form_error('consumer_price');?></span>
						</div>
					</div>
                    
                    				
                    <div class="col-md-6">
                    	<div class="col-md-6">
						<label for="quantity" class="control-label">Quantity</label>
						<div class="form-group">
							<input type="text" name="quantity" value="<?php echo ($this->input->post('quantity') ? $this->input->post('quantity') : $product['quantity']); ?>" class="form-control" id="quantity" />
							<span class="text-danger"><?php echo form_error('quantity');?></span>
						</div>
						</div>
						<div class="col-md-6">
							<label for="quantity" class="control-label">Unit</label>
							<div class="form-group">
								<select name="unit" class="form-control">
									<option <?=($product['unit'] == 'Pcs') ? ' selected="selected"' : "";?>>Pcs</option>
									<option <?=($product['unit'] == 'Pair') ? ' selected="selected"' : "";?>>Pair</option>
									<option <?=($product['unit'] == 'Kits') ? ' selected="selected"' : "";?>>Kits</option>
									<option <?=($product['unit'] == 'Sets') ? ' selected="selected"' : "";?>>Sets</option>
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
									$selected = ($tax_clas['id'] == $product['tax_class']) ? ' selected="selected"' : "";

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
									$selected = ($category['id'] == $product['category_id']) ? ' selected="selected"' : "";
									echo '<option value="'.$category['id'].'" '.$selected.'>'.$category['cat_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('category_id');?></span>
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
									$selected = ($brand['id'] == $product['brand_id']) ? ' selected="selected"' : "";
									echo '<option value="'.$brand['id'].'" '.$selected.'>'.$brand['name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('brand_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="car_make_id" class="control-label">Select Car make</label>
						<div class="form-group">
							<select name="car_make_id" id="get_car_model" class="form-control">
								<option value="" <?php if($product['car_make_id'] == ""){ echo 'selected="selected"'; } ?>>--Select one--</option>
								<option value="all" <?php if($product['car_make_id'] == "all"){ echo 'selected="selected"'; } ?>>All</option>
								<?php 
								foreach($all_car_make as $car_make)
								{
									$selected = ($car_make['id'] == $product['car_make_id']) ? ' selected="selected"' : "";
									echo '<option value="'.$car_make['id'].'" '.$selected.'>'.$car_make['name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('car_make_id');?></span>
						</div>
					</div>
					<?php
				        $model_val = "";
				        $car_make_id = $product["car_make_id"];
				        if($car_make_id == ""){
				            $model_val = '';            
				        }
				        else if($car_make_id == "all"){
				            $model_val = '<option value="all">All</option>';            
				            $this->load->model('Car_make_model');
				            $all_car_model = $this->Carmodel_model->get_all_carmodel();
				            foreach($all_car_model as $car_model){                
				                $model_val .= '<option value="'.$car_model['id'].'">'.$car_model['model_no'].'</option>';
				            }            
				        }
				        else{
				            $qu = "select * from carmodel where car_make_id = '".$car_make_id."'";
				            $query = $this->db->query($qu);
				            $all_car_model = $query->result();            
				            if(!empty($all_car_model)){
				                foreach($all_car_model as $car_model){                
				                    $model_val .= '<option value="'.$car_model->id.'">'.$car_model->model_no.'</option>';
				                }            
				            }
				            else{
				                $model_val = '';
				            }
				        }
					?>
					<div class="col-md-6">
						<label for="car_model_id" class="control-label">Select Car model</label>
						<div class="form-group">
							<select name="car_model_id" id="car_model_id" class="form-control">								
								<?php echo $model_val; ?>	
							</select>
							<span class="text-danger"><?php echo form_error('car_model_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="image" class="control-label">Thumbnail</label>
						<div class="form-group">							
							<div class="col-md-6">
								<?php if(!empty($product['thumbnail'])){ ?>
                               <a href="<?php echo base_url(); ?>upload/product/<?php echo $product['thumbnail']; ?>" target="_blank"> <image src="<?php echo base_url(); ?>upload/product/<?php echo $product['thumbnail']; ?>" style="max-width: 100%;" alt="<?php echo $product['thumbnail']; ?>" />
                               </a>
                            <?php } ?>
                        	</div>
                        	<div class="col-md-6">
							<input type="file" name="image" class="form-control" id="image" />
		                    <input type="hidden" value="<?php echo ($this->input->post('thumbnail') ? $this->input->post('thumbnail') : $product['thumbnail']); ?>" name="image_copy" />
		                	</div>
                            
						</div>
					</div>					
					<div class="col-md-6">
						<label for="description" class="control-label">Description</label>
						<div class="form-group">
							<textarea name="description" class="form-control" id="description"><?php echo ($this->input->post('description') ? $this->input->post('description') : $product['description']); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="remark" class="control-label">Remarks</label>
						<div class="form-group">
							<textarea name="remark" class="form-control" id="remark"><?php echo ($this->input->post('remark') ? $this->input->post('remark') : $product['remark']); ?></textarea>
						</div>
					</div>


					<?php $product_type = ($this->input->post('product_type') ? $this->input->post('product_type') : $product['product_type']); ?>
					<div class="col-md-12">
						<label for="product_type" class="control-label">Product Type</label>
						<div class="form-group">
							<input type="radio" name="product_type" id="product_type_simple" value="0" <?php if($product_type == 1){ ?> checked="checked" <?php } ?> /> Simple &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="product_type" id="product_type_variations" value="1" <?php if($product_type == 2){ ?> checked="checked" <?php } ?> /> Variations
						</div>
					


					<?php 
						if($product_type == 2){ 
							$cls_variations = "display:block"; 
						} 
						else{
							$cls_variations = "display:none"; 	
						}
						$variations = json_decode($product['variations']);
						//echo "<pre>"; print_r($variations);
						$variations_data = '';
						if(!empty($variations)){
							foreach($variations as $keys => $vals){						        
						        $variations_v = $this->Variations_model->get_variations($keys);
						        
						        
					            $name_value = json_decode($variations_v["name_value"], true);
					            $variations_data .= '<div class="col-md-8">
					                <label for="variations" class="control-label">&nbsp;</label>
					                <div class="form-group">';
					                foreach($name_value as $key => $val){
					                	$exp_val = explode(",", $vals);
					                	$cdval = "";
					                	foreach($exp_val as $exp_value){
					                		if($exp_value == $key){
					                			$cdval = 'checked="checked"';
					                		}
					                	}						                	
					                    $variations_data .= '<div class="col-md-3"><input type="checkbox" id="name_value_'.$key.'" name="name_value_'.$key.'" '.$cdval.' /> '.$val."</div>";
					                }
					                $variations_data .= '</div>
					            </div>';                    					        
							}
						}
					?>	          		
					<div class="col-md-4" style="<?php echo $cls_variations; ?>" id="div_variation">
						<label for="" class="control-label"></label>
						<div class="form-group">
							<div class="row clearfix" >
								<div class="col-md-6">
									<select id="variations_id" name="variations_id" class="form-control">
										<option value="" <?php if($key == ""){ echo 'selected="selected"'; } ?>>--Select One--</option>
										<?php if(!empty($all_variations)){
												foreach($all_variations as $key => $value){ 																									
 										?>
													<option value="<?php echo $value["id"]; ?>" <?php if($key == $value["id"]){ echo 'selected="selected"'; } ?> ><?php echo $value['name']; ?></option>
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

					<div id="add_div_variation">						
						<?php if(!empty($variations_data)){
							echo $variations_data;
						}
						?>
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
