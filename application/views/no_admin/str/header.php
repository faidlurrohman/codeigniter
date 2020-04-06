		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="<?php echo site_url(); ?>">onestopholiday</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="<?php if($this->uri->segment(1)=="home"){echo "active";}?>">
									<a href="<?php echo site_url(); ?>">Home</a>
								</li>
								<li class="<?php if($this->uri->segment(1)=="destination"){echo "active";}?>">
									<a href="<?php echo site_url(); ?>destination">Destinations</a>
								</li>
								<li class="<?php if($this->uri->segment(1)=="tours"){echo "active";}?>">
									<a href="<?php echo site_url(); ?>tours">Tours</a>
								</li>
								<li class="<?php if($this->uri->segment(1)=="transports"){echo "active";}?>">
									<a href="<?php echo site_url(); ?>transports">Transports</a>
								</li>
								<li class="<?php if($this->uri->segment(1)=="posts"){echo "active";}?>">
									<a href="<?php echo site_url(); ?>posts">Blog</a>
								</li>
								<li class="<?php if($this->uri->segment(1)=="booking"){echo "active";}?>">
									<a href="<?php echo site_url(); ?>booking">Booking</b></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
