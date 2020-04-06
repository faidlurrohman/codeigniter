	<div class="hero-wrap js-fullheight" style="background-image: url(<?php echo base_url('assets/images/book_bg.jpg'); ?>);" data-stellar-background-ratio="0.5">
	  <div class="overlay"></div>
	  <div class="container">
	    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
	      <div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	        <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Kindi Tour and Travel</p>
	        <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="font-weight: 300;">Booking</h1>
	      </div>
	    </div>
	  </div>
	</div>

	<section class="ftco-section contact-section" style="padding-top: 3em !important; padding-bottom: 0 !important;">
      	<div class="container">
	  		<div class="row justify-content-center pb-4">
	          	<div class="col-md-12 heading-section text-center ftco-animate">
	            	<h2 class="mb-4">Book Now!</h2>
	          	</div>
	      	</div>
	        <div class="row block-12">
	         	 <div class="col-md-12 order-md-last d-flex">
		            <form id="reservationForm" method="post" onsubmit="return validateForm();" class="bg-default p-5 contact-form" style="padding: 0 !important;">
			            <div class="row form-group">
							<div class="col-md-6 pb-3">
								<input type="text" id="fname_booking" name="fname_booking" class="form-control" placeholder="Firstname" autocomplete="off" required>
							</div>
							<div class="col-md-6">
								<input type="text" id="lname_booking" name="lname_booking" class="form-control" placeholder="Lastname" autocomplete="off" required>
							</div>
			            </div>

						<div class="row form-group">
							<div class="col-md-6 pb-3">
								<input type="email" id="email_booking" name="email_booking" class="form-control" placeholder="Email" autocomplete="off" required>
							</div>
							<div class="col-md-6">
								<input type="text" id="tlp_booking" name="tlp_booking" class="form-control" placeholder="Phone" autocomplete="off" required>
							</div>
						</div>


						<div class="row form-group">
							<div class="col-md-4 pb-3">
								<?php
									$total_packages = $packages->num_rows();
									$total_transportations = $transportations->num_rows();
									if($total_packages == 0 && $total_transportations == 0){
								?>
                      				<input type="text" readonly class="form-control" style="text-transform: capitalize;" value="No Package Available!">
								<?php
									}
									else{
								?>
                  					<select name="package_booking" id="package_booking" onchange="myFunction(event)" class="form-control" style=" text-transform: capitalize; height: 50px !important;" required>	
				                        	<option disabled selected>No Selected</option>
							    			<option style="color:#000; font-weight: bold;" disabled>Tours :</option>		
                  						<?php 
											foreach($packages->result() as $package){
							    		?>	
				                        	<option style="color:#000;" value="<?= $package->package_id ?>"><?= $package->name ?></option>
										<?php
											}
										?>
							    			<option style="color:#000; font-weight: bold;" disabled>Transportations :</option>		
										<?php
											foreach($transportations->result() as $transportation){
							    		?>					
				                        	<option style="color:#000;" value="<?= $transportation->transportation_id ?>"><?= $transportation->name ?></option>
										<?php
											}
										?>		
			                      	</select>
								<?php
									}
								?>
							</div>
              				<input type="hidden" readonly id="package_name_booking" name="package_name_booking" class="form-control" style="text-transform: capitalize;" value="">
							<div class="col-md-4 pb-3">
								<input style="background-color: transparent !important;" type="text" name="price_booking" id="price_booking" class="form-control" value="0" readonly>
							</div>
							<div class="col-md-4">
              					<select name="guest_booking" id="guest_booking" class="form-control" required>
		                        	<option disabled selected>No Selected</option>
		                      	</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<textarea id="description_booking" name="description_booking" cols="30" rows="10" class="form-control" placeholder="Description"></textarea>
							</div>
						</div>

			            <div class="form-group">
			              	<center>
			                	<input type="button" name="submit" id="submitBooking" value="Send" class="btn btn-primary py-3 px-5" data-toggle="modal" data-target="#confirm-booking">
			                </center>
		              	</div>
		            </form>
	          	</div>
	        </div>
      	</div>
    </section>

    <section class="ftco-section ftco-no-pb contact-section" style="padding-top: 3em !important; padding-bottom: 0 !important;">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-4 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
	            <p style="color: #000;">Jl. Terusan Bung Hatta Monjok Mataram Nusa Tenggara Barat.</p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
	            <p><a href="tel://6281249924049">+62 812-4992-4049</a></p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-envelope"></span>
          		</div>
	            <p><a href="mailto:kindytravel@gmail.com">kindytravel@gmail.com</a></p>
	          </div>
          </div>
        </div>
      </div>
    </section>

    <!-- modal payment -->
	<div class="modal fade" id="confirm-booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-sm">
	        <div class="modal-content">
		      	<div class="modal-header" text-center>
			        <h5 class="modal-title">Send Booking Via :</h5>
		      	</div>
	            <div class="modal-body" style="padding: 0px 0px 15px 0px !important;">
					<form method="post" action="<?php echo base_url()?>booking/email" class="colorlib-form">
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="fname_1" id="fname_1" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="lname_1" id="lname_1" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="email_1" id="email_1" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="phone_1" id="phone_1" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="package_1" id="package_1" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="price_1" id="price_1" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="guest_1" id="guest_1" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                				<textarea id="desc_1" name="desc_1" cols="30" rows="10" class="form-control" style="display: none;"></textarea>
                  				<!-- <input style="color: #000;" type="text" name="desc_1" id="desc_1" autocomplete="off" class="form-control"> -->
                			</div>
              			</div>
		                <button type="submit" class="paypal-button" style="padding: 5px 10px; border: 1px solid #4285F4; border-radius: 5px; background-color: #4285F4; margin: 0 auto; display: block; min-width: 138px; position: relative;">
						    <span class="paypal-button-title" style="font-size: 14px; font-weight: bold; color: #FFF; vertical-align: baseline;">
						      	<i class="icon-inbox"></i>&nbsp;EMAIL
						    </span>
						</button>
					</form>
					<form method="post" action="<?php echo base_url()?>booking/whatsapp" class="colorlib-form">
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="fname_2" id="fname_2" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="lname_2" id="lname_2" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="email_2" id="email_2" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="phone_2" id="phone_2" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="package_2" id="package_2" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="price_2" id="price_2" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                  				<input style="color: #000;" type="hidden" name="guest_2" id="guest_2" autocomplete="off" class="form-control">
                			</div>
              			</div>
              			<div class="form-group">
                			<div class="form-field">
                				<textarea id="desc_2" name="desc_2" cols="30" rows="10" class="form-control" style="display: none;"></textarea>
                  				<!-- <input style="color: #000;" type="text" name="desc_2" id="desc_2" autocomplete="off" class="form-control"> -->
                			</div>
              			</div>
		                <button type="submit" class="paypal-button" style="padding: 5px 10px; border: 1px solid #00E676; border-radius: 5px; background-color: #00E676; margin: 0 auto; display: block; min-width: 138px; position: relative;">
						    <span class="paypal-button-title" style="font-size: 14px; font-weight: bold; color: #FFF; vertical-align: baseline;">
						      	<i class="icon-whatsapp"></i>&nbsp;WHATSAPP
						    </span>
						</button>
					</form>
	            </div>
	            <div class="modal-footer">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">&times;</span>
			        </button>
	            </div>
	        </div>
	    </div>
	</div>
