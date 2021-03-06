<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Invoice_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get invoice by id
     */
    function get_invoice($id)
    {
        return $this->db->get_where('invoices',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all invoices count
     */
    function get_all_invoices_count()
    {
        $this->db->from('invoices');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all invoices
     */
    function get_all_invoices($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('invoices')->result_array();
    }
        
    /*
     * function to add new invoice
     */
    function add_invoice($params)
    {
        $this->db->insert('invoices',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update invoice
     */
    function update_invoice($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('invoices',$params);
    }
    
    /*
     * function to delete invoice
     */
    function delete_invoice($id)
    {
        return $this->db->delete('invoices',array('id'=>$id));
    }
}
