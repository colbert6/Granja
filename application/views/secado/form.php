<?php 
if(isset ($secado))  {  $datos=$secado->row(); }  
?>
<div class="col-md-6" style="margin: auto;">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($secado)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->sec_id; ?>">
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label>Animal</label>
                    <select class="form-control" name="rp" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos_a) {
                            if ($datos_a->ani_id==$datos->sec_rp) {
                                echo "<option selected value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Cuarto Mamario</label>
                    <select class="form-control" name="cuarto_mamarios" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($medicina_cuarto_mamarios->result() as $datos_mcm) {
                            if ($datos_mcm->mecu_id==$datos->sec_cuarto_mamarios) {
                                echo "<option selected value='".$datos_mcm->mecu_id."'>".$datos_mcm->mecu_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_mcm->mecu_id."'>".$datos_mcm->mecu_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
              
                <div class="form-group">
                    <label for="nombre">Fecha de Evento</label>
                    <input type="date" required class="form-control" id="fecha" name="fecha_evento" placeholder="Ingrese Fecha de Evento"
                     value=<?php if(isset ($secado)) echo $datos->sec_fecha_evento;?> >
                </div>            
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>