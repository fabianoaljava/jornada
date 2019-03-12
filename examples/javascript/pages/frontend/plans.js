/*! ========================================================================
 * register.js
 * Page/renders: page-register.html
 * Plugins used: parsley
 * ======================================================================== */
$(function () {

	
	
	

    
	
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
					case 1:
						$("#plantype").html("/ mês");
						break;
					case 3:
						$("#plantype").html("/ trimestre");					
						break;
					case 6:
						$("#plantype").html("/ semestre");					
						break;

					case 12:
						$("#plantype").html("/ ano");					
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
		
		$("#levelid1").html("Comece agora!");
		$("#levelid2").html("Comece agora!");				
		$("#levelid3").html("Comece agora!");
		
						
		$("#levelid1").removeClass("btn-selected");
		$("#levelid2").removeClass("btn-selected");		
		$("#levelid3").removeClass("btn-selected");

		$("#levelid1").addClass("btn-success");
		$("#levelid2").addClass("btn-success");
		$("#levelid3").addClass("btn-success");	
	}