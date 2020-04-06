<!-- Top Header_Area -->
	<section class="top_header_area">
		<div class="container">
			<ul class="nav navbar-nav top_nav">
				<li><a><i class="fa fa-whatsapp"></i>+6281249924049</a></li>
				<li><a><i class="fa fa-phone"></i>+6281249924049</a></li>
				<li><a><i class="fa fa-envelope"></i>kindi.subarkah@gmail.com</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right social_nav">
				<li><a href="https://www.facebook.com/kindi.subarkah" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="https://www.instagram.com/kindisubarkah" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="https://twitter.com/evilloveevil" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</section>
	<!-- End Top Header_Area -->

	<!-- Header_Area -->
	<nav class="navbar navbar-default header_aera" id="main_navbar">
		<div class="container">
			<div class="col-md-2 p0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url(); ?>beranda"><img src="<?php echo base_url('assets/images/icon/logo.png'); ?>" alt=""></a>
				</div>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="col-md-10 p0">
				<div class="collapse navbar-collapse" id="min_navbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo base_url(); ?>beranda">Beranda</a></li>
						<li class="dropdown submenu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil</a>
							<ul class="dropdown-menu other_dropdwn">
								<li><a href="<?php echo base_url(); ?>kebijakan">Kebijakan</a></li>
								<li><a href="<?php echo base_url(); ?>pembayaran">Pembayaran</a></li>
								<li><a href="<?php echo base_url(); ?>syarat-dan-ketentutan">Syarat & Ketentuan</a></li>
								<li><a href="<?php echo base_url(); ?>tentang-kami">Tentang Kami</a></li>
							</ul>
						</li>
						<li class="dropdown submenu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tour</a>
							<ul class="dropdown-menu other_dropdwn">
							<?php
								$jumlahTour = $dataTour->num_rows();
								if($jumlahTour == 0){
							?>
										<li><a>Belum Ada Tour</a></li>
							<?php
								}
								else{
							?>
                    		<?php 
									foreach($dataTour->result() as $row){
                    		?>
										<li><a href="<?php echo base_url();?>tour/<?= $row->id_tour ?>"><?= $row->kategori ?></a></li>
							<?php
									}
								}
							?>	
							</ul>
						</li>
						<li><a href="<?php echo base_url(); ?>transport">Transport</a></li>
						<li><a href="<?php echo base_url(); ?>hotel">Hotel</a></li>
						<li><a href="<?php echo base_url(); ?>booking">Booking</a></li>
						<li><a href="<?php echo base_url(); ?>blog">Blog</a></li>
						<li><a href="<?php echo base_url(); ?>galeri">Galeri</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</div><!-- /.container -->
	</nav>
<!-- End Header_Area -->
