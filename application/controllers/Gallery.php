<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Gallery extends CI_controller{
		function __construct(){
			parent::__construct();
			ob_start();
			$this->load->model('m_gallery');
			$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
		}
		function index() {
			$data['model'] = $this->m_gallery->getPhotos();
			$this->load->view('user/str/meta');
			$this->load->view('user/str/header');
			$this->load->view('user/cts/gallery', $data);
			$this->load->view('user/str/footer');
		}
	}
?>
