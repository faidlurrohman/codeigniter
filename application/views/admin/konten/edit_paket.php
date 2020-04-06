
<div class="col-xl-9">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<i class="mr-2 fa fa-align-justify"></i>
						<strong class="card-title" v-if="headerText">Edit Data Paket</strong>
					</div>
					<?php
						foreach($paket->result() as $detail){
					?>
					<form action="<?php echo base_url('admin/dub_konten/edit_paket_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
						<div class="card-body card-block">
							<input type="hidden" name="editId" value="<?php echo $detail->id_paket; ?>">
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="editNama" class=" form-control-label">Nama Paket</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="text" id="editNama" name="editNama" autocomplete="off" style="text-transform: capitalize;" class="form-control" value="<?php echo $detail->nama; ?>">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="editDurasi" class=" form-control-label">Durasi</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="text" id="editDurasi" name="editDurasi" autocomplete="off" style="text-transform: capitalize;" class="form-control" value="<?php echo $detail->durasi; ?>">
								</div>
							</div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="editHarga" class=" form-control-label">Harga</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
    										<label class="input-group-text" for="inputGroupSelect01">RP</label>
                                        </div>
                                    	<input type="text" id="editHarga" name="editHarga" autocomplete="off" style="text-transform: capitalize;" value="<?php echo $detail->harga; ?>" class="form-control" required>
									</div>
                                    <small class="form-text text-muted">Masukkan angka tanpa koma atau titik</small>
                                </div>
                            </div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="editKategori" class=" form-control-label">Kategori Tour</label>
								</div>
                                <div class="col-12 col-md-9">
                                    <select name="editKategori" id="editKategori" class="form-control">
	                                        <option>Pilih Kategori</option>
				    					<?php foreach($dataTour->result() as $row){ ?>
	                                        <option style="text-transform: capitalize;" value="<?php echo $row->id_tour ?>" <?php if($row->id_tour == $detail->id_tour){?>selected <?php } ?>>
	                                        	<?php echo ucwords($row->kategori) ?>		
	                                        </option>
										<?php } ?>
                                    </select>
                                </div>
							</div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="editIsi" class=" form-control-label">Deskripsi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="editIsi" id="tinyMce" rows="9" class="form-control"><?php echo $detail->isi; ?></textarea>
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
								foreach($img_paket->result() as $detail_img){
							?>
		                            <div class="col-md-3">
		                                <div class="card">
		                                    <img style="max-width: 100%; height: 160px;" src="<?php echo base_url('assets/dub_user/images/paket/');?><?= $detail_img->img ?>">
		                                    <div class="card-body">
					                            <a href='<?php echo base_url('admin/dub_konten/hapus_img_paket_db/');?><?= $detail_img->id ?>'" style="color:#d9534f;">Hapus</a>
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
                            <button onclick="window.location='<?php echo base_url();?>admin/paket'" type="reset" class="btn btn-danger btn-sm">
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
