<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_agunanLama extends CI_Controller {
    function __construct(){
        parent::__construct();      
                $this->load->model('m_agunanLama');
                $this->load->helper('url');                
                $this->load->library(array('excel','session'));
    }
    
    public function index()
    {
        $data['query'] = $this->m_agunanLama->tampil_data();

		$data['dataLunas'] = $this->m_agunanLama->total_lunas();

        $this->load->view('homepage/header', $data);
        $this->load->view('content/v_agunanLama', $data);
        $this->load->view('homepage/footer', $data);
    }
    
    public function inputExcel(){
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=8; $row<=$highestRow; $row++)
				{
					$id = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$nomorAgunan = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$nama = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$agunan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$detailAgunan = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$realisasi = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$lunas = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$keterangan = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$noHp = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$ttd = $worksheet->getCellByColumnAndRow(11, $row)->getValue();

					$temp_data[] = array(
						'id'	        => $id,
						'nomorAgunan'	=> $nomorAgunan,
						'nama'      	=> $nama,
						'alamat'	    => $alamat,
						'agunan'	    => $agunan,
						'detailAgunan'	=> $detailAgunan,
						'realisasi'	    => $realisasi,
						'lunas'	        => $lunas,
						'keterangan'	=> $keterangan,
						'noHp'	        => $noHp,
						'ttd'	        => $ttd
					); 	
				}
			}
			$this->load->model('m_agunanLama');
			$insert = $this->m_agunanLama->insert($temp_data);
			if($insert){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}

	public function tambah(){
        $id = $this->input->post('id');

        $query = $this->m_agunanLama->cek_no($id)->num_rows();
        if(empty($query)) 
            $this->m_agunanLama->tambah_data($id);
        else 
            $this->m_agunanLama->edit_data($id);
	}

	public function edit(){
        $id = $this->input->post('id');        
        $this->m_agunanLama->edit_data($id);
	}

	public function hapus(){
        $idt = $this->input->post('idt2');
        
        $this->m_agunanLama->hapus_data($idt);
    }
	
}