<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Admin extends CI_controller {
	  	function __construct(){
	    	parent::__construct();
	    	ob_start();
			$this->load->model('login');
			$this->load->model('admin/m_home');
			$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
	  	} 
	 	public function index(){
	    	$this->load->view('admin/login');
	  	}
	  	// login
		function login(){
			$user = $this->input->post('username');
			$pass = $this->input->post('sandi');
			$w = array(
				'username' => $user,
				'password' => $pass
			);
			$cek = $this->login->cek_login("user",$w)->num_rows();
			if($cek > 0){
				$data_session = array(
					'username' => $user,
	    			'logged_in' => TRUE
				);
				$this->session->set_userdata($data_session);
	    		redirect('dashboard');
			}
			else{
	    		redirect('login');
			}
		}
		//logout
		function logout(){
			$this->load->driver('cache');
	    	$this->session->sess_destroy();
	    	$this->cache->clean();
	    	ob_clean();
			redirect(site_url());
		}
		// konten
		function home() {
			$logged_in = $this->session->userdata('logged_in');
			if($logged_in != TRUE || empty($logged_in)){
				redirect('login');
		    }
		    else{
		    	$data['packages'] = $this->m_home->countAllPackages();
		    	$data['destinations'] = $this->m_home->countAllDestinations();
		    	$data['blogs'] = $this->m_home->countAllBlogs();
		    	$data['gallerys'] = $this->m_home->countAllGallerys();
		    	$data['destinations_tbl'] = $this->m_home->getDestinations(5,0);
		    	$data['destinations_all'] = $this->m_home->getAllDestinations();
		    	$data['packages_tbl'] = $this->m_home->getPackages(5,0);
		    	$data['transportations_tbl'] = $this->m_home->getTransportations(5,0);
		    	$data['blogs_tbl'] = $this->m_home->getBlogs(5,0);
				$this->load->view('admin/str/meta');
				$this->load->view('admin/str/header');
				$this->load->view('admin/cts/home', $data);
				$this->load->view('admin/str/footer');
		    }
		}
	}
?>
