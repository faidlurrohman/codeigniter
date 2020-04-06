
    <section class="banner_area" data-stellar-background-ratio="0.5" style="background: url(<?php echo base_url('assets/images/bg-footer.jpg'); ?>) no-repeat fixed;">
        <h2>Blog</h2>
    </section>
			<?php
				$jumlahBlog = $dataBlog->num_rows();
				if($jumlahBlog == 0){
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
				    <section class="blog_tow_area" id="blog_area">
				        <div class="container">
				           <div class="row blog_tow_row" id="blog_area_row">
           	<?php 
					foreach($dataBlog->result() as $row){
    		?>					
				                <div class="col-md-4 col-sm-6">
				                    <div class="renovation" id="blog_area_content">
										<div style="background-image: url(<?php echo base_url('assets/dub_user/images/blog/'); ?><?= $row->img ?>); ?>); background-size: cover; background-position: center; min-height: 180px;">
										</div>
				                        <div class="renovation_content" id="blog_area_content_detail">
				                            <a class="clipboard"><i class="fa fa-clipboard" aria-hidden="true"></i></a>
				                            <a class="tittle" href="<?php echo base_url();?>blog/<?= $row->id_blog ?>"><?= $row->judul ?></a>
				                            <div class="date_comment">
				                                <a style="text-transform: capitalize;"><i class="fa fa-calendar" aria-hidden="true" style="color: #f6b60b;"></i>
				                                	<?= 
				                                		date("M-d-Y", strtotime($row->tgl));
				                                	?>
				                                </a>
				                            </div>
				                            <!-- <p style="text-align: justify;"><?= strip_tags((substr($row->deskripsi, 0, 300))) ?> . . . <a href="<?php echo base_url();?>blog/<?= $row->id_blog ?>">Selengkapnya</a></p> -->
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
