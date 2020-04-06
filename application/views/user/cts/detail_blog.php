	<div class="hero-wrap js-fullheight" style="background-image: url(<?php echo base_url('assets/admin/img/blogs/'); ?><?= $blog->image ?>);" data-stellar-background-ratio="0.5">
	  <div class="overlay"></div>
	  <div class="container">
	    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
	      <div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	        <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Kindi Tour and Travel</p>
	        <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="font-weight: 300;"><?= $blog->title ?></h1>
	      </div>
	    </div>
	  </div>
	</div>
    <section class="ftco-section ftco-no-pt ftco-no-pb">
	    <div class="container">
		    <div class="row">
		        <div class="col-lg-12 order-md-last ftco-animate py-md-5 mt-md-5" style="padding-top: 15px;">
		            <h2 class="mb-3" style="text-transform: uppercase;"><?= $blog->title ?></h2>
					<?= $blog->description ?>
		       	</div>
		    </div>
	    </div>
    </section>
