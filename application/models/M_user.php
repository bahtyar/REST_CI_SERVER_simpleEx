<?php

class m_user extends CI_Model {

    function __construct($config = 'rest') {
        parent::__construct($config);
        
    }

    function user_exists($nama) {   
        $this->db->where('nama', $nama);
        $query = $this->db->get('user');
        if($query->num_rows() >= 1)
        {
            return TRUE;
        } else 
        {
            return FALSE;
        }
    }

    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('user', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('user');
            return $query->result_array();
        }
    }
    
    /*
     * Insert user data
     */
    public function insert($data = array()) {
        if(!array_key_exists('created', $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists('modified', $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        $insert = $this->db->insert('users', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update user data
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            if(!array_key_exists('modified', $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            $update = $this->db->update('users', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete user data
     */
    public function delete($id){
        $delete = $this->db->delete('users',array('id'=>$id));
        return $delete?true:false;
    }


}
?>