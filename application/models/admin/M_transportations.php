<?php
	class M_transportations extends CI_Model{
		function getTransportations($limit, $start){
			// $this->db->from();
			return $this->db->get('transportations', $limit, $start);
		}
		function countAllTransportations(){
			return $this->db->get('transportations')->num_rows();
		}
		function get_transportation($id){
			$this->db->where('transportation_id',$id);
			$this->db->select('*');
			$this->db->from('transportations');
			return $this->db->get();
		}
		function edit_transportation($data, $condition){
			$this->db->where($condition);
			$this->db->update('transportations',$data);
		}
		function delete_transportation($id){
			$this->db->where('transportation_id', $id);
			$this->db->delete('transportations');
		}
	}
?>
