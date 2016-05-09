<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CODIGO</th>
                        <th>FECHA EVENTO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$medicacion->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->med_id; ?></td>
                            <td><?= $datos->med_rp; ?></td> 
                            <td><?= $datos->med_fecha_evento; ?></td>   
                            <td>
                            <a href=<?php echo base_url()."index.php/medicacion/editar/".$datos->med_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                            <a href=<?php echo base_url()."index.php/medicacion/eliminar/".$datos->med_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/medicacion/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
