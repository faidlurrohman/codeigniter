<?php
	class M_transport extends CI_Model{
		function getTransports($limit, $start){
			return $this->db->get('transportations', $limit, $start);
		}
		function countAllTransports(){
			return $this->db->get('transportations')->num_rows();
		}
		function getTransport($id){
			$this->db->where('transportation_id',$id);
			$this->db->select('*');
			$this->db->from('transportations');
			return $this->db->get()->row();
		}
	}
?>
