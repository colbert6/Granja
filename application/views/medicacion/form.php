<?php 

if(isset ($medicacion))  {  $datos=$medicacion->row(); }    
?>
 

<div class="col-md-6" style="margin: auto;">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($medicacion)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->med_id; ?>">
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label>Animal</label>
                    <select class="form-control" name="rp" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos_a) {

                            if ($datos_a->ani_id==$datos->med_rp) {
                                echo "<option selected value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                
               <div class="form-group">
                    <label>Medicamentos</label>
                    <select class="form-control" name="medicamentos" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($medicamentos->result() as $datos_m) {

                            if ($datos_m->medi_id==$datos->med_medicamentos) {
                                echo "<option selected value='".$datos_m->medi_id."'>".$datos_m->medi_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_m->medi_id."'>".$datos_m->medi_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Via Aplicacion</label>
                    <select class="form-control" name="via_aplicacion" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($via_aplicacion->result() as $datos_va) {
                            if ($datos_va->viaap_id==$datos->medi_via_aplicacion) {
                                echo "<option selected value='".$datos_va->viaap_id."'>".$datos_va->viaap_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_va->viaap_id."'>".$datos_va->viaap_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                
                <div class="form-group">
                                <label for="fechareg">Fecha de Evento</label>
                                <input type="date" required class="form-control" id="fecha" name="fecha"
                                value=<?php if(isset ($medicacion)) echo $datos->med_fecha_evento;?>>
                </div>

                
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>