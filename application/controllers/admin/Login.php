<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  	function __construct(){
    	parent::__construct();
    	ob_start();
		$this->load->model('admin/m_login');
		// $this->load->model('admin/m_home');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
  	} 

	function index()
	{
		$this->load->view('admin/login');
	}
  	// proses login
	function proses_login(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run() != false){
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$w = array(
				'username' => $user,
				'sandi' => $pass
			);
			$cek = $this->m_login->cek_login('admin',$w)->num_rows();
			if($cek > 0){
				$data_session = array(
					'username' => $user,
	    			'logged_in' => TRUE
				);
				$this->session->set_userdata($data_session);
	    		redirect('dashboard');
			}
			else{
	    		redirect('admin');
			}
		}else{
			$this->load->view('login');
		}
	}
}
