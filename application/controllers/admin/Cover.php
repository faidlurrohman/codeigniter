<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Cover extends CI_controller {
	  	function __construct(){
	    	parent::__construct();
	    	ob_start();
			$this->load->model('admin/m_cover');
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
				if (isset($_POST['btn-update'])) {
					$this->form_validation->set_rules('imageCover', '', 'callback_file_check');
					if($this->form_validation->run() == TRUE){
						$this->etc = 10;
						$this->name_image = $this->_uploadImageCover();
						$this->m_cover->updateDbCover($this);

						// $this->db->insert('cover', $this);
						$this->session->set_flashdata('msg','Cover is Updated!');
						redirect('cover');
					}
					else{
						$data['cover'] = $this->m_cover->getAllCover();	
						$this->load->view('admin/str/meta');
						$this->load->view('admin/str/header');
						$this->load->view('admin/cts/cover', $data);
						$this->load->view('admin/str/footer');
					}
				}
				else{
					$data['cover'] = $this->m_cover->getAllCover();
					$this->load->view('admin/str/meta');
					$this->load->view('admin/str/header');
					$this->load->view('admin/cts/cover', $data);
					$this->load->view('admin/str/footer');
				}
		    }
		}
		private function _uploadImageCover(){
			$config['upload_path'] = FCPATH . 'assets/admin/img/cover/';
			$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
			$config['encrypt_name'] = true;
			$this->upload->initialize($config);
			if($this->upload->do_upload('imageCover')){
				$dataImageCover = $this->upload->data();
				chmod($dataImageCover['full_path'], 0777);
				return $this->upload->data('file_name');
			}
		}
		public function file_check($str){
	        $allowed_mime_type_arr = array('image/gif','image/jpg','image/bmp','image/jpeg','image/pjpeg','image/png','image/x-png');
	        $mime = get_mime_by_extension($_FILES['imageCover']['name']);
	        if(isset($_FILES['imageCover']['name']) && $_FILES['imageCover']['name']!=""){
	            if(in_array($mime, $allowed_mime_type_arr)){
	                return true;
	            }else{
	                $this->form_validation->set_message('file_check', 'Please select only image type file.');
	                return false;
	            }
	        }else{
	            $this->form_validation->set_message('file_check', 'Please choose a file to update.');
	            return false;
	        }
	    }

		// function add_slider_db() {
		// 	if(!empty($_FILES['imageSlider']['name'])){
		// 		$number_of_files = sizeof($_FILES['imageSlider']['tmp_name']);
		// 		$files = $_FILES['imageSlider'];
		// 		$config['upload_path'] = FCPATH . 'assets/admin/img/cover/';
		// 		$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
		// 		$config['encrypt_name'] = true;
		// 		for($i = 0; $i < $number_of_files; $i++){
		// 			$_FILES['imageSlider']['name'] = $files['name'][$i];
		// 			$_FILES['imageSlider']['type'] = $files['type'][$i];
		// 			$_FILES['imageSlider']['tmp_name'] = $files['tmp_name'][$i];
		// 			$_FILES['imageSlider']['error'] = $files['error'][$i];
		// 			$_FILES['imageSlider']['size'] = $files['size'][$i];
		// 			$this->upload->initialize($config);
		// 			if($this->upload->do_upload('imageSlider')){
		// 				$dataImage = $this->upload->data();
		// 				chmod($dataImage['full_path'], 0777);
		// 				$insert[$i]['name_image'] = $dataImage['file_name'];
		// 			}
		// 		}
		// 		$this->db->insert_batch('cover', $insert);
		// 		$this->session->set_flashdata('msg','<div class="alert alert-success"><center>Image Slider is Added!</center></div>');
		// 		redirect('cover');
		// 	}
		// }
		function delete_cover_db($id){
			$this->m_cover->delete_cover($id);
			$this->session->set_flashdata('msg','Cover is Deleted!');
			redirect('cover');
		}
	}
?>
