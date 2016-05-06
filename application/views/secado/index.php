<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>FECHA EVENTO</th>
                        <th>CUARTO MAMARIO</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$secado->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->sec_id; ?></td>
                            <td><?= $datos->sec_rp; ?></td> 
                            <td><?= $datos->sec_fecha_evento;?></td>
                            <td><?= $datos->sec_cuarto_mamarios;?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/secado/editar/".$datos->sec_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/secado/eliminar/".$datos->sec_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/secado/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>