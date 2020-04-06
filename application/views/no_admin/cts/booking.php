		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(assets/images/contact-us.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
			   						<h2>onestopholiday</h2>
				   					<h1>Booking</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
						<form id="reservationForm" method="post" onsubmit="return validateForm();">
							<div class="row form-group">
								<div class="col-md-6 padding-bottom">
									<label for="fname_booking">First Name</label>
									<input type="text" id="fname_booking" name="fname_booking" class="form-control" placeholder="Your firstname" required>
								</div>
								<div class="col-md-6">
									<label for="lname_booking">Last Name</label>
									<input type="text" id="lname_booking" name="lname_booking" class="form-control" placeholder="Your lastname" required>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-6 padding-bottom">
									<label for="email_booking">Email</label>
									<input type="email" id="email_booking" name="email_booking" class="form-control" placeholder="Your email address" required>
								</div>
								<div class="col-md-6">
									<label for="tlp">Phone Number</label>
										<input type="text" id="tlp_booking" name="tlp_booking" class="form-control" placeholder="Your phone number" required>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-4 padding-bottom">
									<label for="package_booking">Package</label>
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
								<div class="col-md-4 padding-bottom">
									<label for="price_booking">Price</label>
									<input style="background-color: transparent !important;" type="text" name="price_booking" id="price_booking" class="form-control" value="0" readonly>
								</div>
								<div class="col-md-4">
									<label for="tlp">Max Guest</label>
                  					<select name="guest_booking" id="guest_booking" class="form-control" required>
			                        	<option disabled selected>No Selected</option>
			                      	</select>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="description_booking">Description</label>
									<textarea id="description_booking" name="description_booking" cols="30" rows="10" class="form-control" placeholder="*optional"></textarea>
								</div>
							</div>
							<div class="form-group text-center">
	                  			<input type="button" name="submit" id="submitBooking" value="Booking Now" data-toggle="modal" data-target="#confirm-booking" class="btn btn-primary">
							</div>
						</form>		
					</div>
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Contact Information</h3>
						<div class="row contact-info-wrap" style="margin-bottom: 0 !important;">
							<div class="col-md-12">
								<p>Please call the number below to get a faster answer. All booking data that you enter will be sent directly to our e-mail address listed below.</p>
							</div>
							<div class="col-md-12">
								<p><span><i class="icon-location"></i></span>Terusan Bung Hatta, Gg. Mandala III No 3 Monjok, Mataram Nusa Tenggara Barat</p>
							</div>
							<div class="col-md-12">
								<p><span><i class="icon-inbox"></i></span>kindi.subarkah@gmail.com</p>
							</div>
							<div class="col-md-12">
								<p><span><i class="icon-phone3"></i></span>+6281249924049</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- modal payment -->
		<div class="modal fade" id="confirm-booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-sm">
		        <div class="modal-content">
			      	<div class="modal-header" text-center>
				        <h5 class="modal-title">Send Booking Via :</h5>
			      	</div>
		            <div class="modal-body" style="padding: 0px 0px 15px 0px !important;">
						<form method="post" action="<?php echo base_url()?>user/email" class="colorlib-form">
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
						<form method="post" action="<?php echo base_url()?>user/whatsapp" class="colorlib-form">
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
