<?php $nivel_id = (isset($_SESSION['s_nivel_id']))?$_SESSION['s_nivel_id']:99; ?>

 <aside class="sidebar sidebar-left sidebar-menu">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <h5 class="heading">Menu Principal</h5>
                
                
                
                <ul class="topmenu topmenu-responsive" data-toggle="menu">

                    <?php if ($nivel_id == 1) : ?>
                                
                    <li class="">
                        <a href="javascript:void(0);" data-target="#administracao" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-wrench3"></i></span>
                            <span class="text">Administração</span>
                            <span class="arrow"></span>
                        </a>
                        <ul id="administracao" class="submenu collapse" style="height: 0px;">
                            <li class="submenu-header ellipsis">Configuração</li>
                            <li>
                                <a href="<?php echo ROOTPATH; ?>municipio">
                                    <span class="text">Municipios</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ROOTPATH; ?>bairro">
                                    <span class="text">Bairros</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ROOTPATH; ?>culto">
                                    <span class="text">Cultos</span>
                                </a>
                            </li>                               
                            <li>
                                <a href="<?php echo ROOTPATH; ?>tipoinformacao">
                                    <span class="text">Tipo de Informação</span>
                                </a>
                            </li>                                                         
                        </ul>
                    </li>
                    <?php endif; ?>
                    
                    
                	<?php // VERICFICAR SE ESTÁ NO GRUPO (ARRAY) DE SECRETARIA, CONSOLIDACAO, ETC. ?>
                    <?php if ($nivel_id == 1) : ?>
					<li class="">
                        <a href="javascript:void(0);" data-target="#secretaria" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-archive"></i></span>
                            <span class="text">Secretaria</span>
                            <span class="arrow"></span>
                        </a>
                        <ul id="secretaria" class="submenu collapse" style="height: 0px;">
                            <li class="submenu-header ellipsis">Secretaria</li>
                            
                            <li>
                                <a href="<?php echo ROOTPATH; ?>dashboard">
                                    <span class="text">Painel da Secretaria</span>
                                </a>
                            </li>                             
                             
                            <li>
                                <a href="<?php echo ROOTPATH; ?>usuario">
                                    <span class="text">Usuarios</span>
                                </a>
                            </li>    
                                                         
                            <li>
                                <a href="<?php echo ROOTPATH; ?>gc">
                                    <span class="text">GC</span>
                                </a>
                            </li> 
                            
                            <li>
                                <a href="<?php echo ROOTPATH; ?>embreve">
                                    <span class="text">Grupos</span>
                                </a>
                            </li>
                        </ul>
                    </li>                    
                    <?php endif; ?>
					

                    <li class="open">
                        <a href="javascript:void(0);" data-target="#consolidacao" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-heart"></i></span>
                            <span class="text">Consolidação</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="consolidacao" class="submenu collapse in">
                            <li class="submenu-header ellipsis">Fichas</li>
                            <li>
                                <a href="<?php echo ROOTPATH; ?>dashboard">
                                    <span class="text">Painel</span>
                                </a>
                            </li>                            
                            <li class="active">
                                <a href="<?php echo ROOTPATH; ?>consolidado">
                                    <span class="text">Consolidados</span>
                                    <!--<span class="number"><span class="label label-danger">10</span></span>-->
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ROOTPATH; ?>/consolidado/create">
                                    <span class="text">Cadastrar Fichas</span>
                                </a>
                            </li>                            
                        </ul>
                        <!--/ END 2nd Level Menu -->
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
        
        