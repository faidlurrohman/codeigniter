<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Booking extends CI_controller{
		function __construct(){
			parent::__construct();
			ob_start();
			$this->load->model('m_booking');
			$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
		}
		function index() {
			$data['packages'] = $this->m_booking->getAllPackages();
			$data['transportations'] = $this->m_booking->getAllTransportations();
			$this->load->view('user/str/meta');
			$this->load->view('user/str/header');
			$this->load->view('user/cts/booking', $data);
			$this->load->view('user/str/footer');
		}
	    function get_price_package(){
	        $id = $this->input->post('id',TRUE);
	        $data = $this->m_booking->get_price($id)->result();
	        echo json_encode($data);
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
	        $priceFix = $splitPrice[0] . " " . $splitPrice[1]; 
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
			$this->email->to('kindytravel@gmail.com'); // email seng nerimo email le
			$this->email->subject('New Booking');
			$this->email->message($htmlContent);
			if ($this->email->send()) {
				$this->session->set_flashdata('msg','Email Sent!');
				redirect(base_url());
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
	        $textWA = "Hello%KINDI%20TRAVEL%20I'm%20" . $fname . "%20" . $lname . "%20wanna%20to%20booking%20" . $package . "%20listed%20" . $tmpPrice . "%20with%20" . $guest . "%20guest!";
			redirect("https://wa.me/6281249924049?text=" . $textWA);
		}
	}
?>
