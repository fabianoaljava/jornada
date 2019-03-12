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
	
	$('input[name^=date]').datepicker();
	
    var table = $("#ajax-source").dataTable({
        "sAjaxSource": ROOTPATH + "painel/checklist/table_result",
        "sServerMethod": "POST",
		"oLanguage": {
					"sEmptyTable": "Nenhum registro encontrado",
					"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
					"sInfoFiltered": "(Filtrados de _MAX_ registros)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "_MENU_ resultados por página",
					"sLoadingRecords": "...",
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
                    return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='" + ROOTPATH + "painel/checklist/edit/" + data + "' id='editar'><i class='icon ico-pencil'></i>Alterar</a></li>										<li class='divider'></li><li><a href='" + ROOTPATH + "checklist/del/" + data + "' id='del' class='text-danger'><i class='icon ico-remove3'></i>Excluir</a></li>					</ul></div>";				
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
		location.href= ROOTPATH + 'painel/checklist/create'
	});
	
	
	
	var table_itens = $('#table_itens').DataTable({"iDisplayLength": 99999});
	
	
	counter = 1;
	$('#addRow').on( 'click', function () {
	
		$('#table_itens').dataTable().fnAddData( [
				'<input type="text" name="item[' + counter + ']" class="form-control" placeholder="Nome item" />',
				'<input type="number" name="duration[' + counter + ']" class="form-control" placeholder="Dias" size="2" />',				
				'<select class="form-control" name="dependencies[' + counter + ']"><option value="FF">Antes do casamento</option><option value="FS">Após o item anterior</option></select>'
				] );
				
		counter++;		
					
    } );
	
	var rowselected;
	
	$('#table_itens tbody').on( 'click', 'tr', function () {

        if ( $(this).hasClass('row_selected') ) {
            $(this).removeClass('row_selected');
			rowselected = null;
        }
        else {
            table_itens.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
			
			rowselected = this.id;

        }
    } );
	
	

 
    $('#deleteRow').click( function () {
		var anSelected = fnGetSelected( table_itens );
        if ( anSelected.length !== 0 ) {
//			alert("deletar " + rowselected); 
			$.ajax({
			  type: "POST",
			  url: ROOTPATH + 'painel/checklist/delete_checklist',
			  data: { id: rowselected }
			})
			  .done(function( msg ) {
				$('input[name^=' + name + ']').removeClass('input_loading');
            table_itens.fnDeleteRow( anSelected[0] );				
//				alert(msg);
			  });
		  

        }
    } );	
	
	function fnGetSelected( oTableLocal )
	{
		return oTableLocal.$('tr.row_selected');
	}	
	
	
	
});



	function update(id, name, value) {
		
		
		name = name.substr(0, name.indexOf('['));
		
		$('input[name^=' + name + ']').addClass('input_loading');


		if (name == 'percentcomplete') {
			if (value < 100) {
				$('#chkitem'+id).attr('checked', false);
			} else {
				$('#chkitem'+id).attr('checked', true);
			}
		}
		
						
		
		$.ajax({
		  type: "POST",
		  url: ROOTPATH + 'painel/checklist/update_checklist',
		  data: { id: id, name: name, value : value }
		})
		  .done(function( msg ) {
			$('input[name^=' + name + ']').removeClass('input_loading');
			//alert(msg);
		  });
		  
		  

	}
	
	
	function update_percent(id) {

		if ($('#percentcomplete'+id).val() < 100) {
			$('#percentcomplete'+id).val(100);
			update(id,'percentcomplete['+id+']',100);
		} else {
			$('#percentcomplete'+id).val(0);
			update(id,'percentcomplete['+id+']',0);
		}		
	}
	
	function addRow(counter) {
		
	counter	++;
	
	//vai na tabela, faz o insert e otem o id com ajax e põe no lucar do counter	
	$('input[name^=' + name + ']').addClass('input_loading');
		
				$.ajax({
				  type: "POST",
				  url: ROOTPATH + 'painel/checklist/checklist_insertrow',
				  data: { ordering : counter }
				})
				  .done(function( msg ) {
					$('input[name^=' + name + ']').removeClass('input_loading');
					id = msg;
					//alert(msg);		
					 //location.href = ROOTPATH + 'painel/checklist/client'		
					 
					 $('#table_itens').dataTable().fnAddData( [
						'<span id="checklist_rowid">'+ id +'</span>',
						'<input type="checkbox" name="chkitem['+ id +']"  id="chkitem'+ id +'"class="form-control" onchange="update_percent('+ id +');"/>',
						'<input type="text" name="item['+ id +']" class="form-control" placeholder="Nome item" value="" onchange="javascript:update('+ id +', this.name, this.value)"/>',
						'<input type="text" name="dateend['+ id +']" class="form-control" placeholder="Data" size="8"  onchange="javascript:update('+ id +', this.name, this.value)"/>',
						'<div class="input-group" style="width:100px"><input type="number" name="percentcomplete['+ id +']" class="form-control" placeholder="%" size="1" min="0" max="100" step="5" onchange="javascript:update('+ id +', this.name, this.value)" id="percentcomplete'+ id +'"><span class="input-group-addon">%</span></div>',
						'<textarea class="form-control" rows="3" name="note['+ id +']" placeholder="Observações" onchange="javascript:update('+ id +', this.name, this.value)"></textarea>',
						'<div class="col-md-3"><button type="button" class="btn" id="upOrder"><i class="ico-arrow-up"></i></button><button type="button" class="btn" id="downOrder"><i class="ico-arrow-down"></i></button></div>'
						
						
						] );
						
						
						$('input[name^=date]').datepicker();	
					
				  });
		
			
				
				
				
				
				
		
	}
	
	function changeorder(id, step, order) {
		
		$('input[name^=' + name + ']').addClass('input_loading');
		
		$.ajax({
		  type: "POST",
		  url: ROOTPATH + 'painel/checklist/change_order',
		  data: { id: id, step : step, order : order }
		})
		  .done(function( msg ) {
			$('input[name^=' + name + ']').removeClass('input_loading');
			alert(msg);		
   			 location.href = ROOTPATH + 'painel/checklist/client'			
			
		  });
		
	}