<?php
	class M_user extends CI_Model{
		function getAllFeatured(){
			return $this->db->get_where('packages', array('featured' => 1));
		}
		function getAllDestination(){
			$this->db->from('destinations');
			return $this->db->get();
		}
		function getAllPackage(){
			$this->db->from('packages');
			return $this->db->get();
		}
		function getAllBlog(){
			$this->db->from('blogs');
			return $this->db->get();
		}
		function getCover(){
			$this->db->from('cover');
			return $this->db->get();
		}
	}
?>
