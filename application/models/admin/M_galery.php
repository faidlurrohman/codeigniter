<?php
	class M_galery extends CI_Model{
		function getGallerys($limit, $start){
			// $this->db->from();
			return $this->db->get('gallery', $limit, $start);
		}
		function countAllGallerys(){
			return $this->db->get('gallery')->num_rows();
		}
		function delete_gallery($id){
			$this->db->where('id', $id);
			$this->db->delete('gallery');
		}
	}
?>
