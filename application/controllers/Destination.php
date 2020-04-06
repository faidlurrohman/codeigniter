<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Destination extends CI_controller{
		function __construct(){
			parent::__construct();
			ob_start();
			$this->load->model('m_destination');
			$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
		}
		function index() {
	    	//pagination
	    	$config['base_url'] = base_url().'content/destinations/';
	    	$config['total_rows'] = $this->m_destination->countAllDestinations();
	    	$config['per_page'] = 6;

	    	//styling
	    	$config['full_tag_open'] = '<ul>';
	    	$config['full_tag_close'] = '</ul>';

            $config['first_link'] = 'First';
	    	$config['first_tag_open'] = '<li>';
	    	$config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Last';
	    	$config['last_tag_open'] = '<li>';
	    	$config['last_tag_close'] = '</li>';

            $config['next_link'] = '&gt;';
	    	$config['next_tag_open'] = '<li>';
	    	$config['next_tag_close'] = '</a></li>';

            $config['prev_link'] = '&lt;';
	    	$config['prev_tag_open'] = '<li>';
	    	$config['prev_tag_close'] = '</li>';

	    	$config['cur_tag_open'] = '<li class="active"><a href="#">';
	    	$config['cur_tag_close'] = '</a></li>';

	    	$config['num_tag_open'] = '<li>';
	    	$config['num_tag_close'] = '</li>';

	    	//initialize
	    	$this->pagination->initialize($config);
	    	$data['start'] = $this->uri->segment(3);
			$data['destination_data'] = $this->m_destination->getDestinations($config['per_page'], $data['start']);
			$data['packages_data'] = $this->m_destination->getAllPackage();
			$this->load->view('user/str/meta');
			$this->load->view('user/str/header');
			$this->load->view('user/cts/destinations', $data);
			$this->load->view('user/str/footer');
		}
		function detail_destination($id){
			$data['packagesDestination'] = $this->m_destination->getAllPackagesDestination($id);
			$data['destination'] = $this->m_destination->getDestination($id);
			$this->load->view('user/str/meta');
			$this->load->view('user/str/header');
			$this->load->view('user/cts/detail_destination', $data);
			$this->load->view('user/str/footer');
		}
	}
?>
