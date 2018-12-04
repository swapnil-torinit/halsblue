<div class="row">
    <div class="col-md-12">
    <form method="post" action="<?php echo base_url();?>stock_modify_submit">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Stock Management</h3><br>
                <div class="col-md-4">
                Add or Reduce Quantity from Inventory. <br>Use (-) to reduce quantity.
                </div>
            	<div class="col-md-8">
                    Remarks: <input type="text"  id="logremarks" placeholder="Enter Remarks" value="Updated from Stock Managment" class="form-control">
                </div>
            </div>
            <div class="box-body">
            <div class="remarks"></div>
                <table class="table table-striped" id="product_wrapper">
                    <thead>
                    <tr>
						
                        <th>Sku</th>
                        
                        <th>Name</th>						
                       
						<th>Current Stock</th>

						<th>Add New Stock</th>
                        <th>Status</th>
						<th>Log</th>
                    </tr>
                    </thead>
                    <tbody>    
                    <?php foreach($products as $p){                         
                        
                    ?>
                    <tr>
						
                       <td><?php echo $p['sku']; ?></td>
                        
                        <td><?php echo $p['name']; ?></td>						
                        
						<td>
                        <div class=""><input type="text" name="current_qty[<?php echo $p['id'];?>]" id="current_qty<?php echo $p['id'];?>" value="<?php echo $p['quantity']; ?>" class="form-control input-sm" disabled>
                        </div>
                        </td>
                        <td>
                        <div class=""><input type="text"  id="add_qty<?php echo $p['id'];?>" name="add_qty[<?php echo $p['id'];?>]" class="form-control input-sm" onChange="updateinventory('<?php echo $p['id'];?>')">
                        </div>
                        </td>	
                        <td><div id="status<?php echo $p['id'];?>" class="btn btn-info btn-xs"></div></td>					
						<td>
                        
                        <a href="<?php echo site_url('stock/showlog/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Show Log</a>
                            
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                <div class="pull-right">
                    <?php //echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </form>
    </div>
</div>
