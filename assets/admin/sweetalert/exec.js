const fd = $('.flash-data').data('flashdata');
if(fd){
	Swal.fire({
		text: fd,
		type: 'success'
	});
}

$('.btn-dlt').on('click', function(etc){
	etc.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
	  	title: 'Are you sure?',
	  	type: 'warning',
	  	showCancelButton: true,
	  	confirmButtonColor: '#3085d6',
	  	cancelButtonColor: '#d33',
	  	confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	  	if (result.value) {
	    	document.location.href = href;
	  	}
	})
})
