<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Packages extends CI_controller {
	  	function __construct(){
	    	parent::__construct();
	    	ob_start();
			$this->load->model('admin/m_packages');
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
		    	$config['base_url'] = base_url().'packages/';
		    	$config['total_rows'] = $this->m_packages->countAllPackages();
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
				$data['packages'] = $this->m_packages->getPackages($config['per_page'], $data['start']);
				$data['destinations'] = $this->m_packages->getDestinations();

				$this->load->view('admin/str/meta');
				$this->load->view('admin/str/header');
				$this->load->view('admin/cts/packages', $data);
				$this->load->view('admin/str/footer');
		    }
		}
		function _uploadImagePackage(){
			$config['upload_path'] = FCPATH . 'assets/admin/img/packages/';
			$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
			$config['encrypt_name'] = true;
			$this->upload->initialize($config);
			if($this->upload->do_upload('imagePackage')){
				$dataImagePackage = $this->upload->data();
				chmod($dataImagePackage['full_path'], 0777);
				return $this->upload->data('file_name');
			}
		}
		function add_package_db() {
			$this->package_id = uniqid();
			$this->destination_id = $this->input->post('selectDestination');
			$this->name = $this->input->post('namePackage');
			$this->duration = $this->input->post('durationPackage');
			$this->price = $this->input->post('pricePackage');
			$this->max_guest = $this->input->post('guestPackage');
			$this->description = $this->input->post('descriptionPackage');
			$this->image = $this->_uploadImagePackage();
			$this->featured = 0;
			$this->db->insert('packages', $this);
			$this->session->set_flashdata('msg','<div class="alert alert-success"><center>Package is Added!</center></div>');
			redirect('packages');
		}
		function edit_package($id){
			$logged_in = $this->session->userdata('logged_in');
			if($logged_in != TRUE || empty($logged_in)){
				redirect('admin');
		    }
		    else{
				$data['package'] = $this->m_packages->get_package($id);
				$data['destinations'] = $this->m_packages->getDestinations();
				$this->load->view('admin/str/meta');
				$this->load->view('admin/str/header');
				$this->load->view('admin/cts/edit_package', $data);
				$this->load->view('admin/str/footer');
		    }
		}
		function edit_package_db(){
			$this->name = $this->input->post('editName');
			$this->destination_id = $this->input->post('editDestination');
			$this->duration = $this->input->post('editDuration');
			$this->price = $this->input->post('editPrice');
			$this->max_guest = $this->input->post('editGuest');
			$this->description = $this->input->post('editDescription');
			if(!empty($_FILES['imagePackage']['name'])){
				$this->image = $this->_uploadImagePackage();
			}
			else{
				$this->image = $this->input->post('editImg');
			}
			$condition['package_id'] = $this->input->post('editId');
			$this->m_packages->edit_package($this,$condition);
			$this->session->set_flashdata('msg','<div class="alert alert-success"><center>Package is Updated!</center></div>');
			redirect('packages');
		}
		function delete_package_db($id){
			$this->m_packages->delete_package($id);
			$this->session->set_flashdata('msg','<div class="alert alert-warning"><center>Package is Deleted!</center></div>');
			redirect('packages');
		}
	}
?>
