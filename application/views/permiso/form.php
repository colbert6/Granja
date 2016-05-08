<?php
    $padres=$modulo->result_array(); 
    $modulos=$permiso->result_array();;

   /* echo "<pre>";print_r($padres);
    echo "<pre>";print_r($modulos);exit(); */?>

    <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
        <input name="guardar" id="guardar" type="hidden" value="1">
         <input name="id_tipo" id="id_tipo" type="hidden" value="<?= $id_tipo ?>">
    <?php    for( $i=0;$i<count($padres);$i++)  {  ?>



                <div class="col-md-12">
                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title"><?= $padres[$i]['mod_descripcion']; ?></h3>
                        </div>
                        <div class="box-body">
                             <h5 class="box-title">Chequea para otorgar permisos</h5>
                        <div class="row">

    <?php       for( $j=0;$j<count($modulos);$j++)  {  ?>
    <?php           if($modulos[$j]['id_padre']==$padres[$i]['mod_id']){   ?>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
    <?php                               if($modulos[$j]['per_estado']==1){                               ?>
                                            <input type="checkbox" name="mod_permiso[]" value="<?= $modulos[$j]['mod_id']; ?>" checked='true'>
    <?php                               } else {                                                             ?>
                                            <input type="checkbox" name="mod_permiso[]" value="<?= $modulos[$j]['mod_id']; ?>" >
    <?php                               }                                                                ?>

                                    </span>
                                    <input type="text" class="form-control" readonly value="<?= $modulos[$j]['mod_descripcion'] ?>">
                                </div><!-- /input-group -->
                            </div>

    <?php           } 
                }

    ?>
                             </div><!-- /.row -->
                            
                                
                        </div>
                    </div>
                </div> 
<?php          }     ?>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

    </form>
