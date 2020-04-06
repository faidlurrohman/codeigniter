
	<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
		<div class="container-fluid">
			<!-- Toggler -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Brand -->
			<a class="navbar-brand pt-0">
				<span><b>Kindi Tour & Travel</b></span>
			</a>
			<!-- User -->
			<ul class="nav align-items-center d-md-none">
				<li class="nav-item dropdown">
					<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ni ni-bold-down"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
						<a href="<?php echo base_url();?>logout" class="dropdown-item">
							<i class="ni ni-user-run"></i>
							<span>Logout</span>
						</a>
					</div>
				</li>
			</ul>
			<!-- Collapse -->
			<div class="collapse navbar-collapse" id="sidenav-collapse-main">
				<!-- Collapse header -->
				<div class="navbar-collapse-header d-md-none">
					<div class="row">
						<div class="col-6 collapse-brand">
							<a>
								<span><b>OneStopHoliday</b></span>
							</a>
						</div>
						<div class="col-6 collapse-close">
							<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
								<span></span>
								<span></span>
							</button>
						</div>
					</div>
				</div>
				<!-- Navigation -->
				<ul class="navbar-nav">
					<li class="nav-item">
					<a class="nav-link <?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" href="<?php echo base_url(); ?>dashboard"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if($this->uri->segment(1)=="cover"){echo "active";}?>" href="<?php echo base_url(); ?>cover">
							<i class="ni ni-album-2 text-pink"></i> Cover
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if($this->uri->segment(1)=="featured"){echo "active";}?>" href="<?php echo base_url(); ?>featured">
							<i class="ni ni-ui-04 text-danger"></i> Featured
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if($this->uri->segment(1)=="destinations"){echo "active";}?>" href="<?php echo base_url(); ?>destinations">
							<i class="ni ni-square-pin text-success"></i> Destinations
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if($this->uri->segment(1)=="packages"){echo "active";}?>" href="<?php echo base_url(); ?>packages">
							<i class="ni ni-archive-2 text-orange"></i> Packages
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if($this->uri->segment(1)=="transportations"){echo "active";}?>" href="<?php echo base_url(); ?>transportations">
							<i class="ni ni-send text-blue"></i> Transportations
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if($this->uri->segment(1)=="blog"){echo "active";}?>" href="<?php echo base_url(); ?>blog">
							<i class="ni ni-single-copy-04 text-yellow"></i> Blog
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if($this->uri->segment(1)=="gallery"){echo "active";}?>" href="<?php echo base_url(); ?>gallery">
							<i class="ni ni-image text-info"></i> Gallery
						</a>
					</li>
				</ul>
				<!-- Divider -->
				<hr class="my-3">
				<!-- Navigation -->
				<ul class="navbar-nav mb-md-3">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url();?>logout">
							<i class="ni ni-user-run"></i> Logout
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div style="display:none;">
			<span class="base_url"><?= base_url(); ?></span>
		</div>
	</nav>
