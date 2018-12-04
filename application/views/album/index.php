<?php
if(isset($_POST['sec_key']) && $_POST['sec_key']==ALBUMPASS)
{
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Album Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('album/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
                <a href="<?=base_url()?>album/index">All</a> | 
                <a href="<?=base_url()?>album/index/open">Open</a> | 
                <a href="<?=base_url()?>album/index/close">Closed</a>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="album_wrapper">
                    <thead>
                        <tr>
                            <th>Sr</th>
    						<th class="dn">ID</th>
                            <th>Party Name</th>
                            <th>Amount</th>
                            <th>Bilty Number</th>
                            <th>Comment</th>                        
    						
                            <th>Reminder Date</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Close</th>
    						<th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($album as $c){ ?>
                        <tr>
                            <td><?=$i++?>
    						<td class="dn"><?php echo $c['id']; ?></td>
                            <td><?php echo $c['party_name']; ?></td>
                            <td><?php echo $c['amount']; ?></td>
                            <td><?php echo $c['bilty_number']; ?></td>
                            <td><?php echo nl2br($c['comment']); ?></td>
    						
                            <td><?php echo ($c['reminder_date'] == "0000-00-00") ? "" : date('d M y', strtotime($c['reminder_date'])); ?></td>
                            <td><img src="<?=base_url().'resources/img/'.$c['status'].'.png'?>" title="<?php echo ($c['status'] == 1) ? "Open" : "Close"; ?>"></td>
    						<td><?php echo $c['created']; ?></td>
                            <td>
                                <?php if($c['status']==1){ ?>
                                <a onclick="return confirm('Sure to mark as DONE')" href="<?=base_url().'album/updatestatus?id='.$c['id'].'&status=0'?>">
                                <img src="<?=base_url()?>resources/img/GTAWiki-Todo-Checklist.png" width="30px"></a>
                                <?php } ?>
                            </td>
    						<td>
                                <a href="<?php echo site_url('album/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('album/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>                                
            </div>
        </div>
    </div>
</div>
<?php } 
else
{
    ?>
<form method="post" action="">
    <center>Restricted Access: <br>
<input type="password" name="sec_key">
<input type="submit" name="act" value="Submit">
</center>
</form>

    <?php 
}

?>
