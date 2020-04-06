<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Transport extends CI_controller{
		function __construct(){
			parent::__construct();
			ob_start();
			$this->load->model('m_transport');
			$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
		}		
		function index() {
	    	//pagination
	    	$config['base_url'] = base_url().'content/transports/';
	    	$config['total_rows'] = $this->m_transport->countAllTransports();
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
			$data['transports'] = $this->m_transport->getTransports($config['per_page'], $data['start']);
			$this->load->view('user/str/meta');
			$this->load->view('user/str/header');
			$this->load->view('user/cts/transports', $data);
			$this->load->view('user/str/footer');
		}
		function detail_transport($id){
			$data['transport'] = $this->m_transport->getTransport($id);
			$this->load->view('user/str/meta');
			$this->load->view('user/str/header');
			$this->load->view('user/cts/detail_transport', $data);
			$this->load->view('user/str/footer');
		}
	}
?>
