<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Categories Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('category/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="category_wrapper">
                    <thead>
                        <tr>                        
    						<th>ID</th>
    						<th>Status</th>
    						<th>Category Parent</th>
    						<th>Category Name</th>
    						<th>Actions</th>                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($categories as $c){ ?>                    
                        <tr>
    						<td><?php echo $c['id']; ?></td>
    						<td><?php echo ($c['status'] == 0) ? "Inactive" : "Active"; ?></td>
                            <td>
                            <?php
                                if(!empty($c['cat_parent'])){
                                    $qu = $this->db->query("select * from categories where id = '".$c['cat_parent']."'");                
                                    $cat_parent_values = $qu->row();                        
    						        echo $cat_parent_values->cat_name; 
                                }
                                else{
                                    echo "-";    
                                }
                            ?>
                            </td>
    						<td><?php echo $c['cat_name']; ?></td>
    						<td>
                                <a href="<?php echo site_url('category/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('category/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
