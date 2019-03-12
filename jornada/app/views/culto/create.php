<!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Cadastro de Culto</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="<?php echo ROOTPATH; ?>culto">Cadastro de Culto</a></li>
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
                            data-options='{ "url": "<?php echo ROOTPATH; ?>culto/insert", "validate": true }'
                        >
                            <div class="panel-heading"><h5 class="panel-title">Culto</h5></div>
                            <div class="panel-body pt0">
                                <div class="form-group message-container"></div><!-- will be use as done/fail message container -->	
                	 			             
                                                               
                                                               

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome do Culto<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
										<input type="text" name="nome_culto" class="form-control" placeholder="Nome do Culto"  data-parsley-required="true" data-parsley-error-message="Por favor, preencha o campo Nome do Culto" autocomplete="off">
                                    </div>
                                    
                                </div>
                                   
                                                   
                                
                                
                            </div>
                            <div class="panel-footer">
                            	<a href="<?php echo ROOTPATH; ?>culto">
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
        
        