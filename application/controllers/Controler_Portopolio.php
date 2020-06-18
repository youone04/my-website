<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Controler_Portopolio extends CI_Controller{
		//fungsi menampilkan data dari database
		public function __construct(){
			parent::__construct();
			$this->load->model('Model_portopolio');
		}
		public function index(){
			$data['judul'] = 'Yudi Gunawan | Halaman Utama';
			$this->load->view('templates/header',$data);
			$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
			$this->load->view('portopolio/Halaman_utama');
			$this->load->view('templates/footer');
			
		}

		public function Kontak(){
			$data['judul'] = 'Yudi Gunawan | Halaman Kontak';
			$this->load->view('templates/header',$data);
			$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
			$this->load->view('portopolio/kontak');
			$this->load->view('templates/footer');

		}

		public function Tentang(){
			$data['judul'] = 'Yudi Gunawan | Halaman Tentang';
			$this->load->view('templates/header',$data);
			$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
			$this->load->view('portopolio/tentang');
			$this->load->view('templates/footer');
		}

		public function Project(){
			$data['judul'] = 'Yudi Gunawan | Halaman Project';
			$this->load->view('templates/header',$data);
			$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
			$this->load->view('portopolio/project');
			$this->load->view('templates/footer');
		}

		public function login(){
			if($this->session->userdata('nama')==null){
				$data['judul'] = 'Yudi Gunawan | Halaman Login';
				$this->load->view('templates/header',$data);
				$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
				$this->load->view('portopolio/login');
				$this->load->view('templates/footer');
			}else{
				redirect('Controler_Portopolio/admin');
			}
		}
		public function admin(){
			if($this->session->userdata('nama')!=null){
				$data['komentar'] = $this->Model_portopolio->admin_M();
				$data['komentar_hariini'] = $this->Model_portopolio->admin_M2();
				$data['judul'] = 'Yudi Gunawan | Admin';
				$this->load->view('templates/header',$data);
				$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
				$this->load->view('portopolio/admin');
				$this->load->view('templates/footer');
			}else{
				redirect('Controler_Portopolio');
			}
		}

		public function ProsesLogin(){
			if( $this->input->post('login')==true){
				$nama = htmlspecialchars($this->input->post('nama',true));
				$password = htmlspecialchars($this->input->post('password',true));
				$hasil = $this->Model_portopolio->ProsesLogin_M($nama,$password);
				$output=[];
				//jika ada data yang diambil dari database
				if($hasil){
						if($password == $hasil->password){
							$session =  [
											"login"=>true,
											"nama"=>$nama
										];
							$this->session->set_userdata($session);
							$output['pesan'] = 'berhasil login';
						}else{
							$output['pesan'] = 'login gagal';
							$output['error'] = true;	
						}
				}else{
					$output['pesan'] = 'login gagal';
					$output['error'] = true;
					
				}
				echo json_encode($output);
			}else{
				redirect('Controler_Portopolio/login');
			}
		}

		public function Portopolio(){
			$data['gambar'] = $this->Model_portopolio->getDataPortopolio_M();
			$data['judul'] = "Yudi Gunawan | Halaman Portopolio";
			$this->load->view('templates/header',$data);
			$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
			$this->load->view('portopolio/portopolio',$data);
			$this->load->view('templates/footer');
		}

		public function TambahData(){
			if($this->session->userdata('nama')!=null){
				$data['judul'] = 'Tambah Data Portopolio';
				$this->load->view('templates/header',$data);
				$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
				$this->load->view('portopolio/tambahdata');
				$this->load->view('templates/footer');
			}else{
				redirect('Controler_Portopolio');
			}
		}

		public function prosestambahdata(){
			if($this->input->post('submit')==true){
				if($this->session->userdata('nama')!=null){
					//kasih counter saat tambah data lewat kolom url browser dengnang fitur codeigniter(note)
					if(is_array($_FILES)) {
						$gambar=[];
						$eksi = [];
						$unigambar =[];
						for ($i=0; $i<3; $i++){//value itu nama si gambar
							if(is_uploaded_file($_FILES['gambardata']['tmp_name'][$i])) {
							$sourcePath = $_FILES['gambardata']['tmp_name'][$i];
							$gambar[$i]=explode('.', $_FILES['gambardata']['name'][$i]);
							$eksi[$i] = strtolower(end($gambar[$i]));
							$unigambar[$i] = uniqid().".".$eksi[$i];
							$targetPath = "./gambar/".$unigambar[$i];//$_FILES['gambardata']['name'][$i];
								if(move_uploaded_file($sourcePath,$targetPath)) {													
								}
							}
						}
						}
						$data =[

								"id"=>null,
								"judul1"=> htmlspecialchars($this->input->post('judul1')),
								"judul2"=> htmlspecialchars($this->input->post('judul2')),
								"keterangan"=> htmlspecialchars($this->input->post('keterangan')),
								"gambar"=> htmlspecialchars($unigambar[0]),//insert gambar database
								"gambar1"=> htmlspecialchars($unigambar[1]),
								"gambar2"=> htmlspecialchars($unigambar[2])
								];
						$this->Model_portopolio->ProsesTambahData_M($data);	
				}else{
							redirect('Controler_Portopolio');
				}
			}else{
				redirect('Controler_Portopolio/TambahData');
			}	
		}

		public function LihatGambar($id=null){
			$row = count($this->Model_portopolio->LihatGambar_M($id));
			if($id==null){
				redirect('Controler_Portopolio/Portopolio');
			}else if($row <= 0){
				redirect('Controler_Portopolio/Portopolio');
			}else{
				$data['judul'] ='Yudi Gunawn | Dettail Project';
				$data['datatunggal'] = $this->Model_portopolio->LihatGambar_M($id);
				$this->load->view('templates/header',$data);
				$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
				$this->load->view('portopolio/lihat_tunggal');
				$this->load->view('templates/footer');
		}

		}

		public function pesanpengunjung(){
				//penangkal saat tombol kirim tidak di tekan
			if(!$this->input->post('kirim')==true){
				redirect('Controler_Portopolio/Kontak');
			}else{
				if(empty($this->input->post('nama',true)) || $this->input->post('email',true)==NULL ){
					redirect('Controler_Portopolio/Kontak');
					return;
				}else{
					date_default_timezone_set('Asia/Jakarta');
					$nama = htmlspecialchars($this->input->post('nama',true));
					$email = htmlspecialchars($this->input->post('email',true));
					$subject = htmlspecialchars($this->input->post('Subject',true));
					$pesan = htmlspecialchars($this->input->post('pesan',true));
					$data = [
								'id'=>null,
								'nama'=>$nama,
								'email'=>$email,
								'subect'=>$subject,
								'pesan'=>$pesan,
								'tanggal'=> date('l,d-F-Y  h:i:s')
							];

					$hasil=$this->Model_portopolio->pesanpengunjung_M($data);
					echo json_encode($hasil);
				}
			}
		}

		public function Ds_admin(){
			if($this->session->userdata('nama')!=null){
				$data['hasil'] = $this->Model_portopolio->jumlahpesan_M();
				$data['jumlah']=count($this->Model_portopolio->jumlahpesan_M());
				$data['judul'] = 'Halaman | Ds Admin';
				$this->load->view('portopolio/Ds_admin',$data);
			}else{
				redirect('Controler_Portopolio');
			}
		}

		public function ProsesStatusPesan(){
			if($this->input->post('pesan')==true){
				if($this->session->userdata('nama')!=null){
					$data = [
							'status'=> '1'
							];
					$this->Model_portopolio->ProsesStatusPesan_M($data);
					$output['pesan'] =  true;
					echo json_encode($output);
				}else{
					redirect('Controler_Portopolio');
				}
			}else{
				redirect('Controler_Portopolio/Ds_admin');
			}
		}

		public function berita(){
			$data['berita'] = $this->Model_portopolio->berita_M();
			$data['judul'] = 'Yudi Gunawan | Halaman Berita';
			$this->load->view('templates/header',$data);
			$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
			$this->load->view('portopolio/berita');
			$this->load->view('templates/footer');
		}

		public function InputBerita(){
			if($this->session->userdata('nama')!=null){
				$data['judul'] = 'Yudi Gunawan | Input Berita';
				$this->load->view('templates/header',$data);
				$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
				$this->load->view('portopolio/inputberita');
				$this->load->view('templates/footer');
			}else{
				redirect('Controler_Portopolio');
			}
		}

		public function BeritaSelanjutnya($id=null){
			$row =count( $this->Model_portopolio->BeritaSelanjutnya_M($id));
			if($id==null){
				redirect('Controler_Portopolio/berita');
				return;
			}else if($row <= 0){
				redirect('Controler_Portopolio/berita');
			}else{
			// var_dump($id);
			// echo "<br>";
			// var_dump(decrypt_url($id));
			$data['judul'] = 'Yudi Gunawan | Detail Berita';
			$data['detailberita'] = $this->Model_portopolio->BeritaSelanjutnya_M($id);
			$this->load->view('templates/header',$data);
			$this->load->view('portopolio/cek_javascript');//cek keberadaan javascript
			$this->load->view('portopolio/detailberita');
			$this->load->view('templates/footer');
		}

		}

		public function LogOut(){
			$this->session->unset_userdata('nama');
			session_destroy();
			redirect('Controler_Portopolio');
		}






	}
 ?>