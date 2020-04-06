	
	<section class="banner_area" data-stellar-background-ratio="0.5" style="background: url(<?php echo base_url('assets/images/bg-footer.jpg'); ?>) no-repeat fixed;">
		<h2>Booking</h2>
	</section>
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row" style="padding-top: 50px;">
                <div class="col-sm-6 contact_info">
                    <h2>Informasi</h2>
                    <p style="text-align: justify !important;">Silahkan hubungi nomor dibawah untuk mendapatkan jawaban yang lebih cepat. Semua data booking yang anda masukkan akan terkirim langsung ke email kami yang sudah tertera di bawah.</p>
                    <div class="location">
                        <div class="location_laft">
                            <a>phone</a>
                            <a>email</a>
                        </div>
                        <div class="address">
                            <a>+6281249924049</a>
                            <a>kindi.subarkah@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Booking Sekarang</h2>
                    <form class="form-inline contact_box" action="<?php echo base_url()?>konten/send_email" method="post" enctype="multipart/form-data">
                        <input type="text" class="form-control input_box" style="color: #555555;" placeholder="Nama" required>
                        <input type="text" class="form-control input_box" style="color: #555555;" placeholder="Email" required>
                        <input type="text" class="form-control input_box" style="color: #555555;" placeholder="No. Tlp/HP" required>
                        <input type="text" class="form-control input_box" style="color: #555555; text-transform: capitalize;" placeholder="Tour/Transport/Hotel Yang di Booking" required>
                        <textarea class="form-control input_box" style="color: #555555; text-transform: capitalize;" placeholder="Keterangan Tambahan"></textarea>
                        <button type="submit" class="btn btn-default">Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
