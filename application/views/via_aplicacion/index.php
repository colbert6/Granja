<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DESCRIPCION</th>
                        <th>ABREVIATURA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$via_aplicacion->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->viaap_id; ?></td>
                            <td><?= $datos->viaap_descripcion; ?></td> 
                            <td><?= $datos->viaap_abreviatura?></td> 
                            <td>
                            <a href=<?php echo base_url()."index.php/via_aplicacion/editar/".$datos->viaap_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                            <a href=<?php echo base_url()."index.php/via_aplicacion/eliminar/".$datos->viaap_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/via_aplicacion/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
        