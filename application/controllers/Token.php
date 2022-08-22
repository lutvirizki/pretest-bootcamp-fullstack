<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Token extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_token');
        
        

    }

    // List all your items
    public function index(  )
    {
        $data = array(
            'tittle'  => 'Token',
            'token' => $this->m_token->get_all_data(),
            'isi' => 'v_token',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_produk' => $this->input->post('nama_produk'),
        );
        $this->m_token->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
        redirect('token');  
    }

    //Update one item
    public function edit( $kode = NULL )
    {
        $data = array(
            'kode' => $kode,
            'nama_produk' => $this->input->post('nama_produk'),
        );
        $this->m_token->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diupdate');
        redirect('token');  
    }

    //Delete one item
    public function delete( $kode = NULL )
    {
        $data = array('kode' => $kode );
        $this->m_token->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('token');
    }
}

/* End of file Ketegori.php */

