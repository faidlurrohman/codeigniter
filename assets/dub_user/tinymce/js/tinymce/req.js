
$(document).ready(function(){
	tinymce.init({
		selector: '#tinyMce',
		height : '400px',
  		plugins: [
  			'code',
  			'table',
  			'lists'
  		],
  		menubar : [
  			'edit',
  			'insert',
  			'format'
  		],
  		toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent numlist bullist'
	});
});
