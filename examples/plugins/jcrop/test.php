
<!DOCTYPE html>

<html class="backend">
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dia D Casar</title>
        <meta name="author" content="pampersdry.info">
        <meta name="description" content="Adminre is a clean and flat backend and frontend theme build with twitter bootstrap 3.1.1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://localhost/diadcasar_com_br/www/image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://localhost/diadcasar_com_br/www/image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://localhost/diadcasar_com_br/www/image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="http://localhost/diadcasar_com_br/www/image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="http://localhost/diadcasar_com_br/www/image/favicon.ico">
        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- Plugins stylesheet : optional -->
        <link rel="stylesheet" href="http://localhost/diadcasar_com_br/www/plugins/datatables/css/jquery.datatables.min.css">
        <link rel="stylesheet" href="http://localhost/diadcasar_com_br/www/plugins/selectize/css/selectize.min.css">
        <link rel="stylesheet" href="http://localhost/diadcasar_com_br/www/plugins/jqueryui/css/jquery-ui.min.css">
        <link rel="stylesheet" href="http://localhost/diadcasar_com_br/www/plugins/jqueryui/css/jquery-ui-timepicker.min.css">


        <!--/ Plugins stylesheet -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="http://localhost/diadcasar_com_br/www/library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/diadcasar_com_br/www/stylesheet/custom.css">
        <link rel="stylesheet" href="http://localhost/diadcasar_com_br/www/stylesheet/layout.css">
        <link rel="stylesheet" href="http://localhost/diadcasar_com_br/www/stylesheet/uielement.css">
        <!--/ Application stylesheet -->


        <link rel="stylesheet" href="demos/demo_files/main.css" type="text/css" />
        <link rel="stylesheet" href="demos/demo_files/demos.css" type="text/css" />

        
        <!-- END STYLESHEETS -->
        	                 <link rel="stylesheet" href="http://localhost/diadcasar_com_br/www/stylesheet/nossodiad.css">
	                

        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script src="http://localhost/diadcasar_com_br/www/library/modernizr/js/modernizr.min.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body>
    
				<div id="bs-modal-lg" class="modal fade in" aria-hidden="false" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <div class="ico-rocket mb15 mt15" style="font-size:36px;"></div>
                                <h3 class="semibold modal-title text-primary">Rocket Launch</h3>
                                <p class="text-muted">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                            </div>
                            <div class="modal-body">

                        		<img src="demo_files/pool.jpg" id="cropbox" />
                        
                                <!-- This is the form that our event handler fills -->
                                <form action="crop.php" method="post" onsubmit="return checkCoords();">
                                    <input type="hidden" id="x" name="x" />
                                    <input type="hidden" id="y" name="y" />
                                    <input type="hidden" id="w" name="w" />
                                    <input type="hidden" id="h" name="h" />
                                    <input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>    
    
    
    
        <!-- START Template Header -->
		<header id="header" class="navbar navbar-fixed-top">
            <!-- START navbar header -->
            <div class="navbar-header">
                <!-- Brand -->
                <a class="navbar-brand" href="http://localhost/diadcasar_com_br/www/painel">
                    <span class="logo-figure"></span>
                    <span class="logo-text"></span>
                </a>
                <!--/ Brand -->
            </div>
            <!--/ END navbar header -->

            <!-- START Toolbar -->
            <div class="navbar-toolbar clearfix">
                <!-- START Left nav -->
                <ul class="nav navbar-nav navbar-left">
                    <!-- Sidebar shrink -->
                    <li class="hidden-xs hidden-sm">
                        <a href="javascript:void(0);" class="sidebar-minimize" data-toggle="minimize" title="Minimize sidebar">
                            <span class="meta">
                                <span class="icon"></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Sidebar shrink -->

                    <!-- Offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <li class="navbar-main hidden-lg hidden-md hidden-sm">
                        <a href="javascript:void(0);" data-toggle="sidebar" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-paragraph-justify3"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas left -->

                    <!-- Message dropdown -->
                    <li class="dropdown custom" id="header-dd-message">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bubbles3"></i></span>
                            </span>
                        </a>

                        <!-- mustache template: used for update the `.media-list` requested from server-side -->
                        <script class="mustache-template" type="x-tmpl-mustache">
                        
                            {{#data}}
                            <a href="page-message-rich.html" class="media border-dotted new">
                                <span class="pull-left">
                                    <img src="http://localhost/diadcasar_com_br/www/image/avatar/{{picture}}" class="media-object img-circle" alt="">
                                </span>
                                <span class="media-body">
                                    <span class="media-heading">{{name}}</span>
                                    <span class="media-text ellipsis nm">{{text}}</span>

                                    {{#meta.star}}<span class="media-meta"><i class="ico-star3"></i></span>{{/meta.star}}
                                    {{#meta.reply}}<span class="media-meta"><i class="ico-reply"></i></span>{{/meta.reply}}
                                    {{#meta.attachment}}<span class="media-meta"><i class="ico-attachment"></i></span>{{/meta.attachment}}
                                    <span class="media-meta pull-right">{{meta.time}}</span>
                                </span>
                            </a>
                            {{/data}}
                        
                        </script>
                        <!--/ mustache template -->

                        <!-- Dropdown menu -->
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Mensagens<span class="count"></span></span>
                                <span class="option text-right"><a href="javascript:void(0);">Nova mensagem</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <!-- Search form -->
                                <form class="form-horizontal" action="">
                                    <div class="has-icon">
                                        <input type="text" class="form-control" placeholder="Search message...">
                                        <i class="ico-search form-control-icon"></i>
                                    </div>
                                </form>
                                <!--/ Search form -->

                                <!-- indicator -->
                                <div class="indicator inline hide"><span class="spinner"></span></div>
                                <!--/ indicator -->

                                <!-- Message list -->
                                <div class="media-list">
                                    <a href="boasvindas" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="http://localhost/diadcasar_com_br/www/image/avatar/avatar9.jpg" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Milla Magalhães</span>
                                            <span class="media-text ellipsis nm">Seja bem vinda {nome}.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-reply"></i></span>
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">20m</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                </div>
                                <!--/ Message list -->
                            </div>
                        </div>
                        <!--/ Dropdown menu -->
                    </li>
                    <!--/ Message dropdown -->

                    <!-- Notification dropdown -->
                    <li class="dropdown custom" id="header-dd-notification">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bell"></i></span>
<!--                                <span class="hasnotification hasnotification-danger"></span>-->
                            </span>
                        </a>

                        <!-- mustache template: used for update the `.media-list` requested from server-side -->
                        <script class="mustache-template" type="x-tmpl-mustache">
                        
                            {{#data}}
                            <a href="javascript:void(0);" class="media border-dotted new">
                                <span class="media-object pull-left">
                                    <i class="{{icon}}"></i>
                                </span>
                                <span class="media-body">
                                    <span class="media-text">{{{text}}}</span>
                                    <span class="media-meta pull-right">{{meta.time}}</span>
                                </span>
                            </a>
                            {{/data}}
                        
                        </script>
                        <!--/ mustache template -->

                        <!-- Dropdown menu -->
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Notificações do DiaD<!--<span class="count"></span>--></span>
                                <span class="option text-right"><a href="javascript:void(0);">Limpar todas</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <!-- indicator -->
                                <div class="indicator inline hide"><span class="spinner"></span></div>
                                <!--/ indicator -->

                                <!-- Message list -->
                                <div class="media-list">
                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-minus bgcolor-info"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Sem notificações no momento</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right"></span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                </div>
                                <!--/ Message list -->
                            </div>
                        </div>
                        <!--/ Dropdown menu -->
                    </li>
                    <!--/ Notification dropdown -->

                    <!-- Search form toggler  -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="dropdown" data-target="#dropdown-form">
                            <span class="meta">
                                <span class="icon"><i class="ico-search"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Search form toggler -->
                </ul>
                <!--/ END Left nav -->

                <!-- START navbar form -->
                <div class="navbar-form navbar-left dropdown" id="dropdown-form">
                    <form action="" role="search">
                        <div class="has-icon">
                            <input type="text" class="form-control" placeholder="Procurar no DiaD">
                            <i class="ico-search form-control-icon"></i>
                        </div>
                    </form>
                </div>
                <!-- START navbar form -->

                <!-- START Right nav -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Profile dropdown -->
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="avatar"><img src="http://localhost/diadcasar_com_br/www/userfiles/avatar.jpg" class="img-circle" alt="" /></span>
                                <span class="text hidden-xs hidden-sm pl5">Razgriz</span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-user-plus2"></i></span> Meus dados</a></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-cog4"></i></span> Configurações do Perfil</a></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span> Tutorial</a></li>
                            <li class="divider"></li>
                            <li><a href="http://localhost/diadcasar_com_br/www/painel/login/logout"><span class="icon"><i class="ico-exit"></i></span> Sair</a></li>
                        </ul>
                    </li>
                    <!-- Profile dropdown -->

                    <!-- Offcanvas right This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <li class="navbar-main">
                        <a href="javascript:void(0);" data-toggle="sidebar" data-direction="rtl" rel="tooltip" title="Feed / contact sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-users3"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas right -->
                </ul>
                <!--/ END Right nav -->
            </div>
            <!--/ END Toolbar -->
        </header> 
        <!--/ END Template Header -->

        <!-- START Template Sidebar (Left) -->
         <aside class="sidebar sidebar-left sidebar-menu">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <h5 class="heading">Main Menu</h5>
                <!-- START Template Navigation/Menu -->
                <ul class="topmenu topmenu-responsive" data-toggle="menu">
                
                    <!--MENU DOS CERIMONIALISTA-->
                                        
                    
                    <!--MENU DOS NOIVOS-->
                              
                                                    
                    
                    <li >
                        <a href="nossodiad">
                            <span class="figure"><i class="ico-heart"></i></span>
                            <span class="text">Nosso Dia D</span>
                        </a>
                    </li>                                                          
                    
                    <li >
                        <a href="dashboard">
                            <span class="figure"><i class="ico-stack-checkmark"></i></span>
                            <span class="text">Check-list</span>
                            <span class="label label-danger">D1</span>
                        </a>
                    </li>  
                    
                    <li >
                        <a href="dashboard">
                            <span class="figure"><i class="ico-money"></i></span>
                            <span class="text">Custos</span>
                            <span class="label label-danger">D1</span>
                        </a>
                    </li>
                    
                    <li >
                        <a href="dashboard">
                            <span class="figure"><i class="ico-people"></i></span>
                            <span class="text">Lista de convidados</span>
                            <span class="label label-danger">D2</span>
                        </a>
                    </li>  
                    
                    <li >
                        <a href="dashboard">
                            <span class="figure"><i class="ico-bubble-heart"></i></span>
                            <span class="text">Mensagens aos noivos</span>
                            <span class="label label-danger">D2</span>
                        </a>
                    </li>  
                    
                    <li >
                        <a href="dashboard">
                            <span class="figure"><i class="ico-camera"></i></span>
                            <span class="text">Albuns de fotos</span>
                            <span class="label label-danger">D2</span>
                        </a>
                    </li> 
                    
                    <li >
                        <a href="dashboard">
                            <span class="figure"><i class="ico-beer"></i></span>
                            <span class="text">Cha bar</span>
                            <span class="label label-danger">D2</span>
                        </a>
                    </li>                                                                                  
                    
                    <li >
                        <a href="dashboard">
                            <span class="figure"><i class="ico-calendar3"></i></span>
                            <span class="text">Agenda</span>
                            <span class="label label-danger">D2</span>
                        </a>
                    </li>  
                    
                    <li >
                        <a href="dashboard">
                            <span class="figure"><i class="ico-moon"></i></span>
                            <span class="text">Lua de mel</span>
                            <span class="label label-danger">D3</span>
                        </a>
                    </li>                      
                    
                    <li >
                        <a href="dashboard">
                            <span class="figure"><i class="ico-files"></i></span>
                            <span class="text">Arquivos</span>
                            <span class="label label-danger">D3</span>
                        </a>
                    </li>                      
                            
                    <li >
                        <a href="dashboard">
                            <span class="figure"><i class="ico-lamp"></i></span>
                            <span class="text">Minhas inspirações</span>
                            <span class="label label-danger">D3</span>
                        </a>
                    </li>
                    
                    <li >
                        <a href="dashboard">
                            <span class="figure"><i class="ico-bubble-quote"></i></span>
                            <span class="text">Chamadas</span>
                            <span class="label label-danger">D2</span>
                        </a>
                    </li>                       
                    
                      
                     
                </ul>
                <!--/ END Template Navigation/Menu -->

                <!-- START Sidebar summary -->
                <!-- Summary -->
                
                <!--/ Summary -->
                <!--/ END Sidebar summary -->
            </section>
            <!--/ END Sidebar Container -->
        </aside>    
        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Nosso DiaD</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="#">Dia D</a></li>
                                <li class="active">Nosso Dia D</li>
                            </ol>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                
				<button class="btn btn-primary mb5" data-toggle="modal" data-target="#bs-modal-lg">Large Modal</button>
                
					<div class="panel-body pt0 pb0">
						       
						<div class="col-sm-8">
                        

                         
                            
                        
                
                                
						</div>
                    </div>
                </div>
                <!--/ END row -->
                
                
                
                
				
                
                                
                
                
                
            </div>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        
        
        

				

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

			


        </section>
        <!--/ END Template Main -->

        <!-- START Template Sidebar (right) -->
        <aside class="sidebar sidebar-right">
 
        </aside>  
        <!--/ END Template Sidebar (right) -->



          
        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Library script : mandatory -->
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/library/jquery/js/jquery.min.js"></script>
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/library/jquery/js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/library/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/library/core/js/core.min.js"></script>
        <!--/ Library script -->

        <!-- App and page level script -->
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/javascript/app.min.js"></script>
        
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/flot/jquery.flot.min.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/flot/jquery.flot.categories.min.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/flot/jquery.flot.tooltip.min.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/flot/jquery.flot.resize.min.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/flot/jquery.flot.spline.min.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/selectize/js/selectize.min.js"></script>       
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/datatables/js/jquery.datatables.min.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/datatables/tabletools/js/tabletools.min.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/datatables/tabletools/js/zeroclipboard.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/datatables/js/jquery.datatables-custom.js"></script>
        
		<script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/parsley/js/parsley.min.js"></script>
        
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/javascript/forms/ajax.js"></script>
        

        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/jqueryui/js/jquery-ui.min.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/jqueryui/js/jquery-ui-timepicker.min.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/jqueryui/js/jquery-ui-touch.min.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/javascript/forms/element.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/inputmask/js/inputmask.min.js"></script>
        
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/bootbox/js/bootbox.min.js"></script>
        <script type="text/javascript" src="http://localhost/diadcasar_com_br/www/plugins/jcrop/js/jquery.Jcrop.js"></script>

        <script type="text/javascript">		  
			$(function(){
			
				$('#jcrop_target').Jcrop({
					onChange: showPreview,
					onSelect: showPreview,
					aspectRatio: 1
				});
			
			});	
			
			function showPreview(coords)
			{
				var rx = 100 / coords.w;
				var ry = 100 / coords.h;
			
				$('#preview').css({
					width: Math.round(rx * 500) + 'px',
					height: Math.round(ry * 500) + 'px',
					marginLeft: '-' + Math.round(rx * coords.x) + 'px',
					marginTop: '-' + Math.round(ry * coords.y) + 'px'
				});
			}	  
					
        </script>


			        		<script type="text/javascript" src="http://localhost/diadcasar_com_br/www/javascript/pages/nossodiad.js?ROOTPATH=http://localhost/diadcasar_com_br/www/"></script>
	                        
        
        <!--/ App and page level script -->
        <!--/ END JAVASCRIPT SECTION -->
    </body>
    <!--/ END Body -->
</html>

