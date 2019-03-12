		
       
        
        
        
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
                            <div class="col-sm-3">
                                <!-- START Statistic Widget -->
                                <div class="table-layout animation delay animating fadeInDown">
                                    <div class="col-xs-4 panel bgcolor-warning">
                                        <div class="ico-users3 fsize24 text-center"></div>
                                    </div>
                                    <div class="col-xs-8 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm">XXX</h4>
                                            <p class="semibold text-muted mb0 mt5">Sem Consolidador</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ END Statistic Widget -->
                            </div>
                            <div class="col-sm-3">
                                <!-- START Statistic Widget -->
                                <div class="table-layout animation delay animating fadeInUp">
                                    <div class="col-xs-4 panel bgcolor-danger">
                                        <div class="ico-warning-sign fsize24 text-center"></div>
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
                            <div class="col-sm-3">
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

                            <div class="col-sm-3">
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

                        
                        
                         <!-- Sem Consolidador -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- START panel -->
                                <div class="panel panel-default">
                                    <!-- panel heading/header -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title ellipsis"><i class="ico-users mr5"></i>Sem Consolidador</h3>
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

							<div class="panel-group" id="sc-accordion1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#sc-accordion1" href="#sc-collapseOne" class="collapsed">
                                                <span class="arrow mr5"></span> Filtro Avançado
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="sc-collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">

									<input type="hidden" id="sc-idademin" name="sc-idademin" />
                                    <input type="hidden" id="sc-idademax" name="sc-idademax" />
                                    <input type="hidden" id="sc-progmin" name="sc-progmin" />
                                    <input type="hidden" id="sc-progmax" name="sc-progmax" />
                                    
                                  
									
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                                               
                                            <div class="row">
                                                <div class="col-md-6">
                                                <span class="label label-success">Culto</span> 
                                                <select class="form-control" id="sc-culto" name="sc-culto">
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
                                                <select class="form-control" id="sc-decisao" name="sc-decisao">
                                                    <option value="">Todos</option>
                                                    <option value="Reconciliação">Reconciliação</option>
                                                    <option value="Conversão">Conversão</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                                               
                                            <div class="row">
                                                <div class="col-md-6">
                                                <span class="label label-success">Estado Civil</span> 
                                                <select class="form-control" id="sc-estado_civil" name="sc-estado_civil">
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
												<div class="col-md-6">
                                                <span class="label label-success">Sexo</span> 
                                                <select class="form-control" id="sc-sexo" name="sc-sexo">
                                                    <option value="">Ambos</option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Feminino</option>
                                                </select>
                                                </div> 
                                                                                           
                                            </div>
                                        </div>
                                    </div>
                                                                        

                                    <div class="col-md-12">
                                    <span class="label label-success" id="sc-idade-label">Idade entre 0 e 100 anos</span>
                                        <ul id="sc-idade-slider" class="list-unstyled mb0">
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


                                        <table id="ajax-semconsolidador" class="display responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                                <tr>
                                                    <th nowrap="nowrap">Data do Culto</th>
                                                    <th width="80px">Culto</th>
                                                    <th width="80px">Nome</th>
                                                    <th nowrap="nowrap">Idade</th>
                                                    <th nowrap="nowrap" width="80px">Decisão</th>
                                                    <th>Sexo</th> 
                                                    <th>Estado Civil</th> 
                                                    <th width="80px">Bairro</th>
                                                    <th width="80px">Cidade</th>
                                                    <th width="80px"></th>
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
                        
						
						
                        </div>
                        
                        <!-- Sem Consolidador -->
                        
                        
                        <!-- Em Consolidação -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- START panel -->
                                <div class="panel panel-default">
                                    <!-- panel heading/header -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title ellipsis"><i class="ico-flag mr5"></i>Em consolidação e Pendentes</h3>
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

							<div class="panel-group" id="ec-accordion1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#ec-accordion1" href="#ec-collapseOne" class="collapsed">
                                                <span class="arrow mr5"></span> Filtro Avançado
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="ec-collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">

									<input type="hidden" id="ec-idademin" name="ec-idademin" />
                                    <input type="hidden" id="ec-idademax" name="ec-idademax" />
                                    <input type="hidden" id="ec-progmin" name="ec-progmin" />
                                    <input type="hidden" id="ec-progmax" name="ec-progmax" />
                                    
                                  
									
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label label-success">Data do Culto</span>                                    
                                            <div class="row">
                                                <div class="col-md-6"><input type="text" class="form-control" id="ec-data-inicio" placeholder="Data Inicio" /></div>
                                                <div class="col-md-6"><input type="text" class="form-control" id="ec-data-fim" placeholder="Data Fim" /></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                                               
                                            <div class="row">
                                                <div class="col-md-6">
                                                <span class="label label-success">Culto</span> 
                                                <select class="form-control" id="ec-culto" name="ec-culto">
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
                                                <select class="form-control" id="ec-decisao" name="ec-decisao">
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
                                                <select class="form-control" id="ec-estado_civil" name="ec-estado_civil">
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
                                                <select class="form-control" id="ec-sexo" name="ec-sexo">
                                                    <option value="">Ambos</option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Feminino</option>
                                                </select>
                                                </div> 
                                                <div class="col-md-6">
                                                <span class="label label-success">Status</span> 
                                                <select class="form-control" id="ec-status" name="ec-status">
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
                                    <span class="label label-success" id="ec-idade-label">Idade entre 0 e 100 anos</span>
                                        <ul id="ec-idade-slider" class="list-unstyled mb0">
                                            <li class="slider-primary mb15 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-min="0" data-max="100" aria-disabled="false">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                                <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" data-c="min"></a>
                                                <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" data-c="min"></a>
                                            </li>                                        
                                        </ul>                                    
                                    </div>
                                   
                                   
                                   
                                   <div class="col-md-6">
                                    <span class="label label-success" id="ec-progresso-label">Progresso entre 0% e 100%</span>
                                        <ul id="ec-progresso-slider" class="list-unstyled mb0">
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


                                        <table id="ajax-emconsolidacao" class="display responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                                <tr>
                                                    <th nowrap="nowrap">Data do Culto</th>
                                                    <th width="80px">Culto</th>
                                                    <th width="80px">Nome</th>
                                                    <th nowrap="nowrap">Idade</th>
                                                    <th nowrap="nowrap" width="80px">Decisão</th>
                                                    <th nowrap="nowrap">Status</th>
                                                    <th nowrap="nowrap">Progresso</th>
                                                    <th>Sexo</th> 
                                                    <th>Estado Civil</th> 
                                                    <th width="80px">Bairro</th>
                                                    <th width="80px">Cidade</th>
                                                    <th width="80px"></th>
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
                        <!-- Em Consolidação -->
                        
                        
                        </div>
                        
                        
                        
                       
                        
                        
                        
                        
						<!-- START Modal -->
                <div id="ModalDesignar" class="modal fade">
                <div class="modal-dialog">
                <form class="modal-content"
                    data-toggle="formajax" 
                    data-options='{ "url": "<?php echo ROOTPATH; ?>consolidado/designar", "validate": true }'
                    id="formdesignar" 
                >   
                        <input type="hidden" name="consolidado_id" id="consolidado_id" value="" />
                                       
                                        
                            <div class="modal-header">
                                <div class="cell text-center">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <div class="ico-user-plus2 mb15 mt15 fsize32"></div>
                                    <h4 class="semibold text-primary">Designar Consolidador</h4>
                                    <img id="loadingapprove" src="<?php echo ROOTPATH; ?>image/loading/spinner.gif" style="display:none;">                                 
                                </div>
                                <div class="form-group message-container"></div><!-- will be use as done/fail message container -->                                

                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                    
                              
                                        <div class="form-group">
                                         
                                            <label class="control-label">Consolidador<span class="text-danger">*</span></label>
                                            <select class="form-control text-left" id="selectize-customselect" name="consolidador_id">
                                                <option value="">Selecione</option>
                                                <?php foreach ($consolidadores as $consolidador): ?>    
                                                        <option value="<?=$consolidador->id?>" ><?=$consolidador->nome?></option>
                                                <?php endforeach; ?>  

                                                                                            
                                            </select>
                                        </div> 
                                         
                                        
                                        <div class="form-group">
                                            <label class="control-label">Instruções/Observações:</label>
                                            <textarea name="consonotes" id="consonotes" class="form-control" rows="2" placeholder="Insira uma observação ou instrução ao consolidador."></textarea>
                                        </div>                                                                                                                                                                                                 
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success" id="btn_approve">Designar</button>
                            </div>
                        </form><!-- /.modal-content -->

                    </div><!-- /.modal-dialog -->
                </div>
                <!--/ END Modal --> 
                        
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
                                
                                

				 