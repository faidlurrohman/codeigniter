
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
					<?php
						$total_slider = $sliders->num_rows();
						if($total_slider == 0){
					?>
				   	<li style="background-image: url(<?= base_url('assets/images/bg1.jpg'); ?>);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
					   				<div class="slider-text-inner text-center">
					   					<h2 style="text-transform: uppercase;">Wherever you go!?</h2>
					   					<h1 style="text-transform: uppercase;">go with all your heart.</h1>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				   	<li style="background-image: url(<?= base_url('assets/images/bg2.jpg'); ?>);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
					   				<div class="slider-text-inner text-center">
					   					<h2 style="text-transform: uppercase;">Wherever you go!?</h2>
					   					<h1 style="text-transform: uppercase;">go with all your heart.</h1>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				   	<li style="background-image: url(<?= base_url('assets/images/bg3.png'); ?>);">
				   		<div class="overlay"></div>
				   		<div class="container-fluids">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
					   				<div class="slider-text-inner text-center">
					   					<h2 style="text-transform: uppercase;">Wherever you go!?</h2>
					   					<h1 style="text-transform: uppercase;">go with all your heart.</h1>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>   
				   	<?php
				   		}
				   		else{
				   			foreach ($sliders->result() as $image_slider) {
				   	?>
				   	<li style="background-image: url(<?= base_url('assets/admin/img/slider/'); ?><?= $image_slider->name_image ?>);">
				   		<div class="overlay"></div>
				   		<div class="container-fluids">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
					   				<div class="slider-text-inner text-center">
					   					<h2 style="text-transform: uppercase;">Wherever you go!?</h2>
					   					<h1 style="text-transform: uppercase;">go with all your heart.</h1>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>  
				   	<?php

				   			}
				   		}
				   	?>	
			  	</ul>
		  	</div>
		</aside>
		<?php
			$total_destinations = $destinations->num_rows();
			$total_packages = $packages->num_rows();
			$total_transportations = $transportations->num_rows();
			$total_featured = $featured->num_rows();
			if($total_destinations > 0){
		?>
		<div class="colorlib-tour colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Top Destinations in Lombok</h2>
						<p>Bringing to you handpicked experiences from the expert!.</p>
					</div>
				</div>
			</div>
			<div class="tour-wrap">
			<?php
				foreach ($destinations->result() as $showAllDestination) {
			?>
				<a href="<?= base_url(); ?>this-destination/<?= $showAllDestination->id ?>" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(<?= base_url('assets/admin/img/destinations/'); ?><?= $showAllDestination->image ?>);">
					</div>
					<span class="desc">
						<h2 style="margin-bottom: 2px !important;"><?= $showAllDestination->name ?></h2>
						<span class="city">Lombok, Nusa Tenggara Barat</span>
					</span>
				</a>
			<?php
				}
			?>
			</div>
		</div>
		<?php
			}
			if($total_featured > 0){
		?>

		<div class="colorlib-tour" style="padding-top:  0px !important; padding-bottom:  0px !important;">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box" style="margin-bottom: 3em !important;">
						<h2>Featured Tours</h2>
						<p>We love to tell our successful far far away, and we have a recommended tour service.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="f-tour">
							<div class="row row-pb-md">
								<div class="col-md-12">
									<div class="row">
										<?php
											foreach ($featured->result() as $showFeatured) {
										?>
										<div class="col-md-4 animate-box">
											<a  href="<?= base_url(); ?>tour/<?= $showFeatured->package_id ?>" class="f-tour-img" style="background-image: url(<?= base_url('assets/admin/img/packages/'); ?><?= $showFeatured->image ?>);">
												<div class="desc">
													<h3><?=	$showFeatured->name ?></h3>
													<p class="price"><span>$<?=	$showFeatured->price ?></span> <small>/ <?=	$showFeatured->max_guest ?> Guest (MAX)</small></p>
												</div>
											</a>
										</div>
										<?php
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			}
			if($total_transportations > 0){
		?>
		<div id="colorlib-hotel" style="padding-top:  0px !important; padding-bottom:  0px !important;">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Our Transportations Service</h2>
						<p>We love to tell services of our transportations.</p>
					</div>
				</div>
				<div class="row">
		<?php
				if($total_transportations <= 1){
					foreach ($transportations->result() as $showOnetransportation) {
		?>
					<div class="col-md-4 animate-box">
						<div class="item">
							<div class="hotel-entry">
								<a href="<?= base_url(); ?>transport/<?= $showOnetransportation->transportation_id ?>" class="hotel-img" style="background-image: url(<?= base_url('assets/admin/img/transportations/'); ?><?= $showOnetransportation->image ?>);">
									<p class="price"><span>$<?= $showOnetransportation->price ?></span></p>
								</a>
								<div class="desc">
									<p class="star" style="margin-bottom: 2px !important;"><span style="color: #ffdd00;"><?= $showOnetransportation->duration ?> Days</span></p>
									<h3 style="margin-bottom: 2px !important;"><a href="<?= base_url(); ?>transport/<?= $showOnetransportation->transportation_id ?>" style="text-transform: uppercase;"><?= $showOnetransportation->name ?></a></h3>
									<span class="place">Lombok, Nusa Tenggara Barat</span>
								</div>
							</div>
						</div>
					</div>
		<?php
					}
				}
				else{
		?>

					<div class="col-md-12 animate-box">
						<div class="owl-carousel">
		<?php
					foreach ($transportations->result() as $showMoretransportation) {
		?>
							<div class="item">
								<div class="hotel-entry">
									<a href="<?= base_url(); ?>transport/<?= $showMoretransportation->transportation_id ?>" class="hotel-img" style="background-image: url(<?= base_url('assets/admin/img/transportations/'); ?><?= $showMoretransportation->image ?>);">
										<p class="price"><span>$<?= $showMoretransportation->price ?></span></p>
									</a>
									<div class="desc">
										<p class="star" style="margin-bottom: 2px !important;"><span style="color: #ffdd00;"><?= $showMoretransportation->duration ?> Days</span></p>
										<h3 style="margin-bottom: 2px !important;"><a href="<?= base_url(); ?>transport/<?= $showMoretransportation->transportation_id ?>" style="text-transform: uppercase;"><?= $showMoretransportation->name ?></a></h3>
										<span class="place">Lombok, Nusa Tenggara Barat</span>
									</div>
								</div>
							</div>
		<?php
					}
		?>
						</div>
					</div>
		<?php
				}
		?>
				</div>
			</div>
		</div>
		<?php
			}
			else{
		?>
			<center>
				<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:50%; margin-bottom: 50px; margin-top: 50px;">
			</center>
		<?php
			}	
		?>
