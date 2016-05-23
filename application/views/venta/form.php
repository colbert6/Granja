"<?php 
if(isset ($venta))  {  $datos=$venta->row(); }  
?>
<div class="col-md-6" style="margin: auto;">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($venta)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->venta_id; ?>">
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label>Animal</label>
                    <select class="form-control" name="rp" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos_a) {
                            if ($datos_a->ani_id==$datos->venta_rp) {
                                echo "<option selected value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Especificacion de Muerte</label>
                    <select class="form-control" name="especif_venta" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($especificacion_venta->result() as $datos_ap) {
                            if ($datos_ap->espve_id==$datos->venta_especif_venta) {
                                echo "<option selected value='".$datos_ap->espve_id."'>".$datos_ap->espve_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_ap->espve_id."'>".$datos_ap->espve_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>         
                <div class="form-group">
                    <label for="nombre">Fecha de Evento</label>
                    <input type="date" required class="form-control" id="fecha_evento" name="fecha_evento" placeholder="Ingrese Fecha de Evento"
                     value=<?php if(isset ($venta)) echo $datos->venta_fecha_evento;?> >
                </div>
                                            
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>