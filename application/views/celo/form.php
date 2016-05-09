<?php 
if(isset ($celo))  {  $datos=$celo->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($celo)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->celo_id; ?>">
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label>Animal</label>
                    <select class="form-control" name="rp" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos_a) {

                            if ($datos_a->ani_id==$datos->celo_rp) {
                                echo "<option selected value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>

                 <div class="form-group">
                    <label>Causa no Inseminal</label>
                    <select class="form-control" name="causa_no_enseminal" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($causa_no_inseminal->result() as $datos_cne) {
                           //print_r($datos_cne);
                            if ($datos_cne->cni_id==$datos->celo_causa_no_inseminal) {
                                echo "<option selected value='".$datos_cne->cni_id."'>".$datos_cne->cni_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_cne->cni_id."'>".$datos_cne->cni_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Medicina Genital</label>
                    <select class="form-control" name="medicina_genital" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($medicina_genital->result() as $datos_mg) {
                            if ($datos_mg->medge_id==$datos->celo_medicina_genital) {
                                echo "<option selected value='".$datos_mg->medge_id."'>".$datos_mg->medge_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_mg->medge_id."'>".$datos_mg->medge_descripcion."</option>";
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
                            if ($datos_va->viaap_id==$datos->celo_via_aplicacion) {
                                echo "<option selected value='".$datos_va->viaap_id."'>".$datos_va->viaap_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_va->viaap_id."'>".$datos_va->viaap_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                
                <div class="form-group">
                                <label for="fechareg">Fecha Evento</label>
                                <input type="date" required class="form-control" id="fecha" name="fecha"
                                value=<?php if(isset ($celo)) echo $datos->celo_fecha_evento;?>>
                            </div>
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>