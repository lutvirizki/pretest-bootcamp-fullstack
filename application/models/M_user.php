<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model 
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tabel_user');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
  
    }

    public function add($data)
    {
        $this->db->insert('tabel_user', $data);
        
    }

    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tabel_user', $data);
        
        
    }

    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('tabel_user', $data);
        
        
    }
}

/* End of file M_user.php */