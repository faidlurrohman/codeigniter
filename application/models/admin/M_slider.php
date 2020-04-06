<?php
	class M_slider extends CI_Model{
		function getSliders($limit, $start){
			// $this->db->from();
			return $this->db->get('slider', $limit, $start);
		}
		function countAllSliders(){
			return $this->db->get('slider')->num_rows();
		}
		function delete_slider($id){
			$this->db->where('id', $id);
			$this->db->delete('slider');
		}
	}
?>
