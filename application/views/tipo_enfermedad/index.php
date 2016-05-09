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
                    <?php foreach (@$tipo_enfermedad->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->tipen_id; ?></td>
                            <td><?= $datos->tipen_descripcion; ?></td> 
                            <td><?= $datos->tipen_abreviatura?></td> 
                            <td>
                            <a href=<?php echo base_url()."index.php/tipo_enfermedad/editar/".$datos->tipen_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                            <a href=<?php echo base_url()."index.php/tipo_enfermedad/eliminar/".$datos->tipen_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/tipo_enfermedad/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
