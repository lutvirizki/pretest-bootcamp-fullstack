<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_token extends CI_Model 
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tabel_produk');
        $this->db->order_by('kode', 'desc');
        return $this->db->get()->result();
  
    }

    public function add($data)
    {
        $this->db->insert('tabel_produk', $data);
        
    }

    public function edit($data)
    {
        $this->db->where('kode', $data['kode']);
        $this->db->update('tabel_produk', $data);
        
        
    }

    public function delete($data)
    {
        $this->db->where('kode', $data['kode']);
        $this->db->delete('tabel_produk', $data);
        
        
    }
}    