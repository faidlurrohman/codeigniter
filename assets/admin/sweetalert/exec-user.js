const fd = $('.flash-data').data('flashdata');
if(fd){
	Swal.fire({
		text: fd,
		type: 'success'
	});
}
