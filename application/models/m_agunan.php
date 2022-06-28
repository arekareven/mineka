<?php 
 
class M_agunan extends CI_Model {

    public function __construct(){
		parent::__construct();
		$this->load->library(array('excel','session'));
	}

    public function insert($data){
		$insert = $this->db->insert_batch('agunan', $data);
		if($insert){
			return true;
		}
	}

    public function tampil_data(){
        return $this->db->get('agunan');
        }

	public function total_lunas(){
		$query = "SELECT count(if(status='DONE',status, NULL)) as status,
						count(id) as id FROM agunan";
		$result = $this->db->query($query);
		return $result->row();
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
		$status			= $this->input->post('status');
  
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './ubold/assets/'; //string, the default is application/cache/
        $config['errorlog']     = './ubold//assets/'; //string, the default is application/logs/
        $config['imagedir']     = './ubold//assets/images/barcodebyid/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$id.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $id; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

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
			'qrcode'		=> $image_name,
			'status'		=> $status,
		  );
		  $this->db->insert('agunan',$data);
		  redirect('../c_agunan'); 
	  }

	  function edit_data($data){

		$id				= $this->input->post('id2');
		$nomorAgunan	= $this->input->post('nomorAgunan2');
		$nama			= $this->input->post('nama2');
		$alamat			= $this->input->post('alamat2');
		$agunan			= $this->input->post('agunan2');
		$detailAgunan	= $this->input->post('detailAgunan2');
		$realisasi		= $this->input->post('realisasi2');
		$lunas			= $this->input->post('lunas2');
		$keterangan		= $this->input->post('keterangan2');
		$noHp			= $this->input->post('noHp2');
		$status			= $this->input->post('status2');

		$path = './ubold//assets/images/barcodebyid/';
      	$kondisi = array('id' => $id );
  
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './ubold/assets/'; //string, the default is application/cache/
        $config['errorlog']     = './ubold//assets/'; //string, the default is application/logs/
        $config['imagedir']     = './ubold//assets/images/barcodebyid/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$id.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $id; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

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
			'qrcode'		=> $image_name,
			'status'		=> $status,
		  );

		  @unlink($path.$id);
		  $this->db->update('agunan',$data,$kondisi);
		  redirect('../c_agunan'); 
	  }
	  
	function cek_no($id) {
		$query = array('id' => $id);
		return $this->db->get_where('agunan', $query);
	  }	

	  function hapus_data($id){
        $path = './ubold//assets/images/barcodebyid/';
        unlink($path.$id.'.png');
        $this->db->where(array('id' => $id));
        $this->db->delete('agunan');
    	redirect('../c_agunan');
    }

	}
