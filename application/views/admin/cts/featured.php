	<div class="main-content">
		<div class="header bg-gradient-primary pb-8 pt-5">
			<div class="container-fluid">
				<div class="header-body">
				</div>
			</div>
		</div>
    <div class="container-fluid mt--7">
		<?= $this->session->flashdata('msg');?>
      	<!-- Table -->
	    <div class="row">
	        <div class="col">
	          	<div class="card shadow">
					<?php
						$jumlah = $packages->num_rows();
						if($jumlah == 0){
					?>
						<center>
							<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:50%; margin-bottom: 50px; margin-top: 50px;">
						</center>
					<?php
						}
						else{
					?>
	            	<div class="card-header border-0">
	              		<h3 class="mb-0">Featured Packages</h3>
	            	</div>
	            	<div class="table-responsive">
	              		<table class="table align-items-center table-flush">
	                		<thead class="thead-light">
	                  			<tr>
				                    <th scope="col">Name</th>
				                    <th scope="col">Destination</th>
				                    <th scope="col">Duration</th>
				                    <th scope="col">Price</th>
				                    <th scope="col">Featured</th>
				                </tr>
	                		</thead>
	                		<tbody>
							<?php
								foreach ($packages->result() as $package){
							?>
	                  			<tr>
	                    			<td style="text-transform: capitalize;">		
				                      	<?= $package->name ?>
	                    			</td>
								<?php
									foreach ($destinations->result() as $getDestination){
										if($package->destination_id == $getDestination->id){
								?>
	                    			<td style="text-transform: capitalize;">		
				                      	<?= $getDestination->name ?>
	                    			</td>
								<?php
										}
									}
								?>
	                    			<td style="text-transform: capitalize;">
	                      				<?= $package->duration . ' Days'?>
	                    			</td>
				                    <td style="text-transform: capitalize;">
				                      	<?= '$' . $package->price . '.00' ?>
	                    			</td>
				                    <td>
				                    	<input 
				                    		class="toggle_check"
				                    		data-onstyle="success" 
				                    		data-offstyle="danger"
				                    		data-size="small" 
				                    		data-on="Yes" 
				                    		data-off="No"
				                    		type="checkbox" 
				                    		data-toggle="toggle"
				                    		data-style="android" 
				                    		dataID="<?= $package->package_id ?>"
				                    		<?php if($package->featured == 1){echo "checked";} ?>
				                    		>
	                    			</td>
	                  			</tr>
							<?php
									}
							?>
	                		</tbody>
	              		</table>
	            	</div>
	            	<div class="card-footer py-4">
              			<?=	$this->pagination->create_links(); ?>
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
