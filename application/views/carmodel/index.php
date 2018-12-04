<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Car model Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('carmodel/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="carmodel_wrapper">
                    <thead>
                        <tr>
                            <th>Sr</th>
    						<th class="dn">ID</th>
                            <th>Car make</th>						
                            <th>Model no.</th>
    						<th>Remark</th>
    						<th>Actions</th>
                        </tr>
                    <thead>
                    <tbody>    
                    <?php $i=1; foreach($carmodel as $p){ 
                            $car_make = $this->Car_make_model->get_car_make($p['car_make_id']);                            
                        ?>
                        <tr>
    						<td><?=$i++?>
                        <td class="dn"><?php echo $p['id']; ?></td>
                            <td><?php echo $car_make['name']; ?></td>                      
                            <td><?php echo $p['model_no']; ?></td>             
                            <td><?php echo $p['remark']; ?></td>                      
    						<td>
                                <a href="<?php echo site_url('carmodel/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('carmodel/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
