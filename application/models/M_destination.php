<?php
	class M_destination extends CI_Model{
		function getDestinations($limit, $start){
			return $this->db->get('destinations', $limit, $start);
		}
		function countAllDestinations(){
			return $this->db->get('destinations')->num_rows();
		}
		function getAllPackage(){
			$this->db->from('packages');
			return $this->db->get();
		}
		function getDestination($id){
			$this->db->where('id',$id);
			$this->db->select('*');
			$this->db->from('destinations');
			return $this->db->get()->row();
		}
		function getAllPackagesDestination($id){
			return $this->db->get_where('packages', array('destination_id' => $id));
		}
	}
?>
