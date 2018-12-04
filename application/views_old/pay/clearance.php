<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Clearance Listing</h3>            	
            </div>
            <div class="box-body">
                <table class="table table-striped" id="category_wrapper">
                    <thead>
                        <tr>                        
    						<th>Payment Date</th>
    						<th>Amount</th>
    						
                            <th>Remark</th>
                            <th>Mode</th>
                            
    						<th>Action</th>                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach($pay as $c){
                        
                     ?>                    
                        <tr>
    						<td><?php echo date('d/m/y', strtotime($c->pay_date)); ?></td>
                            <td><?php echo $c->pay_amount; ?></td>
                            
                            <td><?php echo $c->pay_remark; ?></td>
                            <td><?php echo $c->pay_mode; ?></td>
    						<td>
                                <?php if($c->pay_realisation == 0){ ?>
                                <a onclick="return confirm('Are You Sure make payment realisation true!!')" href="<?php echo site_url('pay/pay_realisation/'.$c->id); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Set Payment Realisation</a>                                
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $i++;} ?>
                    <tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
