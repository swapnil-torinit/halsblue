<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Admin Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('admin/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
						<th>User Role</th>
						<th>Password</th>
						
						<th>Actions</th>
                    </tr>
                    <?php foreach($admin as $a){ ?>
                    <tr>
						<td><?php echo $a['id']; ?></td>
                        <td><?php echo $a['username']; ?></td>
                        <td><?php echo $a['email']; ?></td>
						<td><?php echo $a['user_role']; ?></td>
						<td><?php echo mask($a['password'],1,strlen($a['password'])-2); ?></td>
						
						<td>
                            <a href="<?php echo site_url('admin/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('admin/remove/'.$a['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
<?php function mask ( $str, $start = 0, $length = null ) {
        $mask = preg_replace ( "/\S/", "*", $str );
        if( is_null ( $length )) {
            $mask = substr ( $mask, $start );
            $str = substr_replace ( $str, $mask, $start );
        }else{
            $mask = substr ( $mask, $start, $length );
            $str = substr_replace ( $str, $mask, $start, $length );
        }
        return $str;
    }
    ?>
