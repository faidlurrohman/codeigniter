<div class="hero-wrap js-fullheight" style="background-image: url(<?php echo base_url('assets/admin/img/transportations/'); ?><?= $transport->image ?>);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
			<div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
			    <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Kindi Tour and Travel</p>
			    <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="text-transform: capitalize; font-weight: 300;"><?= $transport->name ?></h1>
			</div>
		</div>
	</div>
</div>



    <section class="ftco-section ftco-no-pt ftco-no-pb">
	    <div class="container">
		    <div class="row">
		        <div class="col-lg-12 order-md-last ftco-animate py-md-5 mt-md-5" style="padding-top: 15px;">
		            <h2 class="mb-3" style="text-transform: uppercase;"><?= $transport->name ?></h2>
					<div class="box" style="margin-bottom: 2em;
					    background-color: #f7f7f7;
					    padding: 1.5em 1.5em;
					    border-color: #ebebeb;
					    border-width: 1px;
					    border-style: solid;
					    border-radius: 15px;">
						<div class="row">
							<div class="col-md-10">
								<table>
									<tr>
										<td><h6><b>Guest</b></h6></td>
										<td><h6>&nbsp;&nbsp;:&nbsp;&nbsp;</h6></td>
										<td><h6><?= $transport->max_guest ?> Guest (Max)</h6></td>
									</tr>
									<tr>
										<td><h6><i class="icon-clock"></i><b>Duration</b></h6></td>
										<td><h6>&nbsp;&nbsp;:&nbsp;&nbsp;</h6></td>
										<td><h6><?= $transport->duration ?> Days</h6></td>
									</tr>
									<tr>
										<td><h6 style="margin: 0px !important;"><b>Price</b></h6></td>
										<td><h6 style="margin: 0px !important;">&nbsp;&nbsp;:&nbsp;&nbsp;</h6></td>
										<td><h6 style="margin: 0px !important;">IDR <?= number_format($transport->price) ?></h6></td>
									</tr>
								</table>
							</div>
							<div class="col-md-2">
              					<a href="<?php echo site_url(); ?>content/booking" style="margin-top: 1.5em; font-size: 16px;" class="btn btn-primary">Book Now!</a>
							</div>
						</div>
					</div>
					<?= $transport->description ?>
		       	</div>
		    </div>
	    </div>
    </section>
