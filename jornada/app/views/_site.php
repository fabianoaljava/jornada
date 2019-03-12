<!DOCTYPE html>

<html class="backend">
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo isset($sitetitle)?$sitetitle:''; ?></title>
        <meta name="author" content="pampersdry.info">
        <meta name="description" content="Adminre is a clean and flat backend and frontend theme build with twitter bootstrap 3.1.1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo THEMEPATH; ?>image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo THEMEPATH; ?>image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo THEMEPATH; ?>image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo THEMEPATH; ?>image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo THEMEPATH; ?>image/favicon.ico">
        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- Plugins stylesheet : optional -->
        <link rel="stylesheet" href="<?php echo CONTENTPATH; ?>plugins/steps/css/jquery-steps.min.css">
        <link rel="stylesheet" href="<?php echo CONTENTPATH; ?>plugins/magnific/css/magnific-popup.min.css">
        
        <link rel="stylesheet" href="<?php echo CONTENTPATH; ?>plugins/datatables/media/css/jquery.dataTables.css">
        <link rel="stylesheet" href="<?php echo CONTENTPATH; ?>plugins/datatables/media/css/responsive.dataTables.css">        
    
        <link rel="stylesheet" href="<?php echo CONTENTPATH; ?>plugins/selectize/css/selectize.min.css">
        <link rel="stylesheet" href="<?php echo CONTENTPATH; ?>plugins/jqueryui/css/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo CONTENTPATH; ?>plugins/jqueryui/css/jquery-ui-timepicker.min.css">
		<link rel="stylesheet" href="<?php echo CONTENTPATH; ?>plugins/fullcalendar/css/fullcalendar.min.css">
		<link rel="stylesheet" href="<?php echo CONTENTPATH; ?>plugins/jcrop/css/jquery.Jcrop.css" type="text/css" />
        <!--/ Plugins stylesheet -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="<?php echo CONTENTPATH; ?>library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo THEMEPATH; ?>stylesheet/custom.css">
        <link rel="stylesheet" href="<?php echo THEMEPATH; ?>stylesheet/layout.css">
        <link rel="stylesheet" href="<?php echo THEMEPATH; ?>stylesheet/uielement.css">
        

       
        <!--/ Application stylesheet -->
        <!-- END STYLESHEETS -->
        <?php if (isset($css)) :?>
	         <?php if ($css != '') :?>
        <link rel="stylesheet" href="<?php echo THEMEPATH; ?>stylesheet/<?php echo $css; ?>.css">
	        <?php endif ?>
        <?php endif ?>


        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script src="<?php echo CONTENTPATH; ?>library/modernizr/js/modernizr.min.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body>
        <!-- START Template Header -->
		<?php echo isset($header_view)?$header_view:''; ?> 
        <!--/ END Template Header -->

        <!-- START Template Sidebar (Left) -->
        <?php echo isset($sidebarl_view)?$sidebarl_view:''; ?>    
        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <?php echo isset($container_view)?$container_view:''; ?>      
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->

        <!-- START Template Sidebar (right) -->
        <?php echo isset($sidebarr_view)?$sidebarr_view:''; ?>  
        <!--/ END Template Sidebar (right) -->


        <?php echo isset($footer_view)?$footer_view:''; ?>  
        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Library script : mandatory -->
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>library/jquery/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>library/jquery/js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>library/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>library/core/js/core.min.js"></script>
        <!--/ Library script -->

        <!-- App and page level script -->
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>javascript/app.min.js"></script>

        
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/flot/jquery.flot.min.js"></script>
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/flot/jquery.flot.categories.min.js"></script>
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/flot/jquery.flot.resize.min.js"></script>
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/flot/jquery.flot.spline.min.js"></script>
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/selectize/js/selectize.min.js"></script>     
          
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/datatables/media/js/jquery.dataTables.js"></script>              
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/datatables/media/js/dataTables.responsive.js"></script>
		<script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/datatables/tabletools/js/tabletools.min.js"></script>        
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/datatables/tabletools/js/zeroclipboard.js"></script>  
              
		<script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/parsley/js/parsley.min.js"></script>
        
        
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>javascript/forms/ajax.js"></script>

        
		<script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/fullcalendar/js/fullcalendar.min.js"></script>
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/jqueryui/js/jquery-ui.min.js"></script>        
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/jqueryui/js/jquery-ui-timepicker.min.js"></script>        
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/jqueryui/js/jquery-ui-touch.min.js"></script>
        
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>javascript/forms/element.js"></script>
        
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/inputmask/js/inputmask.min.js"></script>        
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/jcrop/js/jquery.Jcrop.js"></script>
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/ajaxfileuploader/ajaxfileupload.js"></script>
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/magnific/js/jquery.magnific-popup.min.js"></script>        
		<script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/steps/js/jquery.steps.min.js"></script>                
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/shuffle/js/jquery.shuffle.min.js"></script>          
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/bootbox/js/bootbox.min.js"></script>     
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>plugins/jvectormap/js/jvectormap.min.js"></script>
        
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>javascript/maps/vector-world-mill.js"></script>

        
        <script type="text/javascript" src="<?php echo CONTENTPATH; ?>javascript/common.js?ROOTPATH=<?php echo ROOTPATH; ?>"></script>


		<?php if (isset($js)) :?>
	        <?php if ($js != '') :?>
		<script type="text/javascript" src="<?php echo CONTENTPATH; ?>javascript/<?php echo $js; ?>.js?ROOTPATH=<?php echo ROOTPATH; ?><?=(isset($params))?"&".$params:"";?>"></script>
	        <?php endif ?>
        <?php endif ?>
        
        
      
        
        <!--/ App and page level script -->
        <!--/ END JAVASCRIPT SECTION -->
    </body>
    <!--/ END Body -->
</html>