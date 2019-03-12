		
       
        
        
        
        <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Olá, <?=$_SESSION['s_nome'];?>, bem-vind<?=($_SESSION['s_sexo']=='M')?'o':'a';?> ao Painel IBL</h4>
                    </div>
                    
                </div>
                
                
                <div class="row">
                    <!-- START Left Side -->
                    <div class="col-md-9">
                        <!-- Top Stats -->
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- START Statistic Widget -->
                                <div class="table-layout animation delay animating fadeInDown">
                                    <div class="col-xs-4 panel bgcolor-info">
                                        <div class="ico-users3 fsize24 text-center"></div>
                                    </div>
                                    <div class="col-xs-8 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm">1845</h4>
                                            <p class="semibold text-muted mb0 mt5">Visitantes Registrados</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ END Statistic Widget -->
                            </div>
                            <div class="col-sm-4">
                                <!-- START Statistic Widget -->
                                <div class="table-layout animation delay animating fadeInUp">
                                    <div class="col-xs-4 panel bgcolor-teal">
                                        <div class="ico-crown fsize24 text-center"></div>
                                    </div>
                                    <div class="col-xs-8 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm">187</h4>
                                            <p class="semibold text-muted mb0 mt5">Receberam Contato</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ END Statistic Widget -->
                            </div>
                            <div class="col-sm-4">
                                <!-- START Statistic Widget -->
                                <div class="table-layout animation delay animating fadeInDown">
                                    <div class="col-xs-4 panel bgcolor-primary">
                                        <div class="ico-box-add fsize24 text-center"></div>
                                    </div>
                                    <div class="col-xs-8 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm">1658</h4>
                                            <p class="semibold text-muted mb0 mt5">Aguardando</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ END Statistic Widget -->
                            </div>
                        </div>
                        <!--/ Top Stats -->

                        <!-- Website States -->
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- START panel -->
                                <div class="panel mt10">
                                    <!-- panel-toolbar -->
                                    <div class="panel-heading pt10">
                                        <div class="panel-toolbar">
                                            <h5 class="semibold nm ellipsis">Visitantes</h5>
                                        </div>
                                        <div class="panel-toolbar text-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-default">Período</button>
                                                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-header">Selecione o período :</li>
                                                    <li><a href="#">Ano</a></li>
                                                    <li><a href="#">Mês</a></li>
                                                    <li><a href="#">Semana </a></li>
                                                    <li><a href="#">Dia</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ panel-toolbar -->
                                    <!-- panel-body -->
                                    <div class="panel-body pt0">
                                        <div class="chart mt10" id="chart-audience" style="height:250px;"></div>
                                    </div>
                                    <!--/ panel-body -->
                                    <!-- panel-footer -->
                                    <div class="panel-footer hidden-xs">
                                        <ul class="nav nav-section nav-justified">
                                            <li>
                                                <div class="section">
                                                    <h4 class="bold text-default mt0 mb5" data-toggle="counterup">24,548</h4>
                                                    <p class="nm text-muted">
                                                        <span class="semibold">Visitantes</span>
                                                        <span class="text-muted mr5 ml5">•</span>
                                                        <span class="text-success"><i class="ico-arrow-up4"></i> 32%</span>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="section">
                                                    <h4 class="bold text-default mt0 mb5" data-toggle="counterup">175,132</h4>
                                                    <p class="nm text-muted">
                                                        <span class="semibold">Consolidados</span>
                                                        <span class="text-muted mr5 ml5">•</span>
                                                        <span class="text-success"><i class="ico-arrow-up4"></i> 15%</span>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="section">
                                                    <h4 class="bold text-default mt0 mb5"><span data-toggle="counterup">89.96</span>%</h4>
                                                    <p class="nm text-muted">
                                                        <span class="semibold">Visitantes Consolidados</span>
                                                        <span class="text-muted mr5 ml5">•</span>
                                                        <span class="text-success"><i class="ico-arrow-up4"></i> 3%</span>
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--/ panel-footer -->
                                </div>
                                <!--/ END panel -->
                                <!-- START row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- START panel -->
                        <div class="panel panel-default overflow-hidden">
                            <div class="panel-heading">
                                <h3 class="panel-title">Visitantes Por Bairro</h3>
                            </div>
                            <!-- panel body with collapse capabale -->
                            <div class="panel-collapse">
                                <div class="panel-body np" id="world-map-markers" style="height:400px;"></div>
                            </div>
                            <!--/ panel body with collapse capabale -->
                        </div>
                        <!--/ END panel -->
                    </div>
                </div>
                <!--/ END row -->
                                
                            </div>
                            
                            
                        </div>
                        <!--/ Website States -->

                        <!-- Browser Breakpoint -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- START panel -->
                                <div class="panel panel-default">
                                    <!-- panel heading/header -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title ellipsis"><i class="ico-chrome mr5"></i>Aguardando Contato</h3>
                                        <!-- panel toolbar -->
                                        <div class="panel-toolbar text-right">
                                            <!-- option -->
                                            <div class="option">
                                                <button class="btn up" data-toggle="panelcollapse"><i class="arrow"></i></button>
                                                <button class="btn" data-toggle="panelremove" data-parent=".col-md-12"><i class="remove"></i></button>
                                            </div>
                                            <!--/ option -->
                                        </div>
                                        <!--/ panel toolbar -->
                                    </div>
                                    <!--/ panel heading/header -->
                                    <!-- panel body with collapse capabale -->
                                    <div class="table-responsive panel-collapse pull out">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Bairro</th>
                                                    <th>Municipio</th>
                                                    <th>Atividade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="semibold text-accent">José da Silva</span></td>
                                                    <td>Fonseca</td>
                                                    <td>Niterói</td>
                                                    <td>
                                                        <span class="sparklines" sparkType="bar" sparkBarColor="#ed5466">2,4,1,5,3</span>
                                                        <span class="text-muted mr5 ml5">•</span>
                                                        <span class="semibold text-muted">50.65%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="semibold text-accent">Maria da Silva</span></td>
                                                    <td>Barreto</td>
                                                    <td>Niterói</td>
                                                    <td>
                                                        <span class="sparklines" sparkType="bar" sparkBarColor="#ed5466">5,2,1,3,4</span>
                                                        <span class="text-muted mr5 ml5">•</span>
                                                        <span class="semibold text-muted">20.31%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="semibold text-accent">Carlos Santos</span></td>
                                                    <td>Trindade</td>
                                                    <td>São Gonçalo</td>
                                                    <td>
                                                        <span class="sparklines" sparkType="bar" sparkBarColor="#ed5466">2,1,5,3,4</span>
                                                        <span class="text-muted mr5 ml5">•</span>
                                                        <span class="semibold text-muted">61.22%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="semibold text-accent">Dayane dos Santos</span></td>
                                                    <td>Tijuca</td>
                                                    <td>Rio de Janeiro</td>
                                                    <td>
                                                        <span class="sparklines" sparkType="bar" sparkBarColor="#ed5466">3,1,4,5,2</span>
                                                        <span class="text-muted mr5 ml5">•</span>
                                                        <span class="semibold text-muted">0.65%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="semibold text-accent">Barack Obama</span></td>
                                                    <td>Figueira</td>
                                                    <td>Duque de Caxias</td>
                                                    <td>
                                                        <span class="sparklines" sparkType="bar" sparkBarColor="#ed5466">1,2,3,4,5</span>
                                                        <span class="text-muted mr5 ml5">•</span>
                                                        <span class="semibold text-muted">10.87%</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--/ panel body with collapse capabale -->
                                </div>
                                <!--/ END panel -->
                            </div>
                        </div>
                        <!-- Browser Breakpoint -->
                    </div>
                    <!--/ END Left Side -->

                    <!-- START Right Side -->
                    <div class="col-md-3">
                        <div class="panel panel-minimal">
                            <div class="panel-heading"><h5 class="panel-title"><i class="ico-health mr5"></i>Últimas Atividades</h5></div>
                        
                            <!-- Media list feed -->
                            <ul class="media-list media-list-feed nm">
                                <li class="media">
                                    <div class="media-object pull-left">
                                        <i class="ico-pencil bgcolor-success"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading">EDIT EXISTING PAGE</p>
                                        <p class="media-text"><span class="text-primary semibold">Service Page</span> has been edited by Tamara Moon.</p>
                                        <p class="media-meta">Just Now</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-object pull-left">
                                        <i class="ico-file-plus bgcolor-success"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading">CREATE A NEW PAGE</p>
                                        <p class="media-text"><span class="text-primary semibold">Service Page</span> has been created by Tamara Moon.</p>
                                        <p class="media-meta">2 Hour Ago</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-object pull-left">
                                        <i class="ico-upload22 bgcolor-success"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading">UPLOAD CONTENT</p>
                                        <p class="media-text">Tamara Moon has uploaded 8 new item to the directory</p>
                                        <p class="media-meta">3 Hour Ago</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-object pull-left">
                                        <img src="../image/avatar/avatar6.jpg" class="media-object img-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading">NEW MESSAGE</p>
                                        <p class="media-text">Arthur Abbott send you a message</p>
                                        <p class="media-meta">3 Hour Ago</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-object pull-left">
                                        <i class="ico-upload22 bgcolor-success"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading">UPLOAD CONTENT</p>
                                        <p class="media-text">Tamara Moon has uploaded 3 new item to the directory</p>
                                        <p class="media-meta">7 Hour Ago</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-object pull-left">
                                        <i class="ico-link5 bgcolor-success"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading">NEW UPDATE AVAILABLE</p>
                                        <p class="media-text">3 new update is available to download</p>
                                        <p class="media-meta">Yesterday</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-object pull-left">
                                        <i class="ico-loop4"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="javascript:void(0);" class="media-heading text-primary">Load more feed</a>
                                    </div>
                                </li>
                            </ul>
                            <!--/ Media list feed -->
                        </div>
                    </div>
                    <!--/ END Right Side -->
                </div>
            </div>
            <!--/ END Template Container -->
<!--                            	<h2> <br />
									Seja bem-vind! :) </h2>
                                
                                <hr>
                                IDÉIA: Montar Painel de Indicadores de Lançamento
                                <br />
								<br />
                                - Gráfico de Entrada Por Culto<br />
                                - Gráfico de Lançamentos por Dia (BurnDown) - Entradas + Digitação<br />
                                - Lista de Ultimos Contatos Realizados<br />
                                - Visitantes sem contato<br />
                                - Gráfico de Visitantes sem contato<br />
                                - Visitantes Contactados por dia (Total e Efetivo)<br /> 
                                - Fazer um mural de mensagens e orientações<br />
                                - Mapa Geográfico de calor com visitantes por bairro/região-->

 