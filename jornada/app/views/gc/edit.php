<!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Cadastro de GC</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="<?php echo ROOTPATH; ?>gc">Cadastro de GC</a></li>
                                <li class="active">Editar</li>
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
                            data-options='{ "url": "<?php echo ROOTPATH; ?>gc/update", "validate": true }'
                        >
                            <div class="panel-heading"><h5 class="panel-title">GC</h5></div>
                            <div class="panel-body pt0">
                                <div class="form-group message-container"></div><!-- will be use as done/fail message container -->	
                	 			             
                                <input type="hidden" name="id" value="<?=$id?>">             
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome do GC<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
										<input type="text" name="nome_gc" class="form-control" placeholder="Nome do GC"  data-parsley-required="true" data-parsley-error-message="Por favor, preencha o campo Nome do GC" autocomplete="off" value="<?=$nome_gc?>">
                                    </div>
                                    
                                </div>    
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Endereço<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
										<input type="text" name="endereco" class="form-control" placeholder="Endereço do GC"  data-parsley-required="true" data-parsley-error-message="Por favor, preencha o campo Endereço do GC" value="<?=$endereco?>">
                                    </div>                                     
								</div>                                
                                <div class="form-group"> 
                                       <label class="col-sm-3 control-label">Município<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="municipio_id" id="municipio_id">
                                            <option value="0" selected="">Município</option>    
                                            <?php foreach ($municipios as $municipio): ?>    
                                                <option value="<?=$municipio->id?>"  <?=($municipio_id== $municipio->id)?'selected':'';?>><?=$municipio->nome_municipio?></option>
                                            <?php endforeach; ?>

                                        </select>                                                
                                    </div>
                                    
                                 </div>
                                 <div class="form-group"> 
                                     <label class="col-sm-3 control-label">Bairro<span class="text-danger">*</span></label>                                         
                                    <div class="col-sm-6">
                                        <select class="form-control" name="bairro_id" id="bairro_id">
                                            <option value="" selected="">Bairro</option>      
                                            <?php foreach ($bairros as $bairro): ?>    
                                                <option value="<?=$bairro->id?>" <?=($bairro_id== $bairro->id)?'selected':'';?>><?=$bairro->nome_bairro?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                        
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Horário<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
										<input type="text" name="horario" id="horario" class="form-control" placeholder="20:00"  data-parsley-required="true" data-parsley-error-message="Por favor, informe o horário do GC."  data-mask="99:99" value="<?=$horario?>">
                                    </div>                                     
								</div> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Líderes<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
										<input type="text" name="lideres" class="form-control" placeholder="Líderes do GC e Telefone de Contato"  data-parsley-required="true" data-parsley-error-message="Por favor, informe os nomes dos líderes de GC e seus respectivos telefones de contato."  value="<?=$lideres?>">
                                    </div>                                     
								</div>                                                                   
                                
                                
                            </div>
                            <div class="panel-footer">
                            	<a href="<?php echo ROOTPATH; ?>gc">
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
								<input type="text" class="form-control" readonly  id="newhephoto"  >

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
                                data-options='{ "url": "<?php echo ROOTPATH; ?>gc/crop", "validate": true }'
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