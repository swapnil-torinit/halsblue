<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Receipt Detail</h3>            	
            </div>
            <div class="box-body">
                <a href="#customer" data-toggle="collapse">Hide Customer Details</a>
                <div class="row" id="customer">
                <div class="col-md-6">
                     <div class="box-title">Customer Details</div>
                    <table class="table">
                      <tr><td>Name</td><td>:</td><td><?=$customer['name'];?></td></tr>
                      <tr><td>Email</td><td>:</td><td><?=$customer['email'];?></td></tr>
                      <tr><td>Mobile</td><td>:</td><td><?=$customer['mobile'];?></td></tr>
                       <tr><td>Company Name</td><td>:</td><td><?=$customer['company_name'];?></td></tr>
                      <tr><td>Company GST</td><td>:</td><td><?=$customer['company_gst_no'];?></td></tr>
                      <tr><td>Address</td><td>:</td><td><?=$customer['company_address'];?></td></tr>
                    </table>
                     <h4></h4>
                  </div>
                   <div class="col-md-6">
                    <table class="table">
                         <div class="box-title">Payment Detail</div>
                       <table class="table">
                        <tr><td>Payment Id</td><td>:</td><td><?=$receipt->id?></td></tr>
                      <tr><td>Payment Date</td><td>:</td><td><?=date('d M y h:i A', strtotime($receipt->pay_date))?> </td></tr>
                      <tr><td>Payment Mode</td><td>:</td><td><?=$receipt->pay_mode?></td></tr>
                      <tr><td>Remarks </td><td>:</td><td><?=$receipt->pay_remark?></td></tr>
                      <tr><td>Cheque Releazied[If any]</td><td>:</td><td><?php if($receipt->pay_mode=='Cheque'){
                        echo '<img src="'.base_url().'resources/img/'.$receipt->pay_realisation.'.png">';
                      }else{echo 'NA';}
                      ?></td></tr>
                      
                    </table>
            
                </table>
                 </div>
            </div>
<?php
$inv = json_decode($receipt->pay_invoices);
foreach ($inv as $value) {
    $invoice_detail = $this->Common_model->get_sql_row('select * from invoices where id='.$value->invoice_id);
    $order_details = $this->Common_model->get_sql_rows('select * from order_details where invoice_id='.$value->invoice_id);
    # code...
?>
<div class="panel panel-success">
  <div class="panel-heading">
    <div class="row">
    <div class="col-md-6">
      InvocieID: #<?=$value->invoice_id;?> 
    </div>
    <div class="col-md-6">
      Amount: <i class="fa fa-inr" aria-hidden="true"></i>
    <?=$value->amount_paid;?>, Status: <?=$value->status;?>, Balance Amount: <i class="fa fa-inr" aria-hidden="true"></i>
    <?=$invoice_detail->balance_amount;?>
    </div>
  </div>
  </div>
    <div class="panel-body">
                <table class="table table-striped" id="">
                    
                    <thead>
                        <tr>                        
    						<th>SKU.</th>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Product Cost</th>
                            <th>Tax Amount</th>
                            <th>Total Cost</th>
    						<th>Purchase Date</th>  
                            <th>Invoice</th>                      
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($order_details as $item){ ?>
                        <tr>                        
                            <td><?=$item->sku;?></td>
                            <td><?=$item->title;?></td>
                            <td><?=$item->qty;?></td>
                            <td><?=$item->product_cost;?></td>
                            <td><i class="fa fa-inr" aria-hidden="true"></i><?=$item->tax_amount;?></td>
                            <td><i class="fa fa-inr" aria-hidden="true"></i><?=$item->total_cost;?></td>
                            <td><?=$item->created;?></td>  
                            <td><a href="<?=base_url().'upload/invoice_pdf/'.$invoice_detail->pdf_original;?>" target='_blank'><i class="fa fa-file-pdf-o" aria-hidden="true">Invoice</i></a></td>                      
                        </tr>
                    <?php } ?>
                   
                            
                    <tbody>
                </table>
    </div>
  </div>
    
<?php } ?>          
            </div>
        </div>
    </div>
</div>
