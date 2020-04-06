<?php
	class M_booking extends CI_Model{
		function getAllPackages(){
			$this->db->from('packages');
			return $this->db->get();
		}
		function getAllTransportations(){
			$this->db->from('transportations');
			return $this->db->get();
		}
	    function get_price($id){
	        $q_package = $this->db->get_where('packages', array('package_id' => $id));
	        $q_trans = $this->db->get_where('transportations', array('transportation_id' => $id));
	        if($q_package->num_rows() != 0){
	        	return $q_package;
	        }
	        else if($q_trans->num_rows() != 0){
	        	return $q_trans;	
	        }
	    }
	}
?>
