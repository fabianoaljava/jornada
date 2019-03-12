<?php

function pesquisa_object($array, $index, $value, $result, $default = null){
	$item = $default;
	foreach($array as $arrayInf) {
		if($arrayInf->{$index}==$value){
			return $arrayInf->{$result};
		}
	}
	return $item;
}

?>
<!-- START Template Main -->
        <section id="main" role="main">
            <!-- START jumbotron -->
            <section class="jumbotron jumbotron-bglg7 nm" data-stellar-background-ratio="0.4" style="min-height:180px;">
                <!-- pattern overlay -->
                <div class="pattern pattern2 overlay"></div>
                <!--/ pattern overlay -->
                <div class="container" style="padding-top:2%;">
                    <h1 class="thin text-white text-center font-alt">Ficha de Consolidação</h1>
                    <h4 class="thin text-white text-center">“Quando eu estava com eles, guardava-os no teu nome, que me deste, e protegi-os, e nenhum deles se perdeu..." João 17.12a</h4>
                </div>
            </section>
            <!--/ END jumbotron -->

            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- START Row -->
                <div class="row">
                    
                     <div class="container">
                     
                     		<?php
							
								if ($email != ''):
									$size = 150;											
									$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=404" . "&s=" . $size;
											
							?>
                            <span class="media-object pull-left">
								<img src="<?=$grav_url?>" class="img-circle" alt="">
                            </span>
                            <?php endif; ?>
                            <h2 class="text-center"><strong><?php echo (isset($nome))?$nome:''; ?></strong></h2>
							 <hr><!--horizontal line -->                            
                     </div>

                           
                    <!-- Left side / top side -->
                    <div class="col-md-3">
                        <div class="panel panel-minimal nm">



                            <div class="panel-toolbar-wrapper">
                                <div class="panel-toolbar">
                                    <h5 class="semibold nm text-info"><i class="ico-info2 mr5"></i>Sobre</h5>
                                </div>
                                <div class="panel-toolbar text-right">
                                    <a href="<?php echo ROOTPATH; ?>consolidado/edit/<?php echo (isset($id))?sha1($id):''; ?>"><button class="btn btn-sm btn-default"><i class="ico-pencil7"></i></button></a>
                                    
                                </div>
                            </div>
                            <div class="panel-body pt0">  
                            <p class="semibold mb5">Contato</p>
                                <ul class="list-unstyled mb10">
                                    <?php if ($telefone != '') : ?><li><i class="ico-phone3 text-muted mr5"></i><?=$telefone?></li><?php endif; ?>
                                    <?php if ($celular1 != '') : ?><li><i class="ico-mobile text-muted mr5"></i><?=$celular1?></li><?php endif; ?>
                                    <?php if ($celular2 != '') : ?><li><i class="ico-mobile text-muted mr5"></i><?=$celular2?></li><?php endif; ?>
                                    <?php if ($email != '') : ?><li><i class="ico-envelop3 text-muted mr5"></i><?=$email?></li><?php endif; ?>
                                    <?php if ($whatsapp != '') : ?><li><strong>Whatsapp?</strong>
                                            <?php  if ($whatsapp == '1') echo 'Sim'; else echo 'Não' ?> </li><?php endif; ?>                                    
                                </ul>                                
                                <address class="nm">
                                    <p class="semibold nm">Endereço</p>
                                    <?php echo (isset($endereco))?$endereco:''; ?><br>
                                    <?php print_r($municipio{'nome_municipio'}); ?>, <?php print_r($bairro{'nome_bairro'}); ?>
                                </address>								                              
                            </div>
                            
							<div class="panel-body pt0">  
                            <p class="semibold mb5">Informações</p>
                                <ul class="list-unstyled mb10">
                                    <li><strong>Convidado por:</strong><?php echo (isset($convidante))?$convidante:''; ?></li>
                                    <li><strong>Telefone:</strong><?php echo (isset($tel_convidante))?$tel_convidante:''; ?></li>
                                    <li><strong>Decisão:</strong><?php $decisao= isset($decisao)?$decisao:''; ?>
                                            <?php  if ($decisao == '0') echo 'Aceitou Jesus'; else echo 'Reconciliou com Jesus' ?> </li>
                                    <li><strong>Batizado:</strong><?php $batizado= isset($batizado)?$batizado:''; ?>
                                            <?php  if ($batizado == '1') echo 'Sim'; else 'Não' ?></li>
                                    
									<hr />
                                    <li><strong>Data de Nascimento:</strong><?php echo (isset($data_nasc))?$data_nasc:''; ?></li>
                                    <li><strong>Sexo:</strong><?php $sexo= isset($sexo)?$sexo:''; ?>
                                                    <?php if ($sexo == 'F') echo "Feminino"; else echo "Masculino"; ?></li>
                                    <li><strong>Estado Civil:</strong><?php $estado_civil= isset($estado_civil)?$estado_civil:''; ?>
                                                   	<?php if ($estado_civil == '0') echo "Solteiro" ?>
                                                    <?php if ($estado_civil == '1') echo "Casado" ?>
                                                    <?php if ($estado_civil == '2') echo "Separado" ?>
                                                    <?php if ($estado_civil == '3') echo "Divorciado" ?>
                                                    <?php if ($estado_civil == '4') echo "Viúvo" ?>
                                                    <?php if ($estado_civil == '5') echo "União" ?>
                                                    <?php if ($estado_civil == '6') echo "Outros" ?></li>                                                                                                                                                                                  
                                </ul> 
                                
                                <ul class="list-unstyled mb10">
                                    <li><strong>GC:</strong>&nbsp;<?php print_r($gc{'nome_gc'}); ?></li>
                                </ul>
                                                             
                                <address class="nm">
                                    <p class="semibold nm">Observações</p>
                                    <?php echo (isset($observacao))?$observacao:''; ?>
                                    
                                </address>	
                                <hr />
                                <ul class="list-unstyled mb10">
                                    <li><strong>Cadastrado por:</strong>&nbsp;<?=$user_cadastro; ?></li>
                                    <li><strong>Data Cadastro:</strong>&nbsp;<?=$data_cadastro; ?></li>
                                </ul>                                							                              
                            </div>                            
                            
							
                            <hr><!--horizontal line -->

                            <!-- START Friend lists -->
                            <div class="panel-toolbar-wrapper">
                                <div class="panel-toolbar">
                                    <h5 class="semibold nm text-info"><i class="ico-users3 mr5"></i>Consolidadores </h5>
									<?php if ($_SESSION['s_nivel_id'] <= 4): ?>
									<a href="#" id="addconsolidador"><i class="ico-user-plus2 mr5"></i>(+) Designar</a>
									<?php endif; ?>
                                    
                                </div>
                            </div>
                            
                            <div class="panel-body pt0">
                                <div class="media-list media-list-contact">
                                
                                	<?php 
									
									//$contatos_realizados = array_unique($contatos_realizados);
									
									foreach ($consolidadores as $consolidador) : 
											
											
											
											
											
											$email = $consolidador->email;
											$size = 150;
											$grav_url = ($consolidador->foto == '')? "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( THEMEPATH . '/image/avatar/avatar.png' ) . "&s=" . $size:ROOTPATH .$consolidador->foto;																						
											
											
									
									?>
                                    <a href="page-message-rich.html" class="media">
                                        <span class="media-object pull-left">
                                            <img src="<?=$grav_url?>" class="img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span><?=$consolidador->nome;?></span>
                                            <span class="media-meta"><?php print_r(pesquisa_object($gcs, 'id', $consolidador->gc_id, 'nome_gc', '---')); ?></span>
                                            <?php if ($_SESSION['s_nivel_id'] < 4): ?>
                                            <span class="media-meta"><a href="#" id="removeconsolidador">X Remover</a></span>
                                            <?php endif; ?>
                                        </span>
                                    </a>
                                    <?php endforeach; ?>
                                    
                                </div>
                            </div>
                            <!--/ END Friend lists -->
                        </div>
                    </div>
                    <!--/ Left side / top side -->

                    <!-- Right Side / Bottom side -->
                    <div class="col-md-9">
                        <!-- START Timeline -->
                        <ul class="timeline">
                            <li class="header">
                                <!-- Post form -->
                                
                                <form class="panel"
                            data-toggle="formajax" 
                            data-options='{ "url": "<?php echo ROOTPATH; ?>consolidado/insert_historico", "validate": true }'
                        >
                        
                        <input type="hidden" name="consolidado_id" id="consolidado_id" value="<?php echo (isset($id))?$id:''; ?>"   />
                        <div class="message-container"></div><!-- will be use as done/fail message container -->
                        
                        
                                    <textarea class="form-control form-control-minimal" name="descricao" rows="2" placeholder="Fale sobre como foi o contato, o que você falou, o que você ouviu, se ele(a) foi receptivo(a) e qualquer outra informação que você considerar importante." title="Fale sobre como foi o contato, o que você falou, o que você ouviu, se ele(a) foi receptivo(a) e qualquer outra informação que você considerar importante." data-parsley-required="true" data-parsley-error-message="Por favor, insira as informações sobre o contato."></textarea>
                                    
                                    <div class="panel-footer">
                                    
                                        <div class="panel-toolbar-wrapper">
                                            <div class="panel-toolbar" style="width:2%">
                                                <div class="btn-group" id="divtipocontato">
                                                	Forma de Contato<br />
                                                    <button type="button" class="btn btn-default" id="btn_tpligacao" title="Contato ou tentativa de contato por telefone ou celular."><i class="ico-phone" ></i> Ligação</button>
                                                    <button type="button" class="btn btn-default" id="btn_tpemail" title="Contato ou tentativa de contato por e-mail."><i class="ico-mail-send"></i> E-mail</button>
                                                    <button type="button" class="btn btn-default" id="btn_tpmensagem" title="Contato ou tentativa de contato por mensagem via SMS, Whatsapp, Facebook Messenger, Hangout ou aplicativos semelhantes."><i class="ico-mobile2"></i> Mensagem</button>
                                                    <button type="button" class="btn btn-default" id="btn_tpoutros" title="Contato ou tentativa de contato por outros canais, favor informar."><i class="ico-bullhorn"></i> Outros </button>
                                                    
                                                    <input type="hidden" name="tipoinformacao_id" id="tipo_informacao"   data-parsley-required="true" data-parsley-error-message="Por favor, selecione o tipo de contato."/>
                                                    
                                                </div>
                                            </div>
											
                                            <div class="panel-toolbar">
                                            Data do Contato:<br />
                                              <input type="text" class="form-control" name="data" id="datetimepicker1" placeholder="<?=date('d/m/Y H:i')?>"  data-parsley-required="true" data-parsley-error-message="Por favor, preencha o campo Data do Contato" value="<?=date('d/m/Y H:i')?>" data-mask="99/99/9999 99:99" style="width:140px">
                                            </div>                                            
                                            
                                            <div class="panel-toolbar">
                                                <div class="btn-group">
                                                	Receptividade<br />
                                                    <button type="button" class="btn btn-default" id="btn_rcraiva" title="Foi agressivo e/ou não deseja mais receber contato."><i class="ico-angry"></i></button>
                                                    <button type="button" class="btn btn-default" id="btn_rctriste" title="Manifestou insatisfação, reclamação, tristeza por algum motivo, porém ainda deseja receber contato."><i class="ico-frown"></i></button>
                                                    <button type="button" class="btn btn-default" id="btn_rcindiferente" title="Foi indiferente, seco, sem expressão"><i class="ico-meh"></i></button>
                                                    <button type="button" class="btn btn-default" id="btn_rcfeliz" title="Ficou feliz em receber o contato, manifestou alegria e/ou retornou positivamente."><i class="ico-smile"></i></button>
                                                    <button type="button" class="btn btn-default" id="btn_rcmuitofeliz" title="Manifestou extrema felicidade, satisfação, deu saltos de alegria, chorou de emoção por receber o contato."><i class="ico-happy"></i></button>
                                                    <button type="button" class="btn btn-default" id="btn_semcontato" title="Fora de área, não atendeu ou não retornou o contato."><i class="ico-contact-remove"></i></button>
                                                    

                                                    
                                                    <input type="hidden" name="receptividade" id="receptividade"  data-parsley-required="true" data-parsley-error-message="Por favor, informe como foi a receptividade."/>
                                                    
                                                </div>
                                            </div>                                            
                                            <div class="panel-toolbar text-right">
                                                <button type="submit" class="btn btn-primary">Registrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--/ Post form -->
                            </li>
                            <li class="header year"  style="background-color:transparent; max-width:none"><button type="button" class="btn btn-primary mb5" data-toggle="modal" data-target="#bs-infomodal" id="btn_infomodal"><i class="ico-plus"></i> Adicionar Informações</button></li>
                            <li>&nbsp;</li>
                            
                            <li class="wrapper">
                                <!-- START Events -->
                                <ul class="events">
                                
                                
                                <?php foreach ($consolidado_historico as $historico): ?>    
                                
                                <?php
                                
								
								
								$tipo_informacao = pesquisa_object($tipos_informacao, 'id', $historico->tipoinformacao_id, 'tipo_informacao', 'Outro');
								
								
								switch ($historico->tipoinformacao_id) {
									case 1:
										$ico_contato = "ico-phone";
										break;
									case 2:
										$ico_contato = "ico-mail-send";
										break;
									case 3:
										$ico_contato = "ico-mobile2";
										break;
									default:
										$ico_contato = "ico-bullhorn";									
								}
							
								
								
								switch ($historico->receptividade) {
									case -3:
										$ico_receptividade = "ico-angry";
										$title_receptividade = "Foi agressivo e/ou não deseja mais receber contato.";
										break;
									case -2:
										$ico_receptividade = "ico-frown";
										$title_receptividade = "Manifestou insatisfação, reclamação, tristeza por algum motivo, porém ainda deseja receber contato.";
										break;
									case -1:
										$ico_receptividade = "ico-meh";
										$title_receptividade = "Foi indiferente, seco, sem expressão.";
										break;
									case 1:
										$ico_receptividade = "ico-smile";
										$title_receptividade = "Ficou feliz em receber o contato, manifestou alegria e/ou retornou positivamente.";
										break;
									case 2:
										$ico_receptividade = "ico-happy";
										$title_receptividade = "Manifestou extrema felicidade, satisfação, deu saltos de alegria, chorou de emoção por receber o contato.";
										break;										
									default:
										$ico_receptividade = "ico-contact-remove";
										$title_receptividade = "Fora de área, não atendeu ou não retornou o contato.";		
										break;								
								}
								
								$data_contato = date_create($historico->data);
								
								
								$email = $historico->email;
								$size = 150;
								$grav_url = ($historico->foto == '')? "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( THEMEPATH . '/image/avatar/avatar.png' ) . "&s=" . $size:ROOTPATH .$historico->foto;							
								
								
								
								
								//criar array contendo os ultimos contatos

								

								if ($historico->tipoinformacao_id < 10) {
								?>
                                    <li class="wrapper">
                                        <div class="figure bgcolor-success"><i class="<?=$ico_contato?>"></i></div>
                                        <!-- panel -->
                                        <div class="panel">
                                            <div class="panel-body">
                                                <ul class="list-table">
                                                    <li class="text-left" style="width:60px;">
                                                        <img class="img-circle" src="<?=$grav_url?>" alt="" width="50px" height="50px">
                                                    </li>
                                                    <li class="text-left">
                                                        <p class="mb5"><span class="semibold"><strong><?=$historico->nome;?></strong></span> realizou um contato por <strong><?=$tipo_informacao?></strong> em <em><strong><?=(date_format($data_contato, 'H:i') != '00:00')?date_format($data_contato, 'd/m/Y H:i:s'):date_format($data_contato, 'd/m/Y');?></strong></em></p>
                                                        <blockquote class="mb0">
                                                    		<p><?=$historico->descricao;?></p>
                                                            
		                                                </blockquote>
                                                        <p class="text-right" title="<?=$title_receptividade?>">
                                                        	<i class="<?=$ico_receptividade?>" style="font-size:36px;"></i>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ panel -->
                                    </li>
                                    
                                    <?php
									} else {
									?>
                                    

                                    <li class="wrapper">
                                        <div class="figure bgcolor-info"><i class="ico-info"></i></div>
                                        <!-- panel -->
                                        <div class="panel">
                                            <div class="panel-body">
                                                <ul class="list-table">
                                                    <li class="text-left">
                                                    	<h4>
                                                        <strong><?=$tipo_informacao?></strong>
                                                        </h4>
                                                        <p class="mb5">
                                                        <em><?=$historico->descricao;?></em>
                                                        </p>
                                                        
                                                        <p class="text-right small text-muted">
                                                        <span class="semibold">por <strong><?=$historico->nome;?></strong></span> em <em><strong><?=(date_format($data_contato, 'H:i') != '00:00')?date_format($data_contato, 'd/m/Y H:i:s'):date_format($data_contato, 'd/m/Y');?></strong></em>
                                                        	<img class="img-circle" src="<?=$grav_url?>" alt="" width="50px" height="50px" style="vertical-align:bottom">
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ panel -->
                                    </li>                                    
                                    
                                    
                                    
									<?php 
									}
									
									endforeach; ?>                                    

                                    

                                   
                                </ul>
                                <!--/ END Events -->
                            </li>
                            
                            <li class="header year ellipsis"><?=$data_culto;?></li>


                            <li class="wrapper">
                                <!-- START Events -->
                                <ul class="events">
                                    <li class="wrapper featured">
                                        <div class="figure bgcolor-info"><i class="ico-star"></i></div>
                                        <!-- panel -->
                                        <div class="table-layout">
                                            <div class="col-xs-7 widget panel">
                                                <!-- Thumbnail -->
                                                <div class="thumbnail">
                                                    <!-- media -->
                                                    <div class="media">
                                                        <!-- indicator -->
                                                        <div class="indicator"><span class="spinner"></span></div>
                                                        <!--/ indicator -->
                                                        <img class="unveiled" data-toggle="unveil" src="<?=THEMEPATH?>/image/ibl/bornagain1.jpg" data-src="<?=THEMEPATH?>/image/ibl/bornagain1.jpg" alt="<?php  if ($decisao == '0') echo 'Nasceu de Novo!'; else echo 'Voltou pra Jesus!' ?>" height="100%">
                                                    </div>
                                                    <!--/ media -->
                                                </div>
                                                <!--/ Thumbnail -->
                                            </div>
                                            <div class="col-xs-5 widget panel">
                                                <div class="panel-body text-center">
                                                    <h4><?php  if ($decisao == '0') echo 'Nasceu de Novo!'; else echo 'Voltou pra Jesus!' ?></h4>
                                                    <h4 class="bold text-success"><?=$data_culto;?></h4>
                                                    <h5 class="semibold text-muted"><?=$horario_culto?></h5>
                                                    <p class="text-muted">Descrição do Evento</p>
                                                </div>
                                            </div>
                        				</div>
                                        <!--/ panel -->
                                    </li>
                                </ul>
                                <!--/ END Events -->
                            </li>   


                            <li class="wrapper">
                                <!-- START Events -->
                                <ul class="events">
                                    <li class="wrapper featured">
                                        <div class="figure bgcolor-inverse"><i class="ico-steps"></i></div>
                                        <!-- panel -->
                                        <div class="panel">
                                            <div class="panel-body">
                                                Progresso do Consolidado
                                            </div>
                                            <div class="panel-footer">
                                                <p class="semibold clearfix mb5">
                                                    <span class="pull-left">Indicador</span>
                                                    <span class="pull-right">65%</span>
                                                </p>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success" style="width: 35%"></div>
                                                    <div class="progress-bar progress-bar-warning" style="width: 20%"></div>
                                                    <div class="progress-bar progress-bar-danger" style="width: 10%"></div>
                                                </div>
                                                <ul class="list-table">
                                                    <li><i class="ico-circle text-success"></i> <span class="semibold">35%</span></li>
                                                    <li><i class="ico-circle text-warning"></i> <span class="semibold">20%</span></li>
                                                    <li><i class="ico-circle text-danger"></i> <span class="semibold">10%</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ panel -->
                                    </li>
                                </ul>
                                <!--/ END Events -->
                            </li>                            
                        </ul>
                        <!--/ END Timeline -->
                    </div>
                    
                    
                    
                    
                    <!--/ Right side / bottom side -->
                </div>
                <!-- END Row -->
            </div>
            <!--/ END Template Container -->
            
            
            

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->
        
     <div id="bs-infomodal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <form class="panel"
                            data-toggle="formajax" 
                            data-options='{ "url": "<?php echo ROOTPATH; ?>consolidado/insert_historico", "validate": true }'
                        >
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                
                                <h3 class="semibold modal-title text-danger">Informações Adicionais</h3>                                
                            </div>
                            <div class="modal-body">
                            <div class="panel-body pt0 pb0">
                            
                            <img id="loading" src="<?php echo THEMEPATH; ?>image/loading/spinner.gif" style="display:none;">
                            
                        
                        <input type="hidden" name="consolidado_id" id="consolidado_id" value="<?php echo (isset($id))?$id:''; ?>"   />
                            
							<div class="form-group">
                                


                                    
                                    	<textarea class="form-control" name="descricao" rows="2" placeholder="Insira a descrição da informação adicional." title="Insira a descrição da informação adicional."></textarea>
                                        
                                        


                                    
                                </div>  
                                <div class="form-group">                                   
                                        <select class="form-control" name="tipoinformacao_id" id="tipo_mais_informacao" 
                                                data-parsley-required="true"
                                                data-parsley-error-message="Por favor, preencha o campo Tipo de Informação">
                                                    <option value="" selected="">Tipo de Informação</option>    
                                                    <!--Carregar do BD-->  
													<?php foreach ($tipos_informacao as $tipo_info): 
															if ($tipo_info->id > 10): 
															
																if ((($tipo_info->id >=30 && $tipo_info->id<=40) && $_SESSION['s_nivel_id'] == 5) || $_SESSION['s_nivel_id'] < 5) : ?>    
                                                            
                                                				<option value="<?=$tipo_info->id?>"><?=$tipo_info->tipo_informacao?></option>
	                                                <?php 
																else:
																	
																	
																	
																endif;
															endif;
														  endforeach; 
													?> 
                                        </select>
                                        
								</div>                                 
                                <div class="form-group">
                                	Data da Informação:<br />
                                  	<input type="text" class="form-control" name="data" id="datetimepicker2" placeholder="<?=date('d/m/Y H:i')?>"  data-parsley-required="true" data-parsley-error-message="Por favor, preencha o campo Data da Informação" value="<?=date('d/m/Y H:i')?>" data-mask="99/99/9999 99:99">
                                </div>                                  
                                <input type="hidden" name="receptividade" id="receptividade_maisinfo"  value="0"/>
                             </div>   
                             <div><hr /></div>
                            
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>                            
                            	<button type="submit" class="btn btn-primary" data-dismiss="modal">Salvar alterações</button>
                            </div>
                            
                        </form>   
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!--/ END modal-lg -->
                
                <?php if (isset($usuarios)) : ?>
				<!-- START Modal -->
                <div id="ModalDesignar" class="modal fade">
                <div class="modal-dialog">
                <form class="modal-content"
                    data-toggle="formajax" 
                    data-options='{ "url": "<?php echo ROOTPATH; ?>consolidado/designar", "validate": true }'
                    id="formdesignar" onsubmit="alert('oi');"
                >   
                        <input type="hidden" name="consolidado_id" value="<?php echo (isset($id))?sha1($id):''; ?>" />
                                       
                                        
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
                                            <select class="form-control text-left" id="selectize-customselect" name="consolidador_id" id="consolidador_id">
                                                <option value="">Selecione</option>
                                                <?php foreach ($usuarios as $consolidador): ?>    
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
                
                <?php endif; ?>
