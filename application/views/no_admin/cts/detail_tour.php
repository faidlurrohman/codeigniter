	<aside id="colorlib-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(<?= base_url('assets/admin/img/packages/'); ?><?= $tour->image ?>);">
		   		<div class="overlay"></div>
		   		<div class="container-fluid">
		   			<div class="row">
			   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
			   				<div class="slider-text-inner text-center">
			   					<h2>onestopholiday</h2>
			   					<h1 style="text-transform: capitalize;"><?= $tour->name ?></h1>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div class="colorlib-wrap" style="padding-bottom: 0px; padding-top: 2em !important;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="wrap-division">
								<div class="row">
									<div class="col-md-12 animate-box">
										<div class="room-wrap">
											<div class="row">
												<div class="col-md-12 col-sm-6">
													<div class="desc">
														<span class="day-tour">
															<span style="color: #ffdd00;">$<?= $tour->price ?></span> 
															<small style="color: #000;">/ <?= $tour->duration ?> Days</small>
														</span>
														<h2><b><?= $tour->name ?></b></h2>
														<h5><?= $tour->max_guest ?> Guest (Max)</h5>
														<?= $tour->description ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
