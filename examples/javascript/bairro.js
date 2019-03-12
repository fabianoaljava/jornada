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
	

	
    // zero configuration
    // ================================
    $("#zero-configuration").dataTable();
	

    // ajax source
	
    var table = $("#ajax-source").dataTable({
		"bProcessing": true,
		"bServerSide": false,
        "sAjaxSource": "bairro/table_result",
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
                    return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='bairro/edit/" + data + "' id='editar'><i class='icon ico-pencil'></i>Alterar</a></li><li class='divider'></li><li><a href='bairro/del/" + data + "' id='del' class='text-danger'><i class='icon ico-remove3'></i>Excluir</a></li></ul></div>";				
                },
                "aTargets": [-1]
            }
			
			]
    });
	
	

	$('#ajax-source tbody').on( 'click', '#del', function () {		        
		if (confirm('Deseja realmente excluir este registro?') == false) {
			
			return false;
		}
    } )
	
	$('#btn_new').on('click', function() {
		location.href='bairro/create'
	});
	


    
});


	