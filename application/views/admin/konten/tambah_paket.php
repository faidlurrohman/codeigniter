
<div class="col-xl-9">
	<!-- PAGE CONTENT-->
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
						<i class="mr-2 fa fa-align-justify"></i>
						<strong class="card-title" v-if="headerText">Tambah Data Paket</strong>
                    </div>
                    <form action="<?php echo base_url('admin/dub_konten/tambah_paket_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="namaPaket" class=" form-control-label">Nama Paket</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="namaPaket" name="namaPaket" autocomplete="off" style="text-transform: capitalize;" placeholder="Nama Paket" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="durasiPaket" class=" form-control-label">Durasi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="durasiPaket" name="durasiPaket" autocomplete="off" style="text-transform: capitalize;" placeholder="Durasi" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="hargaPaket" class=" form-control-label">Harga</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
    										<label class="input-group-text" for="inputGroupSelect01">RP</label>
                                        </div>
                                    	<input type="text" id="hargaPaket" name="hargaPaket" autocomplete="off" style="text-transform: capitalize;" placeholder="Harga" class="form-control" required>
									</div>
                                    <small class="form-text text-muted">Masukkan angka tanpa koma atau titik</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Kategori Tour</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="selectTour" id="selectTour" class="form-control">
	                                        <option>Pilih Kategori</option>
				    					<?php foreach($dataTour->result() as $row){ ?>
	                                        <option style="text-transform: capitalize;" value="<?php echo $row->id_tour ?>">
	                                        	<?php echo ucwords($row->kategori) ?>		
	                                        </option>
										<?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="deskPaket" class=" form-control-label">Deskripsi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="deskPaket" id="tinyMce" rows="9" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="gambarPaket" class=" form-control-label">Gambar</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="gambarPaket" name="gambarPaket[]" multiple="" class="form-control-file" required>
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
                        <strong>Data Hotel</strong>
                    </div>
                    <div class="card-body card-block">

						<?php
							$jumlahPaket = $dataPaket->num_rows();
							if($jumlahPaket == 0){
						?>
									<span>Belum Ada Data Hotel, Silahkan Menambahkan Data Hotel Diatas!</span>
						<?php
							}
							else{
						?>
                    	<form action="" method="post">
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
			                            <select name="sortTabel" id="sortTabel" class="form-control">
			                                    <option style="text-transform: capitalize;" value="semua">Semua Kategori</option>
					    					<?php foreach($dataTour->result() as $row){ ?>
			                                    <option style="text-transform: capitalize;" value="<?php echo $row->id_tour ?>">
			                                    	<?php echo ucwords($row->kategori) ?>		
			                                    </option>
											<?php } ?>
			                            </select>
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-success" name="tampil">Tampilkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</form>
						<?php
						    if(isset($_POST['tampil'])) {
						?>
						                <div class="table-responsive">
						                    <table class="table table-borderless table-data2">
						                        <thead>
						                            <tr>
						                                <th class="text-left">Tour</th>
						                                <th class="text-left">Nama Paket</th>
						                                <th class="text-left">Durasi</th>
						                                <th class="text-left">Harga</th>
						                                <th></th>
						                            </tr>
						                        </thead>
						                        <tbody>
						<?php
						        foreach ($dataPaket->result() as $row){
						        	if($_POST['sortTabel'] == $row->id_tour){
					    ?>
													<tr>
						                                <td class="text-left" style="text-transform: capitalize;">
						                                	<?php
						                                		foreach ($dataTour->result() as $ambilNama){
						                                			if($ambilNama->id_tour == $row->id_tour){
						                                	?>		
						                                				<?= $ambilNama->kategori ?>
						                                	<?php 
						                                			}
						                                		}
						                                	?>
						                                </td>
						                                <td class="text-left" style="text-transform: capitalize;"><?= $row->nama ?></td>
						                                <td class="text-left" style="text-transform: capitalize;"><?= $row->durasi ?></td>
						                                <td class="text-left">RP. <?= number_format($row->harga) ?></td>
						                                <td>
						                                    <div class="table-data-feature">
						                                        <button onclick="window.location='<?php echo base_url();?>admin/edit-paket/<?= $row->id_paket ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
						                                            <i class="zmdi zmdi-edit" style="color:#5cb85c;"></i>
						                                        </button>
						                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_paket_db/');?><?= $row->id_paket ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
						                                            <i class="zmdi zmdi-delete" style="color:#d9534f;"></i>
						                                        </button>
						                                    </div>
						                                </td>
						                            </tr>
				        <?php
						        	}
						        	else if($_POST['sortTabel'] == 'semua'){
		        		?>
													<tr>
						                                <td class="text-left" style="text-transform: capitalize;">
						                                	<?php
						                                		foreach ($dataTour->result() as $ambilNama){
						                                			if($ambilNama->id_tour == $row->id_tour){
						                                	?>		
						                                				<?= $ambilNama->kategori ?>
						                                	<?php 
						                                			}
						                                		}
						                                	?>
						                                </td>
						                                <td class="text-left" style="text-transform: capitalize;"><?= $row->nama ?></td>
						                                <td class="text-left" style="text-transform: capitalize;"><?= $row->durasi ?></td>
						                                <td class="text-left">RP. <?= number_format($row->harga) ?></td>
						                                <td>
						                                    <div class="table-data-feature">
						                                        <button onclick="window.location='<?php echo base_url();?>admin/edit-paket/<?= $row->id_paket ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
						                                            <i class="zmdi zmdi-edit" style="color:#5cb85c;"></i>
						                                        </button>
						                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_paket_db/');?><?= $row->id_paket ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
						                                            <i class="zmdi zmdi-delete" style="color:#d9534f;"></i>
						                                        </button>
						                                    </div>
						                                </td>
						                            </tr>
		        		<?php
						        	}
						        }
						?>
						                        </tbody>
						                    </table>
						                </div>
						<?php
						    }
						    else{
					    ?>	
		                <div class="table-responsive">
		                    <table class="table table-borderless table-data2">
		                        <thead>
		                            <tr>
		                                <th class="text-left">Tour</th>
		                                <th class="text-left">Nama Paket</th>
		                                <th class="text-left">Durasi</th>
		                                <th class="text-left">Harga</th>
		                                <th></th>
		                            </tr>
		                        </thead>
		                        <tbody>
								<?php
										foreach ($dataPaket->result() as $row){
								?>
									<tr>
		                                <td class="text-left" style="text-transform: capitalize;">
		                                	<?php
		                                		foreach ($dataTour->result() as $ambilNama){
		                                			if($ambilNama->id_tour == $row->id_tour){
		                                	?>		
		                                				<?= $ambilNama->kategori ?>
		                                	<?php 
		                                			}
		                                		}
		                                	?>
		                                </td>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->nama ?></td>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->durasi ?></td>
		                                <td class="text-left">RP. <?= number_format($row->harga) ?></td>
		                                <td>
		                                    <div class="table-data-feature">
		                                        <button onclick="window.location='<?php echo base_url();?>admin/edit-paket/<?= $row->id_paket ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
		                                            <i class="zmdi zmdi-edit" style="color:#5cb85c;"></i>
		                                        </button>
		                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_paket_db/');?><?= $row->id_paket ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
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
