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
				if(!$this->input->post('keyword')){
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
				}
				else{
					$data['destinations'] = $this->m_destinations->searchDestination();
				}

				if (isset($_POST['btn-add'])) {
					$this->form_validation->set_rules('nameDestination', 'Name', 'required');
					if($this->form_validation->run() == FALSE){
						$this->load->view('admin/str/meta');
						$this->load->view('admin/str/header');
						$this->load->view('admin/cts/destinations', $data);
						$this->load->view('admin/str/footer');
					}
					else{
						$this->form_validation->set_rules('imageDestination', '', 'callback_file_check');
						if($this->form_validation->run() == TRUE){
							$this->id = uniqid();
							$this->name = $this->input->post('nameDestination');
							$this->image = $this->_uploadImageDestination();
							$this->db->insert('destinations', $this);
							$this->session->set_flashdata('msg','Destination is Added!');
							redirect('destinations');
						}
						else{
							$this->load->view('admin/str/meta');
							$this->load->view('admin/str/header');
							$this->load->view('admin/cts/destinations', $data);
							$this->load->view('admin/str/footer');
						}
					}
				}
				else{
					$this->load->view('admin/str/meta');
					$this->load->view('admin/str/header');
					$this->load->view('admin/cts/destinations', $data);
					$this->load->view('admin/str/footer');
				}
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
		public function file_check($str){
	        $allowed_mime_type_arr = array('image/gif','image/jpg','image/bmp','image/jpeg','image/pjpeg','image/png','image/x-png');
	        $mime = get_mime_by_extension($_FILES['imageDestination']['name']);
	        if(isset($_FILES['imageDestination']['name']) && $_FILES['imageDestination']['name']!=""){
	            if(in_array($mime, $allowed_mime_type_arr)){
	                return true;
	            }else{
	                $this->form_validation->set_message('file_check', 'Please select only image type file.');
	                return false;
	            }
	        }else{
	            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
	            return false;
	        }
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
			$this->session->set_flashdata('msg','Destination is Updated!');
			redirect('destinations');
		}
		function delete_destination_db($id){
			$this->m_destinations->delete_destination($id);
			$this->session->set_flashdata('msg','Destination is Deleted!');
			redirect('destinations');
		}
	}
?>
