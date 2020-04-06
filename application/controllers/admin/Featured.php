<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Featured extends CI_controller {
	  	function __construct(){
	    	parent::__construct();
	    	ob_start();
			$this->load->model('admin/m_featured');
			$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
	  	} 
		function index() {
			$logged_in = $this->session->userdata('logged_in');
			if($logged_in != TRUE || empty($logged_in)){
				redirect('admin');
		    }
		    else{
		    	//pagination
		    	$config['base_url'] = base_url().'featured/';
		    	$config['total_rows'] = $this->m_featured->countAllPackages();
		    	$config['per_page'] = 5;

		    	//styling
		    	$config['full_tag_open'] = '<nav><ul class="pagination justify-content-end mb-0">';
		    	$config['full_tag_close'] = '</ul></nav>';

	            $config['first_link'] = 'First';
		    	$config['first_tag_open'] = '<li class="page-item">';
		    	$config['first_tag_close'] = '</li>';

	            $config['last_link'] = 'Last';
		    	$config['last_tag_open'] = '<li class="page-item">';
		    	$config['last_tag_close'] = '</li>';

	            $config['next_link'] = '<i class="fas fa-angle-right"></i>';
		    	$config['next_tag_open'] = '<li class="page-item">';
		    	$config['next_tag_close'] = '</a></li>';

	            $config['prev_link'] = '<i class="fas fa-angle-left"></i>';
		    	$config['prev_tag_open'] = '<li class="page-item">';
		    	$config['prev_tag_close'] = '</li>';

		    	$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		    	$config['cur_tag_close'] = '</a></li>';

		    	$config['num_tag_open'] = '<li class="page-item">';
		    	$config['num_tag_close'] = '</li>';

		    	$config['attributes'] = array('class' => 'page-link');

		    	//initialize
		    	$this->pagination->initialize($config);
		    	$data['start'] = $this->uri->segment(2);
				$data['packages'] = $this->m_featured->getPackages($config['per_page'], $data['start']);
				$data['destinations'] = $this->m_featured->getDestinations();

				$this->load->view('admin/str/meta');
				$this->load->view('admin/str/header');
				$this->load->view('admin/cts/featured', $data);
				$this->load->view('admin/str/footer');
		    }
		}
		//toggle
		function toggleFeatured() {
			$id = $this->input->post("id");
			$isActive = ($this->input->post("isActive") == "true") ? 1 : 0;
			$update = $this->db->where("package_id", $id)->update("packages", array("featured" => $isActive));
			echo $update;
		}
	}
?>
