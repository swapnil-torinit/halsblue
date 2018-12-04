<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Invoices Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('invoice/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="invoice_wrapper">
                	<thead>
	                    <tr>
	                    	
							<th>InvoiceNo</th>
							<th>Date</th>						
							<th>Company</th>
							<th>Mobile</th>
							<th>Due Date</th>
							
							<th>Total Amount</th>
							<th>Payment Status</th>
							<th>Invoice Status</th>	
							<th>Combined Invoices</th>					
							<th>Edit</th>
							<th>Delete</th>
	                    </tr>
	                <thead>
	                <tbody>	
                    <?php
                    $counter=1;
                     foreach($invoices as $i){                            
							$state = $this->State_model->get_state($i["state_id"]);  
                    	?>
                    <tr>
						
						<td><?php echo $i['id']; ?></td>
						<td><span title="<?=$i['invoice_due_date']?>"><?php echo date('d/m/y', strtotime($i['invoice_date'])); ?></span></td>
						<td><?php echo $i['customer_name']; ?></td>
						<td><?php echo $i['customer_mobile']; ?></td>
						<td><span title="<?=$i['invoice_due_date']?>"><?php echo date('d/m/y', strtotime($i['invoice_due_date'])); ?></span></td>
						
						<td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $i['total_cost']; ?></td>
						
						<td><?php echo $i['payment_status']; ?></td>
						<td><?php echo $i['invoice_status']; ?></td>
						
						<td>
							<a target="_blank" href="<?php echo base_url()."upload/invoice_pdf/pdf_combine_".$i['id'].".pdf"; ?>">
							<i class="fa fa-print" aria-hidden="true"></i></a>
							&nbsp;<a target="_blank" href="<?php echo base_url()."upload/invoice_pdf/pdf_combine_".$i['id'].".pdf"; ?>" download>
							<i class="fa fa-download" aria-hidden="true"></i></a>
						</td><td><a href="<?php echo site_url('invoice/edit/'.$i['id']); ?>" class="btn btn-info btn-xs">
						<span class="fa fa-pencil"></span>Edit</a></td>
						
						<td>
                             
                            <a href="<?php echo site_url('invoice/remove/'.$i['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                	</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
if(!empty($print_data)){
	if($print_data["print"] == "yes"){
		$inv_id = $print_data["inv_id"];

		$print = base_url()."upload/invoice_pdf/pdf_combine_".$inv_id.".pdf";
        echo '<script>window.open("'.$print.'","_blank"); </script>';
        $this->session->unset_userdata("print_data");
	}
}
?>