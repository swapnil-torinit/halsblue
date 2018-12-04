<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Car make Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('car_make/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="car_make_wrapper">
                    <thead>
                        <tr>
    						<th>Sr</th>
                            <th class="dn">ID</th>
                            <th>Name</th>						
                            <th>Thumbnail</th>
    						<th>Actions</th>
                        </tr>
                    <thead>
                    <tbody>    
                    <?php $i=1;
                    foreach($car_make as $p){ ?>
                        <tr>
    						<td><?=$i++?>
                        <td class="dn"><?php echo $p['id']; ?></td>
                            <td><?php echo $p['name']; ?></td>                      
                            <td>
                                <?php if(!empty($p['logo'])){ ?>
                                    <image src="<?php echo base_url(); ?>upload/car_make/<?php echo $p['logo']; ?>" width="50" alt="<?php echo $p['logo']; ?>" />
                                <?php } ?>
                            </td>
    						<td>
                                <a href="<?php echo site_url('car_make/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('car_make/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
