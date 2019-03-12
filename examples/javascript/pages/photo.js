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
 
$(function () {
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
});


$('#filenewphoto').change(function() {
	
	var inp = $('#filenewphoto').get(0);
		
		var names = '';
		
		for (var i = 0; i < inp.files.length; ++i) {
			if (names != '') names += '<br>'
		  	names += inp.files.item(i).name;
		}
		$('#descphotos').html(names);
		return ajaxPhotoUpload();		

});

	

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
				url: ROOTPATH + 'painel/photo/upload_file',
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
							alert(data.msg);
							location.href = ROOTPATH + 'painel/photo';		
							
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