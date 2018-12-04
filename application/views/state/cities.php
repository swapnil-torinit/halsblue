<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">City Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('state/addcity'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="state_wrapper">
                    <thead>
                        <tr>
    						<th>ID</th>
    						<th>City Name</th>
    						<th>State Name</th>
    						
    						<th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($state as $s){ ?>
                        <tr>
    						<td><?php echo $s->id; ?></td>
    						<td><?php echo $s->cityname; ?></td>
    						<td><?php echo $s->state_name; ?></td>
    						
    						<td>
                                <a href="<?php echo site_url('state/edit/'.$s->id); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('state/removecity/'.$s->id); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>                                
            </div>
        </div>
    </div>
</div>
