

<?php $mod_padre='evento'; ?>
    <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
     <div class="col-md-12">

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">Evento</h3>
                        </div>
                        <div class="box-body">
                             <h5 class="box-title">Chequea para otorgar permisos</h5>
                            <div class="row">

       <?php foreach (@$modulo->result() as $modulos) { 
                
                if($mod_padre!=$modulos->mod_padre)      {  
                    $mod_padre=$modulos->mod_padre; 
                                                                     ?>

                    </div><!-- /.row -->
                
                    
                </div>
            </div>
    </div> 
                <div class="col-md-12">

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title"><?= $modulos->mod_padre; ?></h3>
                        </div>
                        <div class="box-body">
                             <h5 class="box-title">Chequea para otorgar permisos</h5>
                            <div class="row">

                <?php } ?>

                <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" name="<?= $modulos->mod_id; ?>" value="1" checked>
                        </span>
                        <input type="text" class="form-control" readonly value="<?= $modulos->mod_descripcion; ?>">
                    </div><!-- /input-group -->
                </div>
                
                
        <?php } ?>


                </div><!-- /.row -->
            
                
            </div>
        </div>
</div> 


    </form>
