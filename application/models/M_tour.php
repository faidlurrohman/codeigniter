<?php
	class M_tour extends CI_Model{
		function getTours($limit, $start){
			return $this->db->get('packages', $limit, $start);
		}
		function countAllTours(){
			return $this->db->get('packages')->num_rows();
		}
		function getTour($id){
			$this->db->where('package_id',$id);
			$this->db->select('*');
			$this->db->from('packages');
			return $this->db->get()->row();
		}
	}
?>
