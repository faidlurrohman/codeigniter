
<div class="col-xl-9">
	<!-- PAGE CONTENT-->
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<i class="mr-2 fa fa-align-justify"></i>
						<strong class="card-title" v-if="headerText">Tambah Data Blog</strong>
					</div>
					<form action="<?php echo base_url()?>admin/dub_konten/tambah_blog_db" method="post" enctype="multipart/form-data" class="form-horizontal">
						<div class="card-body card-block">
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="judulBlog" class=" form-control-label">Judul</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="text" id="judulBlog" name="judulBlog" autocomplete="off" style="text-transform: capitalize;" placeholder="Judul" class="form-control" required>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="tglBlog" class=" form-control-label">Tanggal</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="date" id="tglBlog" name="tglBlog" autocomplete="off" style="text-transform: capitalize;" class="form-control" required>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="deskBlog" class=" form-control-label">Deskripsi</label>
								</div>
								<div class="col-12 col-md-9">
									<textarea name="deskBlog" id="tinyMce" rows="9" class="form-control"></textarea>
								</div>
							</div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="gambarBlog" class=" form-control-label">Gambar</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="gambarBlog" name="gambarBlog" class="form-control-file" required>
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
						<strong class="card-title" v-if="headerText">Data Blog</strong>
                    </div>
                    <div class="card-body card-block">
		                <div class="table-responsive">
								<?php
									$jumlahBlog = $dataBlog->num_rows();
									if($jumlahBlog == 0){
								?>
											<span>Belum Ada Data Blog, Silahkan Menambahkan Data Blog Diatas!</span>
								<?php
									}
									else{
								?>

		                    <table class="table table-borderless table-data2">
		                        <thead>
		                            <tr>
		                                <th class="text-left">Judul</th>
		                                <th class="text-left">Tanggal</th>
		                                <th></th>
		                            </tr>
		                        </thead>
		                        <tbody>
								<?php
										foreach ($dataBlog->result() as $row){
								?>
		                            <tr>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->judul ?></td>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->tgl ?></td>
		                                <td>
		                                    <div class="table-data-feature">
		                                        <button onclick="window.location='<?php echo base_url();?>admin/edit-blog/<?= $row->id_blog ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
		                                            <i class="zmdi zmdi-edit" style="color:#5cb85c;"></i>
		                                        </button>
		                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_blog_db/');?><?= $row->id_blog ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
		                                            <i class="zmdi zmdi-delete" style="color:#d9534f;"></i>
		                                        </button>
		                                    </div>
		                                </td>
		                            </tr>
								<?php
									}
								?>
								<?php
									}
								?>
		                        </tbody>
		                    </table>
		                </div>
					</div>
                </div>
            </div>
		</div>
	</div>
	<!-- END PAGE CONTENT-->
</div>
