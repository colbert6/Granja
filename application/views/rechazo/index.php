<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>FECHA EVENTO</th>
                        <th>CAUSA RECHAZO</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$rechazo->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->recha_id; ?></td>
                            <td><?= $datos->recha_rp; ?></td> 
                            <td><?= $datos->recha_fecha_evento;?></td>
                            <td><?= $datos->recha_causa_rechazo;?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/rechazo/editar/".$datos->recha_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/rechazo/eliminar/".$datos->recha_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/rechazo/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>