<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DESCRIPCION</th>
                        <th>ABREVIACION</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$tipo_parto->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->tippar_id; ?></td>
                            <td><?= $datos->tippar_descripcion; ?></td> 
                            <td><?= $datos->tippar_abreviatura; ?></td> 
                            <td>
                            <a href=<?php echo base_url()."index.php/tipo_parto/editar/".$datos->tippar_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                            <a href=<?php echo base_url()."index.php/tipo_parto/eliminar/".$datos->tippar_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/tipo_parto/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
