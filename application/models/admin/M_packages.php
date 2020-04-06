<?php
	class M_packages extends CI_Model{
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
		function get_package($id){
			$this->db->where('package_id',$id);
			$this->db->select('*');
			$this->db->from('packages');
			return $this->db->get();
		}
		function edit_package($data, $condition){
			$this->db->where($condition);
			$this->db->update('packages',$data);
		}
		function delete_package($id){
			$this->db->where('package_id', $id);
			$this->db->delete('packages');
		}
	}
?>
