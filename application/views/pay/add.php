<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
                  <div class="row">
                    

                    <div class="col-md-6">
                     <div class="box-title">Make Payment</div>
                    <table class="table">
                      <tr><td>Name</td><td>:</td><td><?=$customer['name'];?></td></tr>
                      <tr><td>Company Name</td><td>:</td><td><?=$customer['company_name'];?></td></tr>
                      <tr><td>Email</td><td>:</td><td><?=$customer['email'];?></td></tr>
                      <tr><td>Mobile</td><td>:</td><td><?=$customer['mobile'];?></td></tr>
                      <tr><td>Company GST</td><td>:</td><td><?=$customer['company_gst_no'];?></td></tr>
                      <tr><td>Address</td><td>:</td><td><?=$customer['company_address'];?></td></tr>
                    </table>
                  </div>
                  <div  class="col-md-6">
                    <div class="box-title"> Last 5 Payments:</div>
                    <table class="table">
                      <tr><th>Name</th><th>Date</th><th>Amount</th><th>Mode</th></tr>
                      <?php foreach($customer_receipts as $cr){ ?>
                     <tr>
                      <td><?=$cr->customer_name;?></td>
                      <td><?=date('d M', strtotime($cr->pay_date));?></td>
                      <td><?=$cr->pay_amount;?></td>
                      <td><?php echo $cr->pay_mode;
                      if($cr->pay_mode=='Cheque'){
                        echo '<img src="'.base_url().'resources/img/'.$cr->pay_realisation.'.png">';

                      }
                      ?>
                        
                      </td>
                      

                     </tr>
                      <?php } ?>
                    </table>
                  </div>


                    
                  </div>              
            
             <div  class="col-md-12">
  			  <form action="<?php echo base_url(); ?>pay/add/<?php echo $customer_id; ?>" id="pay_record" method="post" accept-charset="utf-8" enctype="multipart/form-data">            
            	<div class="box-body">
            		<div class="row clearfix">                  
                  <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customer_id; ?>" />
                  <input type="hidden" name="txt_all_selected_value" id="txt_all_selected_value" />
                  <table class="table table-striped">
                    <tr>
                        <th> &nbsp;</th>
                        <th>#</th>
                        <th>Date</th>
                        <th>Invoice</th>
                        <th>PDF</th>                
                        <th>Invoice due date</th>
                        <th>Payment mode</th>
                        <th>Payment Status</th>                 
                        <th>Total Amount</th>                 
                        <th>Balance Amount</th>                 
                        <th></th>
                    </tr>
                    <tbody id="invoice_data">
                      <?php
                      $total_amt =0;
                        if(!empty($result)){$i = 1;
                            foreach($result as $invoice){
                              $total_amt += $invoice->balance_amount; 
                                $pdf_original = '';
                                if(!empty($invoice->pdf_original)){ 
                                    $pdf_original = '<a href="'.base_url().'download.php?action=upload/invoice_pdf/'.$invoice->pdf_original.'">Click Here</a>';
                                } 
                                ?>
                                  <tr>
                                      <td><input type="checkbox" name="chk[]" id="select_all_<?php echo $invoice->id; ?>" class="select_all_<?php echo $i; ?>" onclick="get_selected_row(<?php echo $invoice->id; ?>)" value="<?php echo $invoice->id; ?>"/>
                                        </td>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo date('d M y', strtotime($invoice->created_on)); ?></td>
                                      <td><?php echo '#'.$invoice->invoice_no; ?></td>
                                      <td><?php echo $pdf_original; ?></td>                
                                      <td><?php echo $invoice->invoice_due_date; ?></td>
                                      <td><?php echo $invoice->payment_mode; ?></td>
                                      <td><?php echo $invoice->payment_status; ?></td>
                                      <td><i class="fa fa-inr" aria-hidden="true"></i><?php echo $invoice->total_cost; ?></td>
                                      <td><input type="hidden" name="txt_total_cost_<?php echo $invoice->id; ?>" id="txt_total_cost_<?php echo $invoice->id; ?>" value="<?php echo $invoice->balance_amount; ?>" /><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $invoice->balance_amount; ?></td>
                                      <td></td>                   
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
                  <?php if(!empty($result)){ ?>
                  <div id="pay_data" >
                      <input type="hidden" name="min_amount_pay" id="min_amount_pay" />
                      <input type="hidden" name="max_amount_pay" id="max_amount_pay" value="<?=$total_amt;?>" />
                      <input type="hidden" name="customer_id" value="<?=$customer['id'] ?>" />
                      <input type="hidden" name="customer_name" value="<?=$customer['name']?>" />
                      <div class="row">
                          
                      </div> 

                      <div class="row">
                          
                      </div> 


                      <div class="row">
                        <div class="col-md-3">
                            <label for="pay_amount" class="control-label"><span class="text-danger">*</span>Amount to be Paid:</label>
                            <div class="form-group">
                              
                              <input type="text" name="pay_amount" class="form-control" id="pay_amount" disabled="" />
                            </div>
                          </div>

                        <div class="col-md-3">
                            <label for="pay_amount" class="control-label"><span class="text-danger">*</span>Enter Amount</label>
                            <div class="form-group">
                              <input type="text" name="paid_amount" class="form-control" id="paid_amount" placeholder="Rs" />
                              
                            </div>
                          </div>

                        
                          <div class="col-md-3">
                            <label for="pay_remark" class="control-label"><span class="text-danger">*</span>Remark</label>
                            <div class="form-group">
                              <textarea name="pay_remark" rows="2" cols="50" class="form-control" id="pay_remark"></textarea>
                            </div>
                          </div>
                      
                          <div class="col-md-3">
                            <label for="pay_mode" class="control-label"><span class="text-danger">*</span>Payment Mode</label>
                            <div class="form-group">
                                <input type="radio" name="pay_mode" id="pay_mode_cash" value="Cash" checked="checked"/> Cash<br>
                                <input type="radio" name="pay_mode" id="pay_mode_cheque" value="Cheque" /> Cheque<br>
                                <input type="radio" name="pay_mode" id="pay_mode_rtgs" value="RTGS/NEFT" /> RTGS NEFT
                                
                            </div>
                          </div>
                      </div>    
                      <div class="col-md-4"> </div>

                      <div class="col-md-4">                   
                        <div class="box-footer" >
                          <button type="submit" value="Settle Invoice" class="btn btn-block btn-success" id="settle_invoice" >
                            <i class="fa fa-check"></i> Settle Invoice
                          </button>
                        </div>
                      </div> 
                      <div class="col-md-4"> </div>





                  </div>
                  <?php } ?>
        				</div>
        			</div>
          </form>
        </div>
        </div> 
      	</div>
    </div>
</div>