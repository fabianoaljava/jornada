<!DOCTYPE html>
<!-- 
TEMPLATE NAME : Adminre backend
VERSION : 1.2.0
AUTHOR : JohnPozy
AUTHOR URL : http://themeforest.net/user/JohnPozy
EMAIL : pampersdry@gmail.com
LAST UPDATE: 23/06/2014

** A license must be purchased in order to legally use this template for your project **
** PLEASE SUPPORT ME. YOUR SUPPORT ENSURE THE CONTINUITY OF THIS PROJECT **
-->
<html class="backend">
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Portal Lagoinha | O Portal dos Novos Começo</title>
        <meta name="author" content="pampersdry.info">
        <meta name="description" content="Adminre is a clean and flat backend and frontend theme build with twitter bootstrap 3.1.1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./content/themes/adminre/image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./content/themes/adminre/image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./content/themes/adminre/image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="./content/themes/adminre/image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="./content/themes/adminre/image/favicon.ico">
        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- Plugins stylesheet : optional -->
        
        
        <!--/ Plugins stylesheet -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="./content/library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="./content/themes/adminre/stylesheet/layout.css">
        <link rel="stylesheet" href="./content/themes/adminre/stylesheet/uielement.css">
        <!--/ Application stylesheet -->
        <!-- END STYLESHEETS -->

        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script src="./content/library/modernizr/js/modernizr.min.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body class="blackbg">
        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <section class="container">
                <!-- START row -->
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4">
                        <!-- Brand -->
                        <div class="text-center">
								<img src="./content/themes/adminre/image/logo/logo-circle.png" width="140" height="140">
                        </div>
                        <!--/ Brand -->

                        <!-- Social button -->
<!--                        <ul class="list-table">
                            <li><button type="button" class="btn btn-block btn-facebook">Conectar com<i class="ico-facebook2 ml5"></i></button></li>
                            <li><button type="button" class="btn btn-block btn-googleplus">Conectar com <i class="ico-google-plus ml5"></i></button></li>
                        </ul>-->
                        <!-- Social button -->
						
                        <hr><!-- horizontal line -->

                        <!-- Login form -->
                        <form class="panel" name="form-login" action="">
                            <div class="panel-body">
                                <!-- Alert message -->
                                <div class="alert alert-dismissable alert-warning <?=(!isset($_REQUEST['msg']))?'hide':''; ?>">
                                <?=(isset($_REQUEST['msg']))?$_REQUEST['msg']:''; ?>
                                    <!--<span class="semibold">Note :</span>&nbsp;&nbsp;Just put anything and hit 'sign-in' button.-->
                                </div>
                                <!--/ Alert message -->
                                
                                <div class="form-group">
                                    <div class="form-stack has-icon pull-left">
                                        <input name="username" type="text" class="form-control input-lg" placeholder="Usuario / E-mail" data-parsley-errors-container="#error-container" data-parsley-error-message="Por favor, preencha seu nome de usuário ou email" data-parsley-required>
                                        <i class="ico-user2 form-control-icon"></i>
                                    </div>
                                    <div class="form-stack has-icon pull-left">
                                        <input name="password" type="password" class="form-control input-lg" placeholder="Senha" data-parsley-errors-container="#error-container" data-parsley-error-message="Por favor, informe sua senha" data-parsley-required>
                                        <i class="ico-lock2 form-control-icon"></i>
                                    </div>
                                </div>

                                <!-- Error container -->
                                <div id="error-container"class="mb15"></div>
                                <!--/ Error container -->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="checkbox custom-checkbox">  
                                                <input type="checkbox" name="remember" id="remember" value="1">  
                                                <label for="remember">&nbsp;&nbsp;Lembrar</label>   
                                            </div>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <a href="javascript:void(0);">Esqueceu sua senha?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group nm">
                                    <button type="submit" class="btn btn-block btn-success"><span class="semibold">Entrar</span></button>
                                </div>
                            </div>
                        </form>
                        <!-- Login form -->

                        <hr><!-- horizontal line -->

                        <p class="text-muted text-center">
                        <br>
PORTAL CONSOLIDAÇÃO<br>
|| O portal dos novos começos ||<br>
<br>

                       <!-- Ainda não tem sua conta? O que está esperando? <br>
<a class="semibold" href="./content/themes/adminre/painel/page-register.html">Clique aqui e registre-se</a>--></p>
                    </div>
                </div>
                <!--/ END row -->
            </section>
            <!--/ END Template Container -->
        </section>
        <!--/ END Template Main -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Library script : mandatory -->
        <script type="text/javascript" src="./content/library/jquery/js/jquery.min.js"></script>
        <script type="text/javascript" src="./content/library/jquery/js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="./content/library/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./content/library/core/js/core.min.js"></script>
        <!--/ Library script -->

        <!-- App and page level script -->
        <script type="text/javascript" src="./content/plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
        <script type="text/javascript" src="./content/javascript/app.min.js"></script>
        
        
        <script type="text/javascript" src="./content/plugins/parsley/js/parsley.min.js"></script>
        
        <script type="text/javascript" src="./content/javascript/login.js"></script>
        
        <!--/ App and page level script -->
        <!--/ END JAVASCRIPT SECTION -->
    </body>
    <!--/ END Body -->
</html>