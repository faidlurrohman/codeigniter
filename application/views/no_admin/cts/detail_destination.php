	<aside id="colorlib-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(<?= base_url('assets/admin/img/destinations/'); ?><?= $destination->image ?>);">
		   		<div class="overlay"></div>
		   		<div class="container-fluid">
		   			<div class="row">
			   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
			   				<div class="slider-text-inner text-center">
			   					<h2>onestopholiday</h2>
			   					<h1 style="text-transform: capitalize;">Welcome to <?= $destination->name ?></h1>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<?php
		$total_packagesDestination = $packagesDestination->num_rows();
		if($total_packagesDestination == 0){
	?>
			<div class="colorlib-wrap">
				<div class="container">
					<div class="row">
						<center>
							<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:50%; margin-bottom: 50px; margin-top: 50px;">
						</center>
					</div>
				</div>
			</div>
	<?php
		}
		else{
	?>

	<div class="colorlib-wrap" style="padding-bottom: 0px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12" style="padding-bottom: 30px">
					<div class="row">
						<div class="wrap-division">
							<?php
								foreach ($packagesDestination->result() as $show) {
							?>
									<div class="col-md-4 col-sm-6 animate-box">
										<div class="tour">
											<a href="<?= base_url(); ?>tour/<?= $show->package_id ?>" class="tour-img" style="background-image: url(<?= base_url('assets/admin/img/packages/'); ?><?= $show->image ?>);">
												<p class="price"><span>$<?= $show->price ?></span> <small>/ <?= $show->duration ?> Days</small></p>
											</a>
											<span class="desc">
												<h2><a href="tour-place.html"><?= $show->name ?></a></h2>
												<span class="city" style="text-transform: capitalize;"><?= $destination->name ?></span>
											</span>
										</div>
									</div>
							<?php
								}
							?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
              				<?=	$this->pagination->create_links(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		}
	?>
