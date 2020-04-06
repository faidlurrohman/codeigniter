	
	<section class="banner_area" data-stellar-background-ratio="0.5" style="background: url(<?php echo base_url('assets/images/bg-footer.jpg'); ?>) no-repeat fixed;">
		<h2>Galeri</h2>
	</section>
	
	<?php
		$jumlahGaleri = $dataGaleri->num_rows();
		if($jumlahGaleri == 0){
	?>
		    <section class="blog_tow_area">
		        <div class="container">
		           <div class="row blog_tow_row">
						<center>
							<img src="<?php echo base_url('assets/dub_user/images/srry.png'); ?>" alt="">
						</center>
		           </div>
		        </div>
		    </section>
	<?php
		}
		else {
	?>
	<section class="blog_tow_area">
        <div class="container">
           <div class="row blog_tow_row" data-toggle="modal" data-target="#modalGaleri">
           	<?php 
           		$i = 0;
				foreach($dataGaleri->result() as $row){
    		?>					
                <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                	<div class="galeriImg" style="background-image: url(<?php echo base_url('assets/dub_user/images/galeri/'); ?><?= $row->img ?>);" data-target="#GambarGaleri" data-slide-to="<?= $i ?>">
					</div>
           		</div>
			<?php
					$i++;
				}
			?>           		
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
				foreach($dataGaleri->result() as $row){
					if($j == 0){
    		?>			
		            		<div class="item active">
		              			<img class="d-block w-100" style="max-width: 100% !important; height: 300px !important;" src="<?php echo base_url('assets/dub_user/images/galeri/'); ?><?= $row->img ?>">
		            		</div>
        		<?php
        			}
        			else{
        		?>
				            <div class="item">
				              	<img class="d-block w-100" style="max-width: 100% !important; height: 300px !important;" src="<?php echo base_url('assets/dub_user/images/galeri/'); ?><?= $row->img ?>">
				            </div>
			<?php
					}
					$j++;
				}
			?>   
		          		</div>
		      			<a class="left carousel-control" style="font-size: 50px;top: 40%; background-image: none;" href="#GambarGaleri" data-slide="prev" onclick="$('#GambarGaleri').carousel('prev')">‹</a>
						<a class="right carousel-control" style="font-size: 50px;top: 40%; background-image: none;" href="#GambarGaleri" data-slide="next" onclick="$('#GambarGaleri').carousel('next')">›</a>
		        	</div>
		      	</div>
	    	</div>
	  	</div>
	</div>
	<?php 
		}
	?>
