<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

	class Controler_Portopolio3 extends CI_Controller{
		//fungsi menampilkan data dari database
		public function __construct(){
			parent::__construct();
			$this->load->model('Model_portopolio');	
			$this->load->model('Model_portopolio2');	
		}

	public function index(){
			$data['judul'] = 'Yudi Gunawan | Halaman Utama';
			$this->load->view('templates/header',$data);
			$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
			$this->load->view('portopolio/Halaman_utama');
			$this->load->view('templates/footer');			
		}
	public function Deskripsi(){
		if($this->session->userdata('nama')!=null){
			$data['judul'] = 'Yudi Gunawan | Applikasi Deskripsi';
			$this->load->view('templates/header',$data);
			$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
			$this->load->view('portopolio2/deskripsi');
			$this->load->view('templates/footer');
		}else{
			redirect('Controler_Portopolio');
		}
	}

	public function HapusDataPortopolio($id=null){
		if($id==null){
			redirect('Controler_Portopolio/portopolio');
		}else{
			$this->Model_portopolio2->HapusDataPortopolio_M(decrypt_url($id));
			redirect('Controler_Portopolio/portopolio');
		}
		
	}
}



