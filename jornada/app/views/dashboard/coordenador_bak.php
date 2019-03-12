		
       
        
        
        
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
                                <div class="table-layout animation delay animating fadeInDown">
                                    <div class="col-xs-4 panel bgcolor-info">
                                        <div class="ico-users3 fsize24 text-center"></div>
                                    </div>
                                    <div class="col-xs-8 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm"><?=$total_consolidando?></h4>
                                            <p class="semibold text-muted mb0 mt5">Em consolidação</p>
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
                                            <h4 class="semibold nm"><?=$total_aguardando?></h4>
                                            <p class="semibold text-muted mb0 mt5">Aguardando Contato</p>
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
                                            <h4 class="semibold nm"><?=$total_contactado?></h4>
                                            <p class="semibold text-muted mb0 mt5">Receberam Contato</p>
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
                                        <h3 class="panel-title ellipsis"><i class="ico-user-minus mr5"></i>Sem Consolidador</h3>
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
                                        <table class="table table-bordered" id="ajax-semconsolidador">
                                            <thead>
                                                <tr>
                                                    <th width="140px" nowrap="nowrap">Data do Culto</th>
                                                    <th width="140px" nowrap="nowrap">Culto</th>
                                                    <th>Nome</th>
                                                    <th width="80px" nowrap="nowrap">Idade</th>  
                                                    <th width="80px" nowrap="nowrap">Decisão</th>                                                  
                                                    <th width="140px" nowrap="nowrap">Data Cadastro</th>
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
                        <!-- Sem Consolidador -->

                        <!-- Aguardando Contato -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- START panel -->
                                <div class="panel panel-default">
                                    <!-- panel heading/header -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title ellipsis"><i class="ico-flag2 mr5"></i>Aguardando Contato</h3>
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
                                        <table class="table table-bordered" id="ajax-aguardandocontato">
                                            <thead>
                                                <tr>
                                                    <th width="100px" nowrap="nowrap">Data do Culto</th>
                                                    <th width="140px" nowrap="nowrap">Culto</th>
                                                    <th>Nome</th>
                                                    <th width="80px" nowrap="nowrap">Idade</th>
                                                    <th width="80px" nowrap="nowrap">Decisão</th>
                                                    <th width="100px" nowrap="nowrap">Contatos Realizados</th>
                                                    <th width="100px" nowrap="nowrap">Último Contato</th>
                                                    <th width="100px" nowrap="nowrap">Encaminhado Data</th>                                        
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
                        <!-- Aguardando Contato -->
                        
                        
                        <!-- Aguardando Contato -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- START panel -->
                                <div class="panel panel-default">
                                    <!-- panel heading/header -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title ellipsis"><i class="ico-check mr5"></i>Receberam Contato</h3>
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
                                       <table class="table table-bordered" id="ajax-receberamcontato">
                                            <thead>
                                                <tr>
                                                    <th width="100px" nowrap="nowrap">Data do Culto</th>
                                                    <th width="140px" nowrap="nowrap">Culto</th>
                                                    <th>Nome</th>
                                                    <th width="80px" nowrap="nowrap">Idade</th>
                                                    <th width="80px" nowrap="nowrap">Decisão</th>
                                                    <th width="100px" nowrap="nowrap">Contatos Realizados</th>
                                                    <th width="100px" nowrap="nowrap">Último Contato</th>
                                                    <th width="100px" nowrap="nowrap">Encaminhado Data</th>                                        
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
                        <!-- Aguardando Contato -->
                        
                        
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

				 