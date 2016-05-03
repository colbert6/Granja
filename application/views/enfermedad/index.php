<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>TIPO ENFERMEDAD</th>
                        <th>MEDICAMENTO</th>
                        <th>VIA APLICACION</th>
                        <th>FECHA</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$enfermedad->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->enf_id; ?></td>
                            <td><?= $datos->enf_rp; ?></td> 
                            <td><?= $datos->enf_tipo_enfermedad;?></td>
                            <td><?= $datos->enf_medicamento;?></td>
                            <td><?= $datos->enf_via_aplicacion;?></td>
                            <td><?= $datos->enf_fecha_evento; ?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/enfermedad/editar/".$datos->enf_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/enfermedad/eliminar/".$datos->enf_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/enfermedad/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
