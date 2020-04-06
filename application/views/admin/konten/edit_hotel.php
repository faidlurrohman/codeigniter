
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
						foreach($hotel->result() as $detail){
					?>
					<form action="<?php echo base_url('admin/dub_konten/edit_hotel_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
						<div class="card-body card-block">
							<input type="hidden" name="editId" value="<?php echo $detail->id_hotel; ?>">
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="editDaerah" class=" form-control-label">Daerah Hotel</label>
								</div>

                                <div class="col-12 col-md-9">
                                    <select name="editDaerah" id="editDaerah" class="form-control">
	                                        <option>Pilih Daerah</option>
				    					<?php foreach($dataDaerah->result() as $row){ ?>
	                                        <option style="text-transform: capitalize;" value="<?php echo $row->id_daerah ?>" <?php if($row->id_daerah == $detail->id_daerah){?>selected <?php } ?>>
	                                        	<?php echo ucwords($row->daerah) ?>		
	                                        </option>
										<?php } ?>
                                    </select>
                                </div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="editNama" class=" form-control-label">Nama Hotel</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="text" id="editNama" name="editNama" autocomplete="off" style="text-transform: capitalize;" class="form-control" value="<?php echo $detail->nama; ?>">
								</div>
							</div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="editBintang" class=" form-control-label">Bintang</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="editBintang" id="editBintang" class="form-control">
                                    	<?php 
                                    		for($i=0;$i<6;$i++){
                                    		?>
                                        		<option value="<?= $i ?>" <?php if($i == $detail->bintang) { ?> selected <?php } ?>>
                                        			<?php 
                                        				if($i==0){
                                        					?>
                                        					Tidak Berbintang
                                        					<?php
                                        				}
                                        				else{
                                        					?>
                                        					Bintang <?= $i ?>
                                        					<?php
                                        				}
                                        			?>
                                        		</option>
                                        	<?php
                                    		} 
                                    	?>
                                    </select>
                                </div>
                            </div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary btn-sm">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Update
							</button>
							<button onclick="window.location='<?php echo base_url();?>admin/hotel'" type="reset" class="btn btn-danger btn-sm">
								<i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;Batal
							</button>
						</div>
					</form>
					<?php
						}
					?>
				</div>
			</div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Data Kamar</strong>
                    </div>
                    <div class="card-body card-block">
		                <div class="table-responsive">
								<?php
									$jumlahKamar = $kamar->num_rows();
									if($jumlahKamar == 0){
								?>
											<span>Belum Ada Data Kamar Di Hotel Ini, Silahkan Menambahkan Data Kamar Dibawah!</span>
								<?php
									}
									else{
								?>
		                    <table class="table table-borderless table-data2">
		                        <thead>
		                            <tr>
		                                <th class="text-left">Kamar</th>
		                                <th class="text-left">Low Seasson</th>
		                                <th class="text-left">Peak Seasson</th>
		                                <th class="text-left">High Seasson</th>
		                                <th></th>
		                            </tr>
		                        </thead>
		                        <tbody>
								<?php
										foreach ($kamar->result() as $row){
								?>
									<tr>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->kamar ?></td>
		                                <td class="text-left">RP. <?= number_format($row->low) ?></td>
		                                <td class="text-left">RP. <?= number_format($row->peak) ?></td>
		                                <td class="text-left">RP. <?= number_format($row->high) ?></td>
		                                <td>
		                                    <div class="table-data-feature">
		                                        <button type="button" data-toggle="modal" data-target="#modal-edit-<?= $row->id ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
		                                            <i class="zmdi zmdi-edit" style="color:#5cb85c;"></i>
		                                        </button>
		                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_kamar_db/');?><?= $row->id ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
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
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>Masukkan Data Kamar</strong>
					</div>
					<form action="<?php echo base_url('admin/dub_konten/tambah_kamar_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
						<?php
							foreach($hotel->result() as $detail){
						?>
							<input type="hidden" name="tmbIdHotel" value="<?php echo $detail->id_hotel; ?>">
						<?php
							}
						?>
						<?php
							foreach($dataDaerah->result() as $row){
						?>
							<input type="hidden" name="tmbIdDaerah" value="<?php echo $row->id_daerah; ?>">
						<?php
							}
						?>
						<div class="card-body card-block">
                            <div class="card-title">
                                <h3 class="text-center title-2">Data Kamar 1</h3>
                            </div>
                            <hr>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="kmrBaru" class=" form-control-label">Nama Kamar</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="text" id="kmrBaru" name="kmrBaru[]" autocomplete="off" style="text-transform: capitalize;" placeholder="Nama Kamar" class="form-control" required>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="lowBaru" class=" form-control-label">Low Seasson</label>
								</div>
								<div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
    										<label class="input-group-text" for="inputGroupSelect01">RP</label>
                                        </div>
										<input type="text" id="lowBaru" name="lowBaru[]" autocomplete="off" style="text-transform: capitalize;" placeholder="Low Seasson" class="form-control" required>
                                    </div>
                                    <small class="form-text text-muted">Masukkan angka tanpa koma atau titik</small>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="peakBaru" class=" form-control-label">Peak Seasson</label>
								</div>
								<div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
    										<label class="input-group-text" for="inputGroupSelect01">RP</label>
                                        </div>
										<input type="text" id="peakBaru" name="peakBaru[]" autocomplete="off" style="text-transform: capitalize;" placeholder="Peak Seasson" class="form-control" required>
									</div>
                                    <small class="form-text text-muted">Masukkan angka tanpa koma atau titik</small>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="highBaru" class=" form-control-label">High Seasson</label>
								</div>
								<div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
    										<label class="input-group-text" for="inputGroupSelect01">RP</label>
                                        </div>
										<input type="text" id="highBaru" name="highBaru[]" autocomplete="off" style="text-transform: capitalize;" placeholder="High Seasson" class="form-control" required>
									</div>
                                    <small class="form-text text-muted">Masukkan angka tanpa koma atau titik</small>
								</div>
							</div>
						</div>
	    				<div id="insert-form"></div>
						<div class="card-footer">
							<button type="button" class="btn btn-success btn-sm" id="btn-tambah-form">
								<i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Form
							</button>
							<button type="button" class="btn btn-danger btn-sm" id="btn-reset-form">
								<i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;Reset Form
							</button>
							<button type="submit" class="btn btn-primary btn-sm">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Selesai
							</button>
						</div>
					</form>
		  			<input type="hidden" id="jumlah-form" value="1">
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	foreach ($kamar->result() as $row){
?>
<div class="modal fade" id="modal-edit-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="<?php echo base_url('admin/dub_konten/edit_kamar_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
				<div class="modal-header">
					<h5 class="modal-title" id="mediumModalLabel">Edit Data Kamar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
		          	<input type="hidden" readonly value="<?= $row->id ?>" name="modal_id" class="form-control" >
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="modal_kamar" class=" form-control-label">Nama Kamar</label>
						</div>
						<div class="col-12 col-md-9">
							<input type="text" id="modal_kamar" name="modal_kamar" autocomplete="off" style="text-transform: capitalize;" value="<?= $row->kamar ?>" placeholder="Nama Kamar" class="form-control" required>
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="modal_low" class=" form-control-label">Low Seasson</label>
						</div>
						<div class="col-12 col-md-9">
	                        <div class="input-group">
	                            <div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">RP</label>
	                            </div>
								<input type="text" id="modal_low" name="modal_low" autocomplete="off" style="text-transform: capitalize;" value="<?= $row->low ?>" placeholder="Low Seasson" class="form-control" required>
	                        </div>
                            <small class="form-text text-muted">Masukkan angka tanpa koma atau titik</small>
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="modal_peak" class=" form-control-label">Peak Seasson</label>
						</div>
						<div class="col-12 col-md-9">
	                        <div class="input-group">
	                            <div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">RP</label>
	                            </div>
								<input type="text" id="modal_peak" name="modal_peak" autocomplete="off" style="text-transform: capitalize;" value="<?= $row->peak ?>" placeholder="Peak Seasson" class="form-control" required>
							</div>
                            <small class="form-text text-muted">Masukkan angka tanpa koma atau titik</small>
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="modal_high" class=" form-control-label">High Seasson</label>
						</div>
						<div class="col-12 col-md-9">
	                        <div class="input-group">
	                            <div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">RP</label>
	                            </div>
								<input type="text" id="modal_high" name="modal_high" autocomplete="off" style="text-transform: capitalize;" value="<?= $row->high ?>" placeholder="High Seasson" class="form-control" required>
							</div>
                            <small class="form-text text-muted">Masukkan angka tanpa koma atau titik</small>
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
