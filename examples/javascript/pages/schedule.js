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
/*! ========================================================================
 * calendar.js
 * Page/renders: page-calendar.html
 * Plugins used: parsley, fullcalendar, jQuery UI
 * ======================================================================== */
$(function () {
    // Instantiate fullCalendar
    // ================================
    var date = new Date(),
        d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();

    $("#full_calendar").fullCalendar({
		
		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
		buttonText: {
			prev: '&nbsp;&#9668;&nbsp;',
			next: '&nbsp;&#9658;&nbsp;',
			prevYear: '&nbsp;&lt;&lt;&nbsp;',
			nextYear: '&nbsp;&gt;&gt;&nbsp;',
			today: 'hoje',
			month: 'mês',
			week: 'semana',
			day: 'dia'
		},		
		titleFormat: {
			month: 'MMMM YYYY',
			day: 'dddd, d MMM, YYYY'
		},
		columnFormat: {
			month: 'ddd',
			week: 'ddd d/M',
			day: 'dddd d/M'
		},
		allDayText: 'dia todo',
		axisFormat: 'H:mm',
		timeFormat: {
			'': 'H(:mm)',
			agenda: 'H:mm{ - H:mm}'
		},
        header: {
            left: "prev,next",
            center: "title",
            right: "today,month,agendaWeek,agendaDay"
        },
        buttonText: {
            prev: "<",
            next: ">"
        },
        editable: true,
        eventSources: [

        // your event source
        {
            url: ROOTPATH + 'painel/schedule/search',
            type: 'POST',
            data: {
                custom_param1: 'something',
                custom_param2: 'somethingelse'
            },
            error: function() {
                alert('there was an error while fetching events!');
            },
            color: '#FF9FB3',   // a non-ajax option
            textColor: 'black' // a non-ajax option
        }

        // any other sources...

    	],
		eventDrop: function(event, delta, revertFunc) {


	
			if (!confirm("Deseja realmente mover esse evento?")) {
				revertFunc();
			} else {				
				move_event(event.id, event.start.format())
			}

	    },
		
		eventRender: function(event, element) {
            element.bind('dblclick', function() {
				         
            editar_evento(event.id);
		});


        },		
		
        eventClick: function (calEvent, jsEvent, view) {
            // content
            var pcontent = "";
            pcontent += "<h5 class=semibold>";
            pcontent += "<img class='mr10' src='../image/icons/bloggingservices.png' width='42' height='42' />";
            pcontent += calEvent.title;
            pcontent += "</h5>";
            pcontent += "<hr/>";
            pcontent += "<p class=''><span class='ico-clock'></span> Data Início: ";
            pcontent += $.fullCalendar.moment(calEvent.start).format();
            pcontent += "</p>";
            if (calEvent.end !== null) {
                pcontent += "<p class=''><span class='ico-clock'></span> Data Término: ";
                pcontent += $.fullCalendar.moment(calEvent.end).format();
                pcontent += "</p>";
            }
			pcontent += "<p class=\"\"><span class=\"ico-edit\"></span> <a href=\"#\" onClick=\"editar_evento('" + calEvent.id + "')\"> Editar</a>";
            pcontent += "</p>";

            // bootstrap popover
            $(this).popover({
                placement: "left auto",
                html: true,
                trigger: "manual",
                content: pcontent
            }).popover("toggle");
        }
    });

    // Instantiate parsley validator
    // ================================
    $("#ModalAddEvent form").parsley();
    $("#ModalAddEvent form").on("submit", function (e) {
        e.preventDefault()
    });

    // Render Full Calendar event
    // ================================
    $("#ModalAddEvent form").on("click", "button[type=submit]", renderEvent);
	

    // core render function
    function renderEvent (e) {
        // validate using parsley validator
        if($("#ModalAddEvent form").parsley().validate()) {
            // collect render data
            var eventData = {
                id: 999,
                title: $("input[name=eventname]").val(),
                start: $.fullCalendar.moment($("input[name=datebegin]").val()),
                end: $.fullCalendar.moment($("input[name=dateend]").val()),
                className: "fc-event-" + $("input[name=eventcolor]:checked").val()
            }

            // render event
            $("#full_calendar").fullCalendar("renderEvent", eventData, true);

            // and then push data to server ;)

            // close modal
            //$("#ModalAddEvent").modal("hide");
        }
    }

    // rerender calender on sidebar 
    // minimize and maximize
    // ================================
    $("html")
        .on("fa.sidebar.minimize", function (e) { $("#full_calendar").fullCalendar("render") })
        .on("fa.sidebar.maximize", function (e) { $("#full_calendar").fullCalendar("render") });

    // Instantiate Datepicker
    // ================================
    $("#datebegin").datepicker({
        defaultDate: "+1w",
        onClose: function (selectedDate) {
            $("#dateend").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#dateend").datepicker({
        defaultDate: "+1w",
        onClose: function (selectedDate) {
            $("#datebegin").datepicker("option", "maxDate", selectedDate);
        }
    });
	
	
	$("#btn_novo").on("click", function (e) {
			$("#formschedule")[0].reset();		
			$("#ModalTitle").html('Novo Evento');
			$("#btn_excluir").hide();
	});
	
	$("#btn_excluir").on("click", function (e) {
			
			if (confirm('Deseja realmente excluir este evento?')) {		
			
				$.get(  ROOTPATH + 'painel/schedule/del/' + $('#schedule_id').val(), function( data ) {
						var response = jQuery.parseJSON(data);
						alert("Excluído com sucesso");
						location.href  = ROOTPATH + 'painel/schedule';
				});

			}
			
	});	
	
});


function editar_evento(id) {

		$("#ModalTitle").html('Editar Evento');				
		$("#btn_excluir").show();		
		$("#ModalAddEvent").modal("show");
		
		$("#loading").show();
		$("#btn_submit").attr("disabled", "disabled");
		
		console.log('Abrindo...' + ROOTPATH + 'painel/schedule/get_event/' + id);
		
		$.get( ROOTPATH + 'painel/schedule/get_event/' + id, function( data ) {

				var response = jQuery.parseJSON(data);
				

				$("#schedule_id").val(response.id);
				$("#eventname").val(response.item);

				if (response.datebegin != null && response.datebegin != '0000-00-00 00:00:00') {
						var d = new Date(response.datebegin);
						$("#datebegin").val(d.toLocaleDateString("pt-BR"));				
				}
				if (response.dateend != null && response.dateend != '0000-00-00 00:00:00') {
						var d = new Date(response.dateend);
						$("#dateend").val(d.toLocaleDateString("pt-BR"));				
				}				
				$("#timebegin").val(response.timebegin);	
				$("#timeend").val(response.timeend);						
				$("#eventplace").val(response.place);										
				$("#eventdescription").val(response.note);
				$("#loading").hide();
				$("#btn_submit").removeAttr("disabled");
								
				
		})
		  .fail(function() {
				alert( "Não foi possível carregar o orçamento." );
				$("#loading").hide();
				$("#btn_submit").removeAttr("disabled");
						
		  })
		
	}
	
	
function move_event(id, dest) {

	$.get( ROOTPATH + 'painel/schedule/move_event/' + id + '/' + dest, function( data ) {		
		var response = jQuery.parseJSON(data);
		if(response != true) {

			alert('Ocorreu um erro ao mover este evento');
		
		}
	});	

	
}