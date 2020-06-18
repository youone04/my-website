<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Controler_Portopolio2 extends CI_Controller{
		//fungsi menampilkan data dari database
		public function __construct(){
			parent::__construct();
			$this->load->model('Model_portopolio');	
			$this->load->model('Model_portopolio2');
			$this->load->library('encrypt');	
		}

		public function index(){
			$data['judul'] = 'Yudi Gunawan | Halaman Utama';
			$this->load->view('templates/header',$data);
			$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
			$this->load->view('portopolio/Halaman_utama');
			$this->load->view('templates/footer');			
		}

		public function PublishBerita(){
			if($this->input->post('publish')==true){
				if($this->session->userdata('nama')!=null){
					$id = $this->input->post('id');
					$this->Model_portopolio->PublishBerita_M($id);
				}else{
					redirect('Controler_Portopolio');
				}
			}else{
				redirect('Controler_Portopolio2/BeritaAdmin');
			}
		}
		
		public function BeritaAdmin(){
			if($this->session->userdata('nama') != null){
				$data['berita'] = $this->Model_portopolio->berita_M();
				$data['judul'] = 'Yudi Gunawan | Halaman Berita';
				$this->load->view('templates/header',$data);
				$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
				$this->load->view('portopolio/beritaadmin');
				$this->load->view('templates/footer');
			}else{
				redirect('Controler_Portopolio');
			}
		}

		public function UnPublishBerita(){
			if($this->input->post('unpublish')){
				if($this->session->userdata('nama')!=null){
					$id = $this->input->post('id');
					$this->Model_portopolio->UnPublishBerita_M($id);
				}else{
					redirect('Controler_Portopolio');
				}
			}else{
				redirect('Controler_Portopolio2/BeritaAdmin');
			}
		}

		public function HapusBerita(){
			if( $this->input->post('id')==null){
				redirect('Controler_Portopolio');
			}else{
				if($this->session->userdata('nama')!=null){
					$id = $this->input->post('id');
					$this->Model_portopolio->HapusBerita_M($id);
				}else{
					redirect('Controler_Portopolio');
				}
			}
		}

		public function UbahDataPortopolio($id=null){
			if($this->session->userdata('nama') != null){
				if($id==null){
					redirect('Controler_Portopolio/portopolio');
					return;
				}else{
				//var_dump(decrypt_url($id));
				$data['judul'] ='Yudi Gunawan | Halaman Ubah Data Portopolio';
				$data['portopolio'] = $this->Model_portopolio->UbahDataPortopolio_M(decrypt_url($id));
				$this->load->view('templates/header',$data);
				$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
				$this->load->view('portopolio2/ubahdataportopolio');
				$this->load->view('templates/footer');
				}
			}else{
				redirect('Controler_Portopolio/portopolio');
			}
		}

		public function ProsesUbahPortopolio(){
			if($this->input->post('ubah')==true){
				if($this->session->userdata('nama')!=null){
					$gambar = [];
					$eksi = [];
					$unikgambar = [];
					for($i=0; $i<3; $i++){
						if(empty($_FILES['gambardata']['name'][$i])){//mengecek apakah variable data kosong
							$unikgambar[$i] =$this->input->post('gambarlama')[$i];//jika kosong maka input nama gambar yang lama, typenya string
						}else{
							if(is_uploaded_file($_FILES['gambardata']['tmp_name'][$i])) {
								$sourcePath = $_FILES['gambardata']['tmp_name'][$i];
								$gambar[$i]=explode('.', $_FILES['gambardata']['name'][$i]);
								$eksi[$i] = strtolower(end($gambar[$i]));
								$unikgambar[$i] = uniqid().".".$eksi[$i];
								$targetPath = "./gambar/".$unikgambar[$i];//$_FILES['gambardata']['name'][$i];
								unlink('./gambar/'.$this->input->post('gambarlama')[$i]);//menghapus gambar lama yang ke i (yang dipilih)	
									if(move_uploaded_file($sourcePath,$targetPath)) {//mengcopy data yang ke i (yang ke pilih)

									}
								}

								}
							}

							$data =[
							"judul1"=> htmlspecialchars($this->input->post('judul1')),
							"judul2"=> htmlspecialchars($this->input->post('judul2')),
							"keterangan"=> htmlspecialchars($this->input->post('keterangan')),
							"gambar"=> htmlspecialchars($unikgambar[0]),//insert gambar database
							"gambar1"=> htmlspecialchars($unikgambar[1]),
							"gambar2"=> htmlspecialchars($unikgambar[2])
							];						
							$this->Model_portopolio->ProsesUbahData_M($data,$this->input->post('id'));
						}else{
							redirect('Controler_Portopolio2/UbahDataPortopolio');
						}
					}else{
						redirect('Controler_Portopolio2/UbahDataPortopolio');
					}

					}
		public function ProsesInputBerita(){
			if($this->input->post('berita')==true){
				if($this->session->userdata('nama')!==null){
					date_default_timezone_get('Asia/Jakarta');
					if(is_uploaded_file($_FILES['filegambar']['tmp_name'])){
						$filegambar = $_FILES['filegambar']['name'];
						$gambar = explode('.', $filegambar);
						$eks = strtolower(end($gambar));
						$namagambar = uniqid().'.'.$eks;
						$lokasi = './gambar_berita/'.$namagambar;
						if(move_uploaded_file($_FILES['filegambar']['tmp_name'], $lokasi)){
						//memindahkan dari penyimpanan sementara ke lokasi sebenernya
					}
				}

				$data = [

						'judul_berita' => $this->input->post('judul'),
						'isi_berita' => $this->input->post('isiberita'),
						'tanggal_berita' => date('d-F-Y'),
						'gambar' => $namagambar

						];
				$this->Model_portopolio->ProsesInputBerita_M($data);
			}else{
				redirect('Controler_Portopolio');
			}
		}else{
			redirect('Controler_Portopolio/inputBerita');
		}

	}

	public function UbahBerita($id=null){
		if($id==null){
			redirect('Controler_Portopolio2/BeritaAdmin');
			return;
		}else{
			if($this->session->userdata('nama')!=null){
				$data['id'] = $id;
				$data['judul'] = 'Yudi Gunawan | Ubah Berita';
				$data['berita'] = $this->Model_portopolio2->UbahBerita_M(decrypt_url($id));
				$this->load->view('templates/header',$data);
				$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
				$this->load->view('portopolio2/ubahdataberita');
				$this->load->view('templates/footer');
			}else{

				redirect('Controler_Portopolio');
			}
		}

	}

	public function ProsesUbahBerita(){
		if($this->input->post('ubahberita')==true){
			if($this->session->userdata('nama')!=null){
				if(empty($_FILES['filegambar']['name'])){//mengecek apakah variable data kosong
					$namagambar =$this->input->post('gambarlama');//jika kosong maka input nama gambar yang lama, typenya string

					}else{							
						if(is_uploaded_file($_FILES['filegambar']['tmp_name'])){
						$filegambar = $_FILES['filegambar']['name'];
						$gambar = explode('.', $filegambar);
						$eks = strtolower(end($gambar));
						$namagambar = uniqid().'.'.$eks;
						$lokasi = './gambar_berita/'.$namagambar;
						if(move_uploaded_file($_FILES['filegambar']['tmp_name'], $lokasi)){
						//memindahkan dari penyimpanan sementara ke lokasi sebenernya

						}
					}				
				}
						$data = [

						'judul_berita' => $this->input->post('judul'),
						'isi_berita' => $this->input->post('isiberita'),
						'tanggal_berita' => date('d-F-Y'),
						'gambar' => $namagambar

						];
						
						$this->Model_portopolio2->ProsesUbahBerita_M($data,$this->input->post('id'));

						}else{

							redirect('Controler_Portopolio');
						}
				}else{
					redirect('Controler_Portopolio2/BeritaAdmin');
				}


				}




}