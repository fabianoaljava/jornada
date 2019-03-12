 <section class="container animation delay animating fadeInDown">
                <!-- START row -->
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="panel panel-minimal" style="margin-top:10%;">
                            <!-- Upper Text -->
                            <div class="panel-body text-center">
                                <i class="<?=isset($icon)?$icon:'ico-exclamation-sign';?> longshadow fsize112 text-default"></i>
                            </div>
                            <div class="panel-body text-center">
                                <h1 class="semibold longshadow text-center text-default fsize32 mb10 mt0"><?=isset($title)?$title:'OPS!';?></h1>                               <?=isset($message)?$message:'<h4 class="semibold text-primary text-center nm">Me desculpe, alguma coisa errada aconteceu.</h4>';?>
                            </div>
                            <!--/ Upper Text -->

                            <!-- Button -->
                            <div class="panel-body text-center">
                            	<?=isset($actions)?$actions:'<a href="javascript:history.back()" class="btn btn-default mb5">Voltar</a> OU <a href="informe/reportar" class="btn btn-default mb5">Reportar esse problema</a>';?>
                            </div>
                            <!--/ Button -->
                        </div>
                    </div>
                </div>
                <!--/ END row -->
            </section>
            <!--/ END Template Container -->
        </section>
