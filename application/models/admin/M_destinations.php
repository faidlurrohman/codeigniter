<?php
	class M_destinations extends CI_Model{
		function getDestinations($limit, $start){
			// $this->db->from();
			return $this->db->get('destinations', $limit, $start);
		}
		function countAllDestinations(){
			return $this->db->get('destinations')->num_rows();
		}
		function edit_destination($data, $condition){
			$this->db->where($condition);
			$this->db->update('destinations',$data);
		}
		function delete_destination($id){
			$this->db->where('id', $id);
			$this->db->delete('destinations');
		}
	}
?>
