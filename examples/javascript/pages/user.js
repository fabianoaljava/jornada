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

    // ajax source
	
    var table = $("#ajax-source").dataTable({
		"bProcessing": true,
		"bServerSide": true,
        "sAjaxSource": "user/table_result",
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
                    return "<div class='btn-group' style='width:80px !important'><button type='button' class='btn btn-sm btn-default'>Ação</button><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button><ul class='dropdown-menu dropdown-menu-right'><li><a href='user/edit/" + data + "' id='editar'><i class='icon ico-pencil'></i>Alterar</a></li><li class='divider'></li><li><a href='user/del/" + data + "' id='del' class='text-danger'><i class='icon ico-remove3'></i>Excluir</a></li></ul></div>";				
                },
                "aTargets": [-1]
            },
			{
                "mRender": function (data, type, row) {
                    return "<img src='" + ROOTPATH + data + "' class='img-circle' width=36>";
                },
                "aTargets": [0]
			},
			{
				"mRender": function (data, type, row) {
					if (data == 0) return "<button type='button' class='btn btn-sm btn-default bgcolor-pendente' id='btnpendente'>INATIVO</button>";
					if (data == 1) return "<button type='button' class='btn btn-sm btn-success'>ATIVO</button>";
                },
                "aTargets": [6]					
			},
			{
				"mRender": function (data, type, row) {
					if (data == 1) return "<button type='button' class='btn btn-sm btn-success bgcolor-pendente' id='btnpendente'>ADMIN</button>";
					if (data == 2) return "<button type='button' class='btn btn-sm btn-default'>CERIMONIALISTA</button>";
                },
                "aTargets": [4]					
			}
			
			]
    });
	
	

	$('#ajax-source tbody').on( 'click', '#del', function () {		        
		if (confirm('Deseja realmente excluir este registro?') == false) {
			
			return false;
		}
    } )
	
	$('#btn_new').on('click', function() {
		location.href='user/create'
	});
	
	$('#filenewphoto').change(function() {
		$('#newhephoto').val($('#filenewphoto').val());
		return ajaxPhotoUpload();		
	});
	
	var cropinit = false;
	$('#cropbox').click(function() {

		if (!cropinit)	setCrop('cropbox',1)
		cropinit = true;			

	});
	
	
	$('#btnSalvar').click(function() {
		$('#form_crop').val($('#dst').val());
		
		$('#profilephoto').val($('#dst').val());
		$('#imgprofilephoto').attr('src', ROOTPATH + 'image/loading/spinner1.gif');
		
		
		setTimeout(function() {
			
			$('#imgprofilephoto').attr('src', ROOTPATH + $('#dst').val());
		}, 5000);
		
				
		$('#bs-profilephotomodal').modal('hide');
		
	});
		
	


    
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
		
		
	
		opt.aspectRatio	= 1;
		opt.onSelect = updateCoords

		
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
				url: ROOTPATH + 'painel/user/upload_file',
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
							$('#preferedname').val(data.preferedname);							
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

