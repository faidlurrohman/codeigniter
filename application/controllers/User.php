<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_controller{
		function __construct(){
			parent::__construct();
			ob_start();
			$this->load->model('m_user');
		}
		// home
		function index() {
			$featured = 1;
			$data['sliders'] = $this->m_user->getAllSliders();
			$data['destinations'] = $this->m_user->getAllDestination();
			$data['packages'] = $this->m_user->getAllPackages();
			$data['transportations'] = $this->m_user->getAllTransportations();
			$data['featured'] = $this->m_user->getAllFeatured();
			$this->load->view('no_admin/str/meta');
			$this->load->view('no_admin/str/header');
			$this->load->view('no_admin/cts/home', $data);
			$this->load->view('no_admin/str/footer');
		}
	    // get price package
	    function get_price_package(){
	        $id = $this->input->post('id',TRUE);
	        $data = $this->m_user->get_price($id)->result();
	        echo json_encode($data);
	    }
		// destination
		function destination() {
	    	//pagination
	    	$config['base_url'] = base_url().'destination/';
	    	$config['total_rows'] = $this->m_user->countAllDestinations();
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

            $config['next_link'] = '&raquo;';
	    	$config['next_tag_open'] = '<li class="page-item">';
	    	$config['next_tag_close'] = '</a></li>';

            $config['prev_link'] = '&laquo;';
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
			$data['destinations'] = $this->m_user->getDestinations($config['per_page'], $data['start']);
			$this->load->view('no_admin/str/meta');
			$this->load->view('no_admin/str/header');
			$this->load->view('no_admin/cts/destination', $data);
			$this->load->view('no_admin/str/footer');
		}
		function detail_destination($id){
			$data['packagesDestination'] = $this->m_user->getAllPackagesDestination($id);
			$data['destination'] = $this->m_user->getDestination($id);
			$this->load->view('no_admin/str/meta');
			$this->load->view('no_admin/str/header');
			$this->load->view('no_admin/cts/detail_destination', $data);
			$this->load->view('no_admin/str/footer');
		}
		// tours
		function tours() {
	    	//pagination
	    	$config['base_url'] = base_url().'tours/';
	    	$config['total_rows'] = $this->m_user->countAllTours();
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

            $config['next_link'] = '&raquo;';
	    	$config['next_tag_open'] = '<li class="page-item">';
	    	$config['next_tag_close'] = '</a></li>';

            $config['prev_link'] = '&laquo;';
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
			$data['tours'] = $this->m_user->getTours($config['per_page'], $data['start']);
			$data['packages'] = $this->m_user->getAllPackages();
			$this->load->view('no_admin/str/meta');
			$this->load->view('no_admin/str/header');
			$this->load->view('no_admin/cts/tours', $data);
			$this->load->view('no_admin/str/footer');
		}
		function detail_tour($id){
			$data['packages'] = $this->m_user->getAllPackages();
			$data['tour'] = $this->m_user->getTour($id);
			$this->load->view('no_admin/str/meta');
			$this->load->view('no_admin/str/header');
			$this->load->view('no_admin/cts/detail_tour', $data);
			$this->load->view('no_admin/str/footer');
		}
		// transport
		function transports() {
	    	//pagination
	    	$config['base_url'] = base_url().'transports/';
	    	$config['total_rows'] = $this->m_user->countAllTransports();
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

            $config['next_link'] = '&raquo;';
	    	$config['next_tag_open'] = '<li class="page-item">';
	    	$config['next_tag_close'] = '</a></li>';

            $config['prev_link'] = '&laquo;';
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
			$data['transports'] = $this->m_user->getTransports($config['per_page'], $data['start']);
			$data['transportations'] = $this->m_user->getAllTransportations();
			$this->load->view('no_admin/str/meta');
			$this->load->view('no_admin/str/header');
			$this->load->view('no_admin/cts/transports', $data);
			$this->load->view('no_admin/str/footer');
		}
		function detail_transport($id){
			$data['transportations'] = $this->m_user->getAllTransportations();
			$data['transport'] = $this->m_user->getTransport($id);
			$this->load->view('no_admin/str/meta');
			$this->load->view('no_admin/str/header');
			$this->load->view('no_admin/cts/detail_transport', $data);
			$this->load->view('no_admin/str/footer');
		}
		// blog
		function blogs() {
	    	//pagination
	    	$config['base_url'] = base_url().'posts/';
	    	$config['total_rows'] = $this->m_user->countAllBlogs();
	    	$config['per_page'] = 4;

	    	//styling
	    	$config['full_tag_open'] = '<nav><ul class="pagination justify-content-end mb-0">';
	    	$config['full_tag_close'] = '</ul></nav>';

            $config['first_link'] = 'First';
	    	$config['first_tag_open'] = '<li class="page-item">';
	    	$config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Last';
	    	$config['last_tag_open'] = '<li class="page-item">';
	    	$config['last_tag_close'] = '</li>';

            $config['next_link'] = '&raquo;';
	    	$config['next_tag_open'] = '<li class="page-item">';
	    	$config['next_tag_close'] = '</a></li>';

            $config['prev_link'] = '&laquo;';
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
			$data['blogs'] = $this->m_user->getBlogs($config['per_page'], $data['start']);
			$data['blogs_all'] = $this->m_user->getAllBlogs();
			$this->load->view('no_admin/str/meta');
			$this->load->view('no_admin/str/header');
			$this->load->view('no_admin/cts/posts', $data);
			$this->load->view('no_admin/str/footer');
		}
		function detail_blog($id){
			$data['blogs_all'] = $this->m_user->getAllBlogs();
			$data['blog'] = $this->m_user->getBlog($id);
			$this->load->view('no_admin/str/meta');
			$this->load->view('no_admin/str/header');
			$this->load->view('no_admin/cts/detail_post', $data);
			$this->load->view('no_admin/str/footer');
		}
		// booking
		function booking() {
			$data['packages'] = $this->m_user->getAllPackages();
			$data['transportations'] = $this->m_user->getAllTransportations();
			$this->load->view('no_admin/str/meta');
			$this->load->view('no_admin/str/header');
			$this->load->view('no_admin/cts/booking', $data);
			$this->load->view('no_admin/str/footer');
		}
		function email(){

			$fname = $this->input->post('fname_1');
			$lname = $this->input->post('lname_1');
			$name = $fname . " " . $lname;
			$email_pengirim = $this->input->post('email_1');
			$tlp = $this->input->post('phone_1');
			$pilihan = $this->input->post('package_1');
	        $price = $this->input->post('price_1');
	        $splitPrice = explode(" ", $price);
	        $priceFix = $splitPrice[0] . $splitPrice[1]; 
	        $guest = $this->input->post('guest_1');
	        $guestFix = $guest . " Guest";
			$ket = $this->input->post('desc_1');

			$htmlContent = '<h3>Name :</h3>';
			$htmlContent .= '<span style="text-transform: capitalize;">'.$name.'</span>';
			$htmlContent .= '<h3>Email :</h3>';
			$htmlContent .= '<span>'.$email_pengirim.'</span>';
			$htmlContent .= '<h3>Phone :</h3>';
			$htmlContent .= '<span>'.$tlp.'</span>';
			$htmlContent .= '<h3>Package :</h3>';
			$htmlContent .= '<span style="text-transform: capitalize;">'.$pilihan.'</span>';
			$htmlContent .= '<h3>Price :</h3>';
			$htmlContent .= '<span style="text-transform: capitalize;">'.$priceFix.'</span>';
			$htmlContent .= '<h3>Guest :</h3>';
			$htmlContent .= '<span style="text-transform: capitalize;">'.$guestFix.'</span>';
			$htmlContent .= '<h3>Description :</h3>';
			if(strlen($ket) <= 0){
				$htmlContent .= '<span>Not yet!</span>';	
			}
			else{
				$htmlContent .= '<span style="text-transform: capitalize;">'.$ket.'</span>';	
			}
			$config = [
			   'mailtype'  => 'html',
			   'charset'   => 'utf-8',
			   'protocol'  => 'smtp',
			   'smtp_host' => 'ssl://smtp.gmail.com',
			   'smtp_user' => 'kindisubarkah@gmail.com', // gantien email servere iki le
			   'smtp_pass' => 'mataram2529', // password email servere le
			   'smtp_port' => 465,
			   'crlf'      => "\r\n",
			   'newline'   => "\r\n"
			];
			$this->load->library('email', $config);
			$this->email->from($email_pengirim, $name);
			$this->email->to('faidhamburger@gmail.com'); // email seng nerimo email le
			$this->email->subject('New Booking');
			$this->email->message($htmlContent);
			if ($this->email->send()) {
				redirect('booking');
			}
		}
		function whatsapp(){
	        $fname = $this->input->post('fname_2');
	        $lname = $this->input->post('lname_2');
	        $email = $this->input->post('email_2');
	        $phone = $this->input->post('phone_2');
	        $package = $this->input->post('package_2');
	        $price = $this->input->post('price_2');
	        $guest = $this->input->post('guest_2');
	        $desc = $this->input->post('desc_2');
	        $splitPrice = explode(" ", $price);
	        $tmpPrice = $splitPrice[0] . $splitPrice[1]; 
	        $textWA = "Hello%20ONESTOPHOLIDAY%20TRAVEL%20I'm%20" . $fname . "%20" . $lname . "%20wanna%20to%20booking%20" . $package . "%20listed%20" . $tmpPrice . "%20with%20" . $guest . "%20guest!";
			redirect("https://wa.me/6281249924049?text=" . $textWA);
		}
	}
?>
