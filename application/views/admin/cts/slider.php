	<div class="main-content">
		<div class="header bg-gradient-primary pb-8 pt-5">
			<div class="container-fluid">
				<div class="header-body">
				</div>
			</div>
		</div>

    <div class="container-fluid mt--7">
		<?= $this->session->flashdata('msg');?>
      	<div class="row">
        	<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          		<div class="card card-profile shadow">
    				<div class="card-header bg-white border-0">
      					<div class="row align-items-center">
        					<div class="col-12">
          						<h3 class="mb-0">Add Image</h3>
        					</div>
      					</div>
    				</div>
          			<form action="<?php echo base_url('admin/slider/add_slider_db')?>" method="post" enctype="multipart/form-data">
		            	<div class="card-body pt-0 pt-md-4">
		                  	<div class="form-group">
		                        <div class="input-group mb-3">
								  	<div class="custom-file">
								    	<input type="file" id="imageSlider" name="imageSlider[]" multiple="" class="form-control-file" required>
								    	<label class="custom-file-label" for="imageSlider">Choose file</label>
								  	</div>
								</div>
		                  	</div>
		            	</div>
		                <div class="card-footer">
		                    <button type="submit" class="btn btn-sm btn-primary">
		                        <i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add
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
		                  <h3 class="mb-0">Slider</h3>
		                </div>
		              </div>
		            </div>
		            <div class="card-body">
						<?php
							$jumlah = $sliders->num_rows();
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
								foreach($sliders->result() as $image){
                    	?>
		                            <div class="col-md-4 mb-3">
		                                <div class="card">
		                                    <img style="max-width: 100%; height: 160px;" src="<?php echo base_url('assets/admin/img/slider/');?><?= $image->name_image ?>">
		                                    <div class="card-body">
		                                    	<a href="<?php echo base_url();?>delete-image-slider/<?= $image->id ?>" class="badge badge-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;delete</a>
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
