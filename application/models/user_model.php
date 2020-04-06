<?php
	class User_model extends CI_Model{
		function __construct(){
			parent::__construct();
		} 
		// slider
		function ambil_data_slider(){
			$this->db->from('slider');
			return $this->db->get();
		}
		// tour
		function ambil_data_tour(){
			$this->db->from('tour');
			return $this->db->get();
		}
		function ambil_tour($id){
			$this->db->where('id_tour',$id);
			$this->db->select('*');
        	$this->db->from('tour');  
        	return $this->db->get()->row();
		}
		function ambil_semua_paket(){
			$this->db->from('paket');
			return $this->db->get();
		}
		function ambil_data_paket($id){
			$this->db->where('id_tour',$id);
			$this->db->select('*');
			$this->db->from('paket');
			return $this->db->get();
		}
		function ambil_paket($id){
			$this->db->where('id_paket',$id);
			$this->db->select('*');
        	$this->db->from('paket');  
        	return $this->db->get()->row();
		}
		function ambil_img_paket(){
			$this->db->from('img_paket');
			return $this->db->get();
		}
		function ambil_img($id){
			$this->db->where('id_paket',$id);
			$this->db->select('*');
			$this->db->from('img_paket');
			return $this->db->get();
		}
		// hotel
		function ambil_data_daerah(){
			$this->db->from('daerah');
			return $this->db->get();
		}
		function ambil_data_daerah_id($id){
			$this->db->where('id_daerah',$id);
			$this->db->select('*');
			$this->db->from('daerah');
			return $this->db->get()->row();
		}
		function ambil_img_daerah(){
			$this->db->from('img_daerah');
			return $this->db->get();
		}
		function ambil_img_id($id){
			$this->db->where('id_daerah',$id);
			$this->db->select('*');
        	$this->db->from('img_daerah');  
        	return $this->db->get();
		}
		function ambil_data_hotel($id){
			$this->db->where('id_daerah',$id);
			$this->db->select('*');
        	$this->db->from('hotel');  
        	return $this->db->get();
		}
		function ambil_data_kamar(){
        	$this->db->from('kmr_hotel');  
        	return $this->db->get();
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
        	return $this->db->get()->row();
		}
		// galeri
		function ambil_data_galeri(){
			$this->db->from('galeri');
			return $this->db->get();
		}
	}
?>
