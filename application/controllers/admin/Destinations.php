<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Destinations extends CI_controller {
	  	function __construct(){
	    	parent::__construct();
	    	ob_start();
			$this->load->model('admin/m_destinations');
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
		    	$config['base_url'] = base_url().'destinations/';
		    	$config['total_rows'] = $this->m_destinations->countAllDestinations();
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
				$data['destinations'] = $this->m_destinations->getDestinations($config['per_page'], $data['start']);

				$this->load->view('admin/str/meta');
				$this->load->view('admin/str/header');
				$this->load->view('admin/cts/destinations', $data);
				$this->load->view('admin/str/footer');
		    }
		}
		private function _uploadImageDestination(){
			$config['upload_path'] = FCPATH . 'assets/admin/img/destinations/';
			$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
			$config['encrypt_name'] = true;
			$this->upload->initialize($config);
			if($this->upload->do_upload('imageDestination')){
				$dataImageDestination = $this->upload->data();
				chmod($dataImageDestination['full_path'], 0777);
				return $this->upload->data('file_name');
			}
		}
		function add_destination_db() {
			$this->id = uniqid();
			$this->name = $this->input->post('nameDestination');
			$this->image = $this->_uploadImageDestination();
			$this->db->insert('destinations', $this);
			$this->session->set_flashdata('msg','<div class="alert alert-success"><center>Destination is Added!</center></div>');
			redirect('destinations');
		}
		function edit_destination_db(){
			$this->name = $this->input->post('editName');
			if(!empty($_FILES['imageDestination']['name'])){
				$this->image = $this->_uploadImageDestination();
			}
			else{
				$this->image = $this->input->post('editImg');
			}
			$condition['id'] = $this->input->post('editId');
			$this->m_destinations->edit_destination($this,$condition);
			$this->session->set_flashdata('msg','<div class="alert alert-success"><center>Destination is Updated!</center></div>');
			redirect('destinations');
		}
		function delete_destination_db($id){
			$this->m_destinations->delete_destination($id);
			$this->session->set_flashdata('msg','<div class="alert alert-warning"><center>Destination is Deleted!</center></div>');
			redirect('destinations');
		}
	}
?>
