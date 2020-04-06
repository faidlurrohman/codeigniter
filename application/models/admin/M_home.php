<?php
	class M_home extends CI_Model{
		function countAllPackages(){
			return $this->db->get('packages')->num_rows();
		}
		function countAllDestinations(){
			return $this->db->get('destinations')->num_rows();
		}
		function countAllBlogs(){
			return $this->db->get('blogs')->num_rows();
		}
		function countAllGallerys(){
			return $this->db->get('gallery')->num_rows();
		}
		/////////////////////////
		function getDestinations($limit, $start){
			return $this->db->get('destinations', $limit, $start);
		}
		function getAllDestinations(){
			return $this->db->get('destinations');
		}
		function getPackages($limit, $start){
			return $this->db->get('packages', $limit, $start);
		}
		function getTransportations($limit, $start){
			return $this->db->get('transportations', $limit, $start);
		}
		function getBlogs($limit, $start){
			return $this->db->get('blogs', $limit, $start);
		}
	}
?>
