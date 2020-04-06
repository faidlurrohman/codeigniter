<?php
	class M_user extends CI_Model{
	    // insert transaction data paypal
	    function insertTransaction($data){
	        $insert = $this->db->insert('payments',$data);
	        return $insert?true:false;
	    }
	    // get data slider
		function getAllSliders(){
			$this->db->from('slider');
			return $this->db->get();
		}
	    // get data destination
		function getAllDestination(){
			$this->db->from('destinations');
			return $this->db->get();
		}
	    // get data package
		function getAllPackages(){
			$this->db->from('packages');
			return $this->db->get();
		}
	    // get data transportation
		function getAllTransportations(){
			$this->db->from('transportations');
			return $this->db->get();
		}
	    // get data featured
		function getAllFeatured(){
			return $this->db->get_where('packages', array('featured' => 1));
		}
	    // get data blogs
		function getAllBlogs(){
			$this->db->from('blogs');
			return $this->db->get();
		}
	    // get price package
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
	    // destinations
		function getDestinations($limit, $start){
			return $this->db->get('destinations', $limit, $start);
		}
		function countAllDestinations(){
			return $this->db->get('destinations')->num_rows();
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
	    // tour
		function getTours($limit, $start){
			return $this->db->get('packages', $limit, $start);
		}
		function countAllTours(){
			return $this->db->get('packages')->num_rows();
		}
		function getTour($id){
			$this->db->where('package_id',$id);
			$this->db->select('*');
			$this->db->from('packages');
			return $this->db->get()->row();
		}
	    // transport
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
	    // blog
		function getBlogs($limit, $start){
			return $this->db->get('blogs', $limit, $start);
		}
		function countAllBlogs(){
			return $this->db->get('blogs')->num_rows();
		}
		function getBlog($id){
			$this->db->where('blog_id',$id);
			$this->db->select('*');
			$this->db->from('blogs');
			return $this->db->get()->row();
		}
	}
?>
