<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Customers Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('customer/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="customer_wrapper">
                	<thead>
                    <tr>
						<th>ID</th>
						<th>User Role</th>
						<th>Nick Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Company Name</th>
						<th width="150px">Company Address</th>
						<th>Status</th>
						<th width="150px">Actions</th>
                    </tr>
                	</thead>
                	<tbody>
                    <?php foreach($customers as $c){ ?>                    
                    <tr>
						<td><?php echo $c['id']; ?></td>
						
						<td>
							<?php 
								if($c['user_role'] == 1){
									echo "Wholeseller";
								}
								else if($c['user_role'] == 2){
									echo "Retailer";
								}
								else if($c['user_role'] == 3){
									echo "Consumer";
								}
						        $state = $this->State_model->get_state($c['billing_state']);				        
							?>
						</td>
						<td><div><?php echo $c['name']; ?></div></td>
						<td>
							<?php if($c['email']!=''){ ?>
							<div id="p1<?=$c['id']?>" style="display: none;"><?php echo $c['email']; ?></div>
							<div onclick="copyToClipboard('#p1<?=$c['id']?>')" style="cursor:pointer;" title="click To copy"><i class="fa fa-envelope" aria-hidden="true"></i></div>
							<?php } ?>
						</td>
						<td><?php echo $c['mobile']; ?></td>
						<td><?php echo $c['company_name']; ?></td>
						<td><?php echo $c['company_address']; ?></td>
						<td><img src="<?=base_url().'resources/img/'.$c['status'].'.png'?>"></td>
						<td>
                            <a href="<?php echo site_url('customer/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('customer/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
    </div>
</div>
<script type="text/javascript">
	

</script>
