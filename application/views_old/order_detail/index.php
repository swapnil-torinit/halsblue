<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Order Details Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('order_detail/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="product_wrapper">
                    <thead>
                    <tr>
						
						<th>Invoice Id</th>
						<th>SKU</th>
                        <th>Product</th>
						<th>Qty</th>
						<th>Product Cost</th>
						<th>Taxable Amount</th>
						<th>Total Tax</th>
						<th>Total Price</th>
						<th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($order_details as $o){ ?>
                    <tr>
						
						<td><?php echo $o['invoice_id']; ?></td>
						<td><?php echo $o['sku']; ?></td>
                        <td><?php echo $o['title']; ?></td>
						<td><?php echo $o['qty']; ?></td>
						<td><?php echo $o['product_cost']; ?></td>
						<td><?php echo $o['taxable_value']; ?></td>
						<td><?php echo $o['tax_amount']; ?></td>
						<td><?php echo $o['total_cost']; ?></td>
						<td>
                             <a href="<?php echo site_url('invoice/edit/'.$o['invoice_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> View Invoice</a> 
                           <!-- <a href="<?php echo site_url('order_detail/remove/'.$o['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
                        </td>
                    </tr>

                    <?php } ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
