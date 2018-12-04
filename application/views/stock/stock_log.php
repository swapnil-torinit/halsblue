<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Inventory Log Management</h3>
            	<div class="box-tools">
                    <a onclick="return confirm('Are You Sure to Clear Log for this product!!')" href="<?php echo site_url('stock/clearlog/'.$product->id); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Clear Log</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped1" id="album_wrapper">
                    <thead>
                        <tr>
    						<th>ID</th>
                            <th>Product Name</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Updated Quantity</th>
                            <th>Invoice_id</th>                        
    						<th>Remarks</th>
                            <th>Modified On</th>
    						
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($stocklog as $c){ ?>
                        <tr class="<?=strtoupper($c->stock_type)?>">
    						<td><?php echo $c->id ?></td>
                            <td><?php echo $product->name; ?></td>
                            <td><?php echo $c->stock_type; ?></td>
                            <td><?php echo $c->qty; ?></td>
                            <td><?php echo $c->new_qty; ?></td>
                            <td><?php echo $c->invoice_no; ?></td>
    						<td><?php echo $c->remarks; ?></td>
                            <td><?php echo $c->created; ?></td>
    						
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>                                
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .table-striped1 .OUT {
    background-color: #cea0a0 !important;
}
.table-striped1 .IN {
    background-color: #acdaaf !important;
}
</style>