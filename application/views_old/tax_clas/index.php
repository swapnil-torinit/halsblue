<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tax Class Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tax_clas/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tax_wrapper">
                    <thead>
                        <tr>
    						<th>ID</th>
    						<th>Tax Name</th>
    						<th>Tax Per</th>
    						<th>Remarks</th>
    						<th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($tax_class as $t){ ?>
                        <tr>
    						<td><?php echo $t['id']; ?></td>
    						<td><?php echo $t['tax_name']; ?></td>
    						<td><?php echo $t['tax_per']; ?></td>
    						<td><?php echo $t['remarks']; ?></td>
    						<td>
                                <a href="<?php echo site_url('tax_clas/edit/'.$t['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('tax_clas/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
