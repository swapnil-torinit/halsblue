<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Invoice Edit</h3>
            </div>			
			<form action="<?php echo base_url(); ?>invoice/edit/<?php echo $invoice['id']; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">            
			<div class="box-body">
				<div class="row clearfix">					         			
					<div class="col-md-6">
						<label for="vehicle_number" class="control-label">Vehicle/GR/LR Number</label>
						<div class="form-group">
							<input type="text" name="vehicle_number" value="<?php echo ($this->input->post('vehicle_number') ? $this->input->post('vehicle_number') : $invoice['vehicle_number']); ?>" class="form-control" id="vehicle_number" />
							<span class="text-danger"><?php echo form_error('vehicle_number');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="no_of_packages" class="control-label">Number of packages</label>
						<div class="form-group">
							<input type="text" name="no_of_packages" value="<?php echo ($this->input->post('no_of_packages') ? $this->input->post('no_of_packages') : $invoice['no_of_packages']); ?>" class="form-control" id="no_of_packages" />
							<span class="text-danger"><?php echo form_error('no_of_packages');?></span>
						</div>
					</div>	
					<div class="col-md-6">
						<label for="no_of_packages" class="control-label">Electronic Reference No</label>
						<div class="form-group">
							<input type="text" name="electronic_ref_no" value="<?php echo ($this->input->post('electronic_ref_no') ? $this->input->post('electronic_ref_no') : $invoice['electronic_ref_no']); ?>" class="form-control" id="electronic_ref_no" />
							<span class="text-danger"><?php echo form_error('electronic_ref_no');?></span>
						</div>
					</div>								
					<div class="col-md-6">
						<label for="invoice_status" class="control-label">Invoice Status</label>
						<div class="form-group">
							<select name="invoice_status" class="form-control">
								<option value="New" <?php if($invoice['invoice_status'] == "New"){ ?> selected="selected" <?php } ?>>New</option>								
								<option value="Completed" <?php if($invoice['invoice_status'] == "Completed"){ ?> selected="selected" <?php } ?>>Completed</option>								
							</select>
							<span class="text-danger"><?php echo form_error('invoice_status');?></span>
						</div>
					</div>	
					<div class="col-md-6">
						<div class="col-md-6">
							<label for="supplydate" class="control-label"><span class="text-danger">*</span>Supply Date and Time</label>
							<div class="form-group">
								<input type="text" name="supplydate" value="<?php echo date('m/d/Y h:i a') ?>" class="has-datetimepicker form-control" id="supplydate" />
							</div>
						</div>
						<div class="col-md-6">
							<label for="supplydate" class="control-label"><span class="text-danger">*</span>Re GENERATE INVOICE</label>
							<div class="form-group">
							 <input type="radio" name="gen_invoice" value="1" checked="" /> Yes &nbsp; &nbsp;
							 <input type="radio" name="gen_invoice" value="0" /> No
							</div>
						</div> 
					</div> 
					


					<div class="col-md-6">
					<?php $sel=''; if($invoice['invoice_status']=='Completed'){$sel = 'disabled';} ?>
						<button type="submit" class="btn btn-success" <?=$sel;?>>
						<i class="fa fa-check"></i> Save
						</button>
					</div>

					</div>					
				</div>
			</div>
			<div class="box-footer">
			
			<?php  if($invoice['chk_invoice']=='0'){ ?>
			<div class="col-md-6">
				<table>
					<tr><td>Name</td><td>:</td><td><?=$customer->name;?></td></tr>
					<tr><td>Company Name</td><td>:</td><td><?=$customer->company_name;?></td></tr>
					<tr><td>Email</td><td>:</td><td><?=$customer->email;?></td></tr>
					<tr><td>Mobile</td><td>:</td><td><?=$customer->mobile;?></td></tr>
					<tr><td>Company GST</td><td>:</td><td><?=$customer->company_gst_no;?></td></tr>
					<tr><td>Company Marka No</td><td>:</td><td><?=$customer->company_marka_no;?></td></tr>
					<tr><td>Company Transport</td><td>:</td><td><?=$customer->company_transport;?></td></tr>
					<tr><td>Address</td><td>:</td><td><?=$customer->company_address;?></td></tr>
				</table>
				</div>
			<div class="col-md-6">
			<table>
					<tr><td>Invoice No</td><td>:</td><td><?=$invoice['id'];?></td></tr>
					<tr><td>Payment mode</td><td>:</td><td><?=$invoice['payment_mode'];?></td></tr>
					<tr><td>Payment status</td><td>:</td><td><?=$invoice['payment_status'];?></td></tr>
					<tr><td>Transaction Date</td><td>:</td><td><?=$invoice['created_on'];?></td></tr>
					<tr><td>Tax</td><td>:</td><td><?=$invoice['tax_amount'];?></td></tr>
					<tr><td>Total Cost</td><td>:</td><td><?=$invoice['total_cost'];?></td></tr>
					<tr><td>Invoice Due Date</td><td>:</td><td><?=$invoice['invoice_due_date'];?></td></tr>
					<tr><td>Vehical No</td><td>:</td><td><?=$invoice['vehicle_number'];?></td></tr>
					<tr><td>No of Packages</td><td>:</td><td><?=$invoice['no_of_packages'];?></td></tr>
					<tr><td>Invoice Status</td><td>:</td><td><?=$invoice['invoice_status'];?></td></tr>

				</table>
			</div>
			<?php } ?>
			<?php  if($invoice['chk_invoice']=='1'){ ?>
			<div class="col-md-6">
				<table>
					<tr><td>Name</td><td>:</td><td><?=$invoice['customer_name'];?></td></tr>
					
					<tr><td>Email</td><td>:</td><td><?=$invoice['customer_email'];?></td></tr>
					<tr><td>Address</td><td>:</td><td><?=$invoice['customer_address'];?></td></tr>
					<tr><td>Mobile</td><td>:</td><td><?=$invoice['customer_mobile'];?></td></tr>
					<tr><td>Company GST</td><td>:</td><td>NA</td></tr>
					<tr><td>Company Marka No</td><td>:</td><td>NA</td></tr>
					
				</table>

				</div>
			<div class="col-md-6">
			<table>
					<tr><td>Invoice No</td><td>:</td><td><?=$invoice['id'];?></td></tr>
					<tr><td>payment Status</td><td>:</td><td><?=$invoice['payment_status'];?></td></tr>
					<tr><td>Payment Mode</td><td>:</td><td><?=$invoice['payment_mode'];?></td></tr>
					
					<tr><td>Transaction Date</td><td>:</td><td><?=$invoice['created_on'];?></td></tr>
					<tr><td>Tax</td><td>:</td><td><?=$invoice['tax_amount'];?></td></tr>
					<tr><td>Total Cost</td><td>:</td><td><?=$invoice['total_cost'];?></td></tr>
					
					<tr><td>Vehical No</td><td>:</td><td><?=$invoice['vehicle_number'];?></td></tr>
					<tr><td>No of Packages</td><td>:</td><td><?=$invoice['no_of_packages'];?></td></tr>
					<tr><td>Invoice Status</td><td>:</td><td><?=$invoice['invoice_status'];?></td></tr>

				</table>
			</div>
			<?php } ?>
			<div class="col-md-12">
			<a href="<?=base_url().'upload/invoice_pdf/'.$invoice['pdf_original'];?>"><i class="fa fa-file-pdf-o" aria-hidden="true"> Invoice Original</i></a> | 
			<a href="<?=base_url().'upload/invoice_pdf/'.$invoice['pdf_duplicate'];?>" download><i class="fa fa-file-pdf-o" aria-hidden="true"> Invoice Duplicate</i></a> | 
			<a href="<?=base_url().'upload/invoice_pdf/'.$invoice['pdf_triplicate'];?>" download><i class="fa fa-file-pdf-o" aria-hidden="true"> Invoice Triplicate</i></a> | 
			<a target="_blank" href="<?php echo base_url()."upload/invoice_pdf/pdf_combine_".$invoice['id'].".pdf"; ?>"><i class="fa fa-print" aria-hidden="true"></i>Print All</a>
			</div>
			
			
			<table id="instantcarttable" class="table table-striped">
            	<tbody><tr><th>Sr</th>
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
                <?php
                $counter=1; foreach($products as $cart){ ?>
            <tr id="tr_pro_10"><td><?=$counter++?></td>
            <td><?=$cart->title;?></td>
            <td><?=$cart->sku;?></td>
            <td><?=$cart->qty;?></td>
            <td><?=$cart->product_cost;?></td>
            <td><?=$cart->taxable_value;?></td>
            <td><?=$cart->cgst;?>%</td><td><?=$cart->cgst_amount;?></td>
            <td><?=$cart->sgst;?>%</td><td><?=$cart->sgst_amount;?></td>
            <td><?=$cart->igst;?>%</td><td><?=$cart->igst_amount;?></td>
            <td><?=$cart->tax_amount;?></td>
            <td><?=$cart->total_cost;?></td>

           
            </tr>
<?php } ?>
            </tbody></table>

            <table class="table table-striped">
            <tbody><tr><td>Total Tax Amt</td><td><i class="fa fa-inr" aria-hidden="true"></i><input type="text" disabled="" id="tax_amount" value="<?=$invoice['tax_amount'];?>"></td></tr>
            <tr>
            <td>Total Total Cost</td><td><i class="fa fa-inr" aria-hidden="true"></i><input type="text" disabled="" id="total_price" value="<?=$invoice['total_cost'];?>"></td>
           	</tr>
            </tbody></table>

            <pre><?php  //print_r($products); ?> </pre>
            	
	        </div>				
			</form>
		</div>
    </div>
</div>
