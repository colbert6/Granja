<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ANIMAL</th>
                        <th>CAUSA ABORTO</th>
                        <th>FECHA</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$aborto->result() as $datos) {   ?>
                      
                        <tr>
                            <td><?= $datos->ab_id; ?></td> 
                            <td><?php foreach (@$animales->result() as $datoss) {   if($datos->ab_animal==$datoss->ani_id) echo $datoss->ani_nombre;}?></td> 
                            <td><?php foreach (@$causa_aborto->result() as $datos1) {   if($datos->ab_causa_aborto==$datos1->ca_id) echo $datos1->ca_descripcion;}?></td>
                            <td><?= $datos->ab_fecha_evento; ?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/aborto/editar/".$datos->ab_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/aborto/eliminar/".$datos->ab_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
            
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/aborto/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
