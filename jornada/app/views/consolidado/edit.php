﻿<!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Cadastro de Consolidado</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="<?php echo ROOTPATH; ?>consolidado">Cadastro de Consolidado</a></li>
                                <li class="active">Editar</li>
                            </ol>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                    <div class="panel-box">
                        <!-- START Form panel -->
                        <form class="panel panel-default form-horizontal form-bordered"
                            data-toggle="formajax" 
                            data-options='{ "url": "<?php echo ROOTPATH; ?>consolidado/update", "validate": true }'
                        >
                            <div class="panel-heading"><h5 class="panel-title">Consolidado</h5></div>
                            <div class="panel-body pt0">
                                <div class="form-group message-container"></div><!-- will be use as done/fail message container -->
                                
                                
                                <input type="hidden" name="id" value="<?php echo (isset($id))?$id:''; ?>">
                               
                                
								<div class="form-group">
                                

                                    <label class="col-sm-3 control-label">Data do Culto<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        
                                        <input type="text" class="form-control" name="data_culto" id="datepicker1" placeholder="Data do Culto"  data-parsley-required="true" data-parsley-error-message="Por favor, preencha o campo Data do Culto" value="<?php echo (isset($data_culto))?$data_culto:''; ?>" data-mask="99/99/9999">
                                    </div>
                                	
                                    <label class="col-sm-2 control-label">Culto<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                    <select class="form-control" name="culto_id"
                                            data-parsley-required="true"
                                            data-parsley-error-message="Por favor, preencha o campo Culto">
                                                <option value="" selected="">Culto</option>      
                                                    <?php foreach ($cultos as $culto): ?>    
                                                		<option value="<?=$culto->id?>" <?=($culto_id== $culto->id)?'selected':'';?>><?=$culto->nome_culto?></option>
	                                                <?php endforeach; ?>                                                
                                                </select>
                                                
                                                
                                                
                                                
                                    </div>
								</div>                                  


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Convidado por</label>
                                    <div class="col-sm-3">
										<input type="text" name="convidante" class="form-control" placeholder="Nome de quem convidou"  
                                        	value="<?php echo (isset($convidante))?$convidante:''; ?>">
                                    </div>
                                    <label class="col-sm-2 control-label">Telefone</label>
                                    <div class="col-sm-3">
                                    	<input type="text" name="tel_convidante" class="form-control" placeholder="Telefone de quem convidou" data-mask="(99)*9999-9999"
	                                        value="<?php echo (isset($tel_convidante))?$tel_convidante:''; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome do Consolidado<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
										<input type="text" name="nome" class="form-control" placeholder="Nome do Consolidado"  data-parsley-required="true" data-parsley-error-message="Por favor, preencha o campo Nome do Consolidado" value="<?php echo (isset($nome))?$nome:''; ?>">
                                    </div>
                                </div>

                                                                   
                                
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Endereço <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <div class="row mb5">
                                            <div class="col-xs-12">
                                                <input type="text" name="endereco" class="form-control" placeholder="Endereço (Rua, Av, etc), número, complemento" 
                                                data-parsley-required="true"
                                                data-parsley-errors-container="#address-error-container" 
                                                data-parsley-error-message="Por favor, preencha o endereço do consolidado"
                                                value="<?php echo (isset($endereco))?$endereco:''; ?>">
                                            </div>
                                        </div>          
                                        <div class="row mb5">
                                            <div class="col-xs-6">
                                                <select class="form-control" name="municipio_id" id="municipio_id"
                                                data-parsley-required="true"
                                                data-parsley-errors-container="#address-error-container" 
                                                data-parsley-error-message="Por favor, informe o município">
                                                    <option value="0" selected="">Município</option>    
                                                    <?php foreach ($municipios as $municipio): ?>    
                                                		<option value="<?=$municipio->id?>" <?=($municipio_id== $municipio->id)?'selected':'';?>><?=$municipio->nome_municipio?></option>
	                                                <?php endforeach; ?>

                                                </select>                                                
                                            </div>                                        
                                            <div class="col-xs-6">
                                                <select class="form-control" name="bairro_id" id="bairro_id"
                                                data-parsley-required="true"
                                                data-parsley-errors-container="#address-error-container" 
                                                data-parsley-error-message="Por favor, informe o bairro">
                                                    <option value="" selected="">Bairro</option>      
                                                    <?php foreach ($bairros as $bairro): ?>    
                                                		<option value="<?=$bairro->id?>" <?=($bairro_id== $bairro->id)?'selected':'';?>><?=$bairro->nome_bairro?></option>
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
                                    <label class="col-sm-3 control-label">Telefone Fixo<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="<?php echo (isset($telefone))?$telefone:''; ?>" data-mask="(99)9999-9999">
                                    </div>
                                    <label class="col-sm-2 control-label">Celular1<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" name="celular1" class="form-control" 
                                        placeholder="Celular" 
                                        value="<?php echo (isset($celular1))?$celular1:''; ?>"  data-mask="(99)*9999-9999">
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="col-sm-3 control-label">Celular2</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="celular2" class="form-control" 
                                        placeholder="Celular 2" 
                                        value="<?php echo (isset($celular2))?$celular2:''; ?>"  data-mask="(99)*9999-9999">
                                    </div>                                    
                                </div>  
                                
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Sexo</label>
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
                                       	<div class="col-sm-2">
                                        <select class="form-control" name="estado_civil"
                                                data-parsley-required="true"
                                                data-parsley-error-message="Por favor, preencha o campo Estado Civil">
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
                                        
                                        <input type="text" class="form-control" name="data_nasc" id="datepicker2" placeholder="Data de Nascimento"   value="<?php echo (isset($data_nasc))?$data_nasc:''; ?>" data-mask="99/99/9999">
                                    </div>
                                    <label class="col-sm-2 control-label">Tem WhatsApp?</label>
                                    <div class="col-sm-3">
											<?php $whatsapp= isset($whatsapp)?$whatsapp:''; ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="whatsapp" id="whatsapp" value="1" 
													<?php  if ($whatsapp == '1') echo 'checked="checked"' ?>>Sim
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio"  name="whatsapp" id="whatsapp" value="0"
                                                	<?php  if ($whatsapp == '0') echo 'checked="checked"' ?>>Não
                                            </label>

                                        
                                    </div>
                                </div>
                                
                                                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="email" class="form-control" placeholder="email@email.com" data-parsley-required="true" data-parsley-trigger="change" data-parsley-type="email" data-parsley-error-message="Email inválido" value="<?php echo (isset($email))?$email:''; ?>">
                                    </div>
                                </div>
                              
                                
                                <div class="form-group">
                                
                                    <label class="col-sm-3 control-label">Decisão</label>
                                    <div class="col-sm-4">
											<?php $decisao= isset($decisao)?$decisao:''; ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="decisao" id="decisao" value="0" 
													<?php  if ($decisao == '0') echo 'checked="checked"' ?> >Aceitou Jesus
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio"  name="decisao" id="decisao" value="1"
													<?php  if ($decisao == '1') echo 'checked="checked"' ?>>Reconciliou com Jesus
                                            </label>

                                        
                                    </div>
                                 </div>
                                 <div class="form-group">
                                 
                                    
                                    <label class="col-sm-3 control-label">Batizado nas águas</label>
                                    <div class="col-sm-4">
											<?php $batizado= isset($batizado)?$batizado:''; ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="batizado" id="batizado" value="1"
                                                	 <?php  if ($batizado == '1') echo 'checked="checked"' ?>>Sim
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio"  name="batizado" id="batizado" value="0"
                                                	<?php  if ($batizado == '0') echo 'checked="checked"' ?>>Não
                                            </label>

                                        
                                    </div>
                                </div>
                                
								<div class="form-group">
                                    <label class="col-sm-3 control-label">GC</label>
                                       	<div class="col-sm-6">
                                        <select class="form-control" name="gc_id" id="gc_id">
                                                    <option value="0">Informe o GC</option>      
                                                    <?php foreach ($gcs as $gc): ?>    
                                                		<option value="<?=$gc->id?>" <?=($gc_id== $gc->id)?'selected':'';?>><?=$gc->nome_gc?></option>
	                                                <?php endforeach; ?>
                                                </select>
                                        </div>
								</div>                                  
                                
                                

                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Observação</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" 
                                        name="observacao" 
                                        rows="8" placeholder="Observação"><?php echo (isset($observacao))?$observacao:''; ?></textarea>
                                    </div>
                                </div>                                  
                                
                              
                                
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Status</label>
                                       	<div class="col-sm-3">
                                        <select class="form-control" name="status">
                                            <!--Carregar do BD-->      
                                            <?php $status= isset($status)?$status:1; ?>
                                            <option value="1" <?php if ($status == '1') echo "selected" ?>>Ativo</option>
                                            <option value="0" <?php if ($status == '0') echo "selected" ?>>Inativo</option>
                                        </select>
                                        </div>
								</div>                                                                                                    
                                
                                
                            </div>
                            <div class="panel-footer">
                            	<a href="<?php echo ROOTPATH; ?>/consolidado">
                                <button type="button" class="btn btn-default">Voltar</button>
                                </a>
                                <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label">Salvar</span></button>
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
        
     