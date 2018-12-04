<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Brands Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('brand/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="brand_wrapper">
                    <thead>
                        <tr>
    						<th>ID</th>
                            <th>Name</th>						
    						<th>Remark</th>
                            <th>Thumbnail</th>
    						<th>Actions</th>
                        </tr>
                    <thead>
                    <tbody>    
                    <?php foreach($brands as $p){ ?>
                        <tr>
    						<td><?php echo $p['id']; ?></td>
                            <td><?php echo $p['name']; ?></td>                      
                            <td><?php echo $p['remark']; ?></td>                      
                            <td>
                                <?php if(!empty($p['logo'])){ ?>
                                    <image src="<?php echo base_url(); ?>upload/brand/<?php echo $p['logo']; ?>" width="50" alt="<?php echo $p['logo']; ?>" />
                                <?php } ?>
                            </td>
    						<td>
                                <a href="<?php echo site_url('brand/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('brand/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
