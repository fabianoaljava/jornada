// JavaScript Document

/*! ========================================================================
 * datatable.js
 * Page/renders: table-datatable.html
 * Plugins used: datatable
 * ======================================================================== */
 
 
var scripts = document.getElementsByTagName('script');
var myScript = scripts[ scripts.length - 1 ];

var queryString = myScript.src.replace(/^[^\?]+\??/,'');

var params = parseQuery( queryString );

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

if (params['BUDGETID'] != 'undefined') {
	var BUDGETID = params['BUDGETID'] ;	
} else {
	var BUDGETID = '';
}
 
 
$(function () {
	
	// zero configuration
    // ================================
    $("#zero-configuration").dataTable();
	
	
	$("#datepicker1").datepicker();
	$("#paydate").datepicker();
	$("#duedate").datepicker();
	

    // ajax source
	
    var table = $("#ajax-budget").dataTable({		
        "sAjaxSource": ROOTPATH + "painel/budget/table_budget",
        "sServerMethod": "POST",
		"oLanguage": {
					"sEmptyTable": "Nenhum registro encontrado",
					"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
					"sInfoFiltered": "(Filtrados de _MAX_ registros)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "_MENU_ resultados por página",
					"sLoadingRecords": "Carregando...",
					"sProcessing": "Processando...",
					"sZeroRecords": "Nenhum registro encontrado",
					"sSearch": "Pesquisar",
					"oPaginate": {
						"sNext": "Próximo",
						"sPrevious": "Anterior",
						"sFirst": "Primeiro",
						"sLast": "Último"
					},
					"oAria": {
						"sSortAscending": ": Ordenar colunas de forma ascendente",
						"sSortDescending": ": Ordenar colunas de forma descendente"
					}
				},
				
						
		"aoColumnDefs": [
            {
                "mRender": function (data, type, row) {			
						
								
                    if (data != null) return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='#' data-toggle='modal' data-target='#ModalBudget' id='editar' data-value='" + data + "'><i class='icon ico-edit'></i>Alterar</a></li><li class='divider'></li><li><a href='#' id='aprovar' data-toggle='modal' data-target='#ModalApproval' data-value='" + data + "'  class='text-success'><i class='icon ico-checkmark-circle2'></i>Marcar como aprovado</a></li><li><a href='"+ ROOTPATH + "painel/budget/discard/" + data + "' class='text-danger'><i class='icon ico-cancel-circle2'></i>Marcar como descartado</a></li></ul></div>";
                },
                "aTargets": [-1]
            }, 
			{
				"mRender": function (data, type, row) {
					
					if (data != null) return str_pad(data, 6, '0', 'STR_PAD_LEFT');
					
                },
                "aTargets": [0]		
			},
			{
				"mRender": function (data, type, row) {
					
					if (data != null) return "R$ " + parseFloat(data).toFixed(2);
					
                },
                "aTargets": [3]		
			}, 			 
			{
				"mRender": function (data, type, row) {
					
					
					if (data != '' && data != null) {
					
						var filename = data.substr(data.lastIndexOf('/')+1);
						
						if (filename.length > 10) filename = filename.substr(0, 20) + "...";
												
						return "<a href='" + data + "' target='_blank'>" +  filename + "</a>";
					} 
                },
                "aTargets": [4]		
			},
			{
				"mRender": function (data, type, row) {
					if (data == 0) return "<button type='button' class='btn btn-sm btn-default bgcolor-pendente' id='btnpendente'>PENDENTE</button>";
					if (data == 1) return "<button type='button' class='btn btn-sm btn-default bgcolor-aprovado'>APROVADO</button>";
					if (data == 2) return "<button type='button' class='btn btn-sm btn-default bgcolor-descartado'>DESCARTADO</button>";															
                },
                "aTargets": [5]					
			}
			
			]
    });
	
	
	$('#ajax-budget tbody').on( 'click', '#editar', 'datavalue', function (event) {
		

		$("#loading").show();
		$("#btn_submit").attr("disabled", "disabled");
		
		$.get( ROOTPATH + 'painel/budget/get_budget/' + $( this ).attr('data-value'), function( data ) {
				var response = jQuery.parseJSON(data);
				
//				$("#payvalue").val(parseFloat(response.value).toFixed(2));
				$("#edit_id").val(response.id);
				$("#company").val(response.company);
				$("#service").val(response.service);
				$("#value").val(response.value);
				$("#notes").val(response.notes);
				$("#proposal").val(response.proposal);				
				
				
				$("#btn_submit").html("Alterar");
				
				
				
				$("#loading").hide();
				$("#btn_submit").removeAttr("disabled");
								
				
		})
		  .fail(function() {
				alert( "Não foi possível carregar o orçamento." );
				$("#formbudget")[0].reset();
				$("#loading").hide();
				$("#btn_submit").removeAttr("disabled");
						
		  })

		
	});
	

	
	$('#ajax-budget tbody').on( 'click', '#aprovar', 'datavalue', function (event) {
		$("#id").val($( this ).attr('data-value'));
		
		$("#payvalue").val("Carregando...");
		$("#loadingapprove").show();
		$("#btn_approve").attr("disabled", "disabled");
		
		$.get( ROOTPATH + 'painel/budget/get_budget/' + $( this ).attr('data-value'), function( data ) {
				var response = jQuery.parseJSON(data);
				
				$("#payvalue").val(parseFloat(response.value).toFixed(2));
				$("#budgetid").val(response.id);
				$("#loadingapprove").hide();
				$("#btn_approve").removeAttr("disabled");
								
				
		})
		  .fail(function() {
				alert( "Não foi possível carregar o orçamento." );
				$("#payvalue").val("");
				$("#loadingapprove").hide();
						
		  })
		
		
    } )		
	
	var table = $("#ajax-approved").dataTable({
        "sAjaxSource": ROOTPATH + "painel/budget/table_approved",
        "sServerMethod": "POST",
		
		"oLanguage": {
					"sEmptyTable": "Nenhum registro encontrado",
					"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
					"sInfoFiltered": "(Filtrados de _MAX_ registros)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "_MENU_ resultados por página",
					"sLoadingRecords": "Carregando...",
					"sProcessing": "Processando...",
					"sZeroRecords": "Nenhum registro encontrado",
					"sSearch": "Pesquisar",
					"oPaginate": {
						"sNext": "Próximo",
						"sPrevious": "Anterior",
						"sFirst": "Primeiro",
						"sLast": "Último"
					},
					"oAria": {
						"sSortAscending": ": Ordenar colunas de forma ascendente",
						"sSortDescending": ": Ordenar colunas de forma descendente"
					}
				},
				
						
		"aoColumnDefs": [
            {
                "mRender": function (data, type, row) {			
						
								
                    if (data != null) return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='"+ ROOTPATH + "painel/budget/client/tabpagamentos/" + data + "' id='payments'><i class='icon ico-money'></i>Pagamentos</a></li><li class='divider'></li><li><a href='"+ ROOTPATH + "painel/discard/" + data + "' class='text-danger'><i class='icon ico-cancel-circle2'></i>Marcar como descartado</a></li></ul></div>";
                },
                "aTargets": [-1]
            }, 
			{
				"mRender": function (data, type, row) {
					
					if (data != null) return str_pad(data, 6, '0', 'STR_PAD_LEFT');
					
                },
                "aTargets": [0]		
			},
			{
				"mRender": function (data, type, row) {
					
					return "R$ " +  parseFloat(data).toFixed(2);
					
                },
                "aTargets": [3]		
			}, 			 
			{
				"mRender": function (data, type, row) {
					
					
					if (data != '' && data != null) {
												
						if (data.lastIndexOf('/') > 0) filename = data.substr(data.lastIndexOf('/')+1);
						
						if (filename.length > 10) filename = filename.substr(0, 20) + "...";
												
						return "<a href='" + data + "' target='_blank'>" +  filename + "</a>";
					} else
						return '';
                },
                "aTargets": [5]		
			}
			
			]
    });	
	
	
	
	if (BUDGETID != '') 
		paymenturl = ROOTPATH + "painel/budget/table_payments/" + BUDGETID;
	else
		paymenturl = ROOTPATH + "painel/budget/table_payments";
		
		
	var table_payments = $("#ajax-payments").dataTable({	
        "sAjaxSource": paymenturl,
        "sServerMethod": "POST",
		"aaSorting": [[ 5, 'asc' ]], 
		"oLanguage": {
					"sEmptyTable": "Nenhum registro encontrado",
					"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
					"sInfoFiltered": "(Filtrados de _MAX_ registros)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "_MENU_ resultados por página",
					"sLoadingRecords": "Carregando...",
					"sProcessing": "Processando...",
					"sZeroRecords": "Nenhum registro encontrado",
					"sSearch": "Pesquisar",
					"oPaginate": {
						"sNext": "Próximo",
						"sPrevious": "Anterior",
						"sFirst": "Primeiro",
						"sLast": "Último"
					},
					"oAria": {
						"sSortAscending": ": Ordenar colunas de forma ascendente",
						"sSortDescending": ": Ordenar colunas de forma descendente"
					}
				},
				
						
		"aoColumnDefs": [

            {
                "mRender": function (data, type, row) {			
						
					
                    if (data != null) return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='#' data-toggle='modal' data-target='#ModalEditPayment' id='editar' data-value='" + data + "'><i class='icon ico-edit'></i>Alterar</a></li><li class='divider'></li><li><a href='"+ ROOTPATH + "painel/budget/paymentcheck/" + data + "'  class='text-success' id='paycheck'><i class='icon ico-checkmark-circle2'></i>Marcar como Pago</a></li><li><a href='"+ ROOTPATH + "painel/budget/paymentcancel/" + data + "' class='text-danger'  id='paycancel'><i class='icon ico-cancel-circle2'></i>Marcar como Cancelado</a></li></ul></div>";
                },
                "aTargets": [-1]
            }, 
			{
				"mRender": function (data, type, row) {
					if (data != null) return str_pad(data, 6, '0', 'STR_PAD_LEFT');
                },
                "aTargets": [0]		
			},
			{
				"mRender": function (data, type, row) {
					
					if (data != null)  return "R$ " + parseFloat(data).toFixed(2);

                },
                "aTargets": [4]		
			}, 
			{
				"mRender": function (data, type, row) {
					if (data != null) {
						var d = new Date(data);
						return d.toLocaleDateString("pt-BR");				
					}
                },
				"sType": "date",
                "aTargets": [5]		
			},
			{
				"mRender": function (data, type, row) {
					if (data == 0) return "<button type='button' class='btn btn-sm btn-default bgcolor-pendente' id='btnpendente'>PENDENTE</button>";
					if (data == 1) return "<button type='button' class='btn btn-sm btn-default bgcolor-pago'>PAGO</button>";
					if (data == 2) return "<button type='button' class='btn btn-sm btn-default bgcolor-cancelado'>CANCELADO</button>";					
					if (data == 3) return "<button type='button' class='btn btn-sm btn-default bgcolor-atrasado'>ATRASADO</button>";															
                },
                "aTargets": [6]					
			}
			
			]
    });	


	$('#ajax-payments tbody').on( 'click', '#editar', 'datavalue', function (event) {
		
		$("#loadingpayment").show();
		$("#btn_submitpayment").attr("disabled", "disabled");
		
		$.get( ROOTPATH + 'painel/budget/get_payment/' + $( this ).attr('data-value'), function( data ) {
				var response = jQuery.parseJSON(data);
				

				$("#payment_id").val(response.id);
				$("#paydescription").val(response.description);
				$("#duevalue").val(parseFloat(response.value).toFixed(2));
				
				
				if (response.duedate != null) {
						var d = new Date(response.duedate);
						$("#duedate").val(d.toLocaleDateString("pt-BR"));				
				}
					
				$("#paymentvalue").val(parseFloat(response.payvalue).toFixed(2));

				
				if (response.paydate != null && response.paydate != '0000-00-00 00:00:00' ) {
						var d = new Date(response.paydate);
						$("#paydate").val(d.toLocaleDateString("pt-BR"));				
				}
															
				$("#notes").val(response.notes);
				$("#paystatus").val(response.status);				
				
				
				$("#loadingpayment").hide();
				$("#btn_submitpayment").removeAttr("disabled");
								
				
		})
		  .fail(function() {
				alert( "Não foi possível carregar o orçamento." );
				$("#loadingpayment").hide();
				$("#btn_submitpayment").removeAttr("disabled");
						
		  })

		
	});
	
	$('#ajax-payments tbody').on( 'click', '#paycancel', function () {		        
		if (confirm('Deseja realmente cancelar este pagamento?') == false) {
			
			return false;
		}
    } )	
	
	$('#proposalfile').change(function() {
		$('#proposal').val("carregando...");
		return ajaxPhotoUpload();		
	});
	
	
	
	$('#btn_new').click(function() {
		
		$("#formbudget")[0].reset();
		$("#btn_submit").html("Adicionar");

	});
	
	


    
});







function ajaxPhotoUpload()
	{
		
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
			$("#btn_submit").attr("disabled", "disabled");
		})
		.ajaxComplete(function(){
			$(this).hide();
			$("#btn_submit").removeAttr("disabled");		
		});

		$.ajaxFileUpload
		(
			{
				url: ROOTPATH + 'painel/budget/upload_proposal',
				secureuri:false,
				fileElementId:'proposalfile',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							alert(data.error);
							$('#proposal').val(data.msg);
							
						}else
						{

							$('#proposal').val(data.path);
							
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;

	}  
	
	
	function setPayOptions(opt) {

		
		if (opt.value == 1) {
			//habilitar numero de parcelas
			$("#div_payinstallments").show();
			$("#div_interestrate").hide();
		} else if (opt.value == 2) {
			$("#div_payinstallments").show();
			$("#div_interestrate").show();
			//habilitar numero de parcelas e juros									
		} else {
			$("#div_payinstallments").hide();			
			$("#div_interestrate").hide();
		}
	}
	
	
	