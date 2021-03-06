<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tax_clas extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tax_clas_model');
    } 

    /*
     * Listing of tax_class
     */
    function index()
    {
        $this->Common_model->checklogin();
        $data['tax_class'] = $this->Tax_clas_model->get_all_tax_class();
        
        $data['_view'] = 'tax_clas/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new tax_clas
     */
    function add()
    {   
        $this->Common_model->checklogin();
        $this->load->library('form_validation');

		$this->form_validation->set_rules('tax_name','Tax Name','required');
		$this->form_validation->set_rules('tax_per','Tax Per','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'tax_name' => $this->input->post('tax_name'),
				'tax_per' => $this->input->post('tax_per'),
				'remarks' => $this->input->post('remarks'),
            );
            
            $tax_clas_id = $this->Tax_clas_model->add_tax_clas($params);
            redirect('tax_clas/index');
        }
        else
        {            
            $data['_view'] = 'tax_clas/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tax_clas
     */
    function edit($id)
    {   
        $this->Common_model->checklogin();
        // check if the tax_clas exists before trying to edit it
        $data['tax_clas'] = $this->Tax_clas_model->get_tax_clas($id);
        
        if(isset($data['tax_clas']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('tax_name','Tax Name','required');
			$this->form_validation->set_rules('tax_per','Tax Per','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'tax_name' => $this->input->post('tax_name'),
					'tax_per' => $this->input->post('tax_per'),
					'remarks' => $this->input->post('remarks'),
                );

                $this->Tax_clas_model->update_tax_clas($id,$params);            
                redirect('tax_clas/index');
            }
            else
            {
                $data['_view'] = 'tax_clas/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tax_clas you are trying to edit does not exist.');
    } 

    /*
     * Deleting tax_clas
     */
    function remove($id)
    {
        $this->Common_model->checklogin();
        $tax_clas = $this->Tax_clas_model->get_tax_clas($id);

        // check if the tax_clas exists before trying to delete it
        if(isset($tax_clas['id']))
        {
            $this->Tax_clas_model->delete_tax_clas($id);
            redirect('tax_clas/index');
        }
        else
            show_error('The tax_clas you are trying to delete does not exist.');
    }
    
}
