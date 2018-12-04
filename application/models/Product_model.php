<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get product by id
     */
    function get_product($id)
    {
        return $this->db->get_where('products',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all products count
     */
    function get_all_products_count()
    {
        $this->db->from('products');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all products
     */
    function get_all_products($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $query = $this->db->get('products')->result_array();
       // echo $this->db->last_query();
        return $query;
    }

    function get_all_products_not_in($all_pro)
    {
        $qu = "select * from products where id not in($all_pro) order by id desc";
        $query = $this->db->query($qu);
        return $result = $query->result();        
    }        
    /*
     * function to add new product
     */
    function add_product($params)
    {
        $this->db->insert('products',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update product
     */
    function update_product($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('products',$params);
    }
    
    /*
     * function to delete product
     */
    function delete_product($id)
    {
        return $this->db->delete('products',array('id'=>$id));
    }
}
