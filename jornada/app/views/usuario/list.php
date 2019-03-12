<section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Cadastro de Usuários</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                               <div class="right">
                                <button type="button" id="btn_new" class="btn btn-primary"><i class="ico-plus"></i> Adicionar novo</button>
                                </div>  
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>
                <!-- Page Header -->
                
				<?php if (isset($message)): ?>
                <div class="alert alert-success animation animating flipInX"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4 class="semibold mb5">Success!</h4><p class="nm"><?php echo $message; ?></p></div>
                <?php endif; ?>
                
                <!-- START row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Usuários</h3>
                             </div>
                           
                            
                            <table class="table table-bordered" id="ajax-source">
                                <thead>
                                    <tr>                               
                                        <th width="36px">Foto</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>GC</th>
                                        <th>Nivel</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/ END row -->

                
            </div>
            
</section>
