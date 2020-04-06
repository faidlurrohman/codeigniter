	<div class="main-content">
		<div class="header bg-gradient-primary pb-8 pt-5">
			<div class="container-fluid">
				<div class="header-body">
				</div>
			</div>
		</div>

    <div class="container-fluid mt--7">
    	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg');?>"></div>
      	<div class="row">
        	<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          		<div class="card card-profile shadow">
    				<div class="card-header bg-white border-0">
      					<div class="row align-items-center">
        					<div class="col-12">
          						<h3 class="mb-0">Change Cover</h3>
        					</div>
      					</div>
    				</div>
          			<form action="" method="post" enctype="multipart/form-data">
		            	<div class="card-body pt-0 pt-md-4">
		                  	<div class="form-group">
		                        <div class="input-group mb-3">
								  	<div class="custom-file">
								    	<input type="file" id="imageCover" name="imageCover" class="form-control-file">
								    	<label class="custom-file-label" for="imageCover">Choose file</label>
								  	</div>
								</div>
								<?php echo form_error('imageCover','<p class="help-block" style="color: #D21F3C; font-size: 0.8rem; margin-top: -0.5rem; margin-bottom: -1rem; margin-left: 0.5rem;">','</p>'); ?>
		                  	</div>
		            	</div>
		                <div class="card-footer">
		                    <button type="submit" class="btn btn-sm btn-primary" name="btn-update">
		                        <i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Update
		                    </button>
		                </div>
      				</form>
          		</div>
        	</div>
	        <div class="col-xl-8 order-xl-1">
	          	<div class="card bg-secondary shadow">
		            <div class="card-header bg-white border-0">
		              <div class="row align-items-center">
		                <div class="col-8">
		                  <h3 class="mb-0">Cover</h3>
		                </div>
		              </div>
		            </div>
		            <div class="card-body">
						<?php
							$jumlah = $cover->num_rows();
							if($jumlah == 0){
						?>
							<center>
								<img src="<?php echo base_url('assets/images/nodata.png'); ?>" alt="" style="max-width:50%; margin-bottom: 50px; margin-top: 50px;">
							</center>
						<?php
							}
							else{
						?>
						<div class="row">
                    	<?php 
								foreach($cover->result() as $image){
                    	?>
		                            <div class="col-md-12 mb-3">
		                                <div class="card">
		                                    <img style="max-width: 100%;" src="<?php echo base_url('assets/admin/img/cover/');?><?= $image->name_image ?>">
		                                    <div class="card-body">
		                                    	<center>
		                                    		<a href="<?php echo base_url();?>delete-image-cover/<?= $image->id ?>" class="badge badge-danger btn-dlt"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;delete</a>
		                                    	</center>
		                                    </div>
		                                </div>
		                            </div>
						<?php
								}
						?>
                        </div>
						<?php
							}
						?>
		            </div>
	            	<div class="card-footer py-4">
              			<?=	$this->pagination->create_links(); ?>
	            	</div>
	          	</div>
	        </div>
      	</div>
      	<!-- Footer -->
      	<footer class="footer">
        	<div class="row align-items-center justify-content-xl-between">
        	</div>
      	</footer>
    </div>
