<header id="header" class="navbar navbar-fixed-top">
            <!-- START navbar header -->
            <div class="navbar-header">
                <!-- Brand -->
                <a class="navbar-brand" href="<?php echo ROOTPATH; ?>">
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
                            <input type="text" class="form-control" placeholder="Procurar no portal">
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
                                <span class="avatar"><img src="<?php echo isset($_SESSION['s_foto'])? $_SESSION['s_foto']:THEMEPATH . 'image/avatar/avatar.png'; ?>" class="img-circle" alt="" /></span>
                                <span class="text hidden-xs hidden-sm pl5"><?php echo isset($_SESSION['s_nome'])?$_SESSION['s_nome']:'Undefined'; ?></span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            <li><a href="<?php echo ROOTPATH; ?>"><span class="icon"><i class="ico-user-plus2"></i></span>Alterar Senha</a></li>
                            <?php if ($_SESSION['s_nivel_id'] == 3):   ?>
                            <li><a href="<?php echo ROOTPATH; ?>"><span class="icon"><i class="ico-cog4"></i></span>Meu perfil</a></li>
                            <?php else :?>
                            <li><a href="<?php echo ROOTPATH; ?>usuario/edit/<?=sha1($_SESSION['s_usuario_id']);?>"><span class="icon"><i class="ico-cog4"></i></span>Meu perfil</a></li>                            
                            <?php endif; ?>
                            <li><a href="<?php echo ROOTPATH; ?>embreve"><span class="icon"><i class="ico-question"></i></span> Tutorial</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo ROOTPATH; ?>login/logout"><span class="icon"><i class="ico-exit"></i></span> Sair</a></li>
                        </ul>
                    </li>
                    <!-- Profile dropdown -->


                </ul>
                <!--/ END Right nav -->
            </div>
            <!--/ END Toolbar -->
        </header>