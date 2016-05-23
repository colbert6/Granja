<?php 
if(isset ($enfermedad))  {  $datos=$enfermedad->row(); } 
?>
<div class="col-md-6" style="margin: auto;">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($enfermedad)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->enf_id; ?>">
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label>Animal</label>
                    <select class="form-control" name="rp" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos_a) {

                            if ($datos_a->ani_id==$datos->enf_rp) {
                                echo "<option selected value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tipo Enfermedad</label>
                    <select class="form-control" name="tipo_enfermedad" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($tipo_enfermedad->result() as $datos_te) {

                            if ($datos_te->tipen_id==$datos->enf_tipo_enfermedad) {
                                echo "<option selected value='".$datos_te->tipen_id."'>".$datos_te->tipen_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_te->tipen_id."'>".$datos_te->tipen_descripcion."</option>";
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
                            if ($datos_va->viaap_id==$datos->enf_via_aplicacion) {
                                echo "<option selected value='".$datos_va->viaap_id."'>".$datos_va->viaap_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_va->viaap_id."'>".$datos_va->viaap_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Medicamentos</label>
                    <select class="form-control" name="medicamento" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($medicamentos->result() as $datos_m) {
                            if ($datos_m->medi_id==$datos->enf_medicamento) {
                                echo "<option selected value='".$datos_m->medi_id."'>".$datos_m->medi_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_m->medi_id."'>".$datos_m->medi_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                                <label for="fechareg">Fecha de Evento</label>
                                <input type="date" required class="form-control" id="fecha" name="fecha"
                                value=<?php if(isset ($enfermedad)) echo $datos->enf_fecha_evento;?>>
                </div>

                
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>