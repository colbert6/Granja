<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>ESPECIFICACION MUERTE</th>
                        <th>FECHA</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$muerte->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->mue_id; ?></td>
                            <td><?= $datos->mue_rp; ?></td> 
                            <td><?php foreach (@$especificacion_muerte->result() as $datoss) {   if($datos->mue_espec_muerte==$datoss->espmu_id) echo $datoss->espmu_descripcion;} ?></td>
                            <td><?= $datos->mue_fecha_evento; ?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/muerte/editar/".$datos->mue_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/muerte/eliminar/".$datos->mue_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/muerte/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
