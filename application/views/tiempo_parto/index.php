<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DESCRIPCION</th>
                        <th>CANTIDAD</th>
                        <th>UNIDAD</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$tiempo_parto->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->tiempar_id; ?></td>
                            <td><?= $datos->descripcion; ?></td> 
                            <td><?= $datos->cant; ?></td>
                            <td><?= $datos->unidad_tiempo; ?></td>
                            
                            <td>
                                <a href=<?php echo base_url()."index.php/tiempo_parto/editar/".$datos->tiempar_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>   
</div>  
                
