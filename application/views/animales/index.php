<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <th>PADRE</th>
                        <th>MADRE</th>
                        <th>PROVEEDOR</th>
                        <th>RAZA</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$animales->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->ani_rp; ?></td>
                            <td><?= $datos->ani_nombre; ?></td> 
                            <td><?= $datos->ani_padre; ?></td>
                            <td><?= $datos->ani_madre; ?></td>
                            <td><?= $datos->ani_proveedor; ?></td>
                            <td><?= $datos->ani_raza; ?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/animales/editar/".$datos->ani_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/animales/eliminar/".$datos->ani_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/animales/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
