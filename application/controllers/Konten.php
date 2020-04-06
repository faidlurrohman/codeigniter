<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Konten extends CI_controller{
	  	function __construct(){
	    	parent::__construct();
	    	ob_start();
			$this->load->model('user_model');
			$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
	  	}
	  	// email
	  	function send_email(){
	  		$nama = $this->input->post('emailNama');
	  		$email_pengirim = $this->input->post('emailPengirim');
	  		$tlp = $this->input->post('emailHp');
	  		$pilihan = $this->input->post('emailBooking');
	  		$ket = $this->input->post('emailKet');
	  		$htmlContent = '<h3>Nama :</h3>';
			$htmlContent .= '<span style="text-transform: capitalize;">'.$nama.'</span>';
	  		$htmlContent .= '<h3>Email :</h3>';
			$htmlContent .= '<span>'.$email_pengirim.'</span>';
	  		$htmlContent .= '<h3>No.Tlp/Hp :</h3>';
			$htmlContent .= '<span>'.$tlp.'</span>';
	  		$htmlContent .= '<h3>Pilihan Booking :</h3>';
			$htmlContent .= '<span style="text-transform: capitalize;">'.$pilihan.'</span>';
	  		$htmlContent .= '<h3>Keterangan Tambahan :</h3>';
	  		if(strlen($ket) <= 0){
				$htmlContent .= '<span>Tidak Ada Keterangan Tambahan</span>';	
	  		}
	  		else{
				$htmlContent .= '<span style="text-transform: capitalize;">'.$ket.'</span>';	
	  		}
	        $config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'faid.slankarasta@gmail.com', // gantien email servere iki le
               'smtp_pass' => 'f4idr0hm4n', // password email servere le
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
            ];
	        $this->load->library('email', $config);
	        $this->email->from($email_pengirim, $nama);
	        $this->email->to('faidhamburger@gmail.com'); // email seng nerimo email le
	        $this->email->subject('Booking Baru');
	        $this->email->message($htmlContent);
	        if ($this->email->send()) {
		  		if(strlen($ket) <= 0){
					$ket = "Tidak Ada Keterangan";	
		  		}
				$data = array(
					'id_booking' => uniqid(),
					'nama' => $nama,
					'email_pengirim' => $email_pengirim,
					'tlp' => $tlp,
					'pilihan' => $pilihan,
					'ket' => $ket
				);
				$this->db->insert('booking', $data);
	        	redirect('beranda');
	        }
	  	}
	  	// beranda
        function beranda() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['slider'] = $this->user_model->ambil_data_slider();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/beranda', $data);
            $this->load->view('user/str/footer', $data);
        }
        //profil
        function kebijakan() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/kebijakan');
            $this->load->view('user/str/footer', $data);
        }
        function pembayaran() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/pembayaran');
            $this->load->view('user/str/footer', $data);
        }
        function syarat() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/syarat');
            $this->load->view('user/str/footer', $data);
        }
        function tentang() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/tentang');
            $this->load->view('user/str/footer', $data);
        }
        // tour
		public function tour($id){
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataTourSelect'] = $this->user_model->ambil_tour($id);
			$data['paket'] = $this->user_model->ambil_data_paket($id);
			$data['imgPaket'] = $this->user_model->ambil_img_paket();
			$this->load->view('user/str/meta');
			$this->load->view('user/str/header', $data);
			$this->load->view('user/contents/tour', $data);
			$this->load->view('user/str/footer', $data);
		}
        // paket
		public function paket($id){
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataDaerah'] = $this->user_model->ambil_data_daerah();
			$data['paketDetail'] = $this->user_model->ambil_paket($id);
			$data['semuaPaket'] = $this->user_model->ambil_semua_paket();
			$data['imgPaket'] = $this->user_model->ambil_img_paket();
			$data['imgSlider'] = $this->user_model->ambil_img($id);
			$this->load->view('user/str/meta');
			$this->load->view('user/str/header', $data);
			$this->load->view('user/contents/paket', $data);
			$this->load->view('user/str/footer', $data);
		}
        // transport
        function transport() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/transport');
            $this->load->view('user/str/footer', $data);
        }
        function mobil() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataDaerah'] = $this->user_model->ambil_data_daerah();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/mobil', $data);
            $this->load->view('user/str/footer', $data);
        }
        function bus() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataDaerah'] = $this->user_model->ambil_data_daerah();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/bus', $data);
            $this->load->view('user/str/footer', $data);
        }
        function speed_boat() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataDaerah'] = $this->user_model->ambil_data_daerah();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/speed_boat', $data);
            $this->load->view('user/str/footer', $data);
        }
        function glass_bottom() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataDaerah'] = $this->user_model->ambil_data_daerah();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/glass_bottom', $data);
            $this->load->view('user/str/footer', $data);
        }
        function slow_boat() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataDaerah'] = $this->user_model->ambil_data_daerah();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/slow_boat', $data);
            $this->load->view('user/str/footer', $data);
        }
        // booking
        function booking() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/booking');
            $this->load->view('user/str/footer', $data);
        }
        // blog
        function blog() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataBlog'] = $this->user_model->ambil_data_blog();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/blog', $data);
            $this->load->view('user/str/footer', $data);
        }
        function detail_blog($id) {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataBlog'] = $this->user_model->ambil_data_blog();
			$data['blogDetail'] = $this->user_model->ambil_blog($id);
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/detail_blog', $data);
            $this->load->view('user/str/footer', $data);
        }
        // galeri
        function galeri() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataGaleri'] = $this->user_model->ambil_data_galeri();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/galeri', $data);
            $this->load->view('user/str/footer', $data);
        }
        // hotel
        function hotel() {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataDaerah'] = $this->user_model->ambil_data_daerah();
			$data['dataImg'] = $this->user_model->ambil_img_daerah();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/hotel', $data);
            $this->load->view('user/str/footer', $data);
        }
        function detail_hotel($id) {
			$data['dataTour'] = $this->user_model->ambil_data_tour();
			$data['dataDaerah'] = $this->user_model->ambil_data_daerah();
			$data['dataImg'] = $this->user_model->ambil_img_daerah();
			$data['dataDaerahId'] = $this->user_model->ambil_data_daerah_id($id);
			$data['dataImgId'] = $this->user_model->ambil_img_id($id);
			$data['dataHotel'] = $this->user_model->ambil_data_hotel($id);
			$data['dataKamar'] = $this->user_model->ambil_data_kamar();
            $this->load->view('user/str/meta');
            $this->load->view('user/str/header', $data);
            $this->load->view('user/contents/detail_hotel', $data);
            $this->load->view('user/str/footer', $data);
        }
    }
?>
