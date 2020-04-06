<?php
	class M_featured extends CI_Model{
		function getPackages($limit, $start){
			// $this->db->from();
			return $this->db->get('packages', $limit, $start);
		}
		function countAllPackages(){
			return $this->db->get('packages')->num_rows();
		}
		function getDestinations(){
			return $this->db->get('destinations');
		}
	}
?>
