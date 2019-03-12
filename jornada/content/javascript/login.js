/*! ========================================================================
 * login.js
 * Page/renders: page-login.html
 * Plugins used: parsley
 * ======================================================================== */

var scripts = document.getElementsByTagName('script');
var myScript = scripts[ scripts.length - 1 ];

var queryString = myScript.src.replace(/^[^\?]+\??/,'');

var params = parseQuery( queryString );

var preferedname;


function parseQuery ( query ) {
   var Params = new Object ();
   if ( ! query ) return Params; // return empty object
   var Pairs = query.split(/[;&]/);
   for ( var i = 0; i < Pairs.length; i++ ) {
      var KeyVal = Pairs[i].split('=');
      if ( ! KeyVal || KeyVal.length != 2 ) continue;
      var key = unescape( KeyVal[0] );
      var val = unescape( KeyVal[1] );
      val = val.replace(/\+/g, ' ');
      Params[key] = val;
   }
   return Params;
}

if (params['ROOTPATH'] != 'undefined') {
	var ROOTPATH = params['ROOTPATH'] ;	
} else {
	var ROOTPATH = '';
}



$(function () {
    // Login form function
    // ================================
    var $form    = $("form[name=form-login]");

    // On button submit click
    $form.on("click", "button[type=submit]", function (e) {
        var $this = $(this);

        // Run parsley validation
        if ($form.parsley().validate()) {
            // Disable submit button
            $this.prop("disabled", true);

            // start nprogress bar
            NProgress.start();

            // you can do the ajax request here
            // this is for demo purpose only
			var data = $form.serialize(); 
			$.ajax({
					type:"POST",
				  	url: "login/auth",					
					data : data,				
					success: function(msg) {
						console.log(msg);
						if(msg == 1) {
							location.href='dashboard';
						} else if (msg == 2) {
							NProgress.done();
							$(".alert").removeClass("hide");
							$(".alert").html("Usuário inativo. Deseja reativar sua conta? <a href=#>Clique aqui</a>.");
							$this.prop("disabled", false);								
						} else if (msg == 3) {
							NProgress.done();
							$(".alert").removeClass("hide");
							$(".alert").html("Usuário congelado. Por favor entre em contato com o administrador da sua conta.");
							$this.prop("disabled", false);	
						} else if (msg == 4) {
							NProgress.done();
							$(".alert").removeClass("hide");
							$(".alert").html("Usuário inativo. Por favor entre em contato com o administrador do sistema. ");
							$this.prop("disabled", false);														
						} else if (msg == 5) {
							NProgress.done();
							$(".alert").removeClass("hide");
							$(".alert").html("Seu cadastro está incompleto. Por favor, complete o cadastro inicial. Caso o problema persista, entre em contato com o administrador. <br><br> Aguarde, estamos redirecionando para o cadastro inicial.");
							setTimeout( "location.href='../site/welcome.php'",3000 );
							
							
							$this.prop("disabled", false);														
						} else {
							NProgress.done();
							$(".alert").removeClass("hide");
							$(".alert").html("Usuário ou senha inválidos!");
								
								$("#password").val('');
$form
								.removeClass("animation animating shake")
								.addClass("animation animating shake")
								.one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
									$(this).removeClass("animation animating shake");
								});
							$this.prop("disabled", false);

						}
														
					},
					error: function() {
							NProgress.done();
							$(".alert").removeClass("hide");
							$(".alert").html("Ocorreu um erro ao efetuar o login. Por favor tente mais tarde.");
							$this.prop("disabled", false);
					}					
					
				}).done(function() {					
						
					  
				})
				;
        } else {
            // toggle animation
            $form
                .removeClass("animation animating shake")
                .addClass("animation animating shake")
                .one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
                    $(this).removeClass("animation animating shake");
                });
        }
        // prevent default
        e.preventDefault();
    });
});