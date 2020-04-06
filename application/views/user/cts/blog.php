	<div class="hero-wrap js-fullheight" style="background-image: url(<?php echo base_url('assets/images/blog_bg.jpg'); ?>);" data-stellar-background-ratio="0.5">
	  <div class="overlay"></div>
	  <div class="container">
	    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
	      <div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	        <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Kindi Tour and Travel</p>
	        <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="font-weight: 300;">Blog</h1>
	      </div>
	    </div>
	  </div>
	</div>

	<?php
		$ttl_blog = $blogs->num_rows();
		if($ttl_blog > 0){
	?>
    <section class="ftco-section" style="padding-top: 3em !important; padding-bottom: 0 !important;">
      	<div class="container">
      		<div class="row justify-content-center pb-4">
          		<div class="col-md-12 heading-section text-center ftco-animate">
            		<h2 class="mb-4">Travel Tips & Experience</h2>
          		</div>
        	</div>
        	<div class="row d-flex">
	        	<?php 
	        		foreach (array_reverse($blogs->result()) as $blog_get) {
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
