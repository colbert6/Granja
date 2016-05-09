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
                    <?php foreach (@$diagnostico_utero->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->diaut_id; ?></td>
                            <td><?= $datos->diaut_descripcion; ?></td> 
                            <td><?= $datos->diaut_abreviatura?></td> 
                            <td>
                            <a href=<?php echo base_url()."index.php/diagnostico_utero/editar/".$datos->diaut_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                            <a href=<?php echo base_url()."index.php/diagnostico_utero/eliminar/".$datos->diaut_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/diagnostico_utero/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
        