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
	
	
	
    var table = $("#ajax-aguardandocontato").dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"iDisplayLength": 5,
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
                "aTargets": [0]		
			},
			{
				"mRender": function (data, type, row) {
					var d = new Date(data);
                    return d.toLocaleDateString("pt-BR");				
                },
                "aTargets": [-2]		
			},
			{
				"mRender": function (data, type, row) {
					return "<button type='button' class='btn btn-sm btn-default bgcolor-pendente' id='btnpendente'><a href='consolidado/view/" + data + "' id='view'><i class='icon ico-signup'></i>Visualizar Ficha</a></button>";
                },
                "aTargets": [-1]					
			}
			
			]
    });
	
	

	var table = $("#ajax-receberamcontato").dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"iDisplayLength": 5,		
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
                "aTargets": [0]		
			},
			{
				"mRender": function (data, type, row) {
					var d = new Date(data);
                    return d.toLocaleDateString("pt-BR");				
                },
                "aTargets": [-2]		
			},
			{
				"mRender": function (data, type, row) {
					return "<button type='button' class='btn btn-sm btn-default bgcolor-pendente' id='btnpendente'><a href='consolidado/view/" + data + "' id='view'><i class='icon ico-signup'></i>Visualizar Ficha</a></button>";
                },
                "aTargets": [-1]					
			}
			
			]
    });	
		
		
	$('#btn_new').on('click', function() {
		location.href='consolidado/create'
	});	
	


    
});
