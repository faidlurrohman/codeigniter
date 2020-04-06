
<div class="col-xl-9">
	<!-- PAGE CONTENT-->
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
						<i class="mr-2 fa fa-align-justify"></i>
						<strong class="card-title" v-if="headerText">Gambar Slider</strong>
                    </div>
                    <form action="<?php echo base_url('admin/dub_konten/tambah_slider_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="sliderBaru" class=" form-control-label">Tambah Gambar</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="sliderBaru" name="sliderBaru[]" multiple="" class="form-control-file" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah
                            </button>
                        </div>
                    </form>
                </div>
			</div>
			<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
						<i class="mr-2 fa fa-align-justify"></i>
						<strong class="card-title" v-if="headerText">Data Slider</strong>
                    </div>
                    <div class="card-body card-block">
						<?php
							$jumlahSlider = $dataSlider->num_rows();
							if($jumlahSlider == 0){
						?>
									<span>Belum Ada Data Gambar, Silahkan Menambahkan Data Gambar Diatas!</span>
						<?php
							}
							else{
						?>
                        <div class="row form-group">
                    	<?php 
								foreach($dataSlider->result() as $img){
                    	?>
		                            <div class="col-md-3">
		                                <div class="card">
		                                    <img style="max-width: 100%; height: 160px;" src="<?php echo base_url('assets/dub_user/images/slider/');?><?= $img->img ?>">
		                                    <div class="card-body">
					                            <a href='<?php echo base_url('admin/dub_konten/hapus_img_slider_db/');?><?= $img->id ?>'" style="color:#d9534f;">Hapus</a>
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
                </div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT-->
</div>
