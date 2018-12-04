<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                Welcome to HALSBLUE Administrator Panel.
                </h3>
            </div>
        </div>
    </div>
</div>

	<div class="row">
		<div class="col-md-6">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet box red box-info">
				<div class="portlet-title">
					<div class="box-header with-border">
						<h4 class="box-title"><i class="icon-cogs"></i>Latest Album</h4>
					</div>					
				</div>
				<?php 								
					$query = $this->db->query("select * from album order by id desc limit 0, 5");
					$result = $query->result();					
				?>
				<div class="portlet-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
	                            <th>Party Name</th>
	                            <th>Amount</th>
	                            <th>Bilty Number</th>
	    						<th>Status</th>
	                            <th>Reminder Date</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($result)){ ?>
							<?php foreach($result as $c){ ?>					
							<tr>
	    						<td><?php echo $c->id; ?></td>
	                            <td><?php echo $c->party_name; ?></td>
	                            <td><?php echo $c->amount; ?></td>
	                            <td><?php echo $c->bilty_number; ?></td>
	    						<td><?php echo ($c->status == 1) ? "Open" : "Close"; ?></td>
	                            <td><?php echo ($c->reminder_date == "0000-00-00 00:00:00") ? "" : $c->reminder_date; ?></td>	    						
	                        </tr>
                        <?php } } else{ ?>					
                        	<tr>
								<td colspan="6">No record Found.</td>
							</tr>
                        <?php } ?>					
						</tbody>
					</table>
				</div>
			</div>
			<!-- END SAMPLE TABLE PORTLET-->
		</div>					

		<div class="col-md-6">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet box red box-info">
				<div class="portlet-title">
					<div class="box-header with-border">
						<h4 class="box-title"><i class="icon-cogs"></i>Latest Notes</h4>
					</div>					
				</div>
				<?php 								
					$query = $this->db->query("select * from notes order by id desc limit 0, 5");
					$result = $query->result();					
				?>
				<div class="portlet-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
	                            <th>Title</th>                            
	                            <th>Remark</th>                        
	    						<th>Status</th>
	                            <th>Reminder Date</th>
	                            <th>Created</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($result)){ ?>
							<?php foreach($result as $c){ ?>					
							<tr>
								<td><?php echo $c->id; ?></td>
	                            <td><?php echo $c->title; ?></td>
	                            <td><?php echo $c->remark; ?></td>
	    						<td><?php echo ($c->status == 1) ? "Open" : "Close"; ?></td>
	                            <td><?php echo ($c->reminder_date == "0000-00-00 00:00:00") ? "" : $c->reminder_date; ?></td>
	    						<td><?php echo $c->created; ?></td>	                        
	    					</tr>
                        <?php } } else{ ?>					
                        	<tr>
								<td colspan="6">No record Found.</td>
							</tr>
                        <?php } ?>					
						</tbody>
					</table>
				</div>
			</div>
			<!-- END SAMPLE TABLE PORTLET-->
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet box red box-info">
				<div class="portlet-title">
				<h4 class="box-title"><i class="icon-cogs"></i>Top 5 Invoices</h4>
										
				</div>
				<?php 								
					$query = $this->db->query("select * from invoices where 1 order by invoice_due_date desc limit 0, 5");
					$result = $query->result();					
				?>
				<div class="portlet-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
	                            <th>Total Cost</th>
	                            <th>Customer Name</th>
	                            <th>Invoice Due Date</th>
	    						<th>Invoice Created</th>
	                            <th>Invoice Link</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($result)){ ?>
							<?php foreach($result as $c){ ?>					
							<tr>
	    						<td><?php echo $c->id; ?></td>
	                            <td><?php echo $c->total_cost; ?></td>
	                            <td><?php echo $c->customer_name; ?></td>
	                            <td><?php echo $c->invoice_due_date; ?></td>
	    						<td><?php echo $c->created_on; ?></td>
	                            <td><a target="_blank" title="<?php echo $c->pdf_original; ?>" href="<?php echo base_url(); ?>upload/invoice_pdf/<?php echo $c->pdf_original; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>	    						
	                        </tr>
                        <?php } } else{ ?>					
                        	<tr>
								<td colspan="6">No record Found.</td>
							</tr>
                        <?php } ?>					
						</tbody>
					</table>
				</div>
			</div>
			<!-- END SAMPLE TABLE PORTLET-->
		</div>					

		<div class="col-md-6">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet box red box-info">
				<div class="portlet-title">
					
					<h4 class="box-title"><i class="icon-cogs"></i>Inventory Attention</h4>
				</div>
				<?php 								
					$query = $this->db->query("select * from products where quantity < 10 order by id desc limit 0, 5");
					$result = $query->result();					
				?>
				<div class="portlet-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
	                            <th>Sku</th>
	                            <th>Name</th>
	                            <th>Consumer Price</th>
	    						<th>Wholesaler Price</th>
	                            <th>Retailer Price</th>
	                            <th>Qty</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($result)){ ?>
							<?php foreach($result as $c){ ?>					
							<tr>
	    						<td><?php echo $c->id; ?></td>
	                            <td><?php echo $c->sku; ?></td>
	                            <td><?php echo $c->name; ?></td>
	                            <td><?php echo $c->consumer_price; ?></td>
	    						<td><?php echo $c->wholesaler_price; ?></td>
	                            <td><?php echo $c->retailer_price; ?></td>	    						
	                            <td><?php echo $c->quantity; ?></td>	    						
	                        </tr>
                        <?php } } else{ ?>					
                        	<tr>
								<td colspan="7">No record Found.</td>
							</tr>
                        <?php } ?>					
						</tbody>
					</table>
				</div>
			</div>
			<!-- END SAMPLE TABLE PORTLET-->
		</div>					
	</div>	

	<div class="row">
						

						
	</div>	
