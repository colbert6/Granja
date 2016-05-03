<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>NO INSEMINAL</th>
                        <th>FECHA</th>
                        <th>MEDICINA GENITAL</th>
                        <th>VIA APLICACION</th>
                        <th>ACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$celo->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->celo_id; ?></td>
                            <td><?= $datos->celo_rp; ?></td> 
                            <td><?= $datos->celo_causa_no_inseminal; ?></td>
                            <td><?= $datos->celo_fecha_evento; ?></td>
                            <td><?= $datos->celo_medicina_genital; ?></td>
                            <td><?= $datos->celo_via_aplicacion; ?></td>
                            <td>
                                <a href=<?php echo base_url()."index.php/celo/editar/".$datos->celo_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/celo/eliminar/".$datos->celo_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/celo/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
