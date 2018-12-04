<?php

class Common_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Get brand by id
     */
    /**
     * @param $id
     * @param $table
     * @return mixed
     */
    public function get_rowdata_by_id($id, $table)
    {
        return $this->db->get_where($table, array('id' => $id))->row_object();
    }

    /*
     * Get all brands count
     */
    /**
     * @param $table
     * @return mixed
     */
    public function get_all_table_count($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    /**
     * @param $array
     * @param $table
     * @return mixed
     */
    public function get_rowdata_by_val($array, $table)
    {
        // print_r($array);

        return $this->db->get_where($table, $array)->row_object();

    }
    /**
     * @param $sql
     * @return int
     */
    public function get_sql_row($sql)
    {
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row_object();
        } else {
            return 0;
        }

    }
    /**
     * @param $sql
     * @return int
     */
    public function get_sql_row_array($sql)
    {
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return 0;
        }

    }
    /**
     * @param $sql
     * @return null
     */
    public function exec_sql($sql)
    {
        $query = $this->db->query($sql);
        return;

    }
    /**
     * @param $sql
     * @return mixed
     */
    public function get_sql_rows($sql)
    {
        $result = $this->db->query($sql)->result_object();
        return $result;

    }
    /**
     * @param $sql
     * @return mixed
     */
    public function get_sql_rows_array($sql)
    {
        $result = $this->db->query($sql)->result_array();
        return $result;

    }
    /*
     * Get all brands
     */
    /**
     * @param array $params
     * @param $table
     * @return mixed
     */
    public function get_all_table($params = array(), $table)
    {
        $this->db->order_by('id', 'desc');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get($table)->result_array();
    }

    /*
     * function to add new brand
     */
    /**
     * @param $params
     * @param $table
     * @param array $check
     * @return mixed
     */
    public function insert_table_data($params, $table, $check = array())
    {
        $this->db->where($check);

        $query     = $this->db->get($table);
        $count_row = $query->num_rows();

        if ($count_row > 0) {
            return false;
        } else {
            $this->db->insert($table, $params);
            return $this->db->insert_id();
        }
    }
    /**
     * @param $params
     * @param $table
     * @param array $check
     * @return mixed
     */
    public function insert_table_data_check($params, $table, $check = array())
    {
        $this->db->where($check);

        $query     = $this->db->get($table);
        $count_row = $query->num_rows();

        if ($count_row > 0) {
            $row = $query->row_object();
            return $row->id;
        } else {
            $this->db->insert($table, $params);
            return $this->db->insert_id();
        }
    }

    /**
     * @param $params
     * @param $table
     * @return mixed
     */
    public function insert_only($params, $table)
    {

        $this->db->insert($table, $params);
        return $this->db->insert_id();

    }
    /*
     * function to update brand
     */
    /**
     * @param $id
     * @param $params
     * @param $table
     * @return mixed
     */
    public function update_table_data($id, $params, $table)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, $params);
    }

    /*
     * function to delete brand
     */
    /**
     * @param $id
     * @param $table
     * @return mixed
     */
    public function delete_table($id, $table)
    {
        return $this->db->delete($table, array('id' => $id));
    }
    /**
     * @param $table
     * @param $params
     * @return mixed
     */
    public function delete_table_param($table, $params)
    {
        return $this->db->delete($table, $params);
    }
    public function checklogin()
    {
        $this->load->helper('cookie');
        $checkcookie = get_cookie('log_id');
        // print_r($this->session);
        if ($this->session->userdata('logged_in') == true) {
            return true;
        } elseif (isset($checkcookie) && $checkcookie == '1') {
            $data = $this->Common_model->get_rowdata_by_id($checkcookie, 'admin');

            if (isset($data->id) && $data->id != '') {
                $logindata = array(
                    'username'  => $data->username,
                    'role'      => $data->user_role,
                    'id'        => $data->id,
                    'logged_in' => true,
                );

                $this->session->set_userdata($logindata);
                return true;
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Access Restricted!! Please Login!</div>');
            redirect(base_url() . 'admin/login');
        }
    }

    /**
     * @param $filename
     * @param $html
     */
    public function generatepdf($filename, $html)
    {
        //return;
        $mPDF       = $this->load->library('m_pdf');
        $stylesheet = file_get_contents(base_url() . 'resources/css/pdf.css'); // external css
        $path       = $this->config->item('basepath') . "upload/pending_invoices/";
        //-------------- pdf_original start----------------------
        $mpdf = new mPDF();
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html, 2);
        $mpdf->Output($path . $filename, "F");
        //-------------- pdf_original start----------------------

    }

    /**
     * @return mixed
     */
    public function loadDatatablesInvoice()
    {
        $this->datatables->select('
                                    invoices.invoice_no,
                                    invoices.invoice_date,
                                    customers.company_name,
                                    invoices.customer_mobile,
                                    invoices.invoice_due_date,

                                    (select count(id) from order_details where invoice_id = invoices.id) as totalcount,

                                    invoices.total_cost,
                                    invoices.payment_status,
                                    invoices.id

                                     ');
        $this->datatables->from('invoices');
        $this->datatables->join('customers', 'customers.id = invoices.customer_id');

        // In SELECT PUT THIS IF MADE JOIN => COUNT(order_details.invoice_id) as totalcount,
        // $this->datatables->join('order_details', 'order_details.invoice_id = invoices.id');
        // $this->datatables->where($array);
        // $this->db->group_by('order_details.invoice_id');
        $this->db->order_by('invoices.id', 'DESC');
        $this->db->limit(100, 0);

        return $this->datatables->generate();
    }

    /**
     * @return mixed
     */
    public function loadDatatablesPay()
    {
        $this->db->cache_on();

        $this->datatables->select("
                                    customers.id, customers.company_name,
(select sum(invoices.balance_amount) from invoices where invoices.customer_id = customers.id and invoices.payment_status != 'completed') as total_cost,
(select GROUP_CONCAT(invoices.id) from invoices where invoices.customer_id = customers.id and invoices.payment_status != 'completed') as invoice_balance,
(select sum(invoices.balance_amount) as pending_due_date from invoices where customer_id = customers.id and  invoices.invoice_due_date < now() and payment_status != 'completed') as pending_till_due,
(select GROUP_CONCAT(invoices.id) from invoices where invoices.customer_id = customers.id and  invoices.invoice_due_date < now() and invoices.payment_status != 'completed') as invoce_pending,

(select sum(invoices.total_cost) as total_sales from invoices where invoices.customer_id = customers.id) as total_sales,
(select GROUP_CONCAT(invoices.id) from invoices where invoices.customer_id = customers.id ) as allInvoices,
customers.id As pay
            ");
        $this->datatables->from('customers');
        $this->db->order_by('customers.id', 'DESC');
        $this->db->limit(100, 0);
        $res = $this->datatables->generate();
        $this->db->cache_off();

        return $res;
    }

}
