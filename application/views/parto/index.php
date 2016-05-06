<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>FECHA NACIMIENTO</th>
                        <th>ESTADO CRIA</th>
                        <th>TIPO PARTO</th>
                        <th>SEXO</th>
                        <th>SERVICIO</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$parto->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->par_id; ?></td>
                            <td><?= $datos->par_rp; ?></td> 
                            <td><?= $datos->par_fechanac;?></td>
                            <td><?= $datos->par_estado_cria;?></td>
                            <td><?= $datos->par_tipo_parto;?></td>
                            <td><?= $datos->par_sexo_cria;?></td>
                            <td><?= $datos->par_servicio; ?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/parto/editar/".$datos->par_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/parto/eliminar/".$datos->par_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/parto/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
