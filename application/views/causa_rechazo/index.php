<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DESCRIPCION</th>
                        <th>ABREVIATURA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$causa_rechazo->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->cr_id; ?></td>
                            <td><?= $datos->cr_descripcion; ?></td> 
                            <td><?= $datos->cr_abreviatura?></td> 
                            <td>
                            <a href=<?php echo base_url()."index.php/causa_rechazo/editar/".$datos->cr_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                            <a href=<?php echo base_url()."index.php/causa_rechazo/eliminar/".$datos->cr_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/causa_rechazo/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
        