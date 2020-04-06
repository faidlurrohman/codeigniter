	<div class="hero-wrap js-fullheight" style="background-image: url(<?php echo base_url('assets/images/dest_bg.jpg'); ?>);" data-stellar-background-ratio="0.5">
	  <div class="overlay"></div>
	  <div class="container">
	    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
	      <div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	        <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Kindi Tour and Travel</p>
	        <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="font-weight: 300;">Destinations</h1>
	      </div>
	    </div>
	  </div>
	</div>
	<?php
		$ttl_dest = $destination_data->num_rows();
		if($ttl_dest > 0){
	?>
	<section class="ftco-section" style="padding-top: 3em !important; padding-bottom: 0 !important;">
  	<div class="container">
  		<div class="row justify-content-center pb-4">
          	<div class="col-md-12 heading-section text-center ftco-animate">
            	<h2 class="mb-4">Best Place Destination</h2>
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
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
				    	<?=	$this->pagination->create_links(); ?>
            </div>
          </div>
        </div>
  	</div>
  </section>
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
