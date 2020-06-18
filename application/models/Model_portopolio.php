<?php

class Model_portopolio extends CI_model{
	//model segala seuatu berhubungan dengan query database
	public function ProsesLogin_M($nama,$password){
		return $this->db->get_where('tb_login',['nama'=>$nama,'password'=>$password],1)->row();//aman dari sql kalau str
	}

	public function getDataPortopolio_M(){

		return $this->db->get('tb_portopoilio')->result();
	}
	
	public function ProsesTambahData_M($data){

		 $this->db->insert('tb_portopoilio',$data);
	}

	public function LihatGambar_M($id){
		return $this->db->get_where('tb_portopoilio',['id'=>$id])->row_array();//menampilkan data tunggal memaki row array
	}

	public function pesanpengunjung_M($data){
		 $this->db->insert('tb_pesanuser',$data);//insert tidak memakai return
	}

	public function admin_M(){

		return $this->db->get('tb_pesanuser')->result_array();
	}

	public function admin_M2(){
		date_default_timezone_set('Asia/Jakarta');
		$key = date('d-F-Y');
		return $this->db->query("SELECT * FROM tb_pesanuser WHERE tanggal LIKE '%$key%' ")->result_array();
	}

	public function jumlahpesan_M(){
		return $this->db->get_where('tb_pesanuser',['status'=> '0'])->result_array();
	}
	public function ProsesStatusPesan_M($data){

		$this->db->where('status','0');
		$this->db->update('tb_pesanuser',$data);
	}
	public function berita_M(){

		return $this->db->get('tb_berita')->result_array();
	}

	public function BeritaSelanjutnya_M($id){

		return $this->db->get_where('tb_berita',['id'=> $id])->row_array();
	}

	//controler 2
	public function PublishBerita_M($id){

		$this->db->where('id',$id);
		$this->db->update('tb_berita',['status'=> '1']);
	}

	public function UnPublishBerita_M($id){

		$this->db->where('id',$id);
		$this->db->update('tb_berita',['status'=>'0']);
	}
	public function HapusBerita_M($id){
		$_id = $this->db->get_where('tb_berita', ['id' => $id] )->row();
		$hapus = $this->db->query("DELETE FROM tb_berita WHERE id = ".$id);
		if($hapus){
			unlink("gambar_berita/".$_id->gambar);
		}
		return $hapus;
	}
	public function UbahDataPortopolio_M($id){

		$this->db->where('id',$id);
		return $this->db->get('tb_portopoilio')->row_array();
	}
	public function ProsesUbahData_M($data,$id){
		$this->db->where('id',$id);
		$this->db->update('tb_portopoilio',$data);
			
	}

	public function ProsesInputBerita_M($data){

		return $this->db->insert('tb_berita',$data);
	}
	

}
 ?>
