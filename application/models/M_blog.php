<?php
	class M_blog extends CI_Model{
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
