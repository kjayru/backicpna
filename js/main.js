var block = true;

$(document).on('ready', function(){

	$('input[type="text"], input[type="password"]').on('focus',function(){ $('.login__msg').removeClass('act'); });

	$('input').keyup(function () {
	    var valid = $(this).attr('valid');
	    var inp = $(this);
	    switch (valid) {
	        case 'num':
	            inp.val(inp.val().replace(/[^0-9]/g, function () { return ''; }));
	            break;
	        case 'email':
	            inp.val(inp.val().replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ/@/./_/-]/g, function () { return ''; }));
	            break;
	    }
	});

	$('form').on('submit', function(e){
		e.preventDefault();
		var error = 0,
			f = $(this);

		$.each(f.find('input[type="text"], input[type="password"]'), function(index, val) {
			if($.trim($(this).val())=='' ) { $(this).addClass('error'); error++; }
		});
		
		if(error==0&&block) 
		{
			block=false;
			var form = $(this).serializeArray();
			$.ajax({
				url: 'process.php',
				type: 'POST',
				dataType: 'json',
				data: form
			})
			.done(function(data) {
				console.log(data);
				if(data.r==true) {
					 location.href = data.url
				 }else{ 
					 $('#usuario, #contrasena').val(''); $('.login__msg').addClass('act'); block=true;
				 }
			});
		}
	});

})