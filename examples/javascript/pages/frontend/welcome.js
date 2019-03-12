/*! ========================================================================
 * register.js
 * Page/renders: page-register.html
 * Plugins used: parsley
 * ======================================================================== */
$(function () {

	
	
	
    // Form wizard with no validation
    // ================================
    $("#wizard").steps({
        headerTag: ".wizard-title",
        bodyTag: ".wizard-container",
        onFinished: function () {
            // do anything here ;)
			//iniciar();
			$("#wizard").submit();
        },
		labels: {
			cancel: "Cancelar",
			current: "Atual:",
			pagination: "Paginação",
			finish: "Comece agora!",
			next: "Próximo",
			previous: "Anterior",
			loading: "Carregando ..."
	    },
		    onStepChanging: function (event, currentIndex, newIndex) { 
			
				if (currentIndex == 2) {
					if ($("#level_id").val() == '' || $("#type_id").val() == '') {
						alert('Selecione o seu plano')
					} else {
						return true;	
					}
					
				} else {
					
					return true;
				}
			},

    });
	
	if ($("#plan_id").val() != '') { 
		get_plan();
		setPlanType($("#type_id").val() );
	}

    
	
});



	function setLevelId(levelid) {
		$("#level_id").val(levelid);
					
		//reseta buttons
		resetabuttons()
	}

	
	function setPlanType(plantype) {
		
		if (plantype != '') {
			
			$("#type_id").val(plantype);
			
			
			$("#levelid"+$("#level_id").val()).removeClass("btn-success");
			$("#levelid"+$("#level_id").val()).addClass("btn-selected");								
			$("#levelid"+$("#level_id").val()).html("<i class=ico-check></i>Selecionado");
			
			$('#ModalPlanType').modal('hide');
			
			get_plan();
			
		} else {
			resetabuttons()
		}
	}

	function get_plan() {
								
			
		$("#totalcost").val("Carregando...");
		$.get('../painel/ourday/get_plan_byids/' + $("#level_id").val() + '/' + $("#type_id").val(), function( data ) {
				var response = jQuery.parseJSON(data);
				$("#itemCode").val(response.tag);
				$("#plantag").val(response.tag);
				$("#planvalue").html("R$ " + parseFloat(response.value).toFixed(2));
				$("#plandesc").html(response.description);
				$("#plan_id").val(response.id);
				$("#tag").val(response.tag);
				$("#description").val(response.description);
				$("#totalcost").val(response.value);				
				
				
				switch($("#type_id").val()) {
					case '1':
						$("#plantype").html("/ mês");
						$("#planvalue").html("<span style='text-decoration:line-through'>De: R$ " + parseFloat(response.value).toFixed(2) + "</span><br>Por: R$ 30,00 <br> <small>* Válido para os 2 primeiros meses. Após esse período, retornará ao valor normal.</small>");
						$("#tag").val('F50AB35CB3B3860CC4253FBEA8751CA0');
						$("#itemCode").val('F50AB35CB3B3860CC4253FBEA8751CA0');
						
						break;
					case 3:
						$("#plantype1").html("/ trimestre");					
						break;
					case 6:
						$("#plantype1").html("/ semestre");					
						break;

					case 12:
						$("#plantype1").html("/ ano");					
						break;
					default:
						$("#plantype").html("/ indefinido");
				}
				
		})
		  .fail(function() {
			alert( "Não foi possível carregar o valor do plano." );
			$("#planvalue").html("");
			$("#planvalue").html("");			

		  })
			  
	
		
	}
	
	
	function resetabuttons() {
		
		$("#levelid1").html("Selecionar");
		$("#levelid2").html("Selecionar");				
		$("#levelid3").html("Selecionar");
		
						
		$("#levelid1").removeClass("btn-selected");
		$("#levelid2").removeClass("btn-selected");		
		$("#levelid3").removeClass("btn-selected");

		$("#levelid1").addClass("btn-success");
		$("#levelid2").addClass("btn-success");
		$("#levelid3").addClass("btn-success");	
	}