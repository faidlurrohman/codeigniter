	<div class="hero-wrap js-fullheight" style="background-image: url(<?php echo base_url('assets/images/gallery_bg.jpg'); ?>);" data-stellar-background-ratio="0.5">
	  <div class="overlay"></div>
	  <div class="container">
	    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
	      <div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	        <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Kindi Tour and Travel</p>
	        <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="font-weight: 300;">Gallery</h1>
	      </div>
	    </div>
	  </div>
	</div>

	<?php
		if(empty($model['photos'])){
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
		        <div class="row" data-toggle="modal" data-target="#modalGaleri">
		        	<?php 
						$i = 0;
						foreach (array_reverse($model['photos']) as $photo) {
		        	?>
		        	<div class="col-md-4 ftco-animate">
		        		<div class="project-destination" style="
		        				margin-bottom: 1em !important;
								-webkit-border-radius: 5px;
								-moz-border-radius: 5px;
								-ms-border-radius: 5px;
								border-radius: 5px;	
							    box-shadow: 0 1px 4px rgba(0,0,0,2);
			    				-webkit-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 2);
			    				-moz-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 2);
			    				-o-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 2);
			    				box-shadow: '' 0 1px 4px rgba(0, 0, 0, 2);">
		        			<div class="img" style="background-image: url(<?= base_url('assets/admin/img/gallery/'); ?><?= $photo->name_image ?>);" data-target="#GambarGaleri" data-slide-to="<?= $i ?>">
		        			</div>
		        		</div>
		        	</div>
		        	<?php 
							$i++;
		        		}
		        	?>
		        </div>
		        <div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
				    	<?=	$model['paginations']; ?>
		            </div>
		          </div>
		        </div>
		  	</div>
		</section>
		<div class="modal fade" id="modalGaleri" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  	<div class="modal-dialog modalDialogCentered" role="document">
		    	<div class="modal-content">
		      		<div class="modal-body" style="padding: 0 !important">
			        	<div id="GambarGaleri" class="carousel slide" data-ride="carousel">
			          		<div class="carousel-inner">
	           	<?php 
	           		$j = 0;
					foreach(array_reverse($model['photos']) as $photo_modal){
						if($j == 0){
	    		?>			
			            		<div class="carousel-item active">
			              			<img class="d-block w-100" src="<?php echo base_url('assets/admin/img/gallery/'); ?><?= $photo_modal->name_image ?>">
			            		</div>
	        		<?php
	        			}
	        			else{
	        		?>
					            <div class="carousel-item">
					              	<img class="d-block w-100" src="<?php echo base_url('assets/admin/img/gallery/'); ?><?= $photo_modal->name_image ?>">
					            </div>
				<?php
						}
						$j++;
					}
				?>   
			          		</div>

							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" href="#GambarGaleri" data-slide="prev" onclick="$('#GambarGaleri').carousel('prev')">
							    <span class="carousel-control-prev-icon carousel-control-prev-icon-success" style="color: red !important;"></span>
							    <span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" href="#GambarGaleri" data-slide="prev" onclick="$('#GambarGaleri').carousel('next')">
							    <span class="carousel-control-next-icon"></span>
							    <span class="sr-only">Next</span>
							</a>
			        	</div>
			      	</div>
		    	</div>
		  	</div>
		</div>
	<?php
		}
	?>
