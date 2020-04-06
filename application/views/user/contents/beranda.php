<!-- Slider area -->
	<section class="slider_area row m0">
		<div class="slider_inner">
			<?php
				$jumlahSlider = $slider->num_rows();
				if($jumlahSlider == 0){
			?>
				<div data-thumb="<?php echo base_url('assets/dub_user/images/slider.png'); ?>" data-src="<?php echo base_url('assets/dub_user/images/slider.png'); ?>">
				</div>
				<div data-thumb="<?php echo base_url('assets/dub_user/images/slider.png'); ?>" data-src="<?php echo base_url('assets/dub_user/images/slider.png'); ?>">
				</div>
				<div data-thumb="<?php echo base_url('assets/dub_user/images/slider.png'); ?>" data-src="<?php echo base_url('assets/dub_user/images/slider.png'); ?>">
				</div>
			<?php
				}
				else{
			?>
    		<?php 
					foreach($slider->result() as $row){
    		?>
						<div data-thumb="<?php echo base_url('assets/dub_user/images/slider/'); ?><?= $row->img ?>" data-src="<?php echo base_url('assets/dub_user/images/slider/'); ?><?= $row->img ?>">
						</div>
			<?php
					}
				}
			?>	
		</div>
	</section>
	<!-- End Slider area -->

	<!-- About Us Area -->
	<section class="about_us_area row">
		<div class="container">
			<div class="tittle wow fadeInUp">
				<h2>Liburan di Lombok dengan lebih menyenangkan?</h2>
				<h4>Kinara Tour & Travel memberikan anda berbagai banyak pilihan paket tour terbaik di pulau Lombok, dengan layanan kelas VIP dengan harga yang terjangkau, dapatkan diskon dan promo terbaru kami.</h4>
			</div>
			<div class="row about_row">
				<div class="who_we_area col-md-12 col-sm-12">
					<center>
						<a href="https://wa.me/6281249924049?text=Hello,%20saya%20mau%20nanya-nanya%20dan%20mau%20booking%20di%20Kinara%20Travel" class="button_all">Respon Cepat Via Whatsapp</a>
					</center>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Us Area -->

	<!-- What ew offer Area -->
	<section class="what_we_area row">
		<div class="container">
			<div class="tittle wow fadeInUp">
				<h2>Kinara Tour & Travel Menawarkan</h2>
				<h4>Daftar harga tour dan paket yang kami tawarkan bisa berubah sewaktu-waktu, terima kasih atas pengertiannya. selamat menikmati liburan di lombok yang menyenangkan bersama kami.</h4>
			</div>
			<?php
				$jumlahTour = $dataTour->num_rows();
				if($jumlahTour == 0){
			?>
				<div class="row construction_iner">
					<center>
						<img src="<?php echo base_url('assets/dub_user/images/srry.png'); ?>" alt="">
					</center>
				</div>
			<?php
				}
				else{
			?>
						<div class="row construction_iner">
    		<?php 
					foreach($dataTour->result() as $row){
    		?>						
							<div class="col-md-4 col-sm-6 construction">
							   <div class="cns-img">
									<img src="<?php echo base_url('assets/dub_user/images/tour/'); ?><?= $row->img ?>" alt="">
							   </div>
							   <div class="cns-content">
									<i class="fa fa-camera" aria-hidden="true"></i>
									<a href="<?php echo base_url();?>tour/<?= $row->id_tour ?>"><?= $row->kategori ?></a>
							   </div>
							</div>
			<?php
					}
			?>			
						</div>
			<?php
				}
			?>	
		</div>
	</section>
	<!-- End What ew offer Area --> 	
<!-- End Our Partners Area -->
