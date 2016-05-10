<?php 
if(isset ($tacto_rectal))  {  $datos=$tacto_rectal->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($tacto_rectal)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->tarec_id; ?>">
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label>Animal</label>
                    <select class="form-control" name="rp" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos_a) {
                            if ($datos_a->ani_id==$datos->tarec_rp) {
                                echo "<option selected value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Diagnostico de Utero</label>
                    <select class="form-control" name="diag_utero" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($diagnostico_utero->result() as $datos_du) {
                            if ($datos_du->diaut_id==$datos->tarec_diag_utero) {
                                echo "<option selected value='".$datos_du->diaut_id."'>".$datos_du->diaut_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_du->diaut_id."'>".$datos_du->diaut_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>     
                <div class="form-group">
                    <label>Enfermedad de Ovario</label>
                    <select class="form-control" name="enfe_ovario" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($enfermedad_ovario->result() as $datos_eo) {
                            if ($datos_eo->enfov_id==$datos->tarec_enfe_ovario) {
                                echo "<option selected value='".$datos_eo->enfov_id."'>".$datos_eo->enfov_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_eo->enfov_id."'>".$datos_eo->enfov_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label>Enfermedad de Utero</label>
                    <select class="form-control" name="enfe_utero" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($enfermedad_utero->result() as $datos_eu) {
                            if ($datos_eu->enfut_id==$datos->tarec_enfe_utero) {
                                echo "<option selected value='".$datos_eu->enfut_id."'>".$datos_eu->enfut_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_eu->enfut_id."'>".$datos_eu->enfut_descripcion."</option>";
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
                            if ($datos_va->viaap_id==$datos->tarec_via_aplicacion) {
                                echo "<option selected value='".$datos_va->viaap_id."'>".$datos_va->viaap_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_va->viaap_id."'>".$datos_va->viaap_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Medicina Genital</label>
                    <select class="form-control" name="med_genital" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($medicina_genital->result() as $datos_vap) {
                            if ($datos_vap->medge_id==$datos->tarec_med_genital) {
                                echo "<option selected value='".$datos_vap->medge_id."'>".$datos_vap->medge_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_vap->medge_id."'>".$datos_vap->medge_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>    
                <div class="form-group">
                    <label for="nombre">Fecha de Evento</label>
                    <input type="date" required class="form-control" id="fecha_evento" name="fecha_evento" placeholder="Ingrese Fecha de Evento"
                     value=<?php if(isset ($tacto_rectal)) echo $datos->tarec_fecha_evento;?> >
                </div>
               
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>