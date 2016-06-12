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
                            <td><?php foreach (@$estado_cria->result() as $datoss) {   if($datos->par_estado_cria==$datoss->estcr_id) echo $datoss->estcr_descripcion;} ?></td>
                            <td><?php foreach (@$tipo_parto->result() as $datoss) {   if($datos->par_tipo_parto==$datoss->tippar_id) echo $datoss->tippar_descripcion;} ?></td>
                            <td><?php foreach (@$sexo_cria->result() as $datoss) {   if($datos->par_sexo_cria==$datoss->sexcr_id) echo $datoss->sexcr_descripcion;} ?></td>
                            <td><?php foreach (@$servicio->result() as $datoss) { foreach (@$animales->result() as $datos1) {  if(($datos->par_servicio==$datoss->ser_id)&&($datoss->ser_id==$datos1->ani_id)) echo $datos1->ani_nombre;} }?></td>
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
                
