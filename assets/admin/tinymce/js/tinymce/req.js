$(document).ready(function(){
	tinymce.init({
		selector: '#tinyMce',
		height : '300px',
		plugins: [
			'image',
			'code',
			'table',
			'lists'
		],
		menubar : [
			'edit',
			'insert',
			'format'
		],
		toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent numlist bullist link image',
		paste_data_images : true,
	    file_picker_callback: function(callback, value, meta) {
	      	if (meta.filetype == 'image') {
	        	$('#upload').trigger('click');
	        	$('#upload').on('change', function() {
	          		var file = this.files[0];
	          		var reader = new FileReader();
	          		reader.onload = function(e) {
	            		callback(e.target.result, {
	              			alt: ''
	            		});
	          		};
	          		reader.readAsDataURL(file);
	        	});
	      	}
	  	},
	});
});
