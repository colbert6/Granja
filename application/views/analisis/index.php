<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ANIMAL</th>
                        <th>TIPO ANALISIS</th>
                        <th>FECHA</th>
                        <th>RESULTADO ANALISIS</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$analisis->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->ana_id; ?></td>
                            <td><?= $datos->ana_animal; ?></td> 
                            <td><?= $datos->ana_tipo_analisis; ?></td>
                            <td><?= $datos->ana_fecha_evento; ?></td>
                            <td><?= $datos->ana_resul_analisis; ?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/analisis/editar/".$datos->ana_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/analisis/eliminar/".$datos->ana_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/analisis/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
