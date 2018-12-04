<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Order_detail extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Order_detail_model');
    } 

    /*
     * Listing of order_details
     */
    function index()
    {
        $this->Common_model->checklogin();
        $data['order_details'] = $this->Order_detail_model->get_all_order_details();
        
        $data['_view'] = 'order_detail/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new order_detail
     */
    function add()
    {   
        $this->Common_model->checklogin();
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'invoice_id' => $this->input->post('invoice_id'),
				'product_id' => $this->input->post('product_id'),
				'qty' => $this->input->post('qty'),
				'product_cost' => $this->input->post('product_cost'),
				'tax_details' => $this->input->post('tax_details'),
				'total_tax_amount' => $this->input->post('total_tax_amount'),
				'total_price' => $this->input->post('total_price'),
            );
            
            $order_detail_id = $this->Order_detail_model->add_order_detail($params);
            redirect('order_detail/index');
        }
        else
        {
			$this->load->model('Invoice_model');
			$data['all_invoices'] = $this->Invoice_model->get_all_invoices();

			$this->load->model('Product_model');
			$data['all_products'] = $this->Product_model->get_all_products();
            
            $data['_view'] = 'order_detail/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a order_detail
     */
    function edit($id)
    {   
        $this->Common_model->checklogin();
        // check if the order_detail exists before trying to edit it
        $data['order_detail'] = $this->Order_detail_model->get_order_detail($id);
        
        if(isset($data['order_detail']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'invoice_id' => $this->input->post('invoice_id'),
					'product_id' => $this->input->post('product_id'),
					'qty' => $this->input->post('qty'),
					'product_cost' => $this->input->post('product_cost'),
					'tax_details' => $this->input->post('tax_details'),
					'total_tax_amount' => $this->input->post('total_tax_amount'),
					'total_price' => $this->input->post('total_price'),
                );

                $this->Order_detail_model->update_order_detail($id,$params);            
                redirect('order_detail/index');
            }
            else
            {
				$this->load->model('Invoice_model');
				$data['all_invoices'] = $this->Invoice_model->get_all_invoices();

				$this->load->model('Product_model');
				$data['all_products'] = $this->Product_model->get_all_products();

                $data['_view'] = 'order_detail/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The order_detail you are trying to edit does not exist.');
    } 

    /*
     * Deleting order_detail
     */
    function remove($id)
    {
        $this->Common_model->checklogin();
        $order_detail = $this->Order_detail_model->get_order_detail($id);

        // check if the order_detail exists before trying to delete it
        if(isset($order_detail['id']))
        {
            $this->Order_detail_model->delete_order_detail($id);
            redirect('order_detail/index');
        }
        else
            show_error('The order_detail you are trying to delete does not exist.');
    }
    
}