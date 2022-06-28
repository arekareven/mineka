<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_agunan extends CI_Controller {
    function __construct(){
        parent::__construct();      
                $this->load->model('m_agunan');
                $this->load->helper('url');                
                $this->load->library(array('excel','session'));
    }
    
    public function index()
    {
        $data['query'] = $this->m_agunan->tampil_data();

		$data['dataLunas'] = $this->m_agunan->total_lunas();

        $this->load->view('homepage/header', $data);
        $this->load->view('content/v_agunan', $data);
        $this->load->view('homepage/footer', $data);
    }

	public function tambah(){
        $id = $this->input->post('id');

        $query = $this->m_agunan->cek_no($id)->num_rows();
        if(empty($query)) 
            $this->m_agunan->tambah_data($id);
        else 
            $this->m_agunan->edit_data($id);
	}

    public function edit(){
        $id = $this->input->post('id2');
        $this->m_agunan->edit_data($id);
	}

	public function hapus(){
        $idt = $this->input->post('idt2');        
        $this->m_agunan->hapus_data($idt);
    }
	
}