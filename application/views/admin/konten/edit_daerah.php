
<div class="col-xl-9">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
						<i class="mr-2 fa fa-align-justify"></i>
						<strong class="card-title" v-if="headerText">Edit Data Daerah</strong>
                    </div>
					<?php
						foreach($daerah->result() as $detail){
					?>
                    <form action="<?php echo base_url('admin/dub_konten/edit_daerah_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body card-block">
							<input type="hidden" name="editId" value="<?php echo $detail->id_daerah; ?>">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="editDaerah" class=" form-control-label">Nama Daerah/Kota</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="editDaerah" name="editDaerah" autocomplete="off" style="text-transform: capitalize;" class="form-control" value="<?php echo $detail->daerah; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="editAlamat" class=" form-control-label">Alamat Detail</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="editAlamat" name="editAlamat" autocomplete="off" style="text-transform: capitalize;" class="form-control" value="<?php echo $detail->alamat; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="editDesk" class=" form-control-label">Deskripsi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="editDesk" id="tinyMce" rows="9" class="form-control"><?php echo $detail->deskripsi; ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="tambahGambar" class=" form-control-label">Tambah Gambar</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="tambahGambar" name="tambahGambar[]" multiple="" class="form-control-file">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
							<?php
								foreach($img_daerah->result() as $detail_img){
							?>
		                            <div class="col-md-3">
		                                <div class="card">
		                                    <img style="max-width: 100%; height: 160px;" src="<?php echo base_url('assets/dub_user/images/hotel/');?><?= $detail_img->img ?>">
		                                    <div class="card-body">
					                            <a href='<?php echo base_url('admin/dub_konten/hapus_img_daerah_db/');?><?= $detail_img->id ?>'" style="color:#d9534f;">Hapus</a>
		                                    </div>
		                                </div>
		                            </div>
							<?php
								}
							?>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Update
                            </button>
                            <button onclick="window.location='<?php echo base_url();?>admin/daerah'" type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;Batal
                            </button>
                        </div>
                    </form>
					<?php
						}
					?>
                </div>
			</div>
		</div>
	</div>
</div>
