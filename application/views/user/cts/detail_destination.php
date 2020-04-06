<div class="hero-wrap js-fullheight" style="background-image: url(<?php echo base_url('assets/admin/img/destinations/'); ?><?= $destination->image ?>);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
			<div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
			    <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Kindi Tour and Travel</p>
			    <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="text-transform: capitalize; font-weight: 300;">Welcome to <?= $destination->name ?></h1>
			</div>
		</div>
	</div>
</div>


	<?php
		$total_packagesDestination = $packagesDestination->num_rows();
		if($total_packagesDestination == 0){
	?>
		<center>
			<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:50%; margin-bottom: 50px; margin-top: 50px;">
		</center>
	<?php
		}
		else{
	?>
    <section class="ftco-section" style="padding-top: 3em !important; padding-bottom: 0 !important;">
    	<div class="container">
    		<div class="row justify-content-center pb-4">
		        <div class="col-md-12 heading-section text-center ftco-animate">
		            <h2 class="mb-4" style="text-transform: capitalize;">Best Tours in <?= $destination->name ?></h2>
		        </div>
	        </div>
	        <div class="row">
	        	<?php 
	        		foreach ($packagesDestination->result() as $package_get) {
	        	?>
	        	<div class="col-md-4 ftco-animate">
	        		<div class="project-wrap">
	        			<a class="img" style="background-image: url(<?= base_url('assets/admin/img/packages/'); ?><?= $package_get->image ?>);"></a>
	        			<div class="text p-4">
	        				<span class="price">IDR <?=	number_format($package_get->price) ?></span>
	        				<span class="days"><?= $package_get->max_guest ?> Guest (MAX)</span>
	        				<h3><a href="<?= base_url(); ?>content/choose-tours/<?= $package_get->package_id ?>" style="text-transform: capitalize;"><?= $package_get->name ?></a></h3>
	        				<p class="location"><?= $package_get->duration ?> Days Tour</p>
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
	?>
