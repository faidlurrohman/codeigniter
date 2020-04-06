	<div class="main-content">
		<div class="header bg-gradient-primary pb-8 pt-6">
			<div class="container-fluid">
				<div class="header-body">
				</div>
			</div>
		</div>

    <div class="container-fluid mt--9">
    	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg');?>"></div>
      	<div class="row">
        	<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          		<div class="card card-profile shadow">
    				<div class="card-header bg-white border-0">
      					<div class="row align-items-center">
        					<div class="col-12">
          						<h3 class="mb-0">Add Destination</h3>
        					</div>
      					</div>
    				</div>
    				
          			<form action="" method="post" enctype="multipart/form-data">
		            	<div class="card-body pt-0 pt-md-4">
      						<div class="form-group">
								<input type="text" id="nameDestination" name="nameDestination" class="form-control" placeholder="Name of Destination" autocomplete="off" value="<?php echo set_value('nameDestination'); ?>" style="text-transform: capitalize;">
    							<?php echo form_error('nameDestination','<p class="help-block" style="color: #D21F3C; font-size: 0.8rem; margin-top: 0.5rem; margin-bottom: -1rem; margin-left: 0.5rem;">','</p>'); ?>
      						</div>
      						<div class="form-group">
		                        <div class="input-group mb-3">
								  	<div class="custom-file">
								    	<input type="file" id="imageDestination" name="imageDestination" class="form-control-file">
								    	<label class="custom-file-label" for="imageDestination">Choose file</label>
								  	</div>
								</div>
								<?php echo form_error('imageDestination','<p class="help-block" style="color: #D21F3C; font-size: 0.8rem; margin-top: -0.5rem; margin-bottom: -1rem; margin-left: 0.5rem;">','</p>'); ?>
		                     </div>
		            	</div>
		                <div class="card-footer">
		                    <button type="submit" class="btn btn-sm btn-primary" name="btn-add">
		                        <i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add
		                    </button>
		                </div>
      				</form>
          		</div>
        	</div>
	        <div class="col-xl-8 order-xl-1">
	        	<form action="" method="post">
					<div class="input-group mb-3">
					  <input type="text" class="form-control" placeholder="Search" name="keyword">
					  <div class="input-group-append">
					    <button class="btn btn-success" type="submit">Search</button>
					  </div>
					</div>
				</form>
	          	<div class="card shadow">
					<?php
						$jumlah = $destinations->num_rows();
						if($jumlah == 0){
					?>
						<center>
							<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:25%; margin-bottom: 50px; margin-top: 50px;">
						</center>
					<?php
						}
						else{
					?>
	            	<div class="card-header border-0">
	              		<h3 class="mb-0">Table of Destinations</h3>
	            	</div>
	            	<div class="table-responsive">
	              		<table class="table align-items-center table-flush">
	                		<thead class="thead-light">
	                  			<tr>
				                    <th scope="col">Name</th>
				                    <th scope="col"></th>
				                </tr>
	                		</thead>
	                		<tbody>
							<?php
								foreach ($destinations->result() as $destination){
							?>
	                  			<tr>
	                    			<td style="text-transform: capitalize;">		
				                      	<?= $destination->name ?>
	                    			</td>
				                    <td>
				                    	<a href="" data-toggle="modal" data-target="#modal-edit-<?= $destination->id ?>" class="badge badge-success"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;edit</a>
				                    	<a href="<?php echo base_url();?>delete-destination/<?= $destination->id ?>" class="badge badge-danger btn-dlt"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;delete</a>
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
	<?php
		foreach ($destinations->result() as $destination){
	?>
	<div class="modal fade" id="modal-edit-<?= $destination->id ?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<form action="<?php echo base_url('admin/destinations/edit_destination_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
					<div class="modal-header">
						<h5 class="modal-title" id="smallmodalLabel">Edit Destination</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
			          	<input type="hidden" readonly value="<?= $destination->id ?>" id="editId" name="editId" class="form-control" >
			          	<input type="hidden" readonly value="<?= $destination->image ?>" id="editImg" name="editImg" class="form-control" >
  						<div class="form-group row">
					    	<div class="col-sm-12">
			      				<input type="text" id="editName" name="editName" autocomplete="off" class="form-control" style="text-transform: capitalize;" value="<?= $destination->name ?>">
					    	</div>
					  	</div>
  						<div class="form-group row">
					    	<div class="col-sm-12">
		                        <div class="input-group mb-3">
								  	<div class="custom-file">
								    	<input type="file" id="imageDestination" name="imageDestination" class="custom-file-input">
								    	<label class="custom-file-label" for="imageDestination">Change Image Below</label>
								  	</div>
								</div>
	                            <div class="card">
	                                <img style="max-width: 100%;" src="<?php echo base_url('assets/admin/img/destinations/');?><?= $destination->image ?>">
	                            </div>
					    	</div>
					  	</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-sm">
							<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Update
						</button>
						<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
							<i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;Cancel
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
		}
	?>
