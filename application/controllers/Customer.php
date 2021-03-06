<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Customer extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('State_model');
    } 

    /*
     * Listing of customers
     */
    function index()
    {
        $this->Common_model->checklogin();
        
        $config['total_rows'] = $this->Customer_model->get_all_customers_count();
        $this->pagination->initialize($config);

        $data['customers'] = $this->Customer_model->get_all_customers();
        
        $data['_view'] = 'customer/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new customer
     */
    function add()
    {   
        $this->Common_model->checklogin();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_role','User Role','required');
        $this->form_validation->set_rules('name','Nick Name','required');
        $this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]'); //{10} for 10 digits number
        $this->form_validation->set_rules('company_gst_no','Company Gst No','required');
        $this->form_validation->set_rules('billing_state','Billing State','required');
        $this->form_validation->set_rules('company_name','Company Name','required');
		
        
		if($this->form_validation->run())     
        {   
            $params = array(
				'status' => 1,
				'user_role' => $this->input->post('user_role'),
				'billing_state' => $this->input->post('billing_state'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'company_name' => $this->input->post('company_name'),
				'company_gst_no' => $this->input->post('company_gst_no'),
				'company_marka_no' => $this->input->post('company_marka_no'),
                'company_transport' => $this->input->post('company_transport'),
                'company_transport_mode' => $this->input->post('company_transport_mode'),
				'company_address' => $this->input->post('company_address'),
                'company_address2' => $this->input->post('company_address2'),
				'credit_limit_days' => $this->input->post('credit_limit_days'),
                'billing_city' => $this->input->post('billing_city'),
				'remarks' => $this->input->post('remarks'),
            );
            
            $customer_id = $this->Customer_model->add_customer($params);
            redirect('customer/index');
        }
        else
        {
			$this->load->model('State_model');
			$data['all_state'] = $this->State_model->get_all_state();
            
            $data['_view'] = 'customer/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a customer
     */
    function edit($id)
    {   
        $this->Common_model->checklogin();
        // check if the customer exists before trying to edit it
        $data['customer'] = $this->Customer_model->get_customer($id);
        
        if(isset($data['customer']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('user_role','User Role','required');
            $this->form_validation->set_rules('name','Nick Name','required');
            $this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]'); //{10} for 10 digits number
            $this->form_validation->set_rules('company_gst_no','Company Gst No','required');
            $this->form_validation->set_rules('billing_state','Billing State','required');
            $this->form_validation->set_rules('company_name','Company Name','required');

		
			if($this->form_validation->run())     
            {   

                

                $params = array(
					'user_role' => $this->input->post('user_role'),
					'billing_state' => $this->input->post('billing_state'),
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'company_name' => $this->input->post('company_name'),
					'company_gst_no' => $this->input->post('company_gst_no'),
					'company_marka_no' => $this->input->post('company_marka_no'),
					'company_transport' => $this->input->post('company_transport'),
                    'company_transport_mode' => $this->input->post('company_transport_mode'),
					'company_address' => $this->input->post('company_address'),
                    'company_address2' => $this->input->post('company_address2'),
					'credit_limit_days' => $this->input->post('credit_limit_days'),
					'billing_city' => $this->input->post('billing_city'),
					'remarks' => $this->input->post('remarks'),
                );

                $this->Customer_model->update_customer($id,$params);            
                redirect('customer/index');
            }
            else
            {
				$this->load->model('State_model');
				$data['all_state'] = $this->State_model->get_all_state();

                $data['_view'] = 'customer/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The customer you are trying to edit does not exist.');
    } 

    /*
     * Deleting customer
     */
    function remove($id)
    {
        $this->Common_model->checklogin();
        $customer = $this->Customer_model->get_customer($id);

        // check if the customer exists before trying to delete it
        if(isset($customer['id']))
        {
            $this->Customer_model->delete_customer($id);
            redirect('customer/index');
        }
        else
            show_error('The customer you are trying to delete does not exist.');
    }
    
}
