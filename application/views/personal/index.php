<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>AP. PATERNO</th>
                        <th>AP. MATERNO</th>
                        <th>DNI</th>
                        <th>DIRECCION</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$personal->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->per_id; ?></td>
                            <td><?= $datos->per_nombre; ?></td> 
                            <td><?= $datos->per_ape_paterno; ?></td> 
                            <td><?= $datos->per_ape_materno; ?></td>
                            <td><?= $datos->per_dni; ?></td>  
                            <td><?= $datos->per_distrito; ?></td> 
                            <td>
                            <a href=<?php echo base_url()."index.php/personal/editar/".$datos->per_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                            <a href=<?php echo base_url()."index.php/personal/eliminar/".$datos->per_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/personal/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
