<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Notes Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('notes/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
                <a href="<?=base_url()?>notes/index">All</a> | 
                <a href="<?=base_url()?>notes/index/open">Open</a> | 
                <a href="<?=base_url()?>notes/index/close">Closed</a>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="notes_wrapper">
                    <thead>
                        <tr>
                            <th>Sr</th>
    						<th class="dn">ID</th>
                            <th>Title</th>                            
                            <th>Remark</th>  
                            <th>Reminder Date</th>                      
    						<th>Status</th>
                            <th>Close</th>
                            <th>Created On</th>
                            
    						<th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;
                    foreach($notes as $c){ ?>
                        <tr>
                            <td><?=$i++?></td>
    						<td class="dn"><?php echo $c['id']; ?></td>
                            <td><?php echo $c['title']; ?></td>
                            <td><?php echo nl2br($c['remark']); ?></td>
                            <td><?php echo ($c['reminder_date'] == "0000-00-00 00:00:00") ? "" : date('d M y', strtotime($c['reminder_date'])); ?></td>
    						<td><img src="<?=base_url().'resources/img/'.$c['status'].'.png'?>" title="<?php echo ($c['status'] == 1) ? "Open" : "Close"; ?>"></td>
                            <td>
                                <?php if($c['status']==1){ ?>
                                <a onclick="return confirm('Sure to mark as DONE')" href="<?=base_url().'notes/updatestatus?id='.$c['id'].'&status=0'?>">
                                <img src="<?=base_url()?>resources/img/GTAWiki-Todo-Checklist.png" width="30px"></a>
                                <?php } ?>
                            </td>
    						<td><?php echo date('d M y', strtotime($c['created'])); ?></td>
    						<td>
                                <a href="<?php echo site_url('notes/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('notes/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>                                
            </div>
        </div>
    </div>
</div>
