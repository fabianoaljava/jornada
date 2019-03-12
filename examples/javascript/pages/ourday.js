// JavaScript Document

 
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
 
 

  $(function(){

	
	// zero configuration
    // ================================
    $("#zero-configuration").dataTable();
	
	$("#paydate").datepicker();		
	
	load_grid();

    // ajax source
	
    var table = $("#ajax-admin").dataTable({
        "sAjaxSource": ROOTPATH + "painel/ourday/table_admin",
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
                    return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='invoice/" + data + "' id='invoice'><i class='icon ico-money'></i>Faturas</a></li><li><a href='" + ROOTPATH + "painel/ourday/client/tabprofilehe/" + data + "' id='editar'><i class='icon ico-pencil'></i>Alterar</a></li><li class='divider'></li><li><a href='del/" + data + "' id='del' class='text-danger'><i class='icon ico-remove3'></i>Desativar</a></li></ul></div>";				
                },
                "aTargets": [-1]
            },
			{
                "mRender": function (data, type, row) {
					avatar = (data == '')?ROOTPATH + 'userfiles/avatarhe.jpg':ROOTPATH + data;
                    return "<img src='" + avatar + "' class='img-circle' width=36>";
                },
                "aTargets": [0]
			},{
                "mRender": function (data, type, row) {
					avatar = (data == '')?ROOTPATH + 'userfiles/avatarshe.jpg':ROOTPATH + data;
                    return "<img src='" + avatar + "' class='img-circle' width=36>";
                },
                "aTargets": [1]
			}, 
			{
				"mRender": function (data, type, row) {
					if (data != '' && data != '0000-00-00') {
						var d = new Date(data);
	                    return d.toLocaleDateString("pt-BR");				
					} else return '';
                },
                "aTargets": [5]		
			},
			{
				"mRender": function (data, type, row) {
					if (data == 0) return "<button type='button' class='btn btn-sm btn-default bgcolor-inativo'>INATIVO</button>";
					if (data == 1) return "<button type='button' class='btn btn-sm btn-default bgcolor-ativo'>ATIVO</button>";
					if (data == 2) return "<button type='button' class='btn btn-sm btn-default bgcolor-congelado'>CONGELADO</button>";					
                },
                "aTargets": [6]					
			}



			
			]
    });
	
	

	$('#ajax-admin tbody').on( 'click', '#del', function () {		        
		if (confirm('Deseja realmente desativar este registro?') == false) {			
			return false;
		}
    } )
	
	
	
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	/////////////////////////////// 			INVOICE BEGIN		///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////	

	
	
	
	urlstr = document.location.toString().toLowerCase();

	ourdayid = (urlstr.substr(urlstr.lastIndexOf('/')+1));

    var table_invoice = $("#ajax-invoice").dataTable({
        "sAjaxSource": ROOTPATH + "painel/ourday/table_invoice/" + ourdayid,
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
                    return "<div class='btn-group' style='width:80px !important' id='btn-group'  data-value='" + data + "'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a data-toggle=modal data-target=#ModalPagSeguro id='invoice'><i class='icon ico-money'></i>Pagar</a></li><li class='divider'></li><li><a href='#' id='invoicecheck' data-value='" + data + "'  class='text-success'><i class='icon ico-checkmark-circle2'></i>Marcar como pago</a></li><li class='divider'></li><li><a href='#' data-value='" + data + "' id='editar'><i class='icon ico-pencil'></i>Alterar</a></li><li><a href='#' data-value='" + data + "' id='del' class='text-danger'><i class='icon ico-cancel'></i>Cancelar</a></li></ul></div>";				
                },
                "aTargets": [-1]
            }, 
{
				"mRender": function (data, type, row) {
					
					data = str_pad(data, 6, '0', 'STR_PAD_LEFT');
					
					return data;
                },
                "aTargets": [0]		
			},			
			{
				"mRender": function (data, type, row) {
					if (data != null && data != '' && data != '0000-00-00 00:00:00') {
						var d = new Date(data);
                    	return d.toLocaleDateString("pt-BR");
					} else {
						return '';
					}
                },
                "aTargets": [5]		
			},
			{
				"mRender": function (data, type, row) {
					
					if (data != null && data != '') {
						var d = new Date(data);
                    	return d.toLocaleDateString("pt-BR");
					} else {
						return '';
					}

                },
                "aTargets": [3]		
			},
			{
				"mRender": function (data, type, row) {
					
					if (data != null)  return "R$ " + parseFloat(data).toFixed(2);

                },
                "aTargets": [2]		
			},			
			{
				"mRender": function (data, type, row) {
									
					
					if (data == 0) return "<button type='button' class='btn btn-sm btn-default bgcolor-pendente' id='btnpendente'>PENDENTE</button>";
					if (data == 1) return "<button type='button' class='btn btn-sm btn-default bgcolor-pago'>PAGO</button>";
					if (data == 3) return "<button type='button' class='btn btn-sm btn-default bgcolor-atrasado'>ATRASADO</button>";															
					if (data == 2) return "<button type='button' class='btn btn-sm btn-default bgcolor-cancelado'>CANCELADO</button>";			
					if (data == 4) return "<button type='button' class='btn btn-sm btn-default bgcolor-cancelado'>AGUARDANDO CONFIRMAÇÃO</button>";		
					
					
												
                },
                "aTargets": [4]					
			}



			
			]
    });
	
	$('#ajax-invoice tbody').on( 'click', '#invoicecheck', function (e) {		        
	
		
			$("#payment_id").val($( this ).attr('data-value'));

			$('#ModalApproval').modal('show');			

		
		

    } )	


	 $('#ajax-invoice  tbody tr').live('click', function (event) { 
	 
	 
	 	var aData = table_invoice.fnGetData(this); // get datarow
		if (null != aData)  // null if we clicked on title row
		{
			//now aData[0] - 1st column(count_id), aData[1] -2nd, etc. 
			
			$("#itemCode").val(aData[7])
			$("#payvalue").val(parseFloat(aData[2]).toFixed(2));			
		}   
		

    } )

	
	
	function fnGetSelected( table_invoice)
	{
		return table_invoice.$('tr.row_selected');
	}		
	
	$('#btn_new').click(function() {
		
		$("#forminvoice")[0].reset();
		$("#ModalInvoiceTitle").html('Adicionar Fatura');	
		$("#btn_submit").html("Adicionar");
		$("#invoice_id").val('');
		$("#payment_id").val('');		

	});	
	
	$('#ajax-invoice tbody').on( 'click', '#editar', function () {		        
		
		$("#loading").show();
		$("#ModalInvoiceTitle").html('Editar Fatura');		
		$("#btn_submit").html("Alterar");
		$("#btn_submit").attr("disabled", "disabled");
	

		$('#ModalInvoice').modal('show');				
		$('#ModalApproval').modal('hide');			

				
		$.get( ROOTPATH + 'painel/ourday/get_invoice/' + $( this ).attr('data-value'), function( data ) {
				var response = jQuery.parseJSON(data);
				

				$("#invoice_id").val(response.id);
				$("#payment_id").val(response.id);
				
//				payvalue,payid,payoptions
				$("#tag").val(response.tag);
				
				if (response.duedate != null && response.duedate != '') {
						var d = new Date(response.duedate);
                    	$("#datepicker1").val(d.toLocaleDateString("pt-BR"));
				}
					
				$("#totalcost").val(response.totalcost);
				$("#description").val(response.description);			
				$("#payvalue").val(parseFloat(response.payvalue).toFixed(2));				
				$("#payid").val(response.payid);
				$("#payopt").val(response.payoptions);	
				
				if (response.paydate != null && response.paydate != '') {
						var d = new Date(response.paydate);
                    	$("#paydate").val(d.toLocaleDateString("pt-BR"));
				}							
				$("#paynotes").val(response.paynotes);	
				
				$("#loading").hide();
				$("#btn_submit").removeAttr("disabled");
								
				
		})
		  .fail(function() {
				alert( "Não foi possível carregar a fatura." );
				$("#forminvoice")[0].reset();
				$("#loading").hide();
				$("#btn_submit").removeAttr("disabled");
				
				$("#invoice_id").val('');
				$("#payment_id").val('');
						
		  })
		  
		
		
		
    } )	
	
	

	
	
	$('#ajax-invoice tbody').on( 'click', '#del', function () {		        
		if (confirm('Deseja realmente desativar este registro?') == false) {			
			return false;		
		} else {
			location.href = ROOTPATH + "painel/ourday/invoicecancel/" + $( this ).attr('data-value') + "/" + $('#ourday_id').val();
		}
    } )	
	
	
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	/////////////////////////////// 			INVOICE END			///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////	
	
	
	
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	/////////////////////////////// 		SPONSOR	BEGIN		    ///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////	
	
	
	var table_sponsor = $("#ajax-sponsor").dataTable({
        "sAjaxSource":  ROOTPATH + "painel/ourday/table_sponsor/" + ourdayid, //TROCAR POR ourday/table_sponsor
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
								
                    return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='#' id='sponsor_edit' data-toggle='modal' data-target='#bs-sponsormodal' data-value='" + data + "'><i class='icon ico-pencil'></i>Alterar</a></li><li class='divider'></li><li><a href='ourday/del_sponsor/" + data + "' id='del' class='text-danger'><i class='icon ico-remove3'></i>Excluir</a></li></ul></div>";				
                },
                "aTargets": [-1]
            },
			{
                "mRender": function (data, type, row) {
                    return "<img src='" + ROOTPATH + data + "' class='img-circle' width=36>";
                },
                "aTargets": [0]
			}
			
			]
    });
	
	

	$('#ajax-sponsor tbody').on( 'click', '#del', function () {		        
		if (confirm('Deseja realmente excluir este registro?') == false) {
			
			return false;
		}
    } )

	
	$('#btn_sponsormodal').click(function() {
		
		$("#formsponsor")[0].reset();
		$("#ModalSponsorTitle").html('Adicionar Fatura');	
		$("#btn_submitsponsor").html("Adicionar Padrinho/Madrinha");

	});	
	
	$('#ajax-sponsor tbody').on( 'click', '#sponsor_edit', function () {		        
		
		
		$("#loadingsponsor").show();
		$("#ModalSponsorTitle").html('Editar Padrinho/Madrinha');		
		$("#btn_submitsponsor").html("Alterar");
		$("#btn_submitsponsor").attr("disabled", "disabled");

		
		$.get( ROOTPATH + 'painel/ourday/get_sponsor/' + $( this ).attr('data-value'), function( data ) {
				var response = jQuery.parseJSON(data);
				

				$("#sponsor_id").val(response.id);
				$("#sponsorphoto").val(response.profilephoto);
				$("#imgsponsorphoto").attr('src', ROOTPATH + response.profilephoto);
				$("#sponsorname").val(response.name);	
				$("#sponsorlastname").val(response.lastname);	
				$("#sponsorabout").val(response.about);									
				
				
				
				$("#loadingsponsor").hide();
				$("#btn_submitsponsor").removeAttr("disabled");
				
								
				
		})
		  .fail(function() {
				alert( "Não foi possível carregar os dados do padrinho/madrinha." );
				$("#formsponsor")[0].reset();
				$("#loadingsponsor").hide();
				$("#btn_submitsponsor").removeAttr("disabled");
						
		  })
		
    } )	
	
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	/////////////////////////////// 		 SPONSOR	END			///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////
	///////////////////////////////	///////////////////////////////	///////////////////////////////	
	

	$('#btnSalvar').click(function() {
		$('#form_crop').val($('#dst').val());
		if (preferedname == 'hephoto') {
			$('#hephoto').val($('#dst').val());
		} else if (preferedname == 'shephoto') {
			$('#shephoto').val($('#dst').val());
		} if (preferedname == 'couplephoto') {
			$('#photocouple').val($('#dst').val());
		} if (preferedname == 'groomphoto') {
			$('#photogroom').val($('#dst').val());
		} if (preferedname == 'bridephoto') {
			$('#photobride').val($('#dst').val());
		} if (preferedname == 'cerimonyplacephoto') {
			$('#photocerimonyplace').val($('#dst').val());
		} if (preferedname == 'partyplacephoto') {
			$('#photopartyplace').val($('#dst').val());
		} if (preferedname == 'headerphoto') {
			$('#photoheader').val($('#dst').val());
		} if (preferedname == 'sponsorphoto') {

				$('#form_crop').val($('#dst').val());
				
				$('#sponsorphoto').val($('#dst').val());
				$('#imgsponsorphoto').attr('src', ROOTPATH + 'image/loading/spinner1.gif');
				
				
				setTimeout(function() {
					
					$('#imgsponsorphoto').attr('src', ROOTPATH + $('#dst').val());
				}, 5000);
				
						
				$('#bs-profilephotomodal').modal('hide');
		}
		
		
		if (preferedname != 'sponsorphoto') {
		
			//$('#form_crop').submit();
	
			setTimeout(function() {
				
				$('#bs-profilephotomodal').modal('hide');
				$('#btn_salvar').click();
			}, 2000);
			
		}
		
		
	});
	
	
	$('#btn_photomodalhe').click(function() {
		$('#modaltopimg').attr('src', $('#imghephoto').attr('src'));
		$('#modaltopimg').css('display', 'inline');
		$('#cropinfo').css('display', 'inline');					
		preferedname = 'hephoto'
		$('#preferedname').val('hephoto');
	});


	
	$('#btn_photomodalshe').click(function() {
		$('#modaltopimg').attr('src', $('#imgshephoto').attr('src'));
		$('#modaltopimg').css('display', 'inline');	
		$('#cropinfo').css('display', 'inline');					
		preferedname = 'shephoto';
		$('#preferedname').val('shephoto');
	});
	
	
	$('#btn_photocouple').click(function() {
		$('#modaltopimg').css('display', 'none');
		$('#cropinfo').css('display', 'none');		
		preferedname = 'couplephoto';
		$('#preferedname').val('couplephoto');
	});	


	$('#btn_photogroom').click(function() {
		$('#modaltopimg').css('display', 'none');
		$('#cropinfo').css('display', 'none');		
		preferedname = 'groomphoto';
		$('#preferedname').val('groomphoto');
	});	
	
	$('#btn_photobride').click(function() {
		$('#modaltopimg').css('display', 'none');
		$('#cropinfo').css('display', 'none');		
		preferedname = 'bridephoto';
		$('#preferedname').val('bridephoto');
	});


	$('#btn_photocerimonyplace').click(function() {
		$('#modaltopimg').css('display', 'none');
		$('#cropinfo').css('display', 'none');		
		preferedname = 'cerimonyplacephoto';
		$('#preferedname').val('cerimonyplacephoto');
	});	
	
	$('#btn_photopartyplace').click(function() {
		$('#modaltopimg').css('display', 'none');
		$('#cropinfo').css('display', 'none');		
		preferedname = 'partyplacephoto';
		$('#preferedname').val('partyplacephoto');
	});			
	
	$('#btn_photoheader').click(function() {
		$('#modaltopimg').css('display', 'none');
		$('#cropinfo').css('display', 'none');		
		preferedname = 'headerphoto';
		$('#preferedname').val('headerphoto');
	});
	

	$('#btn_photosponsor').click(function() {
		$('#modaltopimg').attr('src', $('#imgsponsorphoto').attr('src'));
		$('#modaltopimg').css('display', 'inline');	
		$('#cropinfo').css('display', 'inline');					
		preferedname = 'sponsorphoto';
		$('#preferedname').val('sponsorphoto');
	});
			


	$('#filenewphoto').change(function() {
		$('#newhephoto').val($('#filenewphoto').val());
		return ajaxPhotoUpload();		
	});
	
	var cropinit = false;
	$('#cropbox').click(function() {
		if (preferedname == 'hephoto' || preferedname == 'shephoto' || preferedname == 'sponsorphoto') {
			if (!cropinit)	setCrop('cropbox',1)
			cropinit = true;			
		}
	});

	
	
  });
  
  
  var table_invoiceclient = $("#ajax-invoiceclient").dataTable({
        "sAjaxSource": ROOTPATH + "painel/ourday/table_invoice/",
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
					
					if (row[4] == 0) {
	                    return "<a data-toggle=modal data-target=#ModalPagSeguro id='invoice' class='btn btn-sm btn-default'><i class='icon ico-money'></i> Pagar</a>";				
					} else {
					   return "<a data-toggle=modal data-target=#ModalDetalhes id='invoicedetail' class='btn btn-sm btn-default'><i class='icon ico-eye'></i>Detalhes</a>";										
					}
                },
                "aTargets": [-1]
            }, 
{
				"mRender": function (data, type, row) {
					
					data = str_pad(data, 6, '0', 'STR_PAD_LEFT');
					
					return data;
                },
                "aTargets": [0]		
			},			
			{
				"mRender": function (data, type, row) {
					
					if (data != null && data != '' && data != '0000-00-00 00:00:00' && data != '0000-00-00') {
						var d = new Date(data);
                    	return d.toLocaleDateString("pt-BR");
					} else {
						return '';
					}
                },
                "aTargets": [5]		
			},
			{
				"mRender": function (data, type, row) {
					
					if (data != null && data != '' && data != '0000-00-00 00:00:00' && data != '0000-00-00') {
						var d = new Date(data);
                    	return d.toLocaleDateString("pt-BR");
					} else {
						return '';
					}

                },
                "aTargets": [3]		
			},
			{
				"mRender": function (data, type, row) {
					
					if (data == 0) return "<button type='button' class='btn btn-sm btn-default bgcolor-pendente' id='btnpendente'>PENDENTE</button>";
					if (data == 1) return "<button type='button' class='btn btn-sm btn-default bgcolor-pago'>PAGO</button>";
					if (data == 3) return "<button type='button' class='btn btn-sm btn-default bgcolor-atrasado'>ATRASADO</button>";															
					if (data == 2) return "<button type='button' class='btn btn-sm btn-default bgcolor-cancelado'>CANCELADO</button>";			
					if (data == 4) return "<button type='button' class='btn btn-sm btn-default bgcolor-cancelado'>AGUARDANDO CONFIRMAÇÃO</button>";									
                },
                "aTargets": [4]					
			}



			
			]
    });
	$('#ajax-invoiceclient  tbody tr').live('click', function (event) { 
	
	
	 	var aData = table_invoiceclient.fnGetData(this); // get datarow
		if (null != aData)  // null if we clicked on title row
		{
			//now aData[0] - 1st column(count_id), aData[1] -2nd, etc. 			
			$("#itemCode").val(aData[7])
		}  

    } )	



  
	function load_grid() {
		
		$("#loadinggallery").show();	
		
		$.ajax({
			type: "GET",
			dataType: "json",
			url: ROOTPATH + "painel/ourday/load_photos/" + $('#id').val(),
			dataType: 'html',
			success: function (d) {
				// replace div's content with returned data
				$("#shuffle-grid").html(d);
				
				$("#loadinggallery").hide();
				
				
				
				// Lightbox
				// ================================
				$("#shuffle-grid").magnificPopup({
					delegate: ".magnific",
					type: "image",
					gallery: {
						enabled: true
					}
				});
			
				// Shuffle
				// ================================
				var $grid   = $("#shuffle-grid"),
					$filter = $("#shuffle-filter"),
					$sort   = $("#shuffle-sort"),
					$sizer  = $grid.find("shuffle-sizer");
				
				// instatiate shuffle
				$grid.shuffle({
					itemSelector: ".shuffle",
					sizer: $sizer
				});
			
				// Filter options
				(function () {
					$filter.on("click", ".btn", function () {
						var $this = $(this),
							isActive = $this.hasClass("active"),
							group = isActive ? "all" : $this.data("group");
			
						// Hide current label, show current label in title
						if (!isActive) {
							$("#shuffle-filter .active").removeClass("active");
						}
			
						$this.toggleClass("active");
			
						// Filter elements
						$grid.shuffle("shuffle", group);
					});
				})();
			
				// Sorting options
				(function () {
					$sort.on("change", function () {
						var sort = this.value,
							opts = {};
			
						// We're given the element wrapped in jQuery
						if (sort === "date-created") {
							opts = {
								reverse: true,
								by: function ($el) {
									return $el.data("date-created");
								}
							};
						} else if (sort === "title") {
							opts = {
								by: function ($el) {
									return $el.data("title").toLowerCase();
								}
							};
						}
			
						// Filter elements
						$grid.shuffle("sort", opts);
					});
				})();
			},error: function() {
				$("#shuffle-grid").html("Erro ao carregar galeria.");
				$("#loadinggallery").hide();				
			}
		});


		
			
	}  
  
  $('#filenewphotoalbum').change(function() {
	  
	
	var inp = $('#filenewphotoalbum').get(0);
		
		var names = '';
		
		for (var i = 0; i < inp.files.length; ++i) {
			if (names != '') names += '<br>'
		  	names += inp.files.item(i).name;
		}
		$('#descphotos').html(names);
		return ajaxAlbumUpload();		

	});
	

	
	$('#btn_photomodal').click(function() {
	
//							$("#filenewphotoalbum").val('');														
//							$("#filenewphotoalbum").empty();
//							$("#form_albumupload")[0].reset();

		

			
	});

  function updateCoords(c)
  {
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
  };
  
  
  function setCrop(id, aspectRatio, w, h) {
	  
	  initJcrop(id);
	  
  }

  function checkCoords()
  {
	if (parseInt($('#w').val())) return true;
	alert('Please select a crop region then press submit.');
	return false;
  };
  
  
	function initJcrop(id) {
		
		
		var opt = {};
		
		
	
		if (preferedname == 'hephoto' || preferedname == 'shephoto' || preferedname == 'sponsorphoto') {
			opt.aspectRatio	= 1;
			opt.onSelect = updateCoords
		} else {
			opt.onSelect = updateCoords;			
		}

		
		jcrop_api = $.Jcrop('#'+id, opt);
		
	  
	  
	} 
	
 		  function updateCoords(c)
		  {
			$('#x').val(c.x);
			$('#y').val(c.y);
			$('#w').val(c.w);
			$('#h').val(c.h);
		  };
		
		  function checkCoords()
		  {
			if (parseInt($('#w').val())) return true;
			alert('Please select a crop region then press submit.');
			return false;
		  };	
	
	function stopJcrop() {
	  jcrop_api.destroy();
	  return (false);
	}
	
	  
  
	function ajaxPhotoUpload()
	{
		
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});

		$.ajaxFileUpload
		(
			{
				url: ROOTPATH + 'painel/ourday/upload_file/' + preferedname + '.jpg/'+ $('#id').val(),
				secureuri:false,
				fileElementId:'filenewphoto',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							alert(data.error);
							
						}else
						{

							$('.panel-photo').css('display', 'block');
							
						  	$('#cropbox').attr('src', data.path);
							$('#src').val(data.path);
							$('#dst').val(data.dst);
						   	$('#cropbox').css('max-width', '500px');
							
						   
						  

	
/*	$('#end_button').bind('click', function() {
	  stopJcrop();
	});	*/						
							
							
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
	
	
	
	function ajaxAlbumUpload()
	{
		
		
		$("#loadingalbum")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});

		$.ajaxFileUpload
		(
			{
				url: ROOTPATH + 'painel/ourday/upload_album/' +$('#id').val(),
				secureuri:false,
				fileElementId:'filenewphotoalbum',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							alert(data.error);
							$("#loadingalbum").hide();
							location.href = ROOTPATH + 'painel/ourday/client/tabphoto';
							
						}else
						{
							alert(data.msg);
							$("#loadingalbum").show();
							
							
							location.href = ROOTPATH + 'painel/ourday/client/tabphoto';
							
							$('#bs-photomodal').modal('hide');
							
							
							//$("#filenewphotoalbum").empty();
							//$("#form_albumupload")[0].reset();
							
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

	function get_plan(tag) {
				
				
			
		$("#totalcost").val("Carregando...");
		$.get( ROOTPATH + 'painel/ourday/get_plan/' + tag.value, function( data ) {
				var response = jQuery.parseJSON(data);

				$("#totalcost").val(response.value);
				$("#description").val("Fatura DiaD Casar. " + response.description);
				$("#totalcost").prop("readonly", true);
				
		})
		  .fail(function() {
			alert( "Não foi possível carregar o valor do plano." );
			$("#totalcost").val("");			
			$("#totalcost").prop("readonly", false);
		  })
			  
	
		
	}
	
	
	function check_sitealias(sitealias) {

		
		$("#statusalias").html('<img src="' + ROOTPATH + '/image/loading/spinner.gif" />'); //(""); 
		
		$.get( ROOTPATH + 'painel/ourday/check_sitealias/' + sitealias, function( data ) {
				var response = jQuery.parseJSON(data);
				if (response.result > 0) {
					alert('O nome informado já existe, por favor informe outro');
					$("#statusalias").html('<i class="ico-cancel-circle2 text-danger" ></i>');
					$("#sitealias").val('');
				} else {
					$("#statusalias").html('<i class="ico-checkmark-circle2 text-success" ></i>');
				}

				
		})
		  .fail(function() {
			alert( "Não foi possível verificar o nome do site." );
			$("#statusalias").css("ico-cancel-circle2 text-danger");
			$("#sitealias").val('');
		  })
		
	}
	
	
	function change_weddingdate(wd) {
		if ($( wd ).attr('original-value') != wd.value) {
			
			bootbox.confirm("Deseja recarregar um no checklist com base na nova data de casamento? <br> <div class='text-danger'><b>ATENÇÃO:</b> Ao clicar em OK, todas as atualizações feitas no seu checklist serão perdidas.</div>", function (result) {
				if(result == true) {
					
					$.get( ROOTPATH + 'painel/checklist/reset_checklist/' + wd.value, function( data ) {
							var response = jQuery.parseJSON(data);
							
							if (response.result == 'Ok') {
								alert('Checklist recarregado com sucesso!');
							} else {
								alert('Ocorreu um erro ao gerar o checklist.' + response.result);								

							}			
							
					})
					  .fail(function() {
						alert( "Não foi possível atualizar o checklist." );
					  })
						
				}
                // callback
				$( wd ).attr('original-value', wd.value);
            });
            event.preventDefault();

			
		}
	}
	
	
	function change_style(st) {
		if ($( st ).attr('original-value') != st.value) {
			
			bootbox.confirm("Deseja recarregar um no checklist com base no novo estilo? <br> <div class='text-danger'><b>ATENÇÃO:</b> Ao clicar em OK, todas as atualizações feitas no seu checklist serão perdidas.</div>", function (result) {
				if(result == true) {
					
					$.get( ROOTPATH + 'painel/checklist/reset_checklist/' + $('#datepicker1').val(), function( data ) {
							var response = jQuery.parseJSON(data);
							
							if (response.result == 'Ok') {
								alert('Checklist recarregado com sucesso!');
							} else {
								alert('Ocorreu um erro ao gerar o checklist.' + response.result);								

							}			
							
					})
					  .fail(function() {
						alert( "Não foi possível atualizar o checklist." );
					  })
						
				}
                // callback
				$( st ).attr('original-value', st.value);
            });
            event.preventDefault();

			
		}
	}	