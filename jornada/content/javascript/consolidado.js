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
	
	
	$('.hfields').css('display','none');
	
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
	
	
	
	$("#selectize-consolidador").selectize();
	$("#selectize-coordenador").selectize();
	
	
	
	
	
	
    var table = $("#ajax-source").dataTable({
		"bProcessing": true,
		"bServerSide": false,
        "sAjaxSource": "consolidado/table_result",
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
                "aTargets": [2]		
			},
			{
                "mRender": function (data, type, row) {
                    return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='consolidado/view/" + data + "' id='view'><i class='icon ico-signup'></i>Visualizar Ficha</a></li><li class='divider'></li><li><a href='consolidado/edit/" + data + "' id='editar'><i class='icon ico-pencil'></i>Alterar</a></li><li class='divider'></li><li><a href='consolidado/del/" + data + "' id='del' class='text-danger'><i class='icon ico-remove3'></i>Excluir</a></li></ul></div>";				
                },
                "aTargets": [-1]
            },
			{
				"mRender": function (data, type, row) {
					if (data == 0) return "<button type='button' class='btn btn-sm btn-default bgcolor-pendente' id='btnpendente'>INATIVO</button>";
					if (data == 1) return "<button type='button' class='btn btn-sm btn-success'>ATIVO</button>";
                },
                "aTargets": [-2]					
			}
			
			]
    });
	
	

	$('#ajax-source tbody').on( 'click', '#del', function () {		        
		if (confirm('Deseja realmente excluir este registro?') == false) {
			
			return false;
		}
    } )
	
	$('#municipio_id').on('change', function() {
		

		$("#bairro_id").html('carregando...')
		$("#bairro_id").append($("<option></option>").val('0').html('Carregando...'));
				
		$("#btn_submit").attr("disabled", "disabled");
		
		$.get( ROOTPATH + 'common/get_bairro/' + $('#municipio_id').val() , function( data ) {
				var response = jQuery.parseJSON(data);
			
				
				$("#bairro_id").html('')
				$("#bairro_id").append($("<option></option>").val('0').html('Selecione o Bairro'));				
				
				$.each(response, function () {
        		    $("#bairro_id").append($("<option></option>").val(this['id']).html(this['nome_bairro']));
		        });

				$("#btn_submit").removeAttr("disabled");
								
				
		})
		  .fail(function() {
				alert( "Não foi possível carregar os bairros." );
				$("#btn_submit").removeAttr("disabled");						
		  })

	});
		
		
		
	$('#btn_new').on('click', function() {
		location.href='consolidado/create'
	});	
	
	
	
	$('#btn_tpligacao').on('click', function() {
		$('#tipo_informacao').val('1');
		$(this).addClass('active');
		$('#btn_tpemail').removeClass('active');
		$('#btn_tpmensagem').removeClass('active');
		$('#btn_tpoutros').removeClass('active');		
	});	
	$('#btn_tpemail').on('click', function() {
		$('#tipo_informacao').val('2');
		$(this).addClass('active');
		$('#btn_tpligacao').removeClass('active');
		$('#btn_tpmensagem').removeClass('active');
		$('#btn_tpoutros').removeClass('active');
	});	
	$('#btn_tpmensagem').on('click', function() {
		$('#tipo_informacao').val('3');
		$(this).addClass('active');		
		$('#btn_tpligacao').removeClass('active');
		$('#btn_tpemail').removeClass('active');
		$('#btn_tpoutros').removeClass('active');		
		
	});	
	$('#btn_tpoutros').on('click', function() {
		$('#tipo_informacao').val('9');
		$(this).addClass('active');	
		$('#btn_tpligacao').removeClass('active');
		$('#btn_tpmensagem').removeClass('active');
		$('#btn_tpemail').removeClass('active');				
	});	
	

	$('#btn_rcraiva').on('click', function() {
		$('#receptividade').val('-3');
		$(this).addClass('active');
		$('#btn_rctriste').removeClass('active');
		$('#btn_rcindiferente').removeClass('active');	
		$('#btn_rcfeliz').removeClass('active');
		$('#btn_rcmuitofeliz').removeClass('active');
		$('#btn_semcontato').removeClass('active');					
	});	
	$('#btn_rctriste').on('click', function() {
		$('#receptividade').val('-2');
		$(this).addClass('active');
		$('#btn_rcraiva').removeClass('active');				
		$('#btn_rcindiferente').removeClass('active');	
		$('#btn_rcfeliz').removeClass('active');
		$('#btn_rcmuitofeliz').removeClass('active');
		$('#btn_semcontato').removeClass('active');				
	});	
	$('#btn_rcindiferente').on('click', function() {
		$('#receptividade').val('-1');
		$(this).addClass('active');		
		$('#btn_rcraiva').removeClass('active');				
		$('#btn_rctriste').removeClass('active');
		$('#btn_rcfeliz').removeClass('active');
		$('#btn_rcmuitofeliz').removeClass('active');
		$('#btn_semcontato').removeClass('active');			
		
	});
	$('#btn_semcontato').on('click', function() {
		$('#receptividade').val('0');
		$(this).addClass('active');		
		$('#btn_rcraiva').removeClass('active');				
		$('#btn_rctriste').removeClass('active');
		$('#btn_rcindiferente').removeClass('active');
		$('#btn_rcfeliz').removeClass('active');
		$('#btn_rcmuitofeliz').removeClass('active');
					
		
	});		
	$('#btn_rcfeliz').on('click', function() {
		$('#receptividade').val('1');
		$(this).addClass('active');	
		$('#btn_rcraiva').removeClass('active');				
		$('#btn_rctriste').removeClass('active');
		$('#btn_rcindiferente').removeClass('active');	
		$('#btn_rcmuitofeliz').removeClass('active');
		$('#btn_semcontato').removeClass('active');								
	});	
	$('#btn_rcmuitofeliz').on('click', function() {
		$('#receptividade').val('2');
		$(this).addClass('active');	
		$('#btn_rcraiva').removeClass('active');				
		$('#btn_rctriste').removeClass('active');
		$('#btn_rcindiferente').removeClass('active');	
		$('#btn_rcfeliz').removeClass('active');
		$('#btn_semcontato').removeClass('active');						
	});
	
	$('#addconsolidador').on( 'click', function (e) {
		$('#ModalDesignar').modal('show');		
    } )	
	
	
	$('#tooglefields').on('click', function(e) {
		
		if ($('.hfields').css('display') == 'none') {
			$('.hfields').css('display', 'inherit');
			$('#tooglefields').html('Ocultar Informações Avançadas');
		} else {
			$('.hfields').css('display','none');
			$('#tooglefields').html('Exibir Informações Avançadas');			
		}
		
	})


    
});
