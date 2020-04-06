<?php
	class M_blog extends CI_Model{
		function getBlogs($limit, $start){
			// $this->db->from();
			return $this->db->get('blogs', $limit, $start);
		}
		function countAllBlogs(){
			return $this->db->get('blogs')->num_rows();
		}
		function getBlog($id){
			$this->db->where('blog_id',$id);
			$this->db->select('*');
			$this->db->from('blogs');
			return $this->db->get();
		}
		function edit_blog($data, $condition){
			$this->db->where($condition);
			$this->db->update('blogs',$data);
		}
		function delete_blog($id){
			$this->db->where('blog_id', $id);
			$this->db->delete('blogs');
		}
	}
?>
