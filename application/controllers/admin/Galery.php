<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Galery extends CI_controller {
	  	function __construct(){
	    	parent::__construct();
	    	ob_start();
			$this->load->model('admin/m_galery');
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
		    	$config['base_url'] = base_url().'gallery/';
		    	$config['total_rows'] = $this->m_galery->countAllGallerys();
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
				$data['gallerys'] = $this->m_galery->getGallerys($config['per_page'], $data['start']);

				$this->load->view('admin/str/meta');
				$this->load->view('admin/str/header');
				$this->load->view('admin/cts/galery', $data);
				$this->load->view('admin/str/footer');
		    }
		}
		function add_gallery_db() {
			if(!empty($_FILES['imageGalery']['name'])){
				$number_of_files = sizeof($_FILES['imageGalery']['tmp_name']);
				$files = $_FILES['imageGalery'];
				$config['upload_path'] = FCPATH . 'assets/admin/img/gallery/';
				$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
				$config['encrypt_name'] = true;
				for($i = 0; $i < $number_of_files; $i++){
					$_FILES['imageGalery']['name'] = $files['name'][$i];
					$_FILES['imageGalery']['type'] = $files['type'][$i];
					$_FILES['imageGalery']['tmp_name'] = $files['tmp_name'][$i];
					$_FILES['imageGalery']['error'] = $files['error'][$i];
					$_FILES['imageGalery']['size'] = $files['size'][$i];
					$this->upload->initialize($config);
					if($this->upload->do_upload('imageGalery')){
						$dataImage = $this->upload->data();
						chmod($dataImage['full_path'], 0777);
						$insert[$i]['name_image'] = $dataImage['file_name'];
					}
				}
				$this->db->insert_batch('gallery', $insert);
				$this->session->set_flashdata('msg','<div class="alert alert-success"><center>Image is Added!</center></div>');
				redirect('gallery');
			}
		}
		function delete_gallery_db($id){
			$this->m_galery->delete_gallery($id);
			$this->session->set_flashdata('msg','<div class="alert alert-warning"><center>Image is Deleted!</center></div>');
			redirect('gallery');
		}
	}
?>
