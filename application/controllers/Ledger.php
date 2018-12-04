<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Ledger extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Order_detail_model');
        $this->load->model('Setting_model');

    } 
    function all()
    {
        $this->Common_model->checklogin();
        //$data['receipts'] = $this->Common_model->get_sql_rows('select * from receipts order by id desc');
        $data['receipts'] = $this->Common_model->get_sql_rows('select r.*,c.company_name from receipts as r join customers as c on r.userid=c.id order by r.id desc');
        
        
        $data['_view'] = 'ledger/index';
        $this->load->view('layouts/main',$data);
    }

     function receipt_detail($id)
    {
        $this->Common_model->checklogin();
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $data['receipt'] = $this->Common_model->get_sql_row('select * from receipts where id='.$id);

        $data['customer'] = $this->Common_model->get_sql_row_array('select * from customers where id='.$data['receipt']->userid);
        $data['_view'] = 'ledger/receipt-detail';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Listing of ledger
     */
    function showuser($userid)
    {
        $this->Common_model->checklogin();
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        //$data['customer'] = $this->Common_model->get_sql_rows('select * from customers where id='.$userid);
        $data['customer'] = $this->Customer_model->get_customer($userid);
        $data['receipts'] = $this->Common_model->get_sql_rows_array("select id as receipt_id, pay_amount, pay_mode, pay_date as created_on, pay_invoices, 'receipt' as TType , pay_realisation from receipts where userid=".$userid);
        $data['invoices'] = $this->Common_model->get_sql_rows_array("select id as invoice_id,invoice_no , total_cost, invoice_due_date , invoice_date as created_on, payment_id, customer_id, 'payment' as TType, payment_mode, tax_amount, payment_status, invoice_status from invoices where customer_id=".$userid);
        $data['credit'] = $this->Common_model->get_sql_rows_array("select sum(pay_amount) as credit from receipts where userid=".$userid);
        $data['debit'] = $this->Common_model->get_sql_rows_array("select sum(total_cost) as debit from invoices where customer_id=".$userid);

        $this->session->unset_userdata('from_date');
        $this->session->unset_userdata('to_date'); 
         if(isset($_POST['srearch'])){
            $fromDate = $this->input->post('from_date');
            $toDate = $this->input->post('to_date');
            $this->session->set_userdata('from_date', $fromDate);
            $this->session->set_userdata('to_date', $toDate);
            $data['receipts'] = $this->Common_model->get_sql_rows_array("select id as receipt_id, pay_amount, pay_mode, pay_date as created_on, pay_invoices, 'receipt' as TType , pay_realisation from receipts where userid=".$userid." And DATE(pay_date) between '".$fromDate."' and '".$toDate."'");
             $data['credit'] = $this->Common_model->get_sql_rows_array("select sum(pay_amount) as credit from receipts where userid=".$userid." And DATE(pay_date) between '".$fromDate."' and '".$toDate."'");
            $data['invoices'] = $this->Common_model->get_sql_rows_array("select id as invoice_id,invoice_no , total_cost, invoice_due_date , invoice_date as created_on, payment_id, customer_id, 'payment' as TType, payment_mode, tax_amount, payment_status, invoice_status from invoices where customer_id=".$userid." And DATE(created_on) between '".$fromDate."' and '".$toDate."'");
            //echo $this->db->last_query(); 
            $data['debit'] = $this->Common_model->get_sql_rows_array("select sum(total_cost) as debit from invoices where customer_id=".$userid." And DATE(created_on) between '".$fromDate."' and '".$toDate."'");
        }
        
        $data['_view'] = 'ledger/user-ledger';
        $this->load->view('layouts/main',$data);
    }

    function download_ladger($userid){
        error_reporting(0);  
        $this->Common_model->checklogin();
        $data["owner"] = $this->Setting_model->get_setting(1);
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $data['customer'] = $this->Customer_model->get_customer($userid);
        $data['receipts'] = $this->Common_model->get_sql_rows_array("select id as receipt_id, pay_amount, pay_mode, pay_date as created_on, pay_invoices, 'receipt' as TType ,pay_remark, pay_realisation from receipts where userid=".$userid);
        $data['credit'] = $this->Common_model->get_sql_rows_array("select sum(pay_amount) as credit from receipts where userid=".$userid);
        $data['invoices'] = $this->Common_model->get_sql_rows_array("select id as invoice_id,invoice_no , total_cost, invoice_due_date , invoice_date as created_on, payment_id, customer_id, 'payment' as TType, payment_mode, tax_amount, payment_status, invoice_status from invoices where customer_id=".$userid);
        $data['debit'] = $this->Common_model->get_sql_rows_array("select sum(total_cost) as debit from invoices where customer_id=".$userid);
        //print_r($data['debit']);die;
        $fromDate = $this->session->userdata('from_date');
        $toDate = $this->session->userdata('to_date');
        if(isset($fromDate)){
            $data['receipts'] = $this->Common_model->get_sql_rows_array("select id as receipt_id, pay_amount, pay_mode, pay_date as created_on, pay_invoices, 'receipt' as TType ,pay_remark, pay_realisation from receipts where userid=".$userid." And DATE(pay_date) between '".$fromDate."' and '".$toDate."'");
             $data['credit'] = $this->Common_model->get_sql_rows_array("select sum(pay_amount) as credit from receipts where userid=".$userid." And DATE(pay_date) between '".$fromDate."' and '".$toDate."'");
            $data['invoices'] = $this->Common_model->get_sql_rows_array("select id as invoice_id,invoice_no , total_cost, invoice_due_date , invoice_date as created_on, payment_id, customer_id, 'payment' as TType, payment_mode, tax_amount, payment_status, invoice_status from invoices where customer_id=".$userid." And DATE(created_on) between '".$fromDate."' and '".$toDate."'");
            //echo $this->db->last_query(); 
            $data['debit'] = $this->Common_model->get_sql_rows_array("select sum(total_cost) as debit from invoices where customer_id=".$userid." And DATE(created_on) between '".$fromDate."' and '".$toDate."'");
        }
        $html = $this->load->view('pdf_ledger', $data, true);
        $file = $data['customer']['id'].'-'.rand(100,999).'.pdf';
        $this->generatepdf($file, $html);
        $msg = 'Click here <a href="'.base_url().'upload/ledger/'.$file.'" target="_blank">Click here to download PDF</a>';
            $this->session->set_flashdata('message', '<div class="alert alert-success">'.$msg.'</div>');
        redirect(base_url().'ledger/showuser/'.$userid);    
    }



    function showPendingInvoices($userid)
    {
        $this->Common_model->checklogin();
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        //$data['customer'] = $this->Common_model->get_sql_rows('select * from customers where id='.$userid);
        $data['customer'] = $this->Customer_model->get_customer($userid);
        
        $data['invoices'] = $this->Common_model->get_sql_rows_array("select * from invoices where payment_status!='completed' and customer_id=".$userid);
        
        $data['_view'] = 'ledger/pending_invoices';
        $this->load->view('layouts/main',$data);
    }
    function submitpendingInv()
    {
     error_reporting(0);  
       if(isset($_POST['inv']) && is_array($_POST['inv']) && count($_POST['inv'])>0)
       {
        $act = $_POST['act'];
        
        $ids = implode(',',$_POST['inv']);
        $data["owner"] = $this->Setting_model->get_setting(1);
        $data['customer'] = $this->Common_model->get_sql_row_array("select * from customers where id=".$_POST['customer_id']);

    
        $data['state'] = $this->Common_model->get_sql_row_array("select * from state where id=".$data['customer']['billing_state']);
        $data['invoices'] = $this->Common_model->get_sql_rows_array("select * from invoices where id in (".$ids.")");

       $html = $this->load->view('pdf_pending_invoices', $data, true);
       $file = $data['customer']['id'].'-'.rand(100,999).'.pdf';
       $this->Common_model->generatepdf($file, $html);
       $msg = 'Click here <a href="'.base_url().'upload/pending_invoices/'.$file.'" target="_blank">Click here to download PDF</a>';
            $this->session->set_flashdata('message', '<div class="alert alert-success">'.$msg.'</div>');
       }

       else
       {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No action performed</div>');
       }
       redirect(base_url().'pay/index');
    }

    function generatepdf($filename, $html)
    {
        $mPDF = $this->load->library('m_pdf');
        $stylesheet = file_get_contents(base_url().'resources/css/pdf.css'); // external css
        $path =  $this->config->item('basepath')."upload/ledger/";
        //-------------- pdf_original start----------------------
        $mpdf=new mPDF();
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html,2);
        $mpdf->Output($path.$filename, "F");

    }
}
