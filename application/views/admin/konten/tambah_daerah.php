
<div class="col-xl-9">
	<!-- PAGE CONTENT-->
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
						<i class="mr-2 fa fa-align-justify"></i>
						<strong class="card-title" v-if="headerText">Tambah Data Daerah</strong>
                    </div>
                    <form action="<?php echo base_url('admin/dub_konten/tambah_daerah_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="daerahBaru" class=" form-control-label">Nama Daerah/Kota</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="daerahBaru" name="daerahBaru" autocomplete="off" style="text-transform: capitalize;" placeholder="Nama Daerah/Kota" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="alamatBaru" class=" form-control-label">Alamat Detail</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="alamatBaru" name="alamatBaru" autocomplete="off" style="text-transform: capitalize;" placeholder="Alamat Detail" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="deskBaru" class=" form-control-label">Deskripsi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="deskBaru" id="tinyMce" rows="9" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="gambarBaru" class=" form-control-label">Gambar</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="gambarBaru" name="gambarBaru[]" multiple="" class="form-control-file">
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
						<strong class="card-title" v-if="headerText">Data Daerah</strong>
                    </div>
                    <div class="card-body card-block">
		                <div class="table-responsive">
								<?php
									$jumlahDaerah = $dataDaerah->num_rows();
									if($jumlahDaerah == 0){
								?>
											<span>Belum Ada Data Daerah, Silahkan Menambahkan Data Daerah Diatas!</span>
								<?php
									}
									else{
								?>

		                    <table class="table table-borderless table-data2">
		                        <thead>
		                            <tr>
		                                <th class="text-left">Nama Daerah</th>
		                                <th class="text-left">Alamat Daerah</th>
		                                <th></th>
		                            </tr>
		                        </thead>
		                        <tbody>
								<?php
										foreach ($dataDaerah->result() as $row){
								?>
		                            <tr>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->daerah ?></td>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->alamat ?></td>
		                                <td>
		                                    <div class="table-data-feature">
		                                        <button onclick="window.location='<?php echo base_url();?>admin/edit-daerah/<?= $row->id_daerah ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
		                                            <i class="zmdi zmdi-edit" style="color:#5cb85c;"></i>
		                                        </button>
		                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_daerah_db/');?><?= $row->id_daerah ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
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
