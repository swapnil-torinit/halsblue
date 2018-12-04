<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Settlement Listing</h3>            	
            </div>
            <div class="box-body">
                  <table class="table table-striped" id="pending_invoices">
                    <thead>
                    <tr>
                        <th>#IN_ID</th>
                        <th>Company Name</th>
                        <th>Mobile</th>
                        <th>Invoice Date</th>
                        <th>PDF</th>                
                        <th>Invoice due date</th>
                        <th>Payment mode</th>
                        <th>Payment Status</th>                 
                        <th>Invoice Amount</th>                 
                        <th>Balance Amount</th>                 
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="invoice_data">
                      <?php
                        if(!empty($result)){$i = 1;
                            foreach($result as $invoice){
                                $pdf_original = '';
                                if(!empty($invoice->pdf_original)){ 
                                    $pdf_original = '<a href="'.base_url().'download.php?action=upload/invoice_pdf/'.$invoice->pdf_original.'">Click Here</a>';
                                } 
                                ?>
                                  <tr>                                      
                                      <td><?php echo $invoice->invoice_no; ?></td>
                                      <td><?php echo $invoice->customer_name; ?></td>
                                      <td><?php echo $invoice->customer_mobile; ?></td>
                                      <td><?php echo date('d/m/y', strtotime($invoice->created_on)); ?></td>
                                      
                                      <td><?php echo '<a href="'.base_url().'upload/invoice_pdf/'.$invoice->pdf_original.'">Click Here</a>'; ?></td>                
                                      <td><?php echo $invoice->invoice_due_date; ?></td>
                                      <td><?php echo $invoice->payment_mode; ?></td>
                                      <td><?php echo $invoice->payment_status; ?></td>
                                      <td><i class="fa fa-inr" aria-hidden="true"><?php echo $invoice->total_cost; ?></td>
                                      <td><i class="fa fa-inr" aria-hidden="true"><?php echo $invoice->balance_amount; ?></td>
                                      <td>
                                        <a href="<?php echo site_url('pay/add/'.$invoice->customer_id); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Make Payment</a>                                 
                                      </td> 
                                                      
                                  </tr>
                          <?php
                                $i++;    
                            }                            
                        }
                        else{
                            echo "<tr><td colspan='10'>Record not exists.</td></tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                               
            </div>
        </div>
    </div>
</div>
