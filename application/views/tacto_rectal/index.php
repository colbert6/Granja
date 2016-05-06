<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>FECHA EVENTO</th>
                        <th>DIAGNOSTICO UTERO</th>
                        <th>ENFERMEDAD OVARIO</th>
                        <th>ENFERMEDAD UTERO</th>
                        <th>VIA APLICACION</th>
                        <th>MEDICINA GENITAL</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$tacto_rectal->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->tarec_id; ?></td>
                            <td><?= $datos->tarec_rp; ?></td> 
                            <td><?= $datos->tarec_fecha_evento;?></td>
                            <td><?= $datos->tarec_enfe_ovario;?></td>
                            <td><?= $datos->tarec_diag_utero;?></td>
                            <td><?= $datos->tarec_enfe_utero;?></td>
                            <td><?= $datos->tarec_via_aplicacion;?></td>
                            <td><?= $datos->tarec_med_genital; ?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/tacto_rectal/editar/".$datos->tarec_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/tacto_rectal/eliminar/".$datos->tarec_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/tacto_rectal/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>