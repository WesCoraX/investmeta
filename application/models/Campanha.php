<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Campanha extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get campanha by cam_id
     */
    function get_campanha($cam_id)
    {
        return $this->db->get_where('campanha',array('cam_id'=>$cam_id))->row_array();
    }
    
    /*
     * Get all campanhas count
     */
    function get_all_campanhas_count()
    {
        $this->db->from('campanha');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all campanhas
     */
    function get_all_campanhas($params = array())
    {
        $this->db->order_by('cam_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('campanha')->result_array();
    }
        
    /*
     * function to add new campanha
     */
    function add_campanha($params)
    {
        $this->db->insert('campanha',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update campanha
     */
    function update_campanha($cam_id,$params)
    {
        $this->db->where('cam_id',$cam_id);
        return $this->db->update('campanha',$params);
    }
    
    /*
     * function to delete campanha
     */
    function delete_campanha($cam_id)
    {
        return $this->db->delete('campanha',array('cam_id'=>$cam_id));
    }
}