	<div class="hero-wrap js-fullheight" style="background-image: url(<?php echo base_url('assets/images/tour_bg.jpg'); ?>);" data-stellar-background-ratio="0.5">
	  <div class="overlay"></div>
	  <div class="container">
	    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
	      <div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	        <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Kindi Tour and Travel</p>
	        <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="font-weight: 300;">Tours</h1>
	      </div>
	    </div>
	  </div>
	</div>
	<?php
		$ttl_tour = $tours_data->num_rows();
		if($ttl_tour > 0){
	?>
	<section class="ftco-section" style="padding-top: 3em !important; padding-bottom: 0 !important;">
  	<div class="container">
  		<div class="row justify-content-center pb-4">
          	<div class="col-md-12 heading-section text-center ftco-animate">
            	<h2 class="mb-4">Place to Travel</h2>
          	</div>
      	</div>
        <div class="row">
        	<?php 
        		foreach ($tours_data->result() as $tour_get) {
        	?>
        	<div class="col-md-4 ftco-animate">
        		<div class="project-wrap">
        			<a class="img" style="background-image: url(<?= base_url('assets/admin/img/packages/'); ?><?= $tour_get->image ?>);"></a>
        			<div class="text p-4">
        				<span class="price">IDR <?=	number_format($tour_get->price) ?></span>
        				<span class="days"><?= $tour_get->max_guest ?> Guest (MAX)</span>
        				<h3 style="margin-bottom: 0;"><a href="<?= base_url(); ?>content/choose-tours/<?= $tour_get->package_id ?>" style="text-transform: capitalize;"><?= $tour_get->name ?></a></h3>
        				<p class="location" style="margin-bottom: 0;"><?= $tour_get->duration ?> Days Tour</p>
        			</div>
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
