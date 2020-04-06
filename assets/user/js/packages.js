function myFunction(e) {
    var myUrl = 'http://localhost/kindi/booking/get_price_package';
	$.ajax({
		url : myUrl,
		method : 'POST',
		data : {id: e.target.value},
		async : true,
		dataType : 'json',
		success: function(data){
		    var html;
		    var i;
		    var j;
		    //price
			for(i=0; i<data.length; i++){
    			document.getElementById('package_name_booking').value = data[i].name;
				document.getElementById('price_booking').value = 'IDR ' + data[i].price;
				//guest
				for(j=1; j<=data[i].max_guest; j++){
					html += '<option style="color:#000;" value='+j+'>'+j+'</option>';
				}
				$('#guest_booking').html(html);
			}
		}
	});
	return false;
}
