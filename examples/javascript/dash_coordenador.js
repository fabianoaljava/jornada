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
	
	
	var table = $("#ajax-semconsolidador").dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"iDisplayLength": 5,
        "sAjaxSource": "dashboard/sem_consolidador",
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
					"aaSorting": [[0,'desc']],
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
					var d = new Date(data);
                    return d.toLocaleDateString("pt-BR");				
                },
				"sType": "date-uk",
                "aTargets": [0]		
			},
			{
				"mRender": function (data, type, row) {
					var d = new Date(data);
                    return d.toLocaleDateString("pt-BR");				
                },
				"sType": "date-uk",
                "aTargets": [-2]		
			},
			{
				"mRender": function (data, type, row) {
					  return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='#' id='addconsolidador' data-value='" + data + "'><i class='icon ico-user-plus2'></i>Designar Consolidador</a></li><li class='divider'></li><li><a href='consolidado/view/" + data + "' id='view'><i class='icon ico-signup'></i>Visualizar Ficha</a></li><li class='divider'></li><li><a href='consolidado/edit/" + data + "' id='editar'><i class='icon ico-pencil'></i>Alterar Dados</a></li><li class='divider'></li><li><a href='consolidado/del/" + data + "' id='del' class='text-danger'><i class='icon ico-remove3'></i>Excluir Ficha</a></li></ul></div>";	
                },
				"bSortable":false,
                "aTargets": [-1]					
			}
			
			]			
    });	
	
	$('#ajax-semconsolidador tbody').on( 'click', '#addconsolidador', function (e) {		        		
		$("#consolidado_id").val($( this ).attr('data-value'));		
		$('#ModalDesignar').modal('show');
		
    } )
	
	$('#formdesignar').on('submit',function() {
	//$("#formdesignar")[0].reset();
		alert('foi');
	});

	
	$('#ajax-semconsolidador tbody').on( 'click', '#del', function () {		        
		if (confirm('Deseja realmente excluir este registro?') == false) {
			
			return false;
		}
    } )
	
	
    var table = $("#ajax-aguardandocontato").dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"iDisplayLength": 5,
		"aaSorting": [[0,'desc']],		
        "sAjaxSource": "dashboard/aguardando_contato",
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
					var d = new Date(data);
                    return d.toLocaleDateString("pt-BR");				
                },
				"sType": "date-uk",				
                "aTargets": [0]		
			},
			{
				"mRender": function (data, type, row) {
					var d = new Date(data);
                    return d.toLocaleDateString("pt-BR");				
                },
				"sType": "date-uk",				
                "aTargets": [-2]		
			},
			{
				"mRender": function (data, type, row) {
					  return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='#' id='addconsolidador' data-value='" + data + "'><i class='icon ico-user-plus2'></i>Designar Consolidador</a></li><li class='divider'></li><li><a href='consolidado/view/" + data + "' id='view'><i class='icon ico-signup'></i>Visualizar Ficha</a></li><li class='divider'></li><li><a href='consolidado/edit/" + data + "' id='editar'><i class='icon ico-pencil'></i>Alterar Dados</a></li><li class='divider'></li><li><a href='consolidado/del/" + data + "' id='del' class='text-danger'><i class='icon ico-remove3'></i>Excluir Ficha</a></li></ul></div>";	
                },
				"bSortable":false,
                "aTargets": [-1]					
			}
			
			]
    });
	
	$('#ajax-aguardandocontato tbody').on( 'click', '#addconsolidador', function (e) {		        		
		$("#consolidado_id").val($( this ).attr('data-value'));		
		$('#ModalDesignar').modal('show');		
    } )	
	
	

	var table = $("#ajax-receberamcontato").dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"iDisplayLength": 5,	
		"aaSorting": [[0,'desc']],			
        "sAjaxSource": "dashboard/receberam_contato",
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
					var d = new Date(data);
                    return d.toLocaleDateString("pt-BR");				
                },
				"sType": "date-uk",				
                "aTargets": [0]		
			},
			{
				"mRender": function (data, type, row) {
					var d = new Date(data);
                    return d.toLocaleDateString("pt-BR");				
                },
				"sType": "date-uk",				
                "aTargets": [-2]		
			},
			{
				"mRender": function (data, type, row) {
					return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='#' id='addconsolidador' data-value='" + data + "'><i class='icon ico-user-plus2'></i>Designar Consolidador</a></li><li class='divider'></li><li><a href='consolidado/view/" + data + "' id='view'><i class='icon ico-signup'></i>Visualizar Ficha</a></li><li class='divider'></li><li><a href='consolidado/edit/" + data + "' id='editar'><i class='icon ico-pencil'></i>Alterar Dados</a></li><li class='divider'></li><li><a href='consolidado/del/" + data + "' id='del' class='text-danger'><i class='icon ico-remove3'></i>Excluir Ficha</a></li></ul></div>";	
                },
				"bSortable":false,
                "aTargets": [-1]					
			}
			
			]
    });	
	
	$('#ajax-receberamcontato tbody').on( 'click', '#addconsolidador', function (e) {		        		
		$("#consolidado_id").val($( this ).attr('data-value'));		
		$('#ModalDesignar').modal('show');
		
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
