<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_controller{
		function __construct(){
			parent::__construct();
			ob_start();
			$this->load->model('m_user');
			$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
		}
		function index() {
			$data['featured_data'] = $this->m_user->getAllFeatured();
			$data['destination_data'] = $this->m_user->getAllDestination();
			$data['packages_data'] = $this->m_user->getAllPackage();
			$data['blog_data'] = $this->m_user->getAllBlog();
			$data['cover'] = $this->m_user->getCover();
			$this->load->view('user/str/meta');
			$this->load->view('user/str/header');
			$this->load->view('user/cts/home', $data);
			$this->load->view('user/str/footer');
		}
	}
?>
