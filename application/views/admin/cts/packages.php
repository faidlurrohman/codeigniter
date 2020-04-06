	<div class="main-content">
		<div class="header bg-gradient-primary pb-8 pt-5">
			<div class="container-fluid">
				<div class="header-body">
				</div>
			</div>
		</div>
    <div class="container-fluid mt--7">
		<?= $this->session->flashdata('msg');?>
    	<!-- form -->
	    <div class="row">
        	<div class="col">
          		<div class="card bg-secondary shadow">
            		<div class="card-header bg-white border-0">
              			<div class="row align-items-center">
                			<div class="col-12">
                  				<h3 class="mb-0">Add Package</h3>
                			</div>
              			</div>
            		</div>
          			<form action="<?php echo base_url('admin/packages/add_package_db')?>" method="post" enctype="multipart/form-data">
	            		<div class="card-body">
	        				<div class="pl-lg-4">
	          					<div class="row">
	            					<div class="col-lg-4">
	              						<div class="form-group">
	                						<label class="form-control-label" for="input-name">Name</label>
	        								<input type="text" id="input-name" name="namePackage" class="form-control" placeholder="Name of Package" autocomplete="off" style="text-transform: capitalize;" required>
	              						</div>
	            					</div>
	            					<div class="col-lg-4">
			                            <div class="form-group">
					                        <label class="form-control-label" for="input-destination">Destination</label>
		                                    <select name="selectDestination" id="selectDestination" class="form-control" required>
		                                        <option disable selected>Destination of Package</option>
						    					<?php foreach($destinations->result() as $destination){ ?>
			                                        <option style="text-transform: capitalize;" value="<?php echo $destination->id ?>">
			                                        	<?php echo ucwords($destination->name) ?>		
		                                        </option>
												<?php } ?>
		                                    </select>
			                            </div>
		                        	</div>
	            					<div class="col-lg-4">
	              						<div class="form-group">
					                        <label class="form-control-label" for="input-duration">Duration</label>
					                        <div class="input-group mb-3">
											  	<input type="text" id="input-duration" name="durationPackage" class="form-control" placeholder="Duration of Package" autocomplete="off" style="text-transform: capitalize;" required>
											  	<div class="input-group-append">
											    	<span class="input-group-text"><small>Days</small></span>
											  	</div>
											</div>
					                     </div>
					                </div>
					            </div>
					            <div class="row">
					                <div class="col-lg-4">
					                    <div class="form-group">
					                        <label class="form-control-label" for="input-price">Price</label>
					                        <div class="input-group mb-3">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text"><small>IDR</small></span>
											  	</div>
											  	<input type="text" id="input-price" name="pricePackage" class="form-control" placeholder="Price of Package" autocomplete="off" style="text-transform: capitalize;" required>
											</div>
					                    </div>
					                </div>
					                <div class="col-lg-4">
					                   	<div class="form-group">
					                        <label class="form-control-label" for="input-guest">Max Guest</label>
					                        <div class="input-group mb-3">
											  	<input type="text" id="input-guest" name="guestPackage" class="form-control" placeholder="Max Guest of Package" autocomplete="off" style="text-transform: capitalize;" required>
											  	<div class="input-group-append">
											    	<span class="input-group-text"><small>Guest</small></span>
											  	</div>
											</div>
					                    </div>
					                </div>
					                <div class="col-lg-4">
					                  	<div class="form-group">
					                        <label class="form-control-label" for="input-image">Image</label>
					                        <div class="input-group mb-3">
											  	<div class="custom-file">
											    	<input type="file" id="imagePackage" name="imagePackage" class="form-control-file" required>
											    	<label class="custom-file-label" for="imagePackage">Choose file</label>
											  	</div>
											</div>
			                        		<!-- <input type="file" id="imagePackage" name="imagePackage[]" multiple="" class="form-control-file" required> -->
					                  	</div>
					                </div>
					            </div>
					        </div>
			                <div class="pl-lg-4">
			                  	<div class="form-group">
			                        <label class="form-control-label" for="input-description">Description</label>
			                    	<textarea id="tinyMce" name="descriptionPackage" class="form-control" placeholder="Description of Package"></textarea>
			                  	</div>
			                </div>
	        			</div>
	                    <div class="card-footer">
	                        <button type="submit" class="btn btn-sm btn-primary">
	                            <i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add
	                        </button>
	                    </div>
	            	</form>
					<input name="image" type="file" id="upload" onchange="" style="display:none;">
  				</div>
    		</div>
    	</div>
      	<!-- Table -->
	    <div class="row mt-5">
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
	              		<h3 class="mb-0">Table of Packages</h3>
	            	</div>
	            	<div class="table-responsive">
	              		<table class="table align-items-center table-flush">
	                		<thead class="thead-light">
	                  			<tr>
				                    <th scope="col">Name</th>
				                    <th scope="col">Destination</th>
				                    <th scope="col">Duration</th>
				                    <th scope="col">Price</th>
				                    <th scope="col">Max Guest</th>
				                    <th scope="col"></th>
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
				                      	<?= number_format($package->price) ?>
	                    			</td>
				                    <td style="text-transform: capitalize;">
				                    	<?= $package->max_guest . ' Guest' ?>
	                    			</td>
				                    <td>
				                    	<a href="<?php echo base_url();?>edit-package/<?= $package->package_id ?>" class="badge badge-success"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;edit</a>
				                    	<a href="<?php echo base_url();?>delete-package/<?= $package->package_id ?>" class="badge badge-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;delete</a>
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
