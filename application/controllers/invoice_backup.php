<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Invoice extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model');        
        $this->load->model('State_model');        
        
    } 

    /*
     * Listing of invoices
     */
    function index()
    {                        
        $data["print_data"] = @$this->session->userdata("print_data");   
        $data['invoices'] = $this->Invoice_model->get_all_invoices();
        //echo $this->db->last_query();
        $data['_view'] = 'invoice/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new invoice
     */
    function add(){   
        error_reporting(0);
        if(isset($_POST) && !empty($_POST))     
        {
            $chk_invoice = ($this->input->post('chk_invoice')=='on') ? 1 : 0;
           // $inid = ($this->input->post('inv_id')!='') ? $this->input->post('inv_id') : '';
            if($this->input->post('inv_id')!='')
            {
                $query = $this->db->query("select * from invoices where id=".$_REQUEST['inv_id']);
                $inv = $result = $query->row_array();
                if(count($inv)>0)
                    {
                       $res =  array('status'=>true, 'msg'=> 'Invoice Already Exists');
                       $this->session->set_flashdata('message', '<div class="alert alert-danger">Invoice Number Already Exists</div>');
                       redirect(base_url().'invoice/add');
                    }
            }
            else
            {
                $inid='';
            }
            $customer_id = ($chk_invoice==1) ? 0 : $this->input->post('customer_id');
            $payment_mode = $this->input->post('payment_mode');
        
            $all_pro = $this->input->post('all_pro');
            $btn = $this->input->post('btn');          
 
            if(empty($all_pro)){
                echo "Please select any product.";
            }   
            else{
                if($chk_invoice == 1){                    
                    $invoice_due_date = "0000-00-00";  
                }
                else{
                    $qu = "select credit_limit_days, billing_city, company_gst_no, company_transport_mode from customers where id = '".$customer_id."'";
                    $query = $this->db->query($qu);
                    $customers = $query->row();
                    $credit_limit_days = $customers->credit_limit_days;

                    if(!empty($credit_limit_days)){
                        $invoice_due_date = date('Y-m-d', strtotime("+".$credit_limit_days." days"));
                    }
                    else{
                        $invoice_due_date = date('Y-m-d');
                    } 
                }            
                //echo "<pre>"; print_r($_POST); print_r($_SESSION);  exit;
                if($payment_mode=='Cash'){$payment_status='Completed';}
                else{$payment_status='Pending';}

                $params = array(
                    'id'=>$inid,
                    "chk_invoice" => $chk_invoice,
                    "customer_id" => $customer_id, 
                    'customer_name' => $this->input->post('customer_name'),
                    'customer_address' => $this->input->post('customer_address'),
                    'customer_email' => $this->input->post('customer_email'),
                    'state_id' => $this->input->post('state_id'),
                    'customer_mobile' => $this->input->post('customer_mobile'),
                    'invoice_date' => date('Y-m-d H:i:s', strtotime($this->input->post('invoice_date'))),
                    'supplydate' => date('Y-m-d H:i:s', strtotime($this->input->post('supplydate'))),
    				'payment_mode' => $payment_mode,				
    				'payment_status' => $payment_status,
                    'invoice_status' => 'New',      
    				'created_on' => date('Y-m-d h:i:s'),
                    'invoice_due_date' =>  $invoice_due_date,                   
                );            
               // echo "<pre>"; print_r($params); exit;
                $invoice_id = $this->Invoice_model->add_invoice($params);
                $data["invoice_id"] = $invoice_id;
                $tax_amount = 0.0;
                $total_cost = 0.0;
                
                $all_product = explode(",", $all_pro);
                foreach($all_product as $product_id){
                    $invoice_data = $_SESSION["invoice_data_$product_id"]; 
                    $tax_amount += $invoice_data["tax_amount"];
                    $total_cost += $invoice_data["total_cost"];

                    $params_order = array(
                        "invoice_id" => $invoice_id,
                        'product_id' => $product_id,                                                
                        'title' => $invoice_data["title"],
                        'sku' => $invoice_data["sku"],
                        'qty' => $invoice_data["qty"],
                        'product_cost' => $invoice_data["price"],
                        'taxable_value' => $invoice_data["taxable_value"],                 
                        'cgst' => $invoice_data["cgst"],
                        'cgst_amount' => $invoice_data["cgst_amount"],
                        'sgst' => $invoice_data["sgst"],
                        'sgst_amount' => $invoice_data["sgst_amount"],
                        'igst' => $invoice_data["igst"],
                        'igst_amount' => $invoice_data["igst_amount"],
                        'tax_amount' => $invoice_data["tax_amount"],
                        'total_cost' => $invoice_data["total_cost"],

                           
                    );            
                    $this->load->model('Order_detail_model');        
                    $order_detail_id = $this->Order_detail_model->add_order_detail($params_order);



                    $qu = "select quantity from products where id = '".$product_id."'";
                    $query = $this->db->query($qu);
                    $products = $query->row();
                    $quantity = $products->quantity;

                    $data = array(
                        "quantity" => $quantity - $invoice_data["qty"],
                        );
                    $this->db->where("id", $product_id);
                    $this->db->update('products', $data);                                        

                    $data_stock_log = array(
                        "product_id" => $product_id,
                        "invoice_id" => $invoice_id,
                        "stock_type" => 'OUT',
                        "qty" => $invoice_data["qty"],
                        "created" => date("Y-m-d H:i:s")
                    );
                    $result = $this->db->insert("stock_log", $data_stock_log);
                }                

                $this->load->model('Setting_model');        

                $data["params"] = $params;
                $data["params"]["billing_city"] = $customers->billing_city;
                $data["params"]["company_gst_no"] = $customers->company_gst_no;
                $data["params"]["company_transport_mode"] = $customers->company_transport_mode;
                $data["params"]["supplydate"] = $this->input->post('supplydate');
                $data["params"]["vehicle_number"] = $this->input->post('vehicle_number');
                $data["params"]["invoice_id"] = $invoice_id;
                $data["params"]["payment_status"] = $payment_status;
                $this->load->view('pdf_invoice', $data);

                exit;

                $data["all_pro"] = $all_pro;

                $stylesheet = link_tag('resources/main.css');
                
                $path =  $this->config->item('basepath')."upload/invoice_pdf/";

                $pdf_original = "pdf_original_$invoice_id.pdf";
                $pdf_duplicate = "pdf_duplicate_$invoice_id.pdf";
                $pdf_triplicate = "pdf_triplicate_$invoice_id.pdf";
                $pdf_combine = "pdf_combine_$invoice_id.pdf";

                $mPDF = $this->load->library('m_pdf');

                //-------------- pdf_original start----------------------
                $mpdf=new mPDF();
                $mpdf->WriteHTML($stylesheet,1);
                $data["params"]["inv_type"] = "original";
                $html_original=$this->load->view('pdf_invoice', $data, true);
                $mpdf->WriteHTML($html_original,2);
                $mpdf->Output($path.$pdf_original, "F");
                //-------------- pdf_original start----------------------

                //-------------- pdf_duplicate start----------------------
                $mpdf=new mPDF();
                $mpdf->WriteHTML($stylesheet,1);
                $data["params"]["inv_type"] = "duplicate";
                $html_duplicate=$this->load->view('pdf_invoice', $data, true);
                $mpdf->WriteHTML($html_duplicate,2);
                $mpdf->Output($path.$pdf_duplicate, "F");
                //-------------- pdf_duplicate start----------------------

                //-------------- pdf_triplicate start----------------------
                $mpdf=new mPDF();
                $mpdf->WriteHTML($stylesheet,1);
                $data["params"]["inv_type"] = "triplicate";
                $html_triplicate=$this->load->view('pdf_invoice', $data, true);
                $mpdf->WriteHTML($html_triplicate,2);
                $mpdf->Output($path.$pdf_triplicate, "F");
                //-------------- pdf_triplicate start----------------------

                //-------------- pdf_combine start----------------------
                $mpdf=new mPDF();
                $mpdf->WriteHTML($stylesheet,1);
                $html_combine=$html_original."<br><br><br>".$html_duplicate."<br><br><br>".$html_triplicate;
                $mpdf->WriteHTML($html_combine,2);
                $mpdf->Output($path.$pdf_combine, "F");
                //-------------- pdf_triplicate start----------------------



                /*if (!copy($path.$pdf_original, $path.$pdf_duplicate)) {                    
                }
                if (!copy($path.$pdf_original, $path.$pdf_triplicate)) {                    
                }*/

                $params = array(
                    'pdf_original' => $pdf_original,
                    'pdf_duplicate' => $pdf_duplicate,
                    'pdf_triplicate' => $pdf_triplicate,
                    "tax_amount" => $tax_amount,
                    'balance_amount' => $total_cost,  
                    "total_cost" => $total_cost,                    
                );            
                $update_invoice_id = $this->Invoice_model->update_invoice($invoice_id, $params);
                if($btn == "Save and Print"){                 
                    $print_data = array('print'=>'yes', "inv_id" => $invoice_id);
                    $this->session->set_userdata("print_data", $print_data);
                    redirect('invoice/index');
                }
                else if($btn == "Save and New"){
                    redirect('invoice/add');
                }
            }
            redirect('invoice/index');
        }        
        else
        {   
            $c_data = $this->session->userdata("c_data");
            if(!empty($c_data)){
                foreach($c_data as $key => $val){
                    $this->session->unset_userdata("invoice_data_$val");
                }
                $this->session->unset_userdata("c_data");
            }

    		$this->load->model('State_model');
    		$data['all_state'] = $this->State_model->get_all_state();

    		$this->load->model('Product_model');
    		$data['all_product'] = $this->Product_model->get_all_products();

            $qu = "select id, name from customers where status = 1";
            $query = $this->db->query($qu);
            $data['all_customer'] = $query->result();            
            
            $data['_view'] = 'invoice/add';
            $this->load->view('layouts/main',$data);
        }
    }  


    /*
     * Editing a invoice
     */
    function edit($id)
    {  
        $this->Common_model->checklogin(); 
        // check if the product exists before trying to edit it
        $data['invoice'] = $this->Invoice_model->get_invoice($id);
        $data['products'] = $this->Common_model->get_sql_rows('select * from order_details where invoice_id='.$id);
        $data['customer'] = $this->Common_model->get_rowdata_by_id($data['invoice']['customer_id'], 'customers');
        //echo $this->db->last_query(); 
        
        if(isset($data['invoice']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('invoice_status','Invoice Status','required');
            //$this->form_validation->set_rules('tax_class','Tax Class','required');
            //$this->form_validation->set_rules('hsncode','HSN Code','required');
           
            if($this->form_validation->run())     
            {       
                $params = array(
                    'vehicle_number' => $this->input->post('vehicle_number'),
                    'no_of_packages' => $this->input->post('no_of_packages'),
                    'invoice_status' => $this->input->post('invoice_status'),
                );            

                $this->Invoice_model->update_invoice($id,$params);            
                redirect('invoice/index');
            }
            else
            {
                $data['_view'] = 'invoice/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The invoice you are trying to edit does not exist.');
    } 
    /*
     * Deleting invoice
     */
    function remove($id)
    {
        $invoice = $this->Invoice_model->get_invoice($id);

        // check if the invoice exists before trying to delete it
        
        if(isset($invoice['id']) && $invoice['payment_status']=='Pending')
        {
            $path =  $this->config->item('basepath');
            $pdf_original = $path.'upload/invoice_pdf/pdf_original_'.$invoice['id'].".pdf"; 
            if(file_exists($pdf_original)){
                unlink($pdf_original); 
            }   
            $pdf_duplicate = $path.'upload/invoice_pdf/pdf_duplicate_'.$invoice['id'].".pdf";
            if(file_exists($pdf_duplicate)){
                unlink($pdf_duplicate); 
            }   
            $pdf_triplicate = $path.'upload/invoice_pdf/pdf_triplicate_'.$invoice['id'].".pdf";
            if(file_exists($pdf_triplicate)){
                unlink($pdf_triplicate); 
            }   

            $qu = "select id, qty, product_id from order_details where invoice_id = '".$invoice['id']."'";
            $query = $this->db->query($qu);
            $order_details = $query->result();
            foreach($order_details as $order_details_val){
                $product_id = $order_details_val->product_id;

                $qu = "select quantity from products where id = '".$product_id."'";
                $query = $this->db->query($qu);
                $products = $query->row();
                $quantity = $products->quantity;

                $data = array(
                    "quantity" => $quantity + $order_details_val->qty,
                    );
                $this->db->where("id", $product_id);
                $this->db->update('products', $data);

                $this->db->delete('order_details',array('id'=>$order_details_val->id));

                //Add to Log
                $data_stock_log = array(
                        "product_id" => $product_id,
                        "invoice_id" => $invoice['id'],
                        "stock_type" => 'IN',
                        "qty" => $quantity,
                        "remarks" => 'Invoice Cancelled',
                        "created" => date("Y-m-d H:i:s")
                    );
                $this->db->insert("stock_log", $data_stock_log);
            }

            $this->Invoice_model->delete_invoice($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Invoice #'.$invoice['id'].' Deleted!</div>');
            redirect('invoice/index');
        }
        else
        //    show_error('The invoice you are trying to delete does not exist.');
        $this->session->set_flashdata('message', '<div class="alert alert-danger">This Invoice #'.$invoice['id'].' Cannot Be Deleted!</div>');
        redirect(base_url().'invoice/index');
    }

    function remove_cart(){
        $product_id = $this->input->post("product_id");
        $this->load->model('Product_model');
        
        if(!empty($product_id)){            
            $this->session->unset_userdata("invoice_data_$product_id");
            $response = array(
                "status" => "success",
                "message" => "Product removed successfully.",
            );

        }
        else{
            $response = array(
                "status" => "error",
                "message" => "Product not exists.",
            );
        }
        echo json_encode($response);
    }

    function get_customer_data(){

        $c_data = $this->session->userdata("c_data");
        if(!empty($c_data)){
            foreach($c_data as $key => $val){
                $this->session->unset_userdata("invoice_data_$val");
            }
            $this->session->unset_userdata("c_data");
        }
        
        $customer_id = $this->input->post("customer_id");
        $this->load->model('Customer_model');
        $customer = $this->Customer_model->get_customer($customer_id);        

        if(!empty($customer)){           
            $response = array(
                    "status" => "success",
                    "customer_name" => $customer['name'],
                    "customer_address" => $customer['company_address'],
                    "customer_email" => $customer['email'],
                    "customer_mobile" => $customer['mobile'],
                    "state_id" => $customer['billing_state'],
                );    
        }
        else{
            $response = array(
                    "status" => "error",
                    "message" => "Record not found",
                );    
        }    
        echo json_encode($response);
    }    

    function livesearch(){
        $q = $this->input->post("str");
        $all_pro = $this->input->post("all_pro");
         
        $this->load->model('Product_model');
        if(!empty($all_pro)){
            $qu = "select * from products where id not in($all_pro) order by id desc";
            $query = $this->db->query($qu);
            $all_product = $result = $query->result();
        }
        else{
            $qu = "select * from products order by id desc";
            $query = $this->db->query($qu);
            $all_product = $result = $query->result();
        }
        $product_count = count($all_product);

        if (strlen($q)>0){
        $hint="";
        for($i=0; $i<($product_count); $i++){
                $y=$all_product[$i]->name;
                $id=$all_product[$i]->id;   
            
                if(stristr($y,$q)){
                    if ($hint==""){
                        $hint="<a onclick='get_auto_suggest(".$id.", ".'"'.$y.'"'.");' name_val='".$y."' id='select_".$id."'>".$y."</a>";                        
                    }
                    else{
                        $hint=$hint ."<a onclick='get_auto_suggest(".$id.", ".'"'.$y.'"'.");' name_val='".$y."' id='select_".$id."'><br />".$y."</a>";                                    
                    }
                }            
           }
        }

        // Set output to "no suggestion" if no hint were found
        // or to the correct values
        if ($hint=="")
            $response["sdata"]="no suggestion";
        else
            $response["sdata"]=$hint;

        //output the response
        echo json_encode($response);
    } 
    function checkinvoice()
    {
        if(isset($_REQUEST['inid']) && $_REQUEST['inid']!=''){
            $query = $this->db->query("select * from invoices where id=".$_REQUEST['inid']);
            $inv = $result = $query->row_array();
            if(count($inv)>0)
                {
                   $res =  array('status'=>true, 'msg'=> 'Invoice Already Exists');
                }
            }
                else
                {
                    $res = array('status'=>false, 'msg'=> '');
                }
            echo json_encode($res);
    }
}
