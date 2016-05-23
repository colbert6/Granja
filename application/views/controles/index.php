<label for="feca_control">Fecha de control: </label>
<input type="date" id="fecha_control" name="fecha_contol">
<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>NOMBRE</th>
                        <th>CONTROL 1</th>
                        <th>CONTROL 2</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$razas->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->con_id; ?></td>
                            <td><?= $datos->conr_rp; ?></td> 
                            <td><?= $datos->con_nombre; ?></td>
                            <input type="text" name="control1" value="control1">
                            <input type="text" name="control2" value="control2">
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/controles/guardar" class="k-button">Guardar</a>
            </div>
            
        </div>
    </div>   
</div>  
                
