<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class State_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get state by id
     */
    function get_state($id)
    {
        return $this->db->get_where('state',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all state
     */
    function get_all_state()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('state')->result_array();
    }
        
    /*
     * function to add new state
     */
    function add_state($params)
    {
        $this->db->insert('state',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update state
     */
    function update_state($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('state',$params);
    }
    
    /*
     * function to delete state
     */
    function delete_state($id)
    {
        return $this->db->delete('state',array('id'=>$id));
    }
}
