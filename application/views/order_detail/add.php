<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Order Detail Add</h3>
            </div>
            <?php echo form_open('order_detail/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="invoice_id" class="control-label">Invoice</label>
						<div class="form-group">
							<select name="invoice_id" class="form-control">
								<option value="">select invoice</option>
								<?php 
								foreach($all_invoices as $invoice)
								{
									$selected = ($invoice['id'] == $this->input->post('invoice_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$invoice['id'].'" '.$selected.'>'.$invoice['id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="product_id" class="control-label">Product</label>
						<div class="form-group">
							<select name="product_id" class="form-control">
								<option value="">select product</option>
								<?php 
								foreach($all_products as $product)
								{
									$selected = ($product['id'] == $this->input->post('product_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$product['id'].'" '.$selected.'>'.$product['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="qty" class="control-label">Qty</label>
						<div class="form-group">
							<input type="text" name="qty" value="<?php echo $this->input->post('qty'); ?>" class="form-control" id="qty" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="product_cost" class="control-label">Product Cost</label>
						<div class="form-group">
							<input type="text" name="product_cost" value="<?php echo $this->input->post('product_cost'); ?>" class="form-control" id="product_cost" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tax_details" class="control-label">Tax Details</label>
						<div class="form-group">
							<input type="text" name="tax_details" value="<?php echo $this->input->post('tax_details'); ?>" class="form-control" id="tax_details" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="total_tax_amount" class="control-label">Total Tax Amount</label>
						<div class="form-group">
							<input type="text" name="total_tax_amount" value="<?php echo $this->input->post('total_tax_amount'); ?>" class="form-control" id="total_tax_amount" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="total_price" class="control-label">Total Price</label>
						<div class="form-group">
							<input type="text" name="total_price" value="<?php echo $this->input->post('total_price'); ?>" class="form-control" id="total_price" />
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