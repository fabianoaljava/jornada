		
       
        
        
        
        <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Olá, <?=$_SESSION['s_nome'];?>, bem-vind<?=($_SESSION['s_sexo']=='M')?'o':'a';?> ao Painel da Consolidação</h4>
                    </div>
                    
                </div>
                
                
                <div class="row">
                    <!-- START Left Side -->
                    <div class="col-md-9">
                       <!-- Top Stats -->
                        <div class="row">

                            <div class="col-sm-4">
                                <!-- START Statistic Widget -->
                                <div class="table-layout animation delay animating fadeInUp">
                                    <div class="col-xs-4 panel bgcolor-danger">
                                        <div class="ico-flag2 fsize24 text-center"></div>
                                    </div>
                                    <div class="col-xs-8 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm">XXX</h4>
                                            <p class="semibold text-muted mb0 mt5">Pendente</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ END Statistic Widget -->
                            </div>                            
                            <div class="col-sm-4">
                                <!-- START Statistic Widget -->
                                <div class="table-layout animation delay animating fadeInUp">
                                    <div class="col-xs-4 panel bgcolor-teal">
                                        <div class="ico-flag fsize24 text-center"></div>
                                    </div>
                                    <div class="col-xs-8 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm">XXX</h4>
                                            <p class="semibold text-muted mb0 mt5">Em Consolidação</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ END Statistic Widget -->
                            </div>

                            <div class="col-sm-4">
                                <!-- START Statistic Widget -->
                                <div class="table-layout animation delay animating fadeInDown">
                                    <div class="col-xs-4 panel bgcolor-primary">
                                        <div class="ico-check fsize24 text-center"></div>
                                    </div>
                                    <div class="col-xs-8 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm">XXX</h4>
                                            <p class="semibold text-muted mb0 mt5">Total Consolidado</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ END Statistic Widget -->
                            </div>
                        </div>
                        <!--/ Top Stats -->

                        
                        
                        <!-- Pendente -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- START panel -->
                                <div class="panel panel-default">
                                    <!-- panel heading/header -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title ellipsis"><i class="ico-warning-sign mr5"></i>Pendente</h3>
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
                                    <div class="panel-collapse pull out">
                                    
                                    	<div class="panel panel-default">

							<div class="panel-group" id="pd-accordion1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#pd-accordion1" href="#pd-collapseOne" class="collapsed">
                                                <span class="arrow mr5"></span> Filtro Avançado
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="pd-collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">

									<input type="hidden" id="pd-idademin" name="pd-idademin" />
                                    <input type="hidden" id="pd-idademax" name="pd-idademax" />
                                    <input type="hidden" id="pd-progmin" name="pd-progmin" />
                                    <input type="hidden" id="pd-progmax" name="pd-progmax" />
                                    
                                  
									
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label label-success">Data do Culto</span>                                    
                                            <div class="row">
                                                <div class="col-md-6"><input type="text" class="form-control" id="pd-data-inicio" placeholder="Data Inicio" /></div>
                                                <div class="col-md-6"><input type="text" class="form-control" id="pd-data-fim" placeholder="Data Fim" /></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                                               
                                            <div class="row">
                                                <div class="col-md-6">
                                                <span class="label label-success">Culto</span> 
                                                <select class="form-control" id="pd-culto" name="pd-culto">
                                                    <option value="">Todos</option>
                                                    <option value="Domingo 10:30">Domingo 10:30</option>
                                                    <option value="Domingo 18:00">Domingo 18:00</option>
                                                    <option value="Domingo 20:30">Domingo 20:30</option>
                                                    <option value="Terça 20:00">Terça 20:00</option>
                                                    <option value="Next | Jovens Sábado - 20:00">Next | Jovens Sábado - 20:00</option>
                                                    <option value="Nexteen - Sexta feira - 20:00">Nexteen - Sexta feira - 20:00</option>
                                                    <option value="Eventos">Eventos</option>
                                                    <option value="Não definido">Não definido</option>
                                                </select>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-success">Decisão</span> 
                                                <select class="form-control" id="pd-decisao" name="pd-decisao">
                                                    <option value="">Todos</option>
                                                    <option value="Reconciliação">Reconciliação</option>
                                                    <option value="Conversão">Conversão</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                                               
                                            <div class="row">
                                                <div class="col-md-3">
                                                <span class="label label-success">Estado Civil</span> 
                                                <select class="form-control" id="pd-estado_civil" name="pd-estado_civil">
                                                    <option value="">Todos</option>
                                                    <option value="Solteiro">Solteiro</option>
                                                    <option value="Casado">Casado</option>
                                                    <option value="Separado">Separado</option>
                                                    <option value="Divorciado">Divorciado</option>
                                                    <option value="Viúvo">Viúvo</option>
                                                    <option value="União Estável">União Estável</option>
                                                    <option value="Outros">Outros</option>
                                                </select>
                                                </div>
												<div class="col-md-3">
                                                <span class="label label-success">Sexo</span> 
                                                <select class="form-control" id="pd-sexo" name="pd-sexo">
                                                    <option value="">Ambos</option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Feminino</option>
                                                </select>
                                                </div> 
                                                <div class="col-md-6">
                                                <span class="label label-success">Status</span> 
                                                <select class="form-control" id="pd-status" name="pd-status">
                                                    <option value="">Todos</option>
                                                    <option value="Interrompido">Interrompido</option>
                                                    <option value="Aguardando Contato">Aguardando Contato</option>
                                                    <option value="Em consolidação">Em consolidação</option>
                                                    <option value="Consolidacao Incompleta">Consolidacao Incompleta</option>
                                                    <option value="Sem contato">Sem contato</option>
                                                    <option value="GC">GC</option>
                                                    <option value="Backlog">Backlog</option>
                                                    <option value="Consolidado">Consolidado</option>
                                                    <option value="Negligenciado">Negligenciado</option>                                                    
                                                </select>
                                                </div>                                                                                               
                                            </div>
                                        </div>
                                    </div>
                                                                        

                                    <div class="col-md-6">
                                    <span class="label label-success" id="pd-idade-label">Idade entre 0 e 100 anos</span>
                                        <ul id="pd-idade-slider" class="list-unstyled mb0">
                                            <li class="slider-primary mb15 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-min="0" data-max="100" aria-disabled="false">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                                <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" data-c="min"></a>
                                                <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" data-c="min"></a>
                                            </li>                                        
                                        </ul>                                    
                                    </div>
                                   
                                   
                                   
                                   <div class="col-md-6">
                                    <span class="label label-success" id="pd-progresso-label">Progresso entre 0% e 100%</span>
                                        <ul id="pd-progresso-slider" class="list-unstyled mb0">
                                            <li class="slider-primary mb15 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-min="0" data-max="100" aria-disabled="false">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                                <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" data-c="min"></a>
                                                <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" data-c="min"></a>
                                            </li>                                        
                                        </ul>                                    
                                    </div>
                                            
                                        </div>
                                    </div>
                                </div>                           
                        	</div>


                                       <table id="ajax-pendente" class="display responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th nowrap="nowrap">Data do Culto</th>
                                                    <th nowrap="nowrap">Culto</th>
                                                    <th>Nome</th>
                                                    <th nowrap="nowrap">Idade</th>
                                                    <th nowrap="nowrap">Decisão</th>
                                                    <th nowrap="nowrap">Status</th>
                                                    <th nowrap="nowrap">Progresso</th>
                                                    <th>Sexo</th> 
                                                    <th>Estado Civil</th> 
                                                    <th>Bairro</th>
                                                    <th>Cidade</th>                                                    
                                                    <th nowrap="nowrap">Contatos Realizados</th>
                                                    <th nowrap="nowrap">Último Contato</th>
                                                    <th nowrap="nowrap">Encaminhado Data</th>                                        
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
            							
                                    </div>
                                    <!--/ panel body with collapse capabale -->
                                </div>
                                <!--/ END panel -->
                            </div>
                        </div>
                        <!-- Pendente -->
                        
                        
                        </div>
                        

                        <!-- Em consolidação  -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- START panel -->
                                <div class="panel panel-default">
                                    <!-- panel heading/header -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title ellipsis"><i class="ico-flag2 mr5"></i>Em consolidação</h3>
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
                                    
                                    
                                    <table id="ajax-emconsolidacao" class="display responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                                <tr>
                                                    <th nowrap="nowrap">Data do Culto</th>
                                                    <th>Culto</th>
                                                    <th>Nome</th>
                                                    <th nowrap="nowrap">Idade</th>
                                                    <th nowrap="nowrap" width="80px">Decisão</th>
                                                    <th nowrap="nowrap">Status</th>
                                                    <th nowrap="nowrap">Progresso</th>
                                                    <th>Sexo</th> 
                                                    <th>Estado Civil</th> 
                                                    <th>Bairro</th>
                                                    <th>Cidade</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        
                                        
                                        
                                    </div>
                                    <!--/ panel body with collapse capabale -->
                                </div>
                                <!--/ END panel -->
                            </div>
                        </div>
                        <!-- Em consolidação -->
                        
                        
                        
                        
                    </div>
                    <!--/ END Left Side -->
                    
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

 