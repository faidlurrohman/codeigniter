
<div class="col-xl-9">
	<!-- PAGE CONTENT-->
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>Masukkan Data Hotel</strong>
					</div>
					<form action="<?php echo base_url('admin/dub_konten/tambah_hotel_db')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
						<div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Daerah</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="selectDaerah" id="selectDaerah" class="form-control">
	                                        <option>Pilih Daerah</option>
				    					<?php foreach($dataDaerah->result() as $row){ ?>
	                                        <option style="text-transform: capitalize;" value="<?php echo $row->id_daerah ?>">
	                                        	<?php echo ucwords($row->daerah) ?>		
	                                        </option>
										<?php } ?>
                                    </select>
                                </div>
                            </div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="hotelBaru" class=" form-control-label">Nama Hotel</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="text" id="hotelBaru" name="hotelBaru" autocomplete="off" style="text-transform: capitalize;" placeholder="Nama Hotel" class="form-control">
								</div>
							</div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="selectBintang" class=" form-control-label">Bintang</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="selectBintang" id="selectBintang" class="form-control">
                                        <option value="0">Tidak Berbintang</option>
                                        <option value="1">Bintang 1</option>
                                        <option value="2">Bintang 2</option>
                                        <option value="3">Bintang 3</option>
                                        <option value="4">Bintang 4</option>
                                        <option value="5">Bintang 5</option>
                                    </select>
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
									$jumlahHotel = $dataHotel->num_rows();
									if($jumlahHotel == 0){
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
			                                    <option style="text-transform: capitalize;" value="semua">Semua Daerah</option>
					    					<?php foreach($dataDaerah->result() as $row){ ?>
			                                    <option style="text-transform: capitalize;" value="<?php echo $row->id_daerah ?>">
			                                    	<?php echo ucwords($row->daerah) ?>		
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
						                                <th class="text-left">Daerah Hotel</th>
						                                <th class="text-left">Nama Hotel</th>
						                                <th class="text-left">Bintang</th>
						                                <th></th>
						                            </tr>
						                        </thead>
						                        <tbody>
						<?php
						        foreach ($dataHotel->result() as $row){
						        	if($_POST['sortTabel'] == $row->id_daerah){
					    ?>
													<tr>
						                                <td class="text-left" style="text-transform: capitalize;">
						                                	<?php
						                                		foreach ($dataDaerah->result() as $ambilNama){
						                                			if($ambilNama->id_daerah == $row->id_daerah){
						                                	?>		
						                                				<?= $ambilNama->daerah ?>
						                                	<?php 
						                                			}
						                                		}
						                                	?>
						                                </td>
						                                <td class="text-left" style="text-transform: capitalize;"><?= $row->nama ?></td>
						                                <td class="text-left"><?= $row->bintang ?></td>
						                                <td>
						                                    <div class="table-data-feature">
						                                        <button onclick="window.location='<?php echo base_url();?>admin/edit-hotel/<?= $row->id_hotel ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
						                                            <i class="zmdi zmdi-edit" style="color:#5cb85c;"></i>
						                                        </button>
						                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_hotel_db/');?><?= $row->id_hotel ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
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
						                                		foreach ($dataDaerah->result() as $ambilNama){
						                                			if($ambilNama->id_daerah == $row->id_daerah){
						                                	?>		
						                                				<?= $ambilNama->daerah ?>
						                                	<?php 
						                                			}
						                                		}
						                                	?>
						                                </td>
						                                <td class="text-left" style="text-transform: capitalize;"><?= $row->nama ?></td>
						                                <td class="text-left"><?= $row->bintang ?></td>
						                                <td>
						                                    <div class="table-data-feature">
						                                        <button onclick="window.location='<?php echo base_url();?>admin/edit-hotel/<?= $row->id_hotel ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
						                                            <i class="zmdi zmdi-edit" style="color:#5cb85c;"></i>
						                                        </button>
						                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_hotel_db/');?><?= $row->id_hotel ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
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
		                                <th class="text-left">Daerah Hotel</th>
		                                <th class="text-left">Nama Hotel</th>
		                                <th class="text-left">Bintang</th>
		                                <th></th>
		                            </tr>
		                        </thead>
		                        <tbody>
								<?php
										foreach ($dataHotel->result() as $row){
								?>
									<tr>
		                                <td class="text-left" style="text-transform: capitalize;">
		                                	<?php
		                                		foreach ($dataDaerah->result() as $ambilNama){
		                                			if($ambilNama->id_daerah == $row->id_daerah){
		                                	?>		
		                                				<?= $ambilNama->daerah ?>
		                                	<?php 
		                                			}
		                                		}
		                                	?>
		                                </td>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->nama ?></td>
		                                <td class="text-left"><?= $row->bintang ?></td>
		                                <td>
		                                    <div class="table-data-feature">
		                                        <button onclick="window.location='<?php echo base_url();?>admin/edit-hotel/<?= $row->id_hotel ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
		                                            <i class="zmdi zmdi-edit" style="color:#5cb85c;"></i>
		                                        </button>
		                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_hotel_db/');?><?= $row->id_hotel ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
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
