$(document).ready(function(){
	$('.toggle_check').bootstrapToggle();
	$('.toggle_check').change(function(){
		var isActive = $(this).prop('checked');
		var baseUrl = $('.base_url').text();
		var id = $(this).attr('dataID');
		$.post(baseUrl + 'admin/featured/toggleFeatured', {id: id, isActive: isActive}, function(response){})
	})
})
