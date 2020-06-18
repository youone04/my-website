<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Model_portopolio2 extends CI_model{

		public function UbahBerita_M($id){

			return $this->db->get_where('tb_berita',['id'=>$id ])->row_array();//return mengambalikan nilai
		}

		public function ProsesUbahBerita_M($data,$id){
			$this->db->where('id',$id);
			$this->db->update('tb_berita',$data);
		}
		public function InputIp($data){
			$this->db->insert('ip_pengunjung',$data);
		}

		public function HapusDataPortopolio_M($id){
			$gambar = $this->db->get_where('tb_portopoilio',['id' => $id])->row();
			$this->db->where('id',$id);
			$hapus = $this->db->delete('tb_portopoilio');

			if($hapus){
				unlink('gambar/'.$gambar->gambar);
				unlink('gambar/'.$gambar->gambar1);
				unlink('gambar/'.$gambar->gambar2);
			}
			return $hapus;
		}
	}


 ?>