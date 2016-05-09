<?php 
if(isset ($indicaciones_especiale))  {  $datos=$indicaciones_especiale->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($indicaciones_especiale)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->indes_id; ?>">
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label>Animal</label>
                    <select class="form-control" name="rp" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos_a) {

                            if ($datos_a->ani_id==$datos->indes_rp) {
                                echo "<option selected value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Indicaciones Especiales</label>
                    <select class="form-control" name="indicaciones_esp" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($indicacion_especial->result() as $datos_ie) {

                            if ($datos_ie->indesp_id==$datos->indes_indicaciones_esp) {
                                echo "<option selected value='".$datos_ie->indesp_id."'>".$datos_ie->indesp_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_ie->indesp_id."'>".$datos_ie->indesp_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>         
                
                <div class="form-group">
                                <label for="fechareg">Fecha de Evento</label>
                                <input type="date" required class="form-control" id="fecha" name="fecha"
                                value=<?php if(isset ($indicaciones_especiale)) echo $datos->indes_fecha_evento;?>>
                </div>

                
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>