<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
<<<<<<< HEAD
                        <th>CODIGO</th>
                        <th>FECHA EVENTO</th>
                        <th>ACCIONES</th>
=======
                        <th>RP</th>
                        <th>MEDICAMENTOS</th>
                        <th>VIA APLICACION</th>
                        <th>FECHA</th>
                        <th>ACIONES</th>
>>>>>>> c776e3e40a4e60bd37880981c51e9d126800d5aa
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$medicacion->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->med_id; ?></td>
                            <td><?= $datos->med_rp; ?></td> 
<<<<<<< HEAD
                            <td><?= $datos->med_fecha_evento; ?></td>   
                            <td>
                            <a href=<?php echo base_url()."index.php/medicacion/editar/".$datos->med_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                            <a href=<?php echo base_url()."index.php/medicacion/eliminar/".$datos->med_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
=======
                            <td><?= $datos->med_medicamentos;?></td>
                            <td><?= $datos->med_via_aplicacion;?></td>
                            <td><?= $datos->med_fecha_evento; ?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/medicacion/editar/".$datos->med_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/medicacion/eliminar/".$datos->med_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
>>>>>>> c776e3e40a4e60bd37880981c51e9d126800d5aa
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
                
