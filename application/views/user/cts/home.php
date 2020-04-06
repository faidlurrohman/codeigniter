	<?php if($this->session->flashdata('msg')) : ?>
    	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg');?>"></div>
    <?php endif; ?>

	<?php
		$cek_cover = $cover->num_rows();
		if($cek_cover == 0){
	?>
   	<div class="hero-wrap js-fullheight" style="background-image: url(<?php echo base_url('assets/images/bg_1.jpg'); ?>);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
      	<div class="container">
        	<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          		<div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            		<p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Travel to the any corner of the world, without going around in circles</p>
            		<h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Make Your Tour Amazing With Us!</h1>
          		</div>
        	</div>
      	</div>
    </div>
   	<?php
   		}
   		else{
   			foreach ($cover->result() as $image_cover) {
   	?>
   	<div class="hero-wrap js-fullheight" style="background-image: url(<?= base_url('assets/admin/img/cover/'); ?><?= $image_cover->name_image ?>);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
      	<div class="container">
        	<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          		<div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            		<p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Travel to the any corner of the world, without going around in circles</p>
            		<h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Make Your Tour Amazing With Us!</h1>
          		</div>
        	</div>
      	</div>
    </div>
   	<?php

   			}
   		}
   	?>	

    <section class="ftco-section ftco contact-section" style="padding-top: 3em !important; padding-bottom: 0 !important;">
      	<div class="container">
    		<div class="row justify-content-center pb-4">
	          	<div class="col-md-12 heading-section text-center ftco-animate">
		            <h2 class="mb-4">Why Choose Us?</h2>
	          	</div>
        	</div>
	        <div class="row d-flex contact-info">
		        <div class="col-md-3 d-flex">
		          	<div class="align-self-stretch box p-4 text-center">
		          		<div class="icon d-flex align-items-center justify-content-center">
		          			<span class="flaticon-tour-guide" style="font-size: 45px;"></span>
		          		</div>
			            <p>A Talented and Experienced Team</p>
			        </div>
		        </div>
		        <div class="col-md-3 d-flex">
		          	<div class="align-self-stretch box p-4 text-center">
		          		<div class="icon d-flex align-items-center justify-content-center">
		          			<span class="flaticon-route" style="font-size: 45px;"></span>
		          		</div>
			            <p>Best Destination in Indonesia</p>
			        </div>
		        </div>
		        <div class="col-md-3 d-flex">
		          	<div class="align-self-stretch box p-4 text-center">
		          		<div class="icon d-flex align-items-center justify-content-center">
		          			<span class="flaticon-sun-umbrella" style="font-size: 45px;"></span>
		          		</div>
			            <p>Bring Comfort During Your Trip</p>
			        </div>
		        </div>
		        <div class="col-md-3 d-flex">
		          	<div class="align-self-stretch box p-4 text-center">
		          		<div class="icon d-flex align-items-center justify-content-center">
		          			<span class="flaticon-mountains" style="font-size: 45px;"></span>
		          		</div>
			            <p>Documentation Everything</p>
			        </div>
	          	</div>
	        </div>
	    </div>
    </section>

	<?php
		$ttl_feat = $featured_data->num_rows();
		$ttl_dest = $destination_data->num_rows();
		$ttl_blog = $blog_data->num_rows();
		if($ttl_feat > 0){
	?>
    <section class="ftco-section" style="padding-top: 3em !important; padding-bottom: 0 !important;">
    	<div class="container">
    		<div class="row justify-content-center pb-4">
		        <div class="col-md-12 heading-section text-center ftco-animate">
		            <h2 class="mb-4">Featured Tours</h2>
		        </div>
	        </div>
	        <div class="row">
	        	<?php 
	        		foreach ($featured_data->result() as $featured_get) {
	        	?>
	        	<div class="col-md-4 ftco-animate">
	        		<div class="project-wrap">
	        			<a class="img" style="background-image: url(<?= base_url('assets/admin/img/packages/'); ?><?= $featured_get->image ?>);"></a>
	        			<div class="text p-4">
	        				<span class="price">IDR <?=	number_format($featured_get->price) ?></span>
	        				<span class="days"><?= $featured_get->max_guest ?> Guest (MAX)</span>
	        				<h3 style="margin-bottom: 0;"><a href="<?= base_url(); ?>content/choose-tours/<?= $featured_get->package_id ?>" style="text-transform: capitalize;"><?= $featured_get->name ?></a></h3>
	        				<p class="location" style="margin-bottom: 0;"><?= $featured_get->duration ?> Days Tour</p>
	        			</div>
	        		</div>
	        	</div>
	        	<?php 
	        		}
	        	?>
	        </div>
    	</div>
    </section>
    <?php
		}
		if($ttl_dest > 0){
	?>
	<section class="ftco-section" style="padding-top: 3em !important; padding-bottom: 0 !important;">
    	<div class="container">
    		<div class="row justify-content-center pb-4">
	          	<div class="col-md-12 heading-section text-center ftco-animate">
	            	<h2 class="mb-4">Best Destination</h2>
	          	</div>
        	</div>
	        <div class="row">
	        	<?php 
	        		foreach ($destination_data->result() as $destination_get) {
	        	?>
	        	<div class="col-md-4 ftco-animate">
	        		<div class="project-destination" style="margin-bottom: 1em !important;">
	        			<a href="<?= base_url(); ?>content/choose-destinations/<?= $destination_get->id ?>" class="img" style="background-image: url(<?= base_url('assets/admin/img/destinations/'); ?><?= $destination_get->image ?>);">
	        				<div class="text">
	        					<h3 style="text-transform: capitalize; font-weight: 600 !important;"><?= $destination_get->name ?></h3>
					        	<?php 
					        		$jml = 0;
					        		foreach ($packages_data->result() as $package_get) {
					        			if($package_get->destination_id == $destination_get->id){
					        				$jml++;
					        			}
					        		}
					        	?>
								<span><?= $jml; ?> Tours</span>
	        				</div>
	        			</a>
	        		</div>
	        	</div>
	        	<?php 
	        		}
	        	?>
	        </div>
    	</div>
    </section>
    <?php
		}
		if($ttl_blog > 0){
	?>
    <section class="ftco-section" style="padding-top: 3em !important; padding-bottom: 0 !important;">
      	<div class="container">
      		<div class="row justify-content-center pb-4">
          		<div class="col-md-12 heading-section text-center ftco-animate">
            		<h2 class="mb-4">Recent Post</h2>
          		</div>
        	</div>
        	<div class="row d-flex">
	        	<?php 
					$ttl_recent = 1;
	        		foreach (array_reverse($blog_data->result()) as $blog_get) {
						$dates = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    					$dateSplit = explode("/", $blog_get->date);
	        	?>
          		<div class="col-md-4 ftco-animate">
          			<div class="blog-entry justify-content-end">
			            <a class="block-20" style="background-image: url(<?= base_url('assets/admin/img/blogs/'); ?><?= $blog_get->image ?>);">
			            </a>
		              	<div class="text mt-3 float-right d-block">
		              		<div class="d-flex align-items-center mb-4 topp">
		              			<div class="one">
			              			<span class="day"><?= $dateSplit[1] ?></span>
		              			</div>
		              			<div class="two">
		              				<span class="yr"><?= $dateSplit[2] ?></span>
		              				<span class="mos"><?= $dates[$dateSplit[0]-1] ?></span>
		              			</div>
		              		</div>
		                	<h3 class="heading"><a href="<?= base_url(); ?>content/choose-blog/<?= $blog_get->blog_id ?>" style="text-transform: capitalize;"><?= $blog_get->title ?></a></h3>
                			<p><?= strip_tags((substr($blog_get->description, 0, 250))) ?> . . .</p>
		              	</div>
            		</div>
          		</div>
	        	<?php 
						if($ttl_recent == 3){
							break;
						}
						$ttl_recent++;
	        		}
	        	?>
        	</div>
      	</div>
    </section>
	<?php
		}
		if($ttl_feat == 0 && $ttl_dest == 0 && $ttl_blog == 0){
	?>
		<center>
			<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:50%; margin-bottom: 50px; margin-top: 50px;">
		</center>
	<?php
		}	
	?>
