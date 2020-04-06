
<div class="col-xl-9">
	<!-- PAGE CONTENT-->
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
						<i class="mr-2 fa fa-align-justify"></i>
						<strong class="card-title" v-if="headerText">Tambah Kategori Tour</strong>
                    </div>
                    <form action="<?php echo base_url('admin/dub_konten/tambah_tour_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="tourBaru" class=" form-control-label">Nama Tour</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="tourBaru" name="tourBaru" autocomplete="off" style="text-transform: capitalize;" placeholder="Nama Tour" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="gambarTour" class=" form-control-label">Gambar</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="gambarTour" name="gambarTour" class="form-control-file">
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
						<strong class="card-title" v-if="headerText">Data Tour</strong>
                    </div>
                    <div class="card-body card-block">
		                <div class="table-responsive">
								<?php
									$jumlahTour = $dataTour->num_rows();
									if($jumlahTour == 0){
								?>
											<span>Belum Ada Data Tour, Silahkan Menambahkan Data Tour Diatas!</span>
								<?php
									}
									else{
								?>

		                    <table class="table table-borderless table-data2">
		                        <thead>
		                            <tr>
		                                <th class="text-left">Nama Tour</th>
		                                <th></th>
		                            </tr>
		                        </thead>
		                        <tbody>
								<?php
										foreach ($dataTour->result() as $row){
								?>
		                            <tr>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->kategori ?></td>
		                                <td>
		                                    <div class="table-data-feature">
		                                        <button type="button" data-toggle="modal" data-target="#modal-edit-<?= $row->id_tour ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
		                                            <i class="zmdi zmdi-edit" style="color:#5cb85c;"></i>
		                                        </button>
		                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_tour_db/');?><?= $row->id_tour ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
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
<?php
	foreach ($dataTour->result() as $row){
?>
<div class="modal fade" id="modal-edit-<?= $row->id_tour ?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="<?php echo base_url('admin/dub_konten/edit_tour_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
				<div class="modal-header">
					<h5 class="modal-title" id="smallmodalLabel">Edit Data Tour</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
		          	<input type="hidden" readonly value="<?= $row->id_tour ?>" name="modal_id" class="form-control" >
		          	<input type="hidden" readonly value="<?= $row->img ?>" name="modal_img" class="form-control" >
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="modal_tour" class=" form-control-label">Nama Tour</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="modal_tour" name="modal_tour" autocomplete="off" style="text-transform: capitalize;" value="<?= $row->kategori ?>" placeholder="Nama Tour" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="gambarTour" class=" form-control-label">Ubah Gambar</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="gambarTour" name="gambarTour" class="form-control-file">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="card">
                                <img style="max-width: 100%;" src="<?php echo base_url('assets/dub_user/images/tour/');?><?= $row->img ?>">
                            </div>
                        </div>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
						<i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;Batal
					</button>
					<button type="submit" class="btn btn-primary btn-sm">
						<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Update
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
	}
?>
