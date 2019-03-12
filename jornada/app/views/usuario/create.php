<!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Cadastro de Usuário</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="<?php echo ROOTPATH; ?>/usuario">Cadastro de Usuário</a></li>
                                <li class="active">Novo</li>
                            </ol>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                    <div class="col-md-8">
                        <!-- START Form panel -->
                        <form class="panel panel-default form-horizontal form-bordered"
                            data-toggle="formajax" 
                            data-options='{ "url": "<?php echo ROOTPATH; ?>/usuario/insert", "validate": true }'
                        >
                            <div class="panel-heading"><h5 class="panel-title">Usuário</h5></div>
                            <div class="panel-body pt0">
                                <div class="form-group message-container"></div><!-- will be use as done/fail message container -->	
                	 			             
                                                               
                                <input type="hidden" name="foto" value="<?php echo THEMEPATH; ?>/image/avatar/avatar.png">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Foto do Perfil</label>
                                    <div class="col-sm-6">
                                        <div class="btn-group pr5">
                                            <img class="img-circle img-bordered" src="<?php echo THEMEPATH; ?>/image/avatar/avatar.png" alt="" width="34px">
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#bs-profilephotomodal" id="btn_photomodalhe">Alterar foto</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#" data-toggle="modal" data-target="#bs-profilephotomodal" onclick="javascript:$('#btn_photomodalhe').click()">Enviar foto</a></li>
                                                <li><a href="#">Remover foto</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Nível de Usuário<span class="text-danger">*</span></label>
                                       	<div class="col-sm-3">
                                        <select class="form-control" name="nivel_id"
                                                data-parsley-required="true"
                                                data-parsley-error-message="Por favor, preencha o campo Nível de Usuário">
                                                    <option value="" selected="">Nível</option>    
                                                    <!--Carregar do BD-->  
													<?php foreach ($niveis as $nivel): ?>    
                                                	<option value="<?=$nivel->id?>"><?=$nivel->nivel?></option>
	                                                <?php endforeach; ?> 
                                        </select>
										</div>
								</div>                                  

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome do Usuário<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
										<input type="text" name="username" class="form-control" placeholder="Nome do Usuario"  data-parsley-required="true" data-parsley-error-message="Por favor, preencha o campo Nome do Usuário" autocomplete="off">
                                    </div>
                                    <label class="col-sm-2 control-label">Senha<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
										<input type="password" name="password" class="form-control" placeholder="Senha"  autocomplete="off">
                                    </div>
                                </div>
                                   

                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nome" class="form-control" placeholder="Nome" data-parsley-required="true" data-parsley-error-message="Por favor, preencha o campo Nome" >
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Endereço</label>
                                    <div class="col-sm-6">
                                        <div class="row mb5">
                                            <div class="col-xs-12">
                                                <input type="text" name="endereco" class="form-control" placeholder="Endereço (Rua, Av, etc), número, complemento" >
                                            </div>
                                        </div>          
                                        <div class="row mb5">
                                            <div class="col-xs-6">
                                                <select class="form-control" name="municipio_id" id="municipio_id">
                                                    <option value="0" selected="">Município</option>    
                                                    <?php foreach ($municipios as $municipio): ?>    
                                                		<option value="<?=$municipio->id?>"><?=$municipio->nome_municipio?></option>
	                                                <?php endforeach; ?>

                                                </select>                                                
                                            </div>                                        
                                            <div class="col-xs-6">
                                                <select class="form-control" name="bairro_id" id="bairro_id">
                                                    <option value="" selected="">Bairro</option>      
                                                    <?php foreach ($bairros as $bairro): ?>    
                                                		<option value="<?=$bairro->id?>"><?=$bairro->nome_bairro?></option>
	                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- address error container -->
                                        <div class="row">
                                            <div class="col-xs-12" id="address-error-container"></div>
                                        </div>
                                        <!--/ address error container -->
                                    </div>
                                </div>
                                

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Email<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="email" class="form-control" placeholder="email@email.com" data-parsley-required="true" data-parsley-trigger="change" data-parsley-type="email" data-parsley-error-message="Email inválido" >
                                    </div>
                                </div>
                              
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Telefone Res.</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="telefone_residencial" class="form-control" placeholder="Tel. Residencial"  data-mask="(99)9999-9999">
                                    </div>
                                    <label class="col-sm-2 control-label">Telefone Com.</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="telefone_comercial" class="form-control" 
                                        placeholder="Tel. Comercial" data-mask="(99)9999-9999">
                                    </div>
                                </div>  
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Celular 1</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="celular1" class="form-control" placeholder="Celular Principal" data-mask="(99)*9999-9999">
                                    </div>

                                    <label class="col-sm-2 control-label">Celular 2</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="celular2" class="form-control" placeholder="Celular Alternativo" data-mask="(99)*9999-9999">
                                    </div>
                                </div>
                                                                
                             
                                
                                
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Sexo<span class="text-danger">*</span></label>
                                       	<div class="col-sm-3">
                                        <select class="form-control" name="sexo"
                                                data-parsley-required="true"
                                                data-parsley-error-message="Por favor, preencha o campo Sexo">
                                                    <option value="" selected="">Sexo</option>    
                                                    <?php $sexo= isset($sexo)?$sexo:''; ?>
                                                    <option value="M" <?php if ($sexo == 'M') echo "selected" ?>>Masculino</option>
                                                    <option value="F" <?php if ($sexo == 'F') echo "selected" ?>>Feminino</option>                                                    
                                                </select>
                                        </div>
                                        
                                        
									<label class="col-sm-2 control-label">Estado Civil</label>
                                       	<div class="col-sm-3">
                                        <select class="form-control" name="estado_civil">
                                                    <option value="" selected="">Estado Civil</option>    
                                                    <!--Preencher com todas as opções-->      
                                                    <?php $estado_civil= isset($estado_civil)?$estado_civil:''; ?>
                                                    <option value="0" <?php if ($estado_civil == '0') echo "selected" ?>>Solteiro</option>
                                                    <option value="1" <?php if ($estado_civil == '1') echo "selected" ?>>Casado</option>
                                                    <option value="2" <?php if ($estado_civil == '2') echo "selected" ?>>Separado</option>
                                                    <option value="3" <?php if ($estado_civil == '3') echo "selected" ?>>Divorciado</option>
                                                    <option value="4" <?php if ($estado_civil == '4') echo "selected" ?>>Viúvo</option>
                                                    <option value="5" <?php if ($estado_civil == '5') echo "selected" ?>>União Estável</option>
                                                    <option value="6" <?php if ($estado_civil == '6') echo "selected" ?>>Outros</option>                                                    
                                                </select>
                                        </div>                                       
								</div>                                 
                                
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Data de Nascimento</label>
                                    <div class="col-sm-3">
                                        
                                        <input type="text" class="form-control" name="data_nasc" id="datepicker1" placeholder="Data de Nascimento"  >
                                    </div>
                                    
                                    <label class="col-sm-2 control-label">Data de Batismo</label>
                                    <div class="col-sm-3">
                                        
                                        <input type="text" class="form-control" name="data_batismo" id="datepicker2" placeholder="Data de Batismo"  >
                                    </div>                                   
                                </div>                                
                                                                
                                
								<div class="form-group">
                                    <label class="col-sm-3 control-label">GC</label>
                                       	<div class="col-sm-6">
                                        <select class="form-control" name="gc_id" id="gc_id"
                                                data-parsley-required="true"
                                                data-parsley-errors-container="#address-error-container" 
                                                data-parsley-error-message="Por favor, informe o GC">
                                                    <option value="" selected="">Informe o GC</option>      
                                                    <?php foreach ($gcs as $gc): ?>    
                                                		<option value="<?=$gc->id?>"><?=$gc->nome_gc?></option>
	                                                <?php endforeach; ?>
                                                </select>
                                        </div>
								</div>                                     
                                

                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Sobre</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" 
                                        name="sobre" 
                                        rows="8" placeholder="Fale um pouco sobre você."></textarea>
                                        <p class="help-block">Fale um pouco sobre você.</p>
                                    </div>
                                </div>                                  
                                
                                
                                
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Status</label>
                                       	<div class="col-sm-3">
                                        <select class="form-control" name="status">
                                            <!--Carregar do BD-->      
                                            <option value="1" >Ativo</option>
                                            <option value="0" >Inativo</option>
                                        </select>
                                        </div>
								</div>                                                                                                    
                                
                                
                            </div>
                            <div class="panel-footer">
                            	<a href="<?php echo ROOTPATH; ?>/usuario">
                                <button type="button" class="btn btn-default">Voltar</button>
                                </a>
                                <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label">Enviar</span></button>
                            </div>
                        </form>
                        <!--/ END Form panel -->
                    </div>

                    

                </div>
                <!--/ END row -->
            </div>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->
        
        
