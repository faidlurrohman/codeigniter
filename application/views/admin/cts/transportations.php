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
                  				<h3 class="mb-0">Add Transportation</h3>
                			</div>
              			</div>
            		</div>
          			<form action="<?php echo base_url('admin/transportations/add_transportation_db')?>" method="post" enctype="multipart/form-data">
	            		<div class="card-body">
	        				<div class="pl-lg-4">
	          					<div class="row">
	            					<div class="col-lg-6">
	              						<div class="form-group">
	                						<label class="form-control-label" for="input-name">Name</label>
	        								<input type="text" id="input-name" name="nameTransportation" class="form-control" placeholder="Name of Transportation" autocomplete="off" style="text-transform: capitalize;" required>
	              						</div>
	            					</div>
	            					<div class="col-lg-6">
	              						<div class="form-group">
					                        <label class="form-control-label" for="input-duration">Duration</label>
					                        <div class="input-group mb-3">
											  	<input type="text" id="input-duration" name="durationTransportation" class="form-control" placeholder="Duration of Transportation" autocomplete="off" style="text-transform: capitalize;" required>
											  	<div class="input-group-append">
											    	<span class="input-group-text">Days</span>
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
											    	<span class="input-group-text">$</span>
											  	</div>
											  	<input type="text" id="input-price" name="priceTransportation" class="form-control" placeholder="Price of Transportation" autocomplete="off" style="text-transform: capitalize;" required>
											  	<div class="input-group-append">
											    	<span class="input-group-text">.00</span>
											  	</div>
											</div>
					                    </div>
					                </div>
					                <div class="col-lg-4">
					                   	<div class="form-group">
					                        <label class="form-control-label" for="input-guest">Max Guest</label>
					                        <div class="input-group mb-3">
											  	<input type="text" id="input-guest" name="guestTransportation" class="form-control" placeholder="Max Guest of Transportation" autocomplete="off" style="text-transform: capitalize;" required>
											  	<div class="input-group-append">
											    	<span class="input-group-text">Guest</span>
											  	</div>
											</div>
					                    </div>
					                </div>
					                <div class="col-lg-4">
					                  	<div class="form-group">
					                        <label class="form-control-label" for="input-image">Image</label>
					                        <div class="input-group mb-3">
											  	<div class="custom-file">
											    	<input type="file" id="imageTransportation" name="imageTransportation" class="form-control-file" required>
											    	<label class="custom-file-label" for="imageTransportation">Choose file</label>
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
			                    	<textarea id="tinyMce" name="descriptionTransportation" class="form-control" placeholder="Description of Transportation"></textarea>
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
						$jumlah = $transportations->num_rows();
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
	              		<h3 class="mb-0">Table of Transportation</h3>
	            	</div>
	            	<div class="table-responsive">
	              		<table class="table align-items-center table-flush">
	                		<thead class="thead-light">
	                  			<tr>
				                    <th scope="col">Name</th>
				                    <th scope="col">Duration</th>
				                    <th scope="col">Price</th>
				                    <th scope="col">Max Guest</th>
				                    <th scope="col"></th>
				                </tr>
	                		</thead>
	                		<tbody>
							<?php
								foreach ($transportations->result() as $transportation){
							?>
	                  			<tr>
	                    			<td style="text-transform: capitalize;">		
				                      	<?= $transportation->name ?>
	                    			</td>
	                    			<td style="text-transform: capitalize;">
	                      				<?= $transportation->duration . ' Days'?>
	                    			</td>
				                    <td style="text-transform: capitalize;">
				                      	<?= '$' . $transportation->price . '.00' ?>
	                    			</td>
				                    <td style="text-transform: capitalize;">
				                    	<?= $transportation->max_guest . ' Guest' ?>
	                    			</td>
				                    <td>
				                    	<a href="<?php echo base_url();?>edit-transportation/<?= $transportation->transportation_id ?>" class="badge badge-success">edit</a>
				                    	<a href="<?php echo base_url();?>delete-transportation/<?= $transportation->transportation_id ?>" class="badge badge-danger">delete</a>
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
