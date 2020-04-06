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
                  				<h3 class="mb-0">Add Blog</h3>
                			</div>
              			</div>
            		</div>
          			<form action="<?php echo base_url('admin/blog/add_blog_db')?>" method="post" enctype="multipart/form-data">
	            		<div class="card-body">
	        				<div class="pl-lg-4">
	          					<div class="row">
	            					<div class="col-lg-4">
	              						<div class="form-group">
	                						<label class="form-control-label" for="input-title">Title</label>
	        								<input type="text" id="input-title" name="titleBlog" class="form-control" placeholder="Title of Blog" autocomplete="off" style="text-transform: capitalize;" required>
	              						</div>
	            					</div>
	            					<div class="col-lg-4">
	              						<div class="form-group">
	                						<label class="form-control-label" for="input-date">Date</label>
	        								<input type="text" id="input-date" name="dateBlog" class="form-control" placeholder="Date of Blog" autocomplete="off" style="text-transform: capitalize;" required>
	              						</div>
					                </div>
					                <div class="col-lg-4">
					                  	<div class="form-group">
					                        <label class="form-control-label" for="input-image">Image</label>
					                        <div class="input-group mb-3">
											  	<div class="custom-file">
											    	<input type="file" id="imageBlog" name="imageBlog" class="form-control-file" required>
											    	<label class="custom-file-label" for="imageBlog">Choose file</label>
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
			                    	<textarea id="tinyMce" name="descriptionBlog" class="form-control" placeholder="Description of Blog"></textarea>
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
						$jumlah = $blogs->num_rows();
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
	              		<h3 class="mb-0">Table of Blogs</h3>
	            	</div>
	            	<div class="table-responsive">
	              		<table class="table align-items-center table-flush">
	                		<thead class="thead-light">
	                  			<tr>
				                    <th scope="col">Title</th>
				                    <th scope="col">Date</th>
				                    <th scope="col"></th>
				                </tr>
	                		</thead>
	                		<tbody>
							<?php
								foreach ($blogs->result() as $blog){
							?>
	                  			<tr>
	                    			<td style="text-transform: capitalize;">		
				                      	<?= $blog->title ?>
	                    			</td>
	                    			<td style="text-transform: capitalize;">
								    	<?php
											$dates = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
				        					$dateSplit = explode("/", $blog->date);
											$fixDate = $dates[$dateSplit[0]+=0-1] . " " . $dateSplit[1] .", ". $dateSplit[2];
										?>
	                      				<?= $fixDate ?>
	                    			</td>
				                    <td>
				                    	<a href="<?php echo base_url();?>edit-blog/<?= $blog->blog_id ?>" class="badge badge-success">edit</a>
				                    	<a href="<?php echo base_url();?>delete-blog/<?= $blog->blog_id ?>" class="badge badge-danger">delete</a>
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