<div id="bs-profilephotomodal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <img class="img-circle img-bordered" src="<?php echo THEMEPATH; ?>/image/avatar/avatar.png" alt="" width="65px" id="modaltopimg">
                                <h3 class="semibold modal-title text-danger">Foto Upload</h3>                                
                            </div>
                            <div class="modal-body">
                            <div class="panel-body pt0 pb0 panel-upload">
                            
                            <img id="loading" src="<?php echo THEMEPATH; ?>image/loading/spinner.gif" style="display:none;">
                            <form name="form" method="POST" enctype="multipart/form-data">
                            
<div class="input-group">
								<input type="text" class="form-control" readonly="true"  id="newhephoto"  >

                                    <span class="input-group-btn">
                                        <div class="btn btn-primary btn-file">
                                            <span class="icon iconmoon-file-3"></span>Procurar <input id="filenewphoto" type="file" size="45" name="filenewphoto" class="input" accept="image/gif, image/jpeg">
                                        </div>
                                    </span>
                                </div>                                
                            </form>    
                             </div>   
                             <div><hr /></div>
                             <div class="panel-body pt0 pb0 panel-photo">                                    
                                
                                <img src="<?php echo THEMEPATH; ?>/image/avatar/avatar.png" id="cropbox" id="imgprofilephoto" />
  
								<form 
                                 method="post"
                                 id="form_crop"
                                data-toggle="formajax" 
                                data-options='{ "url": "<?php echo ROOTPATH; ?>usuario/crop", "validate": true }'
                                >       
           
           				
                        		<div class="message-container"></div>
                        
                                                        
                                    <input type="hidden" id="x" name="x" />
                                    <input type="hidden" id="y" name="y" />
                                    <input type="hidden" id="w" name="w" />
                                    <input type="hidden" id="h" name="h" />
                                    <input type="hidden" id="src" name="src"/>
                                    <input type="hidden" id="dst" name="dst"/>
                                    <input type="hidden" id="preferedname" name="preferedname"/>
                                    
                                    <hr />
                                    <span id="cropinfo">Clique duas vezes sobre a imagem para recortar</span>
                                    <hr />
                                    <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar alterações</button>
                                </form>
                            </div>
                            
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!--/ END modal-lg -->        