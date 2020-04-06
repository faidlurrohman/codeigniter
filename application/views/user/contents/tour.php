
    <section class="banner_area" data-stellar-background-ratio="0.5" style="background: url(<?php echo base_url('assets/images/bg-footer.jpg'); ?>) no-repeat fixed;">
        <h2><?= $dataTourSelect->kategori ?></h2>
    </section>
			<?php
				$jumlahPaket = $paket->num_rows();
				if($jumlahPaket == 0){
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
					foreach($paket->result() as $row){
    		?>					
				                <div class="col-md-3 col-sm-6">
				                    <div class="renovation">
							           	<?php 
											foreach($imgPaket->result() as $rowImg){
												if($rowImg->id_paket == $row->id_paket){
							    		?>				

													<div style="background-image: url(<?php echo base_url('assets/dub_user/images/paket/'); ?><?= $rowImg->img ?>); ?>); background-size: cover; background-position: center; min-height: 180px;">
													</div>
										<?php
													break;
												}
											}
										?>		
				                        <div class="renovation_content">
				                            <a class="clipboard"><i class="fa fa-camera" aria-hidden="true"></i></a>
				                            <a class="tittle" href="<?php echo base_url();?>paket/<?= $row->id_paket ?>"><?= $row->nama ?></a>
				                            <div class="date_comment">
				                                <a style="text-transform: capitalize;"><i class="fa fa-clock-o" aria-hidden="true" style="color: #f6b60b;"></i><?= $row->durasi ?></a>
				                            </div>
				                            <div class="date_comment" style="margin-top: -15px !important;">
				                                <a style="text-transform: capitalize;"><i class="fa fa-tag" aria-hidden="true" style="color: #f6b60b;"></i>Rp. <?= number_format($row->harga) ?></a>
				                            </div>
				                            <!-- <p><?= strip_tags((substr($row->isi, 0, 350))) ?></p> -->
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
