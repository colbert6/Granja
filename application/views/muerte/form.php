<?php 
if(isset ($muerte))  {  $datos=$muerte->row(); }  
?>
<div class="col-md-6" style="margin: auto;">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($muerte)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->mue_id; ?>">
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label>Animal</label>
                    <select class="form-control" name="rp" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos_a) {

                            if ($datos_a->ani_id==$datos->mue_rp) {
                                echo "<option selected value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Especificacion Muerte</label>
                    <select class="form-control" name="espec_muerte" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($especificacion_muerte->result() as $datos_em) {

                            if ($datos_em->espmu_id==$datos->mue_espec_muerte) {
                                echo "<option selected value='".$datos_em->espmu_id."'>".$datos_em->espmu_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_em->espmu_id."'>".$datos_em->espmu_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                
                <div class="form-group">
                                <label for="fechareg">Fecha de Evento</label>
                                <input type="date" required class="form-control" id="fecha" name="fecha"
                                value=<?php if(isset ($muerte)) echo $datos->mue_fecha_evento;?>>
                </div>

                
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>