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
                            <td><?= $datos->ser_animal; ?></td> 
                            <td><?= $datos->ser_fecha_evento;?></td>
                            <td><?= $datos->ser_reproductor;?></td>
                            <td><?= $datos->ser_personal;?></td>
                            <td><?= $datos->ser_tipo_servicio; ?></td>
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