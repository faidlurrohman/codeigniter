
    <section class="banner_area" data-stellar-background-ratio="0.5" style="background: url(<?php echo base_url('assets/images/bg-footer.jpg'); ?>) no-repeat fixed;">
        <h2>Hotel Lombok</h2>
    </section>
			<?php
				$jumlahDaerah = $dataDaerah->num_rows();
				if($jumlahDaerah == 0){
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
				           <div class="row blog_tow_row">
           	<?php 
					foreach($dataDaerah->result() as $row){
    		?>					
				                <div class="col-md-4 col-sm-6">
				                    <div class="renovation">
							           	<?php 
											foreach($dataImg->result() as $rowImg){
												if($rowImg->id_daerah == $row->id_daerah){
							    		?>				

													<div style="background-image: url(<?php echo base_url('assets/dub_user/images/hotel/'); ?><?= $rowImg->img ?>); ?>); background-size: cover; background-position: center; min-height: 180px;">
													</div>
										<?php
													break;
												}
											}
										?>		
				                        <div class="renovation_content">
				                            <a class="clipboard"><i class="fa fa-hotel" aria-hidden="true"></i></a>
				                            <a class="tittle" href="<?php echo base_url();?>hotel/<?= $row->id_daerah ?>">Hotel <?= $row->daerah ?></a>
				                            <div class="date_comment">
				                                <a style="text-transform: capitalize;"><i class="fa fa-map-pin" aria-hidden="true" style="color: #f6b60b;"></i><?= $row->alamat ?></a>
				                            </div>
				                        </div>
				                    </div>
				                </div>	
			<?php
					}
			?>			
				           </div>
				        </div>
				    </section>
			<?php
				}
			?>
