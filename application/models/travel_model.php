<?php
	class Travel_model extends CI_Model{
		function __construct(){
			parent::__construct();
		} 
		// login
		function cek_login($table,$where){		
			return $this->db->get_where($table,$where);
		}	
		// booking
		function ambil_data_booking(){
			$this->db->from('booking');
			return $this->db->get();
		}
		function hapus_booking($id){
			$this->db->where('id_booking',$id);
			$this->db->delete('booking');
		}
		// tour
		function ambil_data_tour(){
			$this->db->from('tour');
			return $this->db->get();
		}
		function hapus_tour($id){
			$this->db->where('id_tour',$id);
			$this->db->delete('tour');
			$this->db->where('id_tour',$id);
			$this->db->delete('paket');
		}
		function edit_tour($data,$condition){
			$this->db->where($condition);
			$this->db->update('tour',$data);
		}
		// paket
		function ambil_data_paket(){
			$this->db->from('paket');
			return $this->db->get();
		}
		function ambil_paket($id){
			$this->db->where('id_paket',$id);
			$this->db->select('*');
			$this->db->from('paket');
			return $this->db->get();
		}
		function ambil_img_paket($id){
			$this->db->where('id_paket',$id);
			$this->db->select('*');
			$this->db->from('img_paket');
			return $this->db->get();
		}
		function edit_paket($data,$condition){
			$this->db->where($condition);
			$this->db->update('paket',$data);
		}
		function hapus_paket($id){
			$this->db->where('id_paket',$id);
			$this->db->delete('paket');
			$this->db->where('id_paket',$id);
			$this->db->delete('img_paket');
		}
		function hapus_img_paket($id){
			$this->db->where('id',$id);
			$this->db->delete('img_paket');
		}
		// daerah
		function ambil_data_daerah(){
			$this->db->from('daerah');
			return $this->db->get();
		}
		function ambil_daerah($id){
			$this->db->where('id_daerah',$id);
			$this->db->select('*');
			$this->db->from('daerah');
			return $this->db->get();
		}
		function ambil_img_daerah($id){
			$this->db->where('id_daerah',$id);
			$this->db->select('*');
			$this->db->from('img_daerah');
			return $this->db->get();
		}
		function edit_daerah($data,$condition){
			$this->db->where($condition);
			$this->db->update('daerah',$data);
		}
		function hapus_daerah($id){
			$this->db->where('id_daerah',$id);
			$this->db->delete('daerah');
			$this->db->where('id_daerah',$id);
			$this->db->delete('img_daerah');
			$this->db->where('id_daerah',$id);
			$this->db->delete('hotel');
			$this->db->where('id_daerah',$id);
			$this->db->delete('kmr_hotel');
		}
		function hapus_img_daerah($id){
			$this->db->where('id',$id);
			$this->db->delete('img_daerah');
		}
		// hotel
		function ambil_data_hotel(){
			$this->db->from('hotel');
			return $this->db->get();
		}
		function ambil_hotel($id){
			$this->db->where('id_hotel',$id);
			$this->db->select('*');
			$this->db->from('hotel');
			return $this->db->get();
		}
		function edit_hotel($data,$condition){
			$this->db->where($condition);
			$this->db->update('hotel',$data);
		}
		function ambil_kamar($id){
			$this->db->where('id_hotel',$id);
			$this->db->select('*');
			$this->db->from('kmr_hotel');
			return $this->db->get();
		}
		function edit_kamar($data,$condition){
			$this->db->where($condition);
			$this->db->update('kmr_hotel',$data);
		}
		function hapus_hotel($id){
			$this->db->where('id_hotel',$id);
			$this->db->delete('hotel');
			$this->db->where('id_hotel',$id);
			$this->db->delete('kmr_hotel');
		}
		function hapus_kamar($id){
			$this->db->where('id',$id);
			$this->db->delete('kmr_hotel');
		}
		// blog
		function ambil_data_blog(){
			$this->db->from('blog');
			return $this->db->get();
		}
		function ambil_blog($id){
			$this->db->where('id_blog',$id);
			$this->db->select('*');
			$this->db->from('blog');
			return $this->db->get();
		}
		function edit_blog($data,$condition){
			$this->db->where($condition);
			$this->db->update('blog',$data);
		}
		function hapus_blog($id){
			$this->db->where('id_blog',$id);
			$this->db->delete('blog');
		}
		// galeri
		function ambil_data_galeri(){
			$this->db->from('galeri');
			return $this->db->get();
		}
		function hapus_img_galeri($id){
			$this->db->where('id',$id);
			$this->db->delete('galeri');
		}
		// slider
		function ambil_data_slider(){
			$this->db->from('slider');
			return $this->db->get();
		}
		function hapus_img_slider($id){
			$this->db->where('id',$id);
			$this->db->delete('slider');
		}
	}
?>
