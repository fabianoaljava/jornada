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
	
	$("#datepicker1").datepicker();
	$("#datepicker2").datepicker();	
	$("#datetimepicker1").datetimepicker();
	$("#datetimepicker2").datetimepicker();
	
	/// Sem Consolidador	
	$("#pd-data-inicio").datepicker({
        defaultDate: "-1w",
        numberOfMonths: 2,
        onClose: function (selectedDate) {
            $("#pd-data-fim").datepicker("option", "minDate", selectedDate);
			tablepd.fnDraw();
        }, 
		onChange: function() {
			tablepd.fnDraw();
		}
    });
    $("#pd-data-fim").datepicker({
        defaultDate: "+1w",
        numberOfMonths: 2,
        onClose: function (selectedDate) {
            $("#pd-data-inicio").datepicker("option", "maxDate", selectedDate);
			tablepd.fnDraw();
        }, 
		onChange: function() {
			tablepd.fnDraw();
		}
    });
	
	$("#pd-idade-slider").slider({
		range: true,
		min: 0,
		max: 100,
		values: [0, 100],

        slide: function (event, ui) {
            $("#pd-idade-label").text("Idade entre " + ui.values[ 0 ] + " e "  + ui.values[ 1 ] + " anos");
			
			$("#pd-idademin").val(ui.values[ 0 ]);
			$("#pd-idademax").val(ui.values[ 1 ]);	
			
			tablepd.fnDraw();		
        }
    });
	
	
	$("#pd-progresso-slider").slider({
		range: true,
		min: 0,
		max: 100,
		values: [0, 100],

        slide: function (event, ui) {
            $("#pd-progresso-label").text("Progresso entre " + ui.values[ 0 ] + "% e "  + ui.values[ 1 ] + "%");
			
			$("#pd-idademin").val(ui.values[ 0 ]);
			$("#pd-idademax").val(ui.values[ 1 ]);	
			
			tablepd.fnDraw();		
        }
    });
	
    var tablepd = $("#ajax-pendente").dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"bStateSave" : true,
		"responsive" : true,		
		"iDisplayLength": 5,
        "sAjaxSource": "dashboard/pendente",
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
				"mRender": function (data, type, row) {
					return "<a href='#' id='pd-nameview' data-value='" + row[14] + "'>" + data + "</a>";				
                },
				"responsivePriority": 1,
                "aTargets": [2]		
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
					return "<button type='button' class='btn btn-sm btn-default bgcolor-pendente' id='btnpendente'><a href='consolidado/view/" + data + "' id='view'><i class='icon ico-signup'></i>Visualizar Ficha</a></button>";
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
	
	
	$('#pd-idademin, #pd-idademax, #pd-culto, #pd-decisao, #pd-estado_civil, #pd-status, #pd-sexo').change( function() {
        tablepd.fnDraw();
    } );

	$('#ajax-pendente tbody').on( 'click', '#pd-nameview', 'datavalue', function (event) {

		location.href = 'consolidado/view/' + $( this ).attr('data-value');
		
		
    } )		
	
	
		
	
	$("#ajax-pendente").dataTable.ext.search.push(
		function( settings, data, dataIndex ) {
			var min = parseInt( $('#pd-idademin').val(), 10 );
			var max = parseInt( $('#pd-idademax').val(), 10 );
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
			
			if ($('#pd-data-inicio').val() != "" && $('#pd-data-fim').val() != "") {
	
				
				var datainicio = $('#pd-data-inicio').val().replace(/ /g, '').split("/");
							var day = parseInt(datainicio[0], 10);
							var month = parseInt(datainicio[1], 10);
							var year = parseInt(datainicio[2], 10);			
							
							var date = new Date(year, month - 1, day)
							datemin = date.getTime();
													
							
				var datafim = $('#pd-data-fim').val().replace(/ /g, '').split("/");
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
	
			
			if ($('#pd-culto').val() != "") {
				
				if($('#pd-culto').val() == data[1]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#pd-decisao').val() != "") {
				
				if($('#pd-decisao').val() == data[4]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#pd-estado_civil').val() != "") {
				
				if($('#pd-estado_civil').val() == data[8]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#pd-sexo').val() != "") {
				
				if($('#pd-sexo').val() == data[7]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}, function( settings, data, dataIndex ) {
	
			
			if ($('#pd-status').val() != "") {
				
				if($('#pd-status').val() == data[5]) {
					return true;
				} else {
					return false;
				}
				
			} else {
				return true;
			}
		}   
	);	
	
	
	
	
	
	
	
	
	
	
	
	
			
	
	
	

	var table = $("#ajax-emconsolidacao").dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"bStateSave" : true,
		"responsive" : true,			
		"iDisplayLength": 5,
        "sAjaxSource": "dashboard/em_consolidacao",
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
					return "<a href='#' id='ec-nameview' data-value='" + row[11] + "'>" + data + "</a>";				
                },
				"responsivePriority": 1,
                "aTargets": [2]		
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
                "aTargets": [0]		
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
			},			
			{
				"mRender": function (data, type, row) {
					return "<button type='button' class='btn btn-sm btn-default bgcolor-pendente' id='btnpendente'><a href='consolidado/view/" + data + "' id='view'><i class='icon ico-signup'></i>Visualizar Ficha</a></button>";
                },
				"responsivePriority": 3,
                "aTargets": [-1]					
			}
			
			]
    });	
		
		
	$('#ajax-emconsolidacao tbody').on( 'click', '#ec-nameview', 'datavalue', function (event) {

		location.href = 'consolidado/view/' + $( this ).attr('data-value');
		
		
    } )				
		
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
