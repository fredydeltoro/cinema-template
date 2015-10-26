jQuery(document).ready(function($){

	var path = location.pathname;
    var background = $(".bkgnd").text()

	if (path == '/tu_cine/' || path == '/tucine/index.php') {
		$('.banner').show()
        $('.main').css("background",'url('+background+')')
        $('.bkg').css('position', 'absolute')
	}
	else{
		$('.banner').hide()
	}

	$(".menu-items").removeClass("nav")

	$('.fa-phone').click(function() {
		$('.tel-contenedor').fadeToggle()
	})

	$('.btn_sin').click(function() {
		$('.btn_hr').css('background','#CC3940')
		$('.btn_sin').css('background','#C5C3C0')
		$('h2').text('Sinopsis')
		$('.descripcion').show()
		$('.horario').hide()
	})

	$('.btn_hr').click(function() {
		$('.btn_sin').css('background','#CC3940')
		$('.btn_hr').css('background','#C5C3C0')
		$('h2').text('Horario')
		$('.horario').show()
		$('.descripcion').hide()
	})
	
	$('.horario').scroll(function() {
		var top = $('.horario').scrollTop()
		$('.dias').css('top',top)
		if (top >0) $('.dias').css('box-shadow','0px 5px 15px 1px rgba(0, 0, 0, 0.5)')
		if (top == 0) $('.dias').css('box-shadow','none') 
	})

	$('.menu-movil').click(function() {
		$('.menu-select').slideToggle()
	})
})
