<div class="col-xl-9">
	<div class="page-content">
        <div class="row m-t-25">
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-inbox"></i>
                            </div>
                            <div class="text">
                                <h2>
	                            	<?php 
	                            		echo $dataPaket->num_rows();
	                            	?>
	                            </h2>
                                <span>Paket</span>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-hotel"></i>
                            </div>
                            <div class="text">
                                <h2>
	                            	<?php 
	                            		echo $dataHotel->num_rows();
	                            	?>
                            	</h2>
                                <span>Hotel</span>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-rss"></i>
                            </div>
                            <div class="text">
                                <h2>
	                            	<?php 
	                            		echo $dataBlog->num_rows();
	                            	?>
	                            </h2>
                                <span>Blog</span>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-image-o"></i>
                            </div>
                            <div class="text">
                                <h2>
	                            	<?php 
	                            		echo $dataGaleri->num_rows();
	                            	?>
	                            </h2>
                                <span>Galeri</span>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <!-- <div class="col-md-12">
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
		                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/edit_daerah/');?><?= $row->id ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
		                                            <i class="zmdi zmdi-edit"></i>
		                                        </button>
		                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_daerah_db/');?><?= $row->id ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
		                                            <i class="zmdi zmdi-delete"></i>
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
                        <strong>Data Hotel</strong>
                    </div>
                    <div class="card-body card-block">
		                <div class="table-responsive">
								<?php
									$jumlahHotel = $dataHotel->num_rows();
									if($jumlahHotel == 0){
								?>
											<span>Belum Ada Data Hotel, Silahkan Menambahkan Data Hotel Diatas!</span>
								<?php
									}
									else{
								?>
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
		                                			if($ambilNama->id == $row->id_daerah){
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
		                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/edit_hotel/');?><?= $row->id ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
		                                            <i class="zmdi zmdi-edit"></i>
		                                        </button>
		                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_hotel_db/');?><?= $row->id ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
		                                            <i class="zmdi zmdi-delete"></i>
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
            </div> -->
		</div>
	</div>
</div>
