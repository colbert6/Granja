<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>FECHA EVENTO</th>
                        <th>ESPECIFICACION VENTA</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$venta->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->venta_id; ?></td>
                            <td><?= $datos->venta_rp; ?></td> 
                            <td><?= $datos->venta_fecha_evento;?></td>
                            <td><?= $datos->venta_especif_venta;?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/venta/editar/".$datos->venta_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/venta/eliminar/".$datos->venta_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/venta/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>