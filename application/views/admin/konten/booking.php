
<div class="col-xl-9">
	<!-- PAGE CONTENT-->
	<div class="page-content">
		<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
						<i class="mr-2 fa fa-align-justify"></i>
						<strong class="card-title" v-if="headerText">Data Booking</strong>
                    </div>
                    <div class="card-body card-block">
		                <div class="table-responsive">
								<?php
									$jumlahBooking = $dataBooking->num_rows();
									if($jumlahBooking == 0){
								?>
											<span>Belum Ada Data Booking</span>
								<?php
									}
									else{
								?>

		                    <table class="table table-borderless table-data2">
		                        <thead>
		                            <tr>
		                                <th class="text-left">Nama</th>
		                                <th class="text-left">Email</th>
		                                <th class="text-left">No. Tlp/HP</th>
		                                <th class="text-left">Pilihan Booking</th>
		                                <th class="text-left">Keterangan</th>
		                                <th></th>
		                            </tr>
		                        </thead>
		                        <tbody>
								<?php
										foreach ($dataBooking->result() as $row){
								?>
		                            <tr>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->nama ?></td>
		                                <td class="text-left"><?= $row->email_pengirim ?></td>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->tlp ?></td>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->pilihan ?></td>
		                                <td class="text-left" style="text-transform: capitalize;"><?= $row->ket ?></td>
		                                <td>
		                                    <div class="table-data-feature">
		                                        <button onclick="window.location='<?php echo base_url('admin/dub_konten/hapus_booking_db/');?><?= $row->id_booking ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
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
