<?php
    $padres=$modulo->result_array(); 
    $modulos=$permiso->result_array();;

   /* echo "<pre>";print_r($padres);
    echo "<pre>";print_r($modulos);exit(); */?>

    <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">

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
                                        <input type="checkbox" name="<?= $modulos[$j]['mod_id']; ?>" value="1" checked>
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

    </form>
