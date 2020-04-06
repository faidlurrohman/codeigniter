<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Transportations extends CI_controller {
	  	function __construct(){
	    	parent::__construct();
	    	ob_start();
			$this->load->model('admin/m_transportations');
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
		    	$config['base_url'] = base_url().'transportations/';
		    	$config['total_rows'] = $this->m_transportations->countAllTransportations();
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
				$data['transportations'] = $this->m_transportations->getTransportations($config['per_page'], $data['start']);

				$this->load->view('admin/str/meta');
				$this->load->view('admin/str/header');
				$this->load->view('admin/cts/transportations', $data);
				$this->load->view('admin/str/footer');
		    }
		}
		function _uploadImageTransportation(){
			$config['upload_path'] = FCPATH . 'assets/admin/img/transportations/';
			$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
			$config['encrypt_name'] = true;
			$this->upload->initialize($config);
			if($this->upload->do_upload('imageTransportation')){
				$dataImageTransportation = $this->upload->data();
				chmod($dataImageTransportation['full_path'], 0777);
				return $this->upload->data('file_name');
			}
		}
		function add_transportation_db() {
			$this->transportation_id = uniqid();
			$this->name = $this->input->post('nameTransportation');
			$this->duration = $this->input->post('durationTransportation');
			$this->price = $this->input->post('priceTransportation');
			$this->max_guest = $this->input->post('guestTransportation');
			$this->description = $this->input->post('descriptionTransportation');
			$this->image = $this->_uploadImageTransportation();
			$this->db->insert('transportations', $this);
			$this->session->set_flashdata('msg','<div class="alert alert-success"><center>Transportation is Saved!</center></div>');
			redirect('transportations');
		}
		function edit_transportation($id){
			$logged_in = $this->session->userdata('logged_in');
			if($logged_in != TRUE || empty($logged_in)){
				redirect('admin');
		    }
		    else{
				$data['transportation'] = $this->m_transportations->get_transportation($id);
				$this->load->view('admin/str/meta');
				$this->load->view('admin/str/header');
				$this->load->view('admin/cts/edit_transportation', $data);
				$this->load->view('admin/str/footer');
		    }
		}
		function edit_transportation_db(){
			$this->name = $this->input->post('editName');
			$this->duration = $this->input->post('editDuration');
			$this->price = $this->input->post('editPrice');
			$this->max_guest = $this->input->post('editGuest');
			$this->description = $this->input->post('editDescription');
			if(!empty($_FILES['imageTransportation']['name'])){
				$this->image = $this->_uploadImageTransportation();
			}
			else{
				$this->image = $this->input->post('editImg');
			}
			$condition['transportation_id'] = $this->input->post('editId');
			$this->m_transportations->edit_transportation($this,$condition);
			$this->session->set_flashdata('msg','<div class="alert alert-success"><center>Transportation is Updated!</center></div>');
			redirect('transportations');
		}
		function delete_transportation_db($id){
			$this->m_transportations->delete_transportation($id);
			$this->session->set_flashdata('msg','<div class="alert alert-warning"><center>Transportations is Deleted!</center></div>');
			redirect('transportations');
		}
	}
?>
