<?php
class Common extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Customer_model');
		$this->load->model('Product_model');
		$this->load->model('Tax_clas_model');
		$this->load->model('Invoice_model');
		$this->load->model('Common_model');
		$tax = array('cgst_per'=>0,'cgst_amt'=>0, 'sgst_per'=>0,'sgst_amt'=>0, 'igst_per'=>0,'igst_amt'=>0, 'total_tax'=>0, 'payable_amt'=>0);
    } 

    /*
     * Listing of customers
     */
    function index()
    {
	}

	function edit($id)
    {  
        //	echo $all_pro = $this->input->post('all_pro');die;
         $c_data = $this->session->userdata("c_data");
            if(!empty($c_data)){
                foreach($c_data as $key => $val){
                    $this->session->unset_userdata("invoice_data_$val");
                }
                $this->session->unset_userdata("c_data");
            }

        error_reporting(0);
        $this->Common_model->checklogin(); 
        // check if the product exists before trying to edit it
        $data['invoice'] = $this->Invoice_model->get_invoice($id);
        $data['products'] = $this->Common_model->get_sql_rows('select * from order_details where invoice_id='.$id);
        $data['customer'] = $this->Common_model->get_rowdata_by_id($data['invoice']['customer_id'], 'customers');
        $data['all_product'] = $this->Common_model->get_sql_rows_array("select id, name, sku  from products");

        // product data store in session start
        for($i=0;$i<count($data['products']);$i++)
        {
            $state = $data['customer']->billing_state;
            $customer_id = $data['customer']->id;
            $prod = $data['products'][$i]->product_id;
            $qty = $data['products'][$i]->qty;
            $price = $data['products'][$i]->product_cost;
            
            $this->editgetproductcart($state,$customer_id,$prod,$qty,$price);
        }      
        //echo '<pre>'; print_r($_SESSION);die;    
        // product data store in session end

		$data['_view'] = 'invoice/edit';
        $this->load->view('layouts/main',$data);
    } 

    function editgetproductcart($state,$customer_id,$prod,$qty,$price)
	{		
		global $tax;
		$state = $state;
		$customer_id = $customer_id;
		$prod = $prod;
		$qty = $qty;
		$price = $price;
		
		$product = $this->Product_model->get_product($prod);
		//print_r($product);
		if(!empty($product["id"])){
			$tax = $this->Tax_clas_model->get_tax_clas($product['tax_class']);
			$taxper = $tax['tax_per'];			
			if(!empty($customer_id)){
	            $qu = "select user_role from customers where id = '".$customer_id."'";
	            $query = $this->db->query($qu);
	            $customer = $query->row();
	            $user_role = $customer->user_role;
	            $amount = round($qty* $price,2);
	        }
	        else{
	        	$price = $product['retailer_price'];
	        	$amount = round($qty* $price,2);
	        }
	        
	        $this->calculategst($state, $amount , $taxper);
			$output = array(
				'product_id'=>$product['id'],
					'status'=>true,
					'price'=>$price, 
					'qty' => $qty,
					'title'=>$product['name'],
					'hsncode'=>$product['hsncode'],
					'sku'=>$product['sku'], 			
					'taxable_value'=>$amount,
					'sgst'=>$tax['sgst_per'], 
					'sgst_amount'=>$tax['sgst_amt'], 
					'cgst'=>$tax['cgst_per'], 
					'cgst_amount'=>$tax['cgst_amt'], 
					'igst'=>$tax['igst_per'], 
					'igst_amount'=>$tax['igst_amt'], 
					'tax_amount'=>$tax['total_tax'], 
					'total_cost'=>$tax['payable_amt'],			
				);				
			$start_val = $_POST["start_val"];

			$this->session->set_userdata("invoice_data_".$product['id'], $output);

			$c_data = $this->session->userdata("c_data");			
			if(empty($c_data)){
				$c_data1 = array();
				array_push($c_data1, $product['id']);			
				$this->session->set_userdata("c_data", $c_data1);
			}
			else{
				array_push($c_data, $product['id']);
				$this->session->set_userdata("c_data", $c_data);	
			}
			//echo '<pre>'; print_r($_SESSION);die;
			//echo json_encode($output);		
		}
		
	}




	function getproductcart()
	{	
error_reporting(0);	
		global $tax;
		$state = $_POST['state_id'];
		$customer_id = $_POST['customer_id'];
		$prod = $_POST['current_product_id'];
		$qty = $_POST['qty'];
		$price = $_POST['pr_price'];
		if(count($this->session->userdata("c_data"))>0 && in_array($prod, $this->session->userdata("c_data")))
		{
			$output = array('status'=>false, 'msg'=>'Product already included');
			echo json_encode($output);
			return;
		}
	//	echo '<pre>'; print_r($_SESSION);
		//$product = $this->Product_model->get_product($_POST['product']);
		$product = $this->Product_model->get_product($prod);
		if(!empty($product["id"])){
			$tax = $this->Tax_clas_model->get_tax_clas($product['tax_class']);
			$taxper = $tax['tax_per'];			
			if(!empty($customer_id)){
	            $qu = "select user_role from customers where id = '".$customer_id."'";
	            $query = $this->db->query($qu);
	            $customer = $query->row();
	            $user_role = $customer->user_role;

	            // if($user_role == 1){
	            // 	$price = $product['wholesaler_price'];
	            // }
	            // else if($user_role == 2){
	            // 	$price = $product['retailer_price'];
	            // }
	            // else{
	            // 	$price = $product['consumer_price'];
	            // }
	            
	            $amount = round($qty* $price,2);
	        }
	        else{
	        	$price = $product['retailer_price'];
	        	$amount = round($qty* $price,2);
	        }
	        
	        $this->calculategst($state, $amount , $taxper);
			$output = array(
				'product_id'=>$product['id'],
					'status'=>true,
					'price'=>$price, 
					'qty' => $qty,
					'title'=>$product['name'],
					'hsncode'=>$product['hsncode'],
					'sku'=>$product['sku'], 			
					'taxable_value'=>$amount,
					'sgst'=>$tax['sgst_per'], 
					'sgst_amount'=>$tax['sgst_amt'], 
					'cgst'=>$tax['cgst_per'], 
					'cgst_amount'=>$tax['cgst_amt'], 
					'igst'=>$tax['igst_per'], 
					'igst_amount'=>$tax['igst_amt'], 
					'tax_amount'=>$tax['total_tax'], 
					'total_cost'=>$tax['payable_amt'],			
				);				
			$start_val = $_POST["start_val"];

			$this->session->set_userdata("invoice_data_".$product['id'], $output);

			$c_data = $this->session->userdata("c_data");			
			if(empty($c_data)){
				$c_data1 = array();
				array_push($c_data1, $product['id']);			
				$this->session->set_userdata("c_data", $c_data1);
			}
			else{
				array_push($c_data, $product['id']);
				$this->session->set_userdata("c_data", $c_data);	
			}
			
			echo json_encode($output);		
		}
	}
	function calculategst($stateid, $amount, $taxslab)
	{
		global $tax;
		//array('cgst_per'=>0,'cgst_amt'=>0, 'sgst_per'=>0,'sgst_amt'=>0, 'igst_per'=>0,'igst_amt'=>0);
		$this->load->model('Setting_model');
		$setting_val = $this->Setting_model->get_setting(1);
		$admin_state = $setting_val['state_id'];
		$tax['cgst_per']=$tax['cgst_amt'] =$tax['sgst_per'] =$tax['sgst_amt'] =$tax['igst_per'] =$tax['igst_amt'] =0;
		if($stateid==$admin_state)
			{
				$tax['cgst_per'] = $taxslab/2;
				$tax['cgst_amt'] = round($amount * $tax['cgst_per']/100,2);

				$tax['sgst_per'] = $taxslab/2;
				$tax['sgst_amt'] = round($amount * $tax['sgst_per']/100,2);

			}

			else
			{
				$tax['igst_per'] = $taxslab;
				$tax['igst_amt'] = round($amount * $tax['igst_per']/100,2);	
			}
			$tax['total_tax'] = $tax['cgst_amt'] + $tax['sgst_amt'] + $tax['igst_amt'];
			$tax['payable_amt'] = round($tax['total_tax'] + $amount,2);
			return true;

	}
	function import()
	{
		$file =base_url()."upload/tmp/halblue_State_cities.csv";
		//echo $file;
		$file_handle = fopen($file,"r");
		$i=0;
		while (!feof($file_handle) ) {
				$data = fgetcsv($file_handle, 1024);
				//print_r($data);
				$state = array('state_name'=>$data[0]);
				$stateid =  $this->Common_model->insert_table_data_check($state,'state',$state);
				echo $this->db->last_query().'<br>';
				$cities = array('cityname'=>$data[1],'stateid'=>$stateid,'tier_class'=>"I");
				$city =  $this->Common_model->insert_table_data_check($cities,'cities',$cities);
				echo $this->db->last_query().'<br>';
			}
			fclose($file_handle);
	

	}
}
