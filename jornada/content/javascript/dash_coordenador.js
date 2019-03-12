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
 


$(function () {
	
		
	
	$('#modaltopimg').attr('src', $('#imgshephoto').attr('src'));
	$('#modaltopimg').css('display', 'inline');	
	$('.panel-photo').css('display', 'none');
	$('#cropinfo').css('display', 'inline');
	
    // zero configuration
    // ================================
    $("#zero-configuration").dataTable();

	
	
	
	
	

	
	$("#sc-idade-slider").slider({
		range: true,
		min: 0,
		max: 100,
		values: [0, 100],

        slide: function (event, ui) {
            $("#sc-idade-label").text("Idade entre " + ui.values[ 0 ] + " e "  + ui.values[ 1 ] + " anos");
			
			$("#sc-idademin").val(ui.values[ 0 ]);
			$("#sc-idademax").val(ui.values[ 1 ]);	
			
			tablesc.fnDraw();		
        }
    });
	
	

	
	
	var tablesc = $("#ajax-semconsolidador").dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"bStateSave" : true,
		"responsive" : true,
		"iDisplayLength": 5,
        "sAjaxSource": "dashboard/sem_consolidador",
        "sServerMethod": "POST",
		"order": [[ 0, "desc" ]],
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
				responsivePriority: 2, targets: 2 
			},
			
            {
				"mRender": function (data, type, row) {
					if (data != null) {
						b= data.split("-");
						var d = new Date(b[0],(b[1]-1),b[2]);
						return d.toLocaleDateString("pt-BR");
					} else {
						return null;
					}					
                },
				"responsivePriority": 1,
				"sType": "date-uk",
                "aTargets": [0]		
			},
			{
				"mRender": function (data, type, row) {
					return "<button type='button' class='btn btn-sm btn-default' title='Visualizar Ficha'><a href='consolidado/view/" + data + "' id='view'><i class='icon ico-signup'></i></a></button>    <button type='button' class='btn btn-sm btn-default' title='Designar Consolidador'><a  href='#' id='addconsolidador' data-value='" + data + "'><i class='icon ico-user-plus2'></i></a></button>      <button type='button' class='btn btn-sm btn-default' id='btnpendente' title='Alterar Dados'><a href='consolidado/edit/" + data + "' id='editar'><i class='icon ico-pencil'></i></a></button>      <button type='button' class='btn btn-sm btn-default' id='btnpendente' title='Excluir Ficha'><a href='consolidado/del/" + data + "' id='del' class='text-danger'><i class='icon ico-remove3'></i></a></button>";
                },
				"responsivePriority": 3,
				"bSortable":false,	
                "aTargets": [-1]
			
			}, 
			{
				"mRender": function (data, type, row) {
					if (data == 0) {
						return "Conversão"
					} else 
					{
						return "Reconciliação"
					};
                },
                "aTargets": [4]					
			}
			
			]			
    });	
	
	
	$('#sc-idademin, #sc-idademax, #sc-culto, #sc-decisao, #sc-estado_civil, #sc-sexo').change( function() {
        tablesc.fnDraw();
    } );
	
	$('#ajax-semconsolidador tbody').on( 'click', '#addconsolidador', function (e) {		        		
		$("#consolidado_id").val($( this ).attr('data-value'));		
		$('#ModalDesignar').modal('show');
		
    } )
	
	
	$('#ajax-semconsolidador tbody').on( 'click', '#del', function () {		        
		if (confirm('Deseja realmente excluir este registro?') == false) {			
			return false;
		}
    } )
		
	
	$("#ajax-semconsolidador").dataTable.ext.search.push(
		function( settings, data, dataIndex ) {
			var min = parseInt( $('#sc-idademin').val(), 10 );
			var max = parseInt( $('#sc-idademax').val(), 10 );
			var age = parseFloat( data[3] ) || 0; // use data for the age column
		
			if ( ( isNaN( min ) && isNaN( max ) ) ||
				 ( isNaN( min ) && age <= max ) ||
				 ( min <= age   && isNaN( max ) ) ||
				 ( min <= age   && age <= max ) )
			{
				return true;
			}
			return false;
		},
		function( settings, data, dataIndex ) {
	
			
			if ($('#sc-culto').val() != "") {
				
				if($('#sc-culto').val() == data[1]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#sc-decisao').val() != "") {
				
				if($('#sc-decisao').val() == data[4]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#sc-estado_civil').val() != "") {
				
				if($('#sc-estado_civil').val() == data[8]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#sc-sexo').val() != "") {
				
				if($('#sc-sexo').val() == data[7]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		} 
	);
	
	
	
	
	



/// Em Consolidação

$("#ec-data-inicio").datepicker({
        defaultDate: "-1w",
        numberOfMonths: 2,
        onClose: function (selectedDate) {
            $("#ec-data-fim").datepicker("option", "minDate", selectedDate);
			tableec.fnDraw();
        }, 
		onChange: function() {
			tableec.fnDraw();
		}
    });
    $("#ec-data-fim").datepicker({
        defaultDate: "+1w",
        numberOfMonths: 2,
        onClose: function (selectedDate) {
            $("#ec-data-inicio").datepicker("option", "maxDate", selectedDate);
			tableec.fnDraw();
        }, 
		onChange: function() {
			tableec.fnDraw();
		}
    });
	
	$("#ec-idade-slider").slider({
		range: true,
		min: 0,
		max: 100,
		values: [0, 100],

        slide: function (event, ui) {
            $("#ec-idade-label").text("Idade entre " + ui.values[ 0 ] + " e "  + ui.values[ 1 ] + " anos");
			
			$("#ec-idademin").val(ui.values[ 0 ]);
			$("#ec-idademax").val(ui.values[ 1 ]);	
			
			tableec.fnDraw();		
        }
    });
	
	
	$("#ec-progresso-slider").slider({
		range: true,
		min: 0,
		max: 100,
		values: [0, 100],

        slide: function (event, ui) {
            $("#ec-progresso-label").text("Progresso entre " + ui.values[ 0 ] + "% e "  + ui.values[ 1 ] + "%");
			
			$("#ec-idademin").val(ui.values[ 0 ]);
			$("#ec-idademax").val(ui.values[ 1 ]);	
			
			tableec.fnDraw();		
        }
    });
	

	
	
	var tableec = $("#ajax-emconsolidacao").dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"bStateSave" : true,
		"responsive" : true,		
		"iDisplayLength": 5,
        "sAjaxSource": "dashboard/em_consolidacao",
        "sServerMethod": "POST",
		"order": [[ 0, "desc" ]],
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
				responsivePriority: 2, targets: 2 
			},
			
            {
				"mRender": function (data, type, row) {
					if (data != null) {
						b= data.split("-");
						var d = new Date(b[0],(b[1]-1),b[2]);
						return d.toLocaleDateString("pt-BR");
					} else {
						return null;
					}					
                },
				"responsivePriority": 1,
				"sType": "date-uk",
                "aTargets": [0]		
			},
			{
				"mRender": function (data, type, row) {
					return "<button type='button' class='btn btn-sm btn-default' title='Visualizar Ficha'><a href='consolidado/view/" + data + "' id='view'><i class='icon ico-signup'></i></a></button>    <button type='button' class='btn btn-sm btn-default' title='Designar Consolidador'><a  href='#' id='addconsolidador' data-value='" + data + "'><i class='icon ico-user-plus2'></i></a></button>      <button type='button' class='btn btn-sm btn-default' id='btnpendente' title='Alterar Dados'><a href='consolidado/edit/" + data + "' id='editar'><i class='icon ico-pencil'></i></a></button>      <button type='button' class='btn btn-sm btn-default' id='btnpendente' title='Excluir Ficha'><a href='consolidado/del/" + data + "' id='del' class='text-danger'><i class='icon ico-remove3'></i></a></button>";
                },
				"responsivePriority": 3,
				"bSortable":false,
                "aTargets": [-1]					
			}, 
			{
				"mRender": function (data, type, row) {
					if (data == 0) {
						return "Conversão"
					} else 
					{
						return "Reconciliação"
					};
                },
                "aTargets": [4]					
			}
			
			]			
    });	
	
	
	$('#ec-idademin, #ec-idademax, #ec-culto, #ec-decisao, #ec-estado_civil, #ec-status, #ec-sexo').change( function() {
        tableec.fnDraw();
    } );
	
	$('#ajax-emconsolidacao tbody').on( 'click', '#addconsolidador', function (e) {		        		
		$("#consolidado_id").val($( this ).attr('data-value'));		
		$('#ModalDesignar').modal('show');
		
    } )
	
	
	$('#ajax-emconsolidacao tbody').on( 'click', '#del', function () {		        
		if (confirm('Deseja realmente excluir este registro?') == false) {			
			return false;
		}
    } )
		
	
	$("#ajax-emconsolidacao").dataTable.ext.search.push(
		function( settings, data, dataIndex ) {
			var min = parseInt( $('#ec-idademin').val(), 10 );
			var max = parseInt( $('#ec-idademax').val(), 10 );
			var age = parseFloat( data[3] ) || 0; // use data for the age column
		
			if ( ( isNaN( min ) && isNaN( max ) ) ||
				 ( isNaN( min ) && age <= max ) ||
				 ( min <= age   && isNaN( max ) ) ||
				 ( min <= age   && age <= max ) )
			{
				return true;
			}
			return false;
		},
		function( settings, data, dataIndex ) {
			
			if ($('#ec-data-inicio').val() != "" && $('#ec-data-fim').val() != "") {
	
				
				var datainicio = $('#ec-data-inicio').val().replace(/ /g, '').split("/");
							var day = parseInt(datainicio[0], 10);
							var month = parseInt(datainicio[1], 10);
							var year = parseInt(datainicio[2], 10);			
							
							var date = new Date(year, month - 1, day)
							datemin = date.getTime();
													
							
				var datafim = $('#ec-data-fim').val().replace(/ /g, '').split("/");
							var day = parseInt(datafim[0], 10);
							var month = parseInt(datafim[1], 10);
							var year = parseInt(datafim[2], 10);			
							
							var date = new Date(year, month - 1, day)
							datemax = date.getTime();
							
							
				
				var dataculto = data[0].replace(/ /g, '').split("/");
							day = parseInt(dataculto[0], 10);
							month = parseInt(dataculto[1], 10);
							year = parseInt(dataculto[2], 10);		
							
							date = new Date(year, month - 1, day)
							dateculto = date.getTime();
							
		 
		
			if ( datemin <= dateculto && dateculto <= datemax )
			{
	
				return true;
				
			} else {		
	
				return false;
			}
			
		} else {
			return true;	
		}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#ec-culto').val() != "") {
				
				if($('#ec-culto').val() == data[1]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#ec-decisao').val() != "") {
				
				if($('#ec-decisao').val() == data[4]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#ec-estado_civil').val() != "") {
				
				if($('#ec-estado_civil').val() == data[8]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#ec-sexo').val() != "") {
				
				if($('#ec-sexo').val() == data[7]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#ec-status').val() != "") {
				
				if($('#ec-status').val() == data[5]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}   
	);	
	
	
	
	
	
	
	
	
	
	
	
	
			
	$('#btn_new').on('click', function() {
		location.href='consolidado/create'
	});
	
	
	$.extend(jQuery.fn.dataTableExt.oSort, {
            "date-uk-pre": function (a) {
                var x;
                try {
                    var dateA = a.replace(/ /g, '').split("/");
                    var day = parseInt(dateA[0], 10);
                    var month = parseInt(dateA[1], 10);
                    var year = parseInt(dateA[2], 10);			
					
                    var date = new Date(year, month - 1, day)
                    x = date.getTime();
                }
                catch (err) {
                    x = new Date().getTime();
                }
 
                return x;
            },
 
            "date-uk-asc": function (a, b) {
                return a - b;
            },
 
            "date-uk-desc": function (a, b) {
                return b - a;
            }
        });	


    
});
