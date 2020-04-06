	<!-- blog area -->
	<section class="blog_all">
		<div class="container">
			<div class="row m0 blog_row">
				<div class="col-sm-8 main_blog">
					<div id="carouselTransport" class="carousel slide" data-ride="carousel">

					  	<!-- Indicators -->
					  	<ul class="carousel-indicators">
							<?php
								$jumlahImg = $dataImgId->num_rows();
								for($i=0; $i<$jumlahImg; $i++){
									if($i == 0){
							?>
						    		<li data-target="#carouselTransport" data-slide-to="<?= $i ?>" class="active"></li>
						    <?php
									}
									else{
							?>
						    		<li data-target="#carouselTransport" data-slide-to="<?= $i ?>"></li>
						    <?php
						    		}
								}
							?>
						</ul>
					  
					  	<!-- The slideshow -->
					  	<div class="carousel-inner">
				           	<?php
				           		$i = 0;
								foreach($dataImgId->result() as $row){
									if($i == 0){
				    		?>					
							    	<div class="item active">
							      		<img src="<?php echo base_url('assets/dub_user/images/hotel/'); ?><?= $row->img ?>">
							    	</div>
						    <?php
									}
									else{
							?>
							    	<div class="item">
							      		<img src="<?php echo base_url('assets/dub_user/images/hotel/'); ?><?= $row->img ?>">
							    	</div>
				           	<?php 
				           			}
				           			$i++;
								}
				    		?>		
					  	</div>
					  
					  	<!-- Left and right controls -->
					  	<a class="carousel-control-prev" href="#carouselTransport" data-slide="prev">
					    	<span class="carousel-control-prev-icon"></span>
					  	</a>
					  	<a class="carousel-control-next" href="#carouselTransport" data-slide="next">
					    	<span class="carousel-control-next-icon"></span>
					  	</a>
					</div>
					<div class="comment_area">
						<h3>HOTEL <?= $dataDaerahId->daerah ?></h3>
						<div class="media">
							<div class="media-body">
								<h5><i class="fa fa-map-pin" aria-hidden="true" style="color: #f6b60b;"></i>&nbsp;&nbsp;Alamat :</h5>
								<p style="text-transform: capitalize;"><?= $dataDaerahId->alamat ?></p>
							</div>
						</div>
					</div>
					<div class="col-xs-12 blog_content">
						<div class="tag">
							<?= $dataDaerahId->deskripsi ?>
							<?php 
								foreach($dataHotel->result() as $row){
							?>
									<table class="tabel-transport">
		  								<caption style="text-transform: uppercase;">
		  									<?= $row->nama ?>
		  									<?php 
		  										if($row->bintang == 1){
		  									?>
			  										&nbsp;
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
	  										<?php 
		  										}
		  										else if($row->bintang == 2){
	  										?>
			  										&nbsp;
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
	  										<?php 
		  										}
		  										else if($row->bintang == 3){
	  										?>
			  										&nbsp;
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
	  										<?php 
		  										}
		  										else if($row->bintang == 4){
	  										?>
			  										&nbsp;
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
	  										<?php 
		  										}
		  										else if($row->bintang == 5){
	  										?>
			  										&nbsp;
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
			  										<i class="fa fa-star" aria-hidden="true" style="color: #f6b60b;"></i>
	  										<?php 
		  										}
	  										?>
							      		</caption>
												  	<thead>
												    	<tr>
												      		<th scope="col">Kamar</th>
												      		<th scope="col">Low Seasson</th>
												      		<th scope="col">Peak Seasson</th>
												      		<th scope="col">High Seasson</th>
												    	</tr>
												  	</thead>
							      		<?php
							      			foreach($dataKamar->result() as $rowKamar){
							      				if($row->id_hotel == $rowKamar->id_hotel){
						      			?>
												  	<tbody>
													    <tr>
												      		<td data-label="Kamar" style="text-transform: uppercase;"><?= $rowKamar->kamar ?></td>
												      		<td data-label="Low Seasson">Rp. <?= number_format($rowKamar->low) ?></td>
												      		<td data-label="Peak Seasson">Rp. <?= number_format($rowKamar->peak) ?></td>
												      		<td data-label="High Seasson">Rp. <?= number_format($rowKamar->high) ?></td>
												    	</tr>
												  	</tbody>
										<?php 
												}
											}
										?>
									</table>
							<?php 
								}
							?>
						</div>
					</div>
                    <div class="post_comment">
                        <!-- <h3>Booking Sekarang</h3> -->
                        <form class="comment_box" action="<?php echo base_url()?>konten/send_email" method="post" enctype="multipart/form-data">
                           <div class="col-md-6">
                               <h4>Nama</h4>
                               <input type="text" style="text-transform: capitalize;" autocomplete="off" class="form-control input_box" name="emailNama" placeholder="Nama Anda" required>
                           </div>
                           <div class="col-md-6">
                               <h4>Email</h4>
                               <input type="email" autocomplete="off" class="form-control input_box" name="emailPengirim" placeholder="Email Anda" required>
                           </div>
                           <div class="col-md-6">
                               <h4>No. Tlp/HP</h4>
                               <input type="text" autocomplete="off" class="form-control input_box" name="emailHp" placeholder="No. Tlp/HP Anda" required>
                           </div>
                           <div class="col-md-6">
                               <h4>Pilihan Yang Di Boking</h4>
                               <input type="text" style="text-transform: capitalize;" autocomplete="off" class="form-control input_box" name="emailBooking" placeholder="Tour/Transport/Hotel Yang di Booking" required>
                           </div>
                           <div class="col-md-12">
                               <h4>Keterangan Tambahan</h4>
                               <textarea class="form-control input_box" style="text-transform: capitalize;" name="emailKet" placeholder="Keterangan Tambahan"></textarea>
                               <button type="submit">Booking</button>
                           </div>
                        </form>
                    </div>
				</div>
				<div class="col-sm-4 widget_area">
					<div class="resent">
						<h3 style="text-transform: uppercase;">HOTEL</h3>
						<?php 
							$jmlFor = 0;
							foreach(array_reverse($dataDaerah->result()) as $row){
						 ?>
							<div class="media">
								<div class="media-left">
									<a href="<?php echo base_url(); ?>hotel/<?= $row->id_daerah ?>">

							           	<?php 
											foreach($dataImg->result() as $rowImg){
												if($rowImg->id_daerah == $row->id_daerah){
							    		?>				
													<img class="media-object" src="<?php echo base_url('assets/dub_user/images/hotel/'); ?><?= $rowImg->img ?>" style="width: 65px !important; height: 40px !important;">
										<?php
													break;
												}
											}
										?>		
									</a>
								</div>
								<div class="media-body">
									<a style="text-transform: capitalize;" href="<?php echo base_url(); ?>hotel/<?= $row->id_daerah ?>"><b>Hotel <?= $row->daerah ?></b></a>
									<h6 style="text-transform: capitalize;"><i class="fa fa-map-pin" aria-hidden="true" style="color: #f6b60b;"></i>&nbsp;&nbsp;Alamat : <?= $row->alamat ?></h6>
								</div>
							</div>
						<?php 
								if($jmlFor == 3){
									break;
								}
								$jmlFor++;
							}
						 ?>
					</div>
					<br>
                    <div class="resent">
                        <h3 style="text-transform: uppercase;">Tour</h3>
                        <ul class="architecture">
						<?php 
							foreach($dataTour->result() as $row){
						 ?>
                            	<li><a style="text-transform: capitalize;" href="<?php echo base_url(); ?>tour/<?= $row->id_tour ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><b><?= $row->kategori ?></b></a></li>
						<?php 
							}
						?>
                        </ul>
                    </div>
                    <div class="resent">
                        <h3 style="text-transform: uppercase;">Transport</h3>
                        <ul class="architecture">
                        	<li><a style="text-transform: capitalize;" href="<?php echo base_url(); ?>sewa-mobil"><i class="fa fa-arrow-right" aria-hidden="true"></i><b>sewa mobil</b></a></li>
                        	<li><a style="text-transform: capitalize;" href="<?php echo base_url(); ?>sewa-bus"><i class="fa fa-arrow-right" aria-hidden="true"></i><b>sewa bus</b></a></li>
                        	<li><a style="text-transform: capitalize;" href="<?php echo base_url(); ?>sewa-glass-bottom"><i class="fa fa-arrow-right" aria-hidden="true"></i><b>sewa glass bottom</b></a></li>
                        	<li><a style="text-transform: capitalize;" href="<?php echo base_url(); ?>sewa-speed-boat"><i class="fa fa-arrow-right" aria-hidden="true"></i><b>sewa speed boat</b></a></li>
                        	<li><a style="text-transform: capitalize;" href="<?php echo base_url(); ?>sewa-slow-boat"><i class="fa fa-arrow-right" aria-hidden="true"></i><b>sewa slow boat</b></a></li>
                        </ul>
                    </div>
				</div>
			</div>
		</div>
	</section>
	<!-- End blog area -->
