<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Slider extends CI_controller {
	  	function __construct(){
	    	parent::__construct();
	    	ob_start();
			$this->load->model('admin/m_slider');
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
		    	$config['base_url'] = base_url().'slider/';
		    	$config['total_rows'] = $this->m_slider->countAllSliders();
		    	$config['per_page'] = 6;

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
				$data['sliders'] = $this->m_slider->getSliders($config['per_page'], $data['start']);

				$this->load->view('admin/str/meta');
				$this->load->view('admin/str/header');
				$this->load->view('admin/cts/slider', $data);
				$this->load->view('admin/str/footer');
		    }
		}
		function add_slider_db() {
			if(!empty($_FILES['imageSlider']['name'])){
				$number_of_files = sizeof($_FILES['imageSlider']['tmp_name']);
				$files = $_FILES['imageSlider'];
				$config['upload_path'] = FCPATH . 'assets/admin/img/slider/';
				$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
				$config['encrypt_name'] = true;
				for($i = 0; $i < $number_of_files; $i++){
					$_FILES['imageSlider']['name'] = $files['name'][$i];
					$_FILES['imageSlider']['type'] = $files['type'][$i];
					$_FILES['imageSlider']['tmp_name'] = $files['tmp_name'][$i];
					$_FILES['imageSlider']['error'] = $files['error'][$i];
					$_FILES['imageSlider']['size'] = $files['size'][$i];
					$this->upload->initialize($config);
					if($this->upload->do_upload('imageSlider')){
						$dataImage = $this->upload->data();
						chmod($dataImage['full_path'], 0777);
						$insert[$i]['name_image'] = $dataImage['file_name'];
					}
				}
				$this->db->insert_batch('slider', $insert);
				$this->session->set_flashdata('msg','<div class="alert alert-success"><center>Image Slider is Added!</center></div>');
				redirect('slider');
			}
		}
		function delete_slider_db($id){
			$this->m_slider->delete_slider($id);
			$this->session->set_flashdata('msg','<div class="alert alert-warning"><center>Image Slider is Deleted!</center></div>');
			redirect('slider');
		}
	}
?>
