<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dub_konten extends CI_controller {
  	function __construct(){
    	parent::__construct();
    	ob_start();
		$this->load->model('travel_model');
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
			'nama' => $user,
			'sandi' => $pass
		);
		$cek = $this->travel_model->cek_login("admin",$w)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $user,
    			'logged_in' => TRUE
			);
			$this->session->set_userdata($data_session);
    		redirect('admin/beranda');
		}
		else{
    		redirect('admin');
		}
	}
	function logout(){
		$this->load->driver('cache');
    	$this->session->sess_destroy();
    	$this->cache->clean();
    	ob_clean();
		redirect('admin');
	}
	// konten
	function beranda() {
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
		redirect('admin');
	    }
	    else{
			$data['dataHotel'] = $this->travel_model->ambil_data_hotel();
			$data['dataGaleri'] = $this->travel_model->ambil_data_galeri();
			$data['dataBlog'] = $this->travel_model->ambil_data_blog();
			$data['dataPaket'] = $this->travel_model->ambil_data_paket();
			$data['dataDaerah'] = $this->travel_model->ambil_data_daerah();
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/beranda', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	// booking
	function booking() {
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['dataBooking'] = $this->travel_model->ambil_data_booking();
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/booking', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	public function hapus_booking_db($id){
		$this->travel_model->hapus_booking($id);
		redirect('admin/booking');
	}
	// tour
	function tambah_tour() {
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['dataTour'] = $this->travel_model->ambil_data_tour();
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/tambah_tour', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	private function _uploadImage(){
		$config['upload_path'] = FCPATH . 'assets/dub_user/images/tour/';
		$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
		$config['encrypt_name'] = true;
		$this->upload->initialize($config);
		if($this->upload->do_upload('gambarTour')){
			$dataImageTour = $this->upload->data();
			chmod($dataImageTour['full_path'], 0777);
			return $this->upload->data('file_name');
		}
	}
	function tambah_tour_db() {
		$this->id_tour = uniqid();
		$this->kategori = $this->input->post('tourBaru');
		$this->img = $this->_uploadImage();
		$this->db->insert('tour', $this);
		redirect('admin/tour');  
	}
	public function edit_tour_db(){
		$this->kategori = $this->input->post('modal_tour');
		if(!empty($_FILES['gambarTour']['name'])){
			$this->img = $this->_uploadImage();
		}
		else{
			$this->img = $this->input->post('modal_img');
		}
		$condition['id_tour'] = $this->input->post('modal_id');
		$this->travel_model->edit_tour($this,$condition);
		redirect('admin/tour');
	}
	public function hapus_tour_db($id){
		$this->travel_model->hapus_tour($id);
		redirect('admin/tour');
	}
	// paket
	function tambah_paket() {
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['dataTour'] = $this->travel_model->ambil_data_tour();
			$data['dataPaket'] = $this->travel_model->ambil_data_paket();
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/tambah_paket', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	function tambah_paket_db() {
		$id_paket = uniqid();
		$data = array(
			'id_paket' => $id_paket,
			'id_tour' => $this->input->post('selectTour'),
			'nama' => $this->input->post('namaPaket'),
			'durasi' => $this->input->post('durasiPaket'),
			'harga' => $this->input->post('hargaPaket'),
			'isi' => $this->input->post('deskPaket')
		);
		$this->db->insert('paket', $data);

		if(!empty($_FILES['gambarPaket']['name'])){
			$number_of_files = sizeof($_FILES['gambarPaket']['tmp_name']);
			$files = $_FILES['gambarPaket'];
			$config['upload_path'] = FCPATH . 'assets/dub_user/images/paket/';
			$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
			$config['encrypt_name'] = true;
			for($i = 0; $i < $number_of_files; $i++){
				$_FILES['gambarPaket']['name'] = $files['name'][$i];
				$_FILES['gambarPaket']['type'] = $files['type'][$i];
				$_FILES['gambarPaket']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['gambarPaket']['error'] = $files['error'][$i];
				$_FILES['gambarPaket']['size'] = $files['size'][$i];
				$this->upload->initialize($config);
				if($this->upload->do_upload('gambarPaket')){
					$dataImage = $this->upload->data();
					chmod($dataImage['full_path'], 0777);
					$insert[$i]['id_paket'] = $id_paket;
					$insert[$i]['img'] = $dataImage['file_name'];
				}
				else{
					redirect('admin/paket');
				}
			}
			$this->db->insert_batch('img_paket', $insert);
			redirect('admin/paket');
		}
	}
	public function edit_paket($id){
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['dataTour'] = $this->travel_model->ambil_data_tour();
			$data['paket'] = $this->travel_model->ambil_paket($id);
			$data['img_paket'] = $this->travel_model->ambil_img_paket($id);
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/edit_paket', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	public function edit_paket_db(){
		$data = array(
			'nama' => $this->input->post('editNama'),
			'durasi' => $this->input->post('editDurasi'),
			'harga' => $this->input->post('editHarga'),
			'isi' => $this->input->post('editIsi'),
			'id_tour' => $this->input->post('editKategori'),
		);
		$condition['id_paket'] = $this->input->post('editId');
		$this->travel_model->edit_paket($data,$condition);

		if(!empty($_FILES['tambahGambar']['name'])){
			$number_of_files = sizeof($_FILES['tambahGambar']['tmp_name']);
			$files = $_FILES['tambahGambar'];
			$config['upload_path'] = FCPATH . 'assets/dub_user/images/paket/';
			$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
			$config['encrypt_name'] = true;
			for($i = 0; $i < $number_of_files; $i++){
				$_FILES['tambahGambar']['name'] = $files['name'][$i];
				$_FILES['tambahGambar']['type'] = $files['type'][$i];
				$_FILES['tambahGambar']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['tambahGambar']['error'] = $files['error'][$i];
				$_FILES['tambahGambar']['size'] = $files['size'][$i];
				$this->upload->initialize($config);
				if($this->upload->do_upload('tambahGambar')){
					$dataImage = $this->upload->data();
					chmod($dataImage['full_path'], 0777);
					$insert[$i]['id_paket'] = $condition['id_paket'];
					$insert[$i]['img'] = $dataImage['file_name'];
				}
				else {
					redirect('admin/paket');
				}
			}
			$this->db->insert_batch('img_paket', $insert);
		}
		redirect('admin/paket');
	}
	public function hapus_paket_db($id){
		$this->travel_model->hapus_paket($id);
		redirect('admin/paket');
	}
	public function hapus_img_paket_db($id){
		$this->travel_model->hapus_img_paket($id);
		redirect('admin/paket');
	}
	// daerah
	function tambah_daerah() {
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['dataDaerah'] = $this->travel_model->ambil_data_daerah();
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/tambah_daerah', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	function tambah_daerah_db() {
		$id_daerah = uniqid();
		$data = array(
			'id_daerah' => $id_daerah,
			'daerah' => $this->input->post('daerahBaru'),
			'alamat' => $this->input->post('alamatBaru'),
			'deskripsi' => $this->input->post('deskBaru')
		);
		$this->db->insert('daerah', $data);

		if(!empty($_FILES['gambarBaru']['name'])){
			$number_of_files = sizeof($_FILES['gambarBaru']['tmp_name']);
			$files = $_FILES['gambarBaru'];
			$config['upload_path'] = FCPATH . 'assets/dub_user/images/hotel/';
			$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
			$config['encrypt_name'] = true;
			for($i = 0; $i < $number_of_files; $i++){
				$_FILES['gambarBaru']['name'] = $files['name'][$i];
				$_FILES['gambarBaru']['type'] = $files['type'][$i];
				$_FILES['gambarBaru']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['gambarBaru']['error'] = $files['error'][$i];
				$_FILES['gambarBaru']['size'] = $files['size'][$i];
				$this->upload->initialize($config);
				if($this->upload->do_upload('gambarBaru')){
					$dataImage = $this->upload->data();
					chmod($dataImage['full_path'], 0777);
					$insert[$i]['id_daerah'] = $id_daerah;
					$insert[$i]['img'] = $dataImage['file_name'];
				}
				else{
					redirect('admin/daerah');
				}
			}
			$this->db->insert_batch('img_daerah', $insert);
		redirect('admin/daerah');
		}
	}
	public function edit_daerah($id){
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['daerah'] = $this->travel_model->ambil_daerah($id);
			$data['img_daerah'] = $this->travel_model->ambil_img_daerah($id);
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/edit_daerah', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	public function edit_daerah_db(){
		$data = array(
			'daerah' => $this->input->post('editDaerah'),
			'alamat' => $this->input->post('editAlamat'),
			'deskripsi' => $this->input->post('editDesk')
		);
		$condition['id_daerah'] = $this->input->post('editId');
		$this->travel_model->edit_daerah($data,$condition);


		if(!empty($_FILES['tambahGambar']['name'])){
			$number_of_files = sizeof($_FILES['tambahGambar']['tmp_name']);
			$files = $_FILES['tambahGambar'];
			$config['upload_path'] = FCPATH . 'assets/dub_user/images/hotel/';
			$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
			$config['encrypt_name'] = true;
			for($i = 0; $i < $number_of_files; $i++){
				$_FILES['tambahGambar']['name'] = $files['name'][$i];
				$_FILES['tambahGambar']['type'] = $files['type'][$i];
				$_FILES['tambahGambar']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['tambahGambar']['error'] = $files['error'][$i];
				$_FILES['tambahGambar']['size'] = $files['size'][$i];
				$this->upload->initialize($config);
				if($this->upload->do_upload('tambahGambar')){
					$dataImage = $this->upload->data();
					chmod($dataImage['full_path'], 0777);
					$insert[$i]['id_daerah'] = $condition['id_daerah'];
					$insert[$i]['img'] = $dataImage['file_name'];
				}
				else {
					redirect('admin/daerah');
				}
			}
			$this->db->insert_batch('img_daerah', $insert);
		}
		redirect('admin/daerah');
	}
	public function hapus_daerah_db($id){
		$this->travel_model->hapus_daerah($id);
		redirect('admin/daerah');
	}
	public function hapus_img_daerah_db($id){
		$this->travel_model->hapus_img_daerah($id);
		redirect('admin/daerah');
	}
	// hotel
	function tambah_hotel() {
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['dataHotel'] = $this->travel_model->ambil_data_hotel();
			$data['dataDaerah'] = $this->travel_model->ambil_data_daerah();
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/tambah_hotel', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	function tambah_hotel_db() {
		$data = array(
			'id_hotel' => uniqid(),
			'id_daerah' => $this->input->post('selectDaerah'),
			'nama' => $this->input->post('hotelBaru'),
			'bintang' => $this->input->post('selectBintang')
		);
		$tmbHtl = $this->db->insert('hotel', $data);
		redirect('admin/hotel');  
	}
	function tambah_kamar_db() {
	    $id_hotel = $_POST['tmbIdHotel'];
	    $id_daerah = $_POST['tmbIdDaerah'];
	    $nm = $_POST['kmrBaru'];
	    $low = $_POST['lowBaru'];
	    $peak = $_POST['peakBaru'];
	    $high = $_POST['highBaru'];
	    $data = array();
	    $index = 0;
	    foreach($nm as $dataKamar){
	      	array_push($data, array(
		        'id_hotel'=>$id_hotel,
		        'id_daerah'=>$id_daerah,
		        'kamar'=>$nm[$index],
		        'low'=>$low[$index],
		        'peak'=>$peak[$index],
		        'high'=>$high[$index],
	      	));
		      
	      	$index++;
	    }
		$this->db->insert_batch('kmr_hotel', $data);
		redirect('admin/hotel');  
	}
	public function edit_hotel($id){
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['dataDaerah'] = $this->travel_model->ambil_data_daerah();
			$data['hotel'] = $this->travel_model->ambil_hotel($id);
			$data['kamar'] = $this->travel_model->ambil_kamar($id);
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/edit_hotel', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	public function edit_hotel_db(){
		$data = array(
			'id_daerah' => $this->input->post('editDaerah'),
			'nama' => $this->input->post('editNama'),
			'bintang' => $this->input->post('editBintang')
		);
		$condition['id_hotel'] = $this->input->post('editId');
		$this->travel_model->edit_hotel($data,$condition);
		redirect('admin/hotel');
	}
	public function edit_kamar_db(){
		$data = array(
			'kamar' => $this->input->post('modal_kamar'),
			'low' => $this->input->post('modal_low'),
			'peak' => $this->input->post('modal_peak'),
			'high' => $this->input->post('modal_high'),
		);
		$condition['id'] = $this->input->post('modal_id');
		$this->travel_model->edit_kamar($data,$condition);
		redirect('admin/hotel');
	}
	public function hapus_hotel_db($id){
		$this->travel_model->hapus_hotel($id);
		redirect('admin/hotel');
	}
	public function hapus_kamar_db($id){
		$this->travel_model->hapus_kamar($id);
		redirect('admin/hotel');
	}
	// blog
	function tambah_blog() {
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['dataBlog'] = $this->travel_model->ambil_data_blog();
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/tambah_blog', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	private function _uploadImageBlog(){
		$config['upload_path'] = FCPATH . 'assets/dub_user/images/blog/';
		$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
		$config['encrypt_name'] = true;
		$this->upload->initialize($config);
		if($this->upload->do_upload('gambarBlog')){
			$dataImageTour = $this->upload->data();
			chmod($dataImageTour['full_path'], 0777);
			return $this->upload->data('file_name');
		}
	}
	function tambah_blog_db() {
		$this->id_blog = uniqid();
		$this->judul = $this->input->post('judulBlog');
		$this->tgl = $this->input->post('tglBlog');
		$this->deskripsi = $this->input->post('deskBlog');
		$this->img = $this->_uploadImageBlog();
		$this->db->insert('blog', $this);
		redirect('admin/blog');
	}
	public function edit_blog($id){
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['blog'] = $this->travel_model->ambil_blog($id);
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/edit_blog', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	public function edit_blog_db(){
		$this->judul = $this->input->post('editJudul');
		$this->tgl = $this->input->post('editTgl');
		$this->deskripsi = $this->input->post('editDesk');
		if(!empty($_FILES['gambarBlog']['name'])){
			$this->img = $this->_uploadImageBlog();
		}
		else{
			$this->img = $this->input->post('editImg');
		}
		$condition['id_blog'] = $this->input->post('editId');
		$this->travel_model->edit_blog($this,$condition);
		redirect('admin/blog');
	}
	public function hapus_blog_db($id){
		$this->travel_model->hapus_blog($id);
		redirect('admin/blog');
	}
	// galeri
	function tambah_galeri() {
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['dataGaleri'] = $this->travel_model->ambil_data_galeri();
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/tambah_galeri', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	function tambah_galeri_db() {
		if(!empty($_FILES['galeriBaru']['name'])){
			$number_of_files = sizeof($_FILES['galeriBaru']['tmp_name']);
			$files = $_FILES['galeriBaru'];
			$config['upload_path'] = FCPATH . 'assets/dub_user/images/galeri/';
			$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
			$config['encrypt_name'] = true;
			for($i = 0; $i < $number_of_files; $i++){
				$_FILES['galeriBaru']['name'] = $files['name'][$i];
				$_FILES['galeriBaru']['type'] = $files['type'][$i];
				$_FILES['galeriBaru']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['galeriBaru']['error'] = $files['error'][$i];
				$_FILES['galeriBaru']['size'] = $files['size'][$i];
				$this->upload->initialize($config);
				if($this->upload->do_upload('galeriBaru')){
					$dataImage = $this->upload->data();
					chmod($dataImage['full_path'], 0777);
					$insert[$i]['img'] = $dataImage['file_name'];
				}
			}
			$this->db->insert_batch('galeri', $insert);
			redirect('admin/galeri');
		}
	}
	public function hapus_img_galeri_db($id){
		$this->travel_model->hapus_img_galeri($id);
		redirect('admin/galeri');
	}
	// slider
	function img_slider() {
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in)){
			redirect('admin');
	    }
	    else{
			$data['dataSlider'] = $this->travel_model->ambil_data_slider();
			$this->load->view('admin/str/meta');
			$this->load->view('admin/str/header');
			$this->load->view('admin/konten/img_slider', $data);
			$this->load->view('admin/str/footer');
	    }
	}
	function tambah_slider_db() {
		if(!empty($_FILES['sliderBaru']['name'])){
			$number_of_files = sizeof($_FILES['sliderBaru']['tmp_name']);
			$files = $_FILES['sliderBaru'];
			$config['upload_path'] = FCPATH . 'assets/dub_user/images/slider/';
			$config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
			$config['encrypt_name'] = true;
			for($i = 0; $i < $number_of_files; $i++){
				$_FILES['sliderBaru']['name'] = $files['name'][$i];
				$_FILES['sliderBaru']['type'] = $files['type'][$i];
				$_FILES['sliderBaru']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['sliderBaru']['error'] = $files['error'][$i];
				$_FILES['sliderBaru']['size'] = $files['size'][$i];
				$this->upload->initialize($config);
				if($this->upload->do_upload('sliderBaru')){
					$dataImage = $this->upload->data();
					chmod($dataImage['full_path'], 0777);
					$insert[$i]['img'] = $dataImage['file_name'];
				}
			}
			$this->db->insert_batch('slider', $insert);
			redirect('admin/slider');
		}
	}
	public function hapus_img_slider_db($id){
		$this->travel_model->hapus_img_slider($id);
		redirect('admin/slider');
	}
}
