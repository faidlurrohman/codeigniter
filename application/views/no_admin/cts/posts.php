	<aside id="colorlib-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(<?= base_url('assets/images/bg2.jpg'); ?>);">
		   		<div class="overlay"></div>
		   		<div class="container-fluid">
		   			<div class="row">
			   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
			   				<div class="slider-text-inner text-center">
			   					<h2>onestopholiday</h2>
			   					<h1>Blog</h1>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<?php
		$total_blogs = $blogs->num_rows();
		if($total_blogs == 0){
	?>
			<div class="colorlib-wrap">
				<div class="container">
					<div class="row">
						<center>
							<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:50%; margin-bottom: 50px; margin-top: 50px;">
						</center>
					</div>
				</div>
			</div>
	<?php
		}
		else{
	?>


	<div id="colorlib-blog" style="padding-bottom: 0px;">
		<div class="container">
			<div class="row">
				<div class="col-md-8" style="padding-bottom: 30px">
					<div class="wrap-division">
						<?php
							foreach ($blogs->result() as $blog) {
								$dates = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
	        					$dateSplit = explode("/", $blog->date);
								$fixDate = $dates[$dateSplit[0]+=0-1] . " " . $dateSplit[1] .", ". $dateSplit[2];
						?>
								<article class="animate-box">
									<div class="blog-img" style="background-image: url(<?= base_url('assets/admin/img/blogs/'); ?><?= $blog->image ?>);"></div>
									<div class="desc">
										<div class="meta">
											<p>
												<span><?= $fixDate ?></span>
											</p>
										</div>
										<h2 style="font-size: 20px !important;">
											<a href="<?= base_url(); ?>post/<?= $blog->blog_id ?>"><?= $blog->title ?></a>
										</h2>
										<?= strip_tags((substr($blog->description, 0, 350))) ?> . . .
									</div>
								</article>
						<?php
							}
						?>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
              				<?=	$this->pagination->create_links(); ?>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="sidebar-wrap">
						<div class="side animate-box">
							<h3 class="sidebar-heading">Recent Post</h3>
							<?php
								$ttl_recent = 0;
								foreach (array_reverse($blogs_all->result()) as $blogRecent) {
									$dates = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		        					$dateSplit = explode("/", $blogRecent->date);
									$fixDate = $dates[$dateSplit[0]+=0-1] . " " . $dateSplit[1] .", ". $dateSplit[2];
							?>
									<div class="blog-entry-side">
										<a href="<?= base_url(); ?>post/<?= $blogRecent->blog_id ?>" class="blog-post">
											<span class="img" style="background-image: url(<?= base_url('assets/admin/img/blogs/'); ?><?= $blogRecent->image ?>);"></span>
											<div class="desc" style="padding-top: 15px;">
												<span class="date"><?= $fixDate ?></span>
												<h3><?= $blogRecent->title ?></h3>
											</div>
										</a>
									</div>
							<?php

									if($ttl_recent == 3){
										break;
									}
									$ttl_recent++;
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		}
	?>

