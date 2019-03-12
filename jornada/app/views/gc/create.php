<!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Cadastro do Grupo de Crescimento</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="<?php echo ROOTPATH; ?>gc">Cadastro do Grupo de Crescimento</a></li>
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
                            data-options='{ "url": "<?php echo ROOTPATH; ?>gc/insert", "validate": true }'
                        >
                            <div class="panel-heading"><h5 class="panel-title">Grupo de Crescimento</h5></div>
                            <div class="panel-body pt0">
                                <div class="form-group message-container"></div><!-- will be use as done/fail message container -->	
                	 			             
                                                               
                                                               

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome do GC<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
										<input type="text" name="nome_gc" class="form-control" placeholder="Nome do GC"  data-parsley-required="true" data-parsley-error-message="Por favor, preencha o campo Nome do GC" autocomplete="off">
                                    </div>
                                     
								</div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Endereço<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
										<input type="text" name="endereco" class="form-control" placeholder="Endereço do GC"  data-parsley-required="true" data-parsley-error-message="Por favor, preencha o campo Endereço do GC" >
                                    </div>                                     
								</div>                               
                                 <div class="form-group"> 
                                       <label class="col-sm-3 control-label">Município<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="municipio_id" id="municipio_id">
                                            <option value="0" selected="">Município</option>    
                                            <?php foreach ($municipios as $municipio): ?>    
                                                <option value="<?=$municipio->id?>"><?=$municipio->nome_municipio?></option>
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
                                                <option value="<?=$bairro->id?>"><?=$bairro->nome_bairro?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>                                        
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Horário<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
										<input type="text" name="horario" id="horario" class="form-control" placeholder="20:00"  data-parsley-required="true" data-parsley-error-message="Por favor, informe o horário do GC."  data-mask="99:99">
                                    </div>                                     
								</div> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Líderes<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
										<input type="text" name="lideres" class="form-control" placeholder="Líderes do GC e Telefone de Contato"  data-parsley-required="true" data-parsley-error-message="Por favor, informe os nomes dos líderes de GC e seus respectivos telefones de contato." >
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
        
        