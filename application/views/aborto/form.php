<?php 
if(isset ($aborto))  {  $datos=$aborto->row(); }  
?>
<div class="col-md-6" style="margin: auto;">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($aborto)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->ab_id; ?>">
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label>Animal</label>
                    <select required class="form-control" name="animal" >
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos_a) {
                            
                            if ($datos_a->ani_id==$datos->ab_animal) {
                                echo "<option selected value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Causa Aborto</label>
                    <select required class="form-control" name="cauabor" >
                        <option value=""> selecione...</option>;
                        <?php foreach ($causa_aborto->result() as $datos_ca) {
                            
                            if ($datos_ca->ca_id==$datos->ab_causa_aborto) {
                                echo "<option selected value='".$datos_ca->ca_id."'>".$datos_ca->ca_descripcion."</option>";
                            } else {
                                echo "<option value='".$datos_ca->ca_id."'>".$datos_ca->ca_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>

                <div class="form-group">
                                <label for="fechareg">Fecha Evento</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required
                                value=<?php if(isset ($aborto)) echo $datos->ab_fecha_evento;?>>
                </div>
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>