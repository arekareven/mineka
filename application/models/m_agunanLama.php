<?php 
 
class M_agunanLama extends CI_Model {

    public function __construct(){
		parent::__construct();
		$this->load->library(array('excel','session'));
	}

    public function insert($data){
		$insert = $this->db->insert_batch('agunanlama', $data);
		if($insert){
			return true;
		}
	}

    public function tampil_data(){
        return $this->db->get('agunanlama');
        }

	public function total_lunas(){
		$query = "SELECT count(if(ttd='DONE',ttd, NULL)) as ttd,
						count(id) as id,						
						count(if(MID(keterangan,1,11)='Pinjam Lagi',keterangan, NULL)) as keterangan
						FROM agunanlama";
		$result = $this->db->query($query);
		return $result->row();
	}

	  function edit_data($data){

		$id				= $this->input->post('id');
		$nomorAgunan	= $this->input->post('nomorAgunan');
		$nama			= $this->input->post('nama');
		$alamat			= $this->input->post('alamat');
		$agunan			= $this->input->post('agunan');
		$detailAgunan	= $this->input->post('detailAgunan');
		$realisasi		= $this->input->post('realisasi');
		$lunas			= $this->input->post('lunas');
		$keterangan		= $this->input->post('keterangan');
		$noHp			= $this->input->post('noHp');
		$ttd			= $this->input->post('ttd');

		$kondisi = array('id' => $id );

		$data = array(
			'nomorAgunan'	=> $nomorAgunan,
			'nama'			=> $nama,
			'alamat'		=> $alamat,
			'agunan'		=> $agunan,                            
			'detailAgunan'	=> $detailAgunan,
			'realisasi'		=> $realisasi,
			'lunas'			=> $lunas,
			'keterangan'	=> $keterangan,
			'noHp'			=> $noHp,
			'ttd'			=> $ttd,
		  );

		  $this->db->update('agunanlama',$data,$kondisi);
		  redirect('../c_agunanLama'); 
	  }
	  
	  function tambah_data($data){

		$id				= $this->input->post('id');
		$nomorAgunan	= $this->input->post('nomorAgunan');
		$nama			= $this->input->post('nama');
		$alamat			= $this->input->post('alamat');
		$agunan			= $this->input->post('agunan');
		$detailAgunan	= $this->input->post('detailAgunan');
		$realisasi		= $this->input->post('realisasi');
		$lunas			= $this->input->post('lunas');
		$keterangan		= $this->input->post('keterangan');
		$noHp			= $this->input->post('noHp');
		$ttd			= $this->input->post('ttd');

		$data = array(
			'id'			=> $id,
			'nomorAgunan'	=> $nomorAgunan,
			'nama'			=> $nama,
			'alamat'		=> $alamat,
			'agunan'		=> $agunan,                            
			'detailAgunan'	=> $detailAgunan,
			'realisasi'		=> $realisasi,
			'lunas'			=> $lunas,
			'keterangan'	=> $keterangan,
			'noHp'			=> $noHp,
			'ttd'			=> $ttd,
		  );
		  $this->db->insert('agunanlama',$data);
		  redirect('../c_agunanLama'); 
	  }
	  
	  function cek_no($id) {
		$query = array('id' => $id);
		return $this->db->get_where('agunanlama', $query);
	  }	


	  function hapus_data($id){
        $this->db->where(array('id' => $id));
        $this->db->delete('agunanlama');
    	redirect('../c_agunanLama');
    }

	}
