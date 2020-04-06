<?php
	class M_cover extends CI_Model{
		function getAllCover(){
			return $this->db->get('cover');
		}
		function delete_cover($id){
			$this->db->where('id', $id);
			$this->db->delete('cover');
		}
		function updateDbCover($catchData){
		    $query = $this->db->query("SELECT * FROM cover WHERE etc = '10' ");
		    $result = $query->result_array();
		    $count = count($result);
		    if (empty($count)) {
		        $this->db->insert('cover', $catchData); 
		    }
		    elseif ($count == 1) {
		        $this->db->where('etc', 10);
		        $this->db->update('cover', $catchData); 
		    }
		}
	}
?>
