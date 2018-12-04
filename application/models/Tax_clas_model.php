<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tax_clas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tax_clas by id
     */
    function get_tax_clas($id)
    {
        return $this->db->get_where('tax_class',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all tax_class
     */
    function get_all_tax_class()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('tax_class')->result_array();
    }
        
    /*
     * function to add new tax_clas
     */
    function add_tax_clas($params)
    {
        $this->db->insert('tax_class',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tax_clas
     */
    function update_tax_clas($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('tax_class',$params);
    }
    
    /*
     * function to delete tax_clas
     */
    function delete_tax_clas($id)
    {
        return $this->db->delete('tax_class',array('id'=>$id));
    }
}