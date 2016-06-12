<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ANIMAL</th>
                        <th>FECHA EVENTO</th>
                        <th>REPRODUCTOR</th>
                        <th>PERSONAL</th>
                        <th>TIPO SERVICIO</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$servicio->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->ser_id; ?></td>
                            <td><?php foreach (@$animales->result() as $datoss) {   if($datos->ser_animal==$datoss->ani_id) echo $datoss->ani_nombre;} ?></td> 
                            <td><?= $datos->ser_fecha_evento;?></td>
                            <td><?php foreach (@$reproductor->result() as $datoss) {   if($datos->ser_reproductor==$datoss->repro_id) echo $datoss->repro_descripcion;} ?></td>
                            <td><?php foreach (@$personal->result() as $datoss) {   if($datos->ser_personal==$datoss->per_id) echo $datoss->per_nombre." ".$datoss->per_ape_paterno." ".$datoss->per_ape_materno;} ?></td>
                            <td><?php foreach (@$tipo_servicio->result() as $datoss) {   if($datos->ser_tipo_servicio==$datoss->tipse_id) echo $datoss->tipse_descripcion;} ?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/servicio/editar/".$datos->ser_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/servicio/eliminar/".$datos->ser_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/servicio/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>