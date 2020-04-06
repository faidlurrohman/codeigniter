<?php
	class M_gallery extends CI_Model{
		function getPhotos(){
		    $query = "SELECT * FROM gallery"; // Query untuk menampilkan semua data siswa
	    	//pagination
	    	$config['base_url'] = base_url().'content/gallery/';
	    	$config['total_rows'] = $this->db->query($query)->num_rows();
	    	$config['per_page'] = 6;
		    $config['uri_segment'] = 3;
		    $config['num_links'] = 3;

	    	//styling
	    	$config['full_tag_open'] = '<ul>';
	    	$config['full_tag_close'] = '</ul>';

            $config['first_link'] = 'First';
	    	$config['first_tag_open'] = '<li>';
	    	$config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Last';
	    	$config['last_tag_open'] = '<li>';
	    	$config['last_tag_close'] = '</li>';

            $config['next_link'] = '&gt;';
	    	$config['next_tag_open'] = '<li>';
	    	$config['next_tag_close'] = '</a></li>';

            $config['prev_link'] = '&lt;';
	    	$config['prev_tag_open'] = '<li>';
	    	$config['prev_tag_close'] = '</li>';

	    	$config['cur_tag_open'] = '<li class="active"><a href="#">';
	    	$config['cur_tag_close'] = '</a></li>';

	    	$config['num_tag_open'] = '<li>';
	    	$config['num_tag_close'] = '</li>';

	    	//initialize
		    
		    $this->pagination->initialize($config); // Set konfigurasi paginationnya
		    
		    $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
		    $query .= " LIMIT ".$page.", ".$config['per_page'];
		    
		    $data['limit'] = $config['per_page'];
		    $data['total_rows'] = $config['total_rows'];
		    $data['paginations'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
		    $data['photos'] = $this->db->query($query)->result();
		    
		    return $data;
		}
	}
?>
