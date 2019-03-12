/*! ========================================================================
 * ajax.js
 * Page/renders: forms-ajax.html
 * 
 * NOTE: in this demo i'll use bootstrap alert component to display the 
 * done/fail message. You can always use any other notification components 
 * like modal or gritter to display the message to the users ;)
 * ======================================================================== */
$(function () {
    // On success / done

    // ================================
    $("html").on("fa.formajax.done", function (event, data) {
        // construct bootstrap alert with some css animation
		
		var bsalert = '';
				
		
		if (data.response.code == 200) {					

				bsalert += '<div class="alert alert-success animation animating flipInX">';
				bsalert += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
				bsalert += '<h4 class="semibold mb5">Sucesso!</h4>';
				bsalert += '<p class="nm">'+data.response.text+'</p>';
				bsalert += '</div>';
		} else {
			
				bsalert += '<div class="alert alert-danger animation animating flipInX">';
				bsalert += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
				bsalert += '<h4 class="semibold mb5">Erro!</h4>';
				bsalert += '<p class="nm">'+data.response.text+'</p>';
				bsalert += '</div>';			
		}
			
        // append to affected form
        data.element
            .find(".message-container")
            .html(bsalert);

		$("html, body").animate({
                        scrollTop: $(".message-container").offset().top - 100
                    }, 200);					
		
		if (data.response.redirect.length > 0) {
			setTimeout(function() {
				location.href = data.response.redirect;
			}, 2000);
		}

		
    });

    // On fail / error
    // ================================
    $("html").on("fa.formajax.fail", function (event, data) {
        // define some variable
        var bsalert = '', 
            message;
		
		
		$.each( data.response, function( index, value ) {
  				console.log( "index", index, "value", value );
		});
		
		
        // construct message base on status code
        switch (data.response.status) {
            case 404:
                message = "Não foi possível enviar o formulário. Destino não encontrado. Se o problema persistir, por favor contate o administrador.";
            break;
            case 500:
                message = "Não foi possível enviar o formulário. Erro interno de script. Se o problema persistir, por favor contate o administrador.";
            break;
        }
        // construct bootstrap alert with some css animation
        bsalert += '<div class="alert alert-danger animation animating flipInX">';
        bsalert += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        bsalert += '<h4 class="semibold mb5">'+data.response.status+' error!</h4>';
        bsalert += '<p class="nm">'+message+'</p>';
        bsalert += '</div>';

        // append to affected form
        data.element
            .find(".message-container")
            .html(bsalert);
			
		$("html, body").animate({
                        scrollTop: 0
                    }, 200);			
    });
});