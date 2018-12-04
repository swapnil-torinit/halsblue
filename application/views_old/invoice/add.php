<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Invoice Add</h3>
            </div>
            
            <form method="post" action="<?=base_url()?>invoice/add" onkeypress="return event.keyCode != 13;" id="validate_instantinvoice">
          	<div class="box-body">
          		<div class="row clearfix">
	                <div class="col-md-6">
	                	<div class="col-md-6">
							<label for="chk_invoice" class="control-label">Invoice No</label>
							<div class="form-group">							
								<input type="text" name="inv_id" id="inv_id" onchange="checkinvoice(this.value)" /><br>
								<span id="inv_status"></span>
							</div>
						</div>
						<div class="col-md-6">
							<label for="chk_invoice" class="control-label">Invoice Type</label>
							<div class="form-group">							
								<input type="checkbox" name="chk_invoice" id="chk_invoice"/>&nbsp; Instant invoice
							</div>
						</div>

					</div>                    					
                    <div class="col-md-6" id="div_customer_id" >
						<label for="customer_id" class="control-label"><span class="text-danger">*</span>Customer</label>
						<div class="form-group">
							<select name="customer_id" class="form-control" id="invoice_customer_id" >
								<option value="">select Customer</option>
								<?php 
								foreach($all_customer as $customers)
								{	
									echo '<option value="'.$customers->id.'">'.$customers->name.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
	                <div class="col-md-6">
						<label for="invoice_date" class="control-label"><span class="text-danger">*</span>Invoice Date</label>
						<div class="form-group">
							<input type="text" name="invoice_date" value="<?php echo date('m/d/Y h:i a') ?>" class="has-datetimepicker form-control" id="invoice_date" />
						</div>
					</div> 

					<div class="col-md-6">
						<label for="supplydate" class="control-label"><span class="text-danger">*</span>Supply Date and Time</label>
						<div class="form-group">
							<input type="text" name="supplydate" value="<?php echo date('m/d/Y h:i a') ?>" class="has-datetimepicker form-control" id="supplydate" />
						</div>
					</div> 

					<div class="col-md-6">
						<label for="customer_name" class="control-label"><span class="text-danger">*</span>Customer Name</label>
						<div class="form-group">
							<input type="text" name="customer_name" class="form-control" id="customer_name" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="customer_address" class="control-label"><span class="text-danger">*</span>Customer Address</label>
						<div class="form-group">
							<input type="text" name="customer_address" class="form-control" id="customer_address" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="customer_address" class="control-label"><span class="text-danger">*</span>Customer Address 2</label>
						<div class="form-group">
							<input type="text" name="customer_address2" class="form-control" id="customer_address2" readonly="readonly" />
						</div>
					</div>			
					<div class="col-md-6">
						<label for="customer_email" class="control-label">Customer Email</label>
						<div class="form-group">
							<input type="text" name="customer_email" class="form-control" id="customer_email" readonly="readonly" />
						</div>
					</div>		
					<div class="col-md-6">
						<label for="customer_mobile" class="control-label"><span class="text-danger">*</span>Customer Mobile</label>
						<div class="form-group">
							<input type="text" name="customer_mobile" class="form-control" id="customer_mobile" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="state_id" class="control-label"><span class="text-danger">*</span>State</label>
						<div class="form-group">
							<select name="state_id" class="form-control" id="state_id" readonly="readonly" >
								<option value="">select state</option>
								<?php 
								foreach($all_state as $state)
								{
									echo '<option value="'.$state['id'].'">'.$state['state_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="place_supply" class="control-label"><span class="text-danger">*</span>Place of Supply</label>
						<div class="form-group">
							<input type="text" name="place_supply" class="form-control" id="place_supply" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="payment_mode" class="control-label">Payment Mode</label>
						<div class="form-group">
							<select name="payment_mode" id="payment_mode" class="form-control">								
								<?php 
								$payment_mode_values = array(
									'Credit'=>'Credit',
									'Cash'=>'Cash',
								);
								foreach($payment_mode_values as $value => $display_text)
								{
									echo '<option value="'.$value.'">'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>  
					<div class="col-md-6 dn">
						<label for="payment_status" class="control-label">Payment Status</label>
						<div class="form-group">
							<select name="payment_status" id="payment_status" class="form-control">								
								<?php 
								$payment_status_values = array(
									'Pending'=>'Pending',
									'Completed'=>'Completed',									
									'Partial'=>'Partial',
								);
								foreach($payment_status_values as $value => $display_text)
								{
									echo '<option value="'.$value.'">'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>                    
                   
					<div class="clearfix"></div>
                    
                    <!--<div class="col-md-3">                    	
						<label for="product" class="control-label">Select product</label>
						<div class="form-group">
							<input type="text" name="product" class="form-control" id="product" size="30" autocomplete="off" onkeyup="showResult(this.value)" />
							<div id="livesearch"></div>
						</div>
					</div>-->



                    <div class="col-md-4">                    	
						<label for="product" class="control-label">Select product</label>
						<div class="form-group">
							<select name="product" class="form-control" id="product" onchange="movetoqty();">
								<option value="">--Select One--</option>
								<?php 
								foreach($all_product as $product)
								{
									echo '<option value="'.$product['id'].'" >'.$product['sku'].' '.$product['name'].'</option>';
								} 
								?>
							</select>							 
						</div>
					</div>

					<div class="col-md-2">
						<label for="qty" class="control-label">Quantity</label>
						<div class="form-group">
							<input type="number" min="1" name="qty" value="1" class="form-control" step="1" id="qty" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');">
						</div>
					</div>

                    <div class="col-md-6">                    	
						<label for="product" class="control-label"></label>
						<div class="form-group">
							<input type="button" class="btn-info btn btn-block" value="Add" id="prdaddinstant" >
						</div>
					</div>					
				</div>
			</div>
            <!--<div id="instantcart"></div>
            <pre><?php print_r($this->session); ?></pre>-->
            <input type="hidden" name="start_val" id="start_val" value="1" />
            <input type="hidden" name="all_pro" id="all_pro" />
			<input type="hidden" name="current_product_id" id="current_product_id" />            
            <table id="instantcarttable" class="table table-striped">
            	<tr>
	                <th>Title</th>
	                <th>SKU</th>                
	                <th>Qty</th>
	                <th>Rate</th>
	                <th>Taxable Amount</th>
	                <th>CGST</th><th>CGST Amt</th>
	                <th>SGST</th><th>SGST Amt</th>
	                <th>IGST</th><th>IGST Amt</th>
	                <th>Tax Amt</th>
	                <th>Total Cost</th>
	                <th></th>
                </tr>
                <tbody id="fill_val">
                </tbody>
            </table>
            <table  class="table table-striped">
            <tr><td>Total Tax Amt</td><td><i class="fa fa-inr" aria-hidden="true"></i><input type="text" disabled id="tax_amount" value="0"></td></tr>
            <tr>
            <td>Total Total Cost</td><td><i class="fa fa-inr" aria-hidden="true"></i><input type="text" disabled id="total_price" value="0"></td>
           	</tr>
            </table>
          	<div class="box-footer">
            	<button type="submit" name="btn" value="Save and Print" class="btn btn-success">
            		<i class="fa fa-check"></i> Save and Print 
            	</button>
            	<button type="submit" name="btn" value="Save" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
            	<button type="submit" name="btn" value="Save and New" class="btn btn-success">
            		<i class="fa fa-check"></i> Save and New
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
      	<?php //echo "<pre>"; print_r($_SESSION); ?>
    </div>
</div>
