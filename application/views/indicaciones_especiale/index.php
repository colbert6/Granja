<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>INDICACIONES ESPECIALES</th>
                        <th>FECHA</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$indicaciones_especiale->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->indes_id; ?></td>
                            <td><?= $datos->indes_rp; ?></td> 
                            <td><?php foreach (@$indicacion_especial->result() as $datoss) {   if($datos->indes_indicaciones_esp==$datoss->indesp_id) echo $datoss->indesp_descripcion;} ?></td>
                            <td><?= $datos->indes_fecha_evento; ?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/indicaciones_especiale/editar/".$datos->indes_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/indicaciones_especiale/eliminar/".$datos->indes_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/indicaciones_especiale/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
