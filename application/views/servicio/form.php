<?php 
if(isset ($servicio))  {  $datos=$servicio->row(); }  
?>
<div class="col-md-6" style="margin: auto;">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($servicio)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->ser_id; ?>">
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label>Animal</label>
                    <select class="form-control" name="animal" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos_a) {
                            if ($datos_a->ani_id==$datos->ser_animal) {
                                echo "<option selected value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Reproductor</label>
                    <select class="form-control" name="reproductor" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($reproductor->result() as $datos_r) {
                            if ($datos_r->repro_id==$datos->ser_reproductor) {
                                echo "<option selected value='".$datos_r->repro_id."'>".$datos_r->repro_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_r->repro_id."'>".$datos_r->repro_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Personal</label>
                    <select class="form-control" name="personal" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($personal->result() as $datos_p) {
                            if ($datos_p->per_id==$datos->ser_personal) {
                                echo "<option selected value='".$datos_p->per_id."'>".$datos_p->per_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_p->per_id."'>".$datos_p->per_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tipo de Servicio</label>
                    <select class="form-control" name="tipo_servicio" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($tipo_servicio->result() as $datos_ts) {
                            if ($datos_ts->tipse_id==$datos->ser_tipo_servicio) {
                                echo "<option selected value='".$datos_ts->tipse_id."'>".$datos_ts->tipse_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_ts->tipse_id."'>".$datos_ts->tipse_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nombre">Fecha de Evento</label>
                    <input type="date" required class="form-control" id="fecha" name="fecha_evento" placeholder="Ingrese Fecha de Evento"
                     value=<?php if(isset ($servicio)) echo $datos->ser_fecha_evento;?> >
                </div>
                                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>