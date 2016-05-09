<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DESCRIPCION</th>
                        <th>ABREVIATURA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$resultado_analisis->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->resan_id; ?></td>
                            <td><?= $datos->resan_descripcion; ?></td> 
                            <td><?= $datos->resan_abreviatura?></td> 
                            <td>
                            <a href=<?php echo base_url()."index.php/resultado_analisis/editar/".$datos->resan_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                            <a href=<?php echo base_url()."index.php/resultado_analisis/eliminar/".$datos->resan_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/resultado_analisis/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
        