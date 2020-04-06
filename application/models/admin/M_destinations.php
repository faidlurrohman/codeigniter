<?php
	class M_destinations extends CI_Model{
		function getDestinations($limit, $start){
			// $this->db->from();
			return $this->db->get('destinations', $limit, $start);
		}
		function countAllDestinations(){
			return $this->db->get('destinations')->num_rows();
		}
		function countAllSearchDestinations(){
			$keyword = $this->input->post('keyword', true);
			$this->db->like('name', $keyword);
			return $this->db->get('destinations')->num_rows();
		}
		function searchDestination(){
			$keyword = $this->input->post('keyword', true);
			$this->db->like('name', $keyword);
			return $this->db->get('destinations');
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
