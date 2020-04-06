<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Blog extends CI_controller {
	  	function __construct(){
	    	parent::__construct();
	    	ob_start();
			$this->load->model('admin/m_blog');
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
		    	$config['base_url'] = base_url().'blog/';
		    	$config['total_rows'] = $this->m_blog->countAllBlogs();
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
				$data['blogs'] = $this->m_blog->getBlogs($config['per_page'], $data['start']);

				$this->load->view('admin/str/meta');
				$this->load->view('admin/str/header');
				$this->load->view('admin/cts/blog', $data);
				$this->load->view('admin/str/footer');
		    }
		}
		function _uploadImageBlog(){
			$config['upload_path'] = FCPATH . 'assets/admin/img/blogs/';
			$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
			$config['encrypt_name'] = true;
			$this->upload->initialize($config);
			if($this->upload->do_upload('imageBlog')){
				$dataImageBlog = $this->upload->data();
				chmod($dataImageBlog['full_path'], 0777);
				// Compress Image
                // $config['image_library']='gd2';
                // $config['source_image']='assets/admin/img/blogs/'.$dataImageBlog['file_name'];
                // $config['create_thumb']= FALSE;
                // $config['maintain_ratio']= FALSE;
                // $config['quality']= '50%';
                // $config['width']= 600;
                // $config['height']= 400;
                // $config['new_image']= 'assets/admin/img/blogs/'.$dataImageBlog['file_name'];
                // $this->load->library('image_lib', $config);
                // $this->image_lib->resize();

				return $this->upload->data('file_name');
			}
		}
		function add_blog_db() {
			$this->blog_id = uniqid();
			$this->title = $this->input->post('titleBlog');
			$this->date = $this->input->post('dateBlog');
			$this->description = $this->input->post('descriptionBlog');
			$this->image = $this->_uploadImageBlog();
			$this->db->insert('blogs', $this);
			$this->session->set_flashdata('msg','<div class="alert alert-success"><center>Blog is Added!</center></div>');
			redirect('blog');
		}
		function edit_blog($id){
			$logged_in = $this->session->userdata('logged_in');
			if($logged_in != TRUE || empty($logged_in)){
				redirect('admin');
		    }
		    else{
				$data['blog'] = $this->m_blog->getBlog($id);
				$this->load->view('admin/str/meta');
				$this->load->view('admin/str/header');
				$this->load->view('admin/cts/edit_blog', $data);
				$this->load->view('admin/str/footer');
		    }
		}
		function edit_blog_db(){
			$this->title = $this->input->post('editTitle');
			$this->date = $this->input->post('editDate');
			$this->description = $this->input->post('editDescription');
			if(!empty($_FILES['imageBlog']['name'])){
				$this->image = $this->_uploadImageBlog();
			}
			else{
				$this->image = $this->input->post('editImg');
			}
			$condition['blog_id'] = $this->input->post('editId');
			$this->m_blog->edit_blog($this, $condition);
			$this->session->set_flashdata('msg','<div class="alert alert-success"><center>Blog is Updated!</center></div>');
			redirect('blog');
		}
		function delete_blog_db($id){
			$this->m_blog->delete_blog($id);
			$this->session->set_flashdata('msg','<div class="alert alert-warning"><center>Blog is Deleted!</center></div>');
			redirect('blog');
		}
	}
?>
