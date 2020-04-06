	<div class="main-content">
		<div class="header bg-gradient-primary pb-8 pt-5">
			<div class="container-fluid">
				<div class="header-body">
					<!-- Card stats -->
					<div class="row">
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Destinations</h5>
											<span class="h2 font-weight-bold mb-0"><?= $destinations; ?></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-danger text-white rounded-circle shadow">
												<i class="fas fa-map-marker"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Packages</h5>
											<span class="h2 font-weight-bold mb-0"><?= $packages; ?></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-success text-white rounded-circle shadow">
												<i class="fas fa-archive"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Blog</h5>
											<span class="h2 font-weight-bold mb-0"><?= $blogs; ?></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
												<i class="fas fa-rss"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Gallery</h5>
											<span class="h2 font-weight-bold mb-0"><?= $gallerys; ?></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-info text-white rounded-circle shadow">
												<i class="fas fa-image"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid mt--7">
			<div class="row">
				<div class="col-xl-6 mb-5 mb-xl-4">
					<div class="card shadow">
						<div class="card-header border-0">
							<div class="row align-items-center">
								<div class="col">
									<h3 class="mb-0">Destinations</h3>
								</div>
								<div class="col text-right">
									<a href="<?php echo base_url(); ?>destinations" class="btn btn-sm btn-primary">See all</a>
								</div>
							</div>
						</div>
						<?php
							if($destinations_tbl->num_rows() == 0){
						?>
							<center>
								<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:25%; margin-bottom: 50px; margin-top: 30px;">
							</center>
						<?php
							}
							else{
						?>
						<div class="table-responsive">
							<!-- Projects table -->
							<table class="table align-items-center table-flush">
								<thead class="thead-light">
									<tr>
					                    <th scope="col">Name of Destination</th>
									</tr>
								</thead>
								<tbody>
							<?php
								foreach ($destinations_tbl->result() as $destination_tbl){
							?>
		                  			<tr>
		                    			<td style="text-transform: capitalize;">		
					                      	<?= $destination_tbl->name ?>
		                    			</td>
		                  			</tr>
							<?php
									}
							?>
								</tbody>
							</table>
						</div>
		            	<?php
		            		}
		            	?>
					</div>
				</div>
				<div class="col-xl-6 mb-5 mb-xl-4">
					<div class="card shadow">
						<div class="card-header border-0">
							<div class="row align-items-center">
								<div class="col">
									<h3 class="mb-0">Packages</h3>
								</div>
								<div class="col text-right">
									<a href="<?php echo base_url(); ?>packages" class="btn btn-sm btn-primary">See all</a>
								</div>
							</div>
						</div>
						<?php
							if($packages_tbl->num_rows() == 0){
						?>
							<center>
								<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:25%; margin-bottom: 50px; margin-top: 30px;">
							</center>
						<?php
							}
							else{
						?>
						<div class="table-responsive">
							<!-- Projects table -->
							<table class="table align-items-center table-flush">
								<thead class="thead-light">
									<tr>
					                    <th scope="col">Name</th>
					                    <th scope="col">Destination</th>
					                    <th scope="col">Duration</th>
					                    <th scope="col">Price</th>
									</tr>
								</thead>
								<tbody>
							<?php
								foreach ($packages_tbl->result() as $package_tbl){
							?>
	                  			<tr>
	                    			<td style="text-transform: capitalize;">		
				                      	<?= $package_tbl->name ?>
	                    			</td>
								<?php
									foreach ($destinations_all->result() as $destination_all){
										if($package_tbl->destination_id == $destination_all->id){
								?>
	                    			<td style="text-transform: capitalize;">		
				                      	<?= $destination_all->name ?>
	                    			</td>
								<?php
										}
									}
								?>
	                    			<td style="text-transform: capitalize;">
	                      				<?= $package_tbl->duration . ' Days'?>
	                    			</td>
				                    <td style="text-transform: capitalize;">
				                      	<?= number_format($package_tbl->price) ?>
	                    			</td>
	                  			</tr>
							<?php
									}
							?>
								</tbody>
							</table>
						</div>
		            	<?php
		            		}
		            	?>
					</div>
				</div>
				<div class="col-xl-6 mb-5 mb-xl-4">
					<div class="card shadow">
						<div class="card-header border-0">
							<div class="row align-items-center">
								<div class="col">
									<h3 class="mb-0">Transportations</h3>
								</div>
								<div class="col text-right">
									<a href="<?php echo base_url(); ?>transportations" class="btn btn-sm btn-primary">See all</a>
								</div>
							</div>
						</div>
						<?php
							if($transportations_tbl->num_rows() == 0){
						?>
							<center>
								<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:25%; margin-bottom: 50px; margin-top: 30px;">
							</center>
						<?php
							}
							else{
						?>
						<div class="table-responsive">
							<!-- Projects table -->
							<table class="table align-items-center table-flush">
								<thead class="thead-light">
									<tr>
					                    <th scope="col">Name</th>
					                    <th scope="col">Duration</th>
					                    <th scope="col">Price</th>
					                    <th scope="col">Max Guest</th>
									</tr>
								</thead>
								<tbody>
							<?php
								foreach ($transportations_tbl->result() as $transportation_tbl){
							?>
	                  			<tr>
	                    			<td style="text-transform: capitalize;">		
				                      	<?= $transportation_tbl->name ?>
	                    			</td>
	                    			<td style="text-transform: capitalize;">
	                      				<?= $transportation_tbl->duration . ' Days'?>
	                    			</td>
				                    <td style="text-transform: capitalize;">
				                      	<?= number_format($transportation_tbl->price) ?>
	                    			</td>
				                    <td style="text-transform: capitalize;">
				                    	<?= $transportation_tbl->max_guest . ' Guest' ?>
	                    			</td>
	                  			</tr>
							<?php
									}
							?>
								</tbody>
							</table>
						</div>
		            	<?php
		            		}
		            	?>
					</div>
				</div>
				<div class="col-xl-6 mb-5 mb-xl-4">
					<div class="card shadow">
						<div class="card-header border-0">
							<div class="row align-items-center">
								<div class="col">
									<h3 class="mb-0">Blog</h3>
								</div>
								<div class="col text-right">
									<a href="<?php echo base_url(); ?>blog" class="btn btn-sm btn-primary">See all</a>
								</div>
							</div>
						</div>
						<?php
							if($blogs_tbl->num_rows() == 0){
						?>
							<center>
								<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:25%; margin-bottom: 50px; margin-top: 30px;">
							</center>
						<?php
							}
							else{
						?>
						<div class="table-responsive">
							<!-- Projects table -->
							<table class="table align-items-center table-flush">
								<thead class="thead-light">
									<tr>
					                    <th scope="col">Title</th>
					                    <th scope="col">Date</th>
									</tr>
								</thead>
								<tbody>
							<?php
								foreach ($blogs_tbl->result() as $blog_tbl){
							?>
	                  			<tr>
	                    			<td style="text-transform: capitalize;">		
				                      	<?= $blog_tbl->title ?>
	                    			</td>
	                    			<td style="text-transform: capitalize;">
								    	<?php
											$dates = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
				        					$dateSplit = explode("/", $blog_tbl->date);
											$fixDate = $dates[$dateSplit[0]+=0-1] . " " . $dateSplit[1] .", ". $dateSplit[2];
										?>
	                      				<?= $fixDate ?>
	                    			</td>
	                  			</tr>
							<?php
									}
							?>
								</tbody>
							</table>
						</div>
		            	<?php
		            		}
		            	?>
					</div>
				</div>
			</div>
			<!-- Footer -->
			<footer class="footer">
				<div class="row align-items-center justify-content-xl-between">
				</div>
			</footer>
		</div>
