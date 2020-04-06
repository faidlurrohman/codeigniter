$(document).ready(function(){ // Ketika halaman sudah diload dan siap
	$("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
		var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
		var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
		
		// Kita akan menambahkan form dengan menggunakan append
		// pada sebuah tag div yg kita beri id insert-form
		$("#insert-form").append(
			"<div class='card-body card-block'>" +
      "<div class='card-title'>" +
      "<h3 class='text-center title-2'>Data Kamar " + nextform + "</h3>"+
      "</div>" +
      "<hr>" +
			"<div class='row form-group'>" +
			"<div class='col col-md-3'>" +
			"<label for='kmrBaru' class='form-control-label'>Nama Kamar</label>" +
			"</div>" +
			"<div class='col-12 col-md-9'>" +
			"<input type='text' id='kmrBaru' name='kmrBaru[]' autocomplete='off' style='text-transform: capitalize;' placeholder='Nama Kamar' class='form-control' required>" +
			"</div>" +
			"</div>" +
			"<div class='row form-group'>" +
			"<div class='col col-md-3'>" +
			"<label for='lowBaru' class='form-control-label'>Low Seasson</label>" +
			"</div>" +
			"<div class='col-12 col-md-9'>" +
      "<div class='input-group'>" +
      "<div class='input-group-prepend'>" +
    										"<label class='input-group-text' for='inputGroupSelect01'>RP</label>" +
      "</div>" +
			"<input type='text' id='lowBaru' name='lowBaru[]' autocomplete='off' style='text-transform: capitalize;'' placeholder='Low Seasson' class='form-control' required>" +
      "</div>" +
                                    "<small class='form-text text-muted'>Masukkan angka tanpa koma atau titik</small>" +
			"</div>" +
			"</div>" +
			"<div class='row form-group'>" +
			"<div class='col col-md-3'>" +
			"<label for='peakBaru' class='form-control-label'>Peak Seasson</label>" +
			"</div>" +
			"<div class='col-12 col-md-9'>" +
      "<div class='input-group'>" +
      "<div class='input-group-prepend'>" +
    										"<label class='input-group-text' for='inputGroupSelect01'>RP</label>" +
      "</div>" +
			"<input type='text' id='peakBaru' name='peakBaru[]' autocomplete='off' style='text-transform: capitalize;'' placeholder='Peak Seasson' class='form-control' required>" +
      "</div>" +
                                    "<small class='form-text text-muted'>Masukkan angka tanpa koma atau titik</small>" +
			"</div>" +
			"</div>" +
			"<div class='row form-group'>" +
			"<div class='col col-md-3'>" +
			"<label for='highBaru' class='form-control-label'>High Seasson</label>" +
			"</div>" +
			"<div class='col-12 col-md-9'>" +
      "<div class='input-group'>" +
      "<div class='input-group-prepend'>" +
    										"<label class='input-group-text' for='inputGroupSelect01'>RP</label>" +
      "</div>" +
			"<input type='text' id='highBaru' name='highBaru[]' autocomplete='off' style='text-transform: capitalize;'' placeholder='High Seasson' class='form-control' required>" +
      "</div>" +
                                    "<small class='form-text text-muted'>Masukkan angka tanpa koma atau titik</small>" +
			"</div>" +
			"</div>" +
			"</div>"
		);
		$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
	});
	
	// Buat fungsi untuk mereset form ke semula
	$("#btn-reset-form").click(function(){
		$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
		$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
	});
});
