<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Variations Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('variations/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="variations_wrapper">
                    <thead>
                        <tr>
    						
                            <th>Name</th>                            
                            <th>Value</th>                            
                            <th>Created</th>
    						<th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($variations as $c){                        
                            $array_val = "";
                            $name_value = json_decode($c['name_value']);
                            foreach($name_value as $name_value_val){
                                if($array_val == ""){
                                    $array_val = $name_value_val;
                                }
                                else{
                                    $array_val = $array_val.",".$name_value_val;   
                                }
                            }
                     ?>
                        <tr>
    						<!-- <td><?php echo $c['id']; ?></td> -->
                            <td><?php echo $c['name']; ?></td>
                            <td><?php echo $array_val; ?></td>
    						<td><?php echo $c['created']; ?></td>
    						<td>
                                <a href="<?php echo site_url('variations/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('variations/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>                                
            </div>
        </div>
    </div>
</div>
