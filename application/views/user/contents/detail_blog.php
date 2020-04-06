
	<section class="blog_all">
		<div class="container">
			<div class="row m0 blog_row">
				<div class="col-sm-8 main_blog">
					<img class="imgBlog" style="width: -webkit-fill-available;" src="<?php echo base_url('assets/dub_user/images/blog/'); ?><?= $blogDetail->img ?>">
					<div class="comment_area">
						<h3><?= $blogDetail->judul ?></h3>
						<div class="media">
							<div class="media-body">
								<h5><i class="fa fa-calendar" aria-hidden="true" style="color: #f6b60b;"></i>&nbsp;&nbsp;Tanggal :</h5>
								<p><?= $blogDetail->tgl ?></p>
							</div>
						</div>
					</div>
					<div class="col-xs-12 blog_content">
						<div class="tag">
							<?= $blogDetail->deskripsi ?>
						</div>
					</div>
				</div>
				<div class="col-sm-4 widget_area">
					<div class="resent">
						<h3 style="text-transform: uppercase;">Blog</h3>
						<?php 
							$jmlFor = 0;
							foreach(array_reverse($dataBlog->result()) as $row){
						 ?>
							<div class="media">
								<div class="media-left">
									<a href="<?php echo base_url(); ?>blog/<?= $row->id_blog ?>"><img class="media-object" src="<?php echo base_url('assets/dub_user/images/blog/'); ?><?= $row->img ?>" style="width: 65px !important; height: 40px !important;">
									</a>
								</div>
								<div class="media-body">
									<a style="text-transform: capitalize;" href="<?php echo base_url(); ?>blog/<?= $row->id_blog ?>"><b><?= $row->judul ?></b></a>
									<h6 style="text-transform: capitalize;"><i class="fa fa-calendar" aria-hidden="true" style="color: #f6b60b;"></i>&nbsp;&nbsp;Tanggal : <?= $row->tgl ?></h6>
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
