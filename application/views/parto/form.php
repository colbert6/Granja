<?php 
if(isset ($parto))  {  $datos=$parto->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($parto)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->par_id; ?>">
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label for="nombre">Codigo</label>
                    <input type="text" required class="form-control" id="rp" name="rp" placeholder="Ingrese rp"
                     autofocus onkeypress="return soloNumeros(event)" value="<?php if(isset ($parto)) echo $datos->par_rp;?>" >
                </div>
              
                <div class="form-group">
                    <label for="nombre">Fecha de Nacimieto</label>
                    <input type="date" required class="form-control" id="fechanac" name="fechanac" placeholder="Ingrese Fecha de nacimiento"
                     value=<?php if(isset ($parto)) echo $datos->par_fechanac;?> >
                </div>
                <div class="form-group">
                    <label>Estado de Cria</label>
                    <select required class="form-control" name="estado_cria">
                        <option value=""> selecione...</option>;
                        <?php foreach ($estado_cria->result() as $datos_ec) {

                            if ($datos_ec->estcr_id==$datos->par_estado_cria) {
                                echo "<option selected value='".$datos_ec->estcr_id."'>".$datos_ec->estcr_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_ec->estcr_id."'>".$datos_ec->estcr_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tipo de Parto</label>
                    <select required class="form-control" name="tipo_parto">
                        <option value=""> selecione...</option>;
                        <?php foreach ($tipo_parto->result() as $datos_tp) {

                            if ($datos_tp->tippar_id==$datos->par_tipo_parto) {
                                echo "<option selected value='".$datos_tp->tippar_id."'>".$datos_tp->tippar_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_tp->tippar_id."'>".$datos_tp->tippar_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sexo</label>
                    <select required class="form-control" name="sexo_cria">
                        <option value=""> selecione...</option>;
                        <?php foreach ($sexo_cria->result() as $datos_sc) {

                            if ($datos_sc->sexcr_id==$datos->par_estado_cria) {
                                echo "<option selected value='".$datos_sc->sexcr_id."'>".$datos_sc->sexcr_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_sc->sexcr_id."'>".$datos_sc->sexcr_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Servicio</label>
                    <select required class="form-control" name="servicio">
                        <option value=""> selecione...</option>;
                        <?php foreach ($servicio->result() as $datos_s) {

                            if ($datos_s->ser_id==$datos->par_servicio) {
                                echo "<option selected value='".$datos_s->ser_id."'>".$datos_s->ser_animal."</option>";
                            } else {
                               echo "<option  value='".$datos_s->ser_id."'>".$datos_s->ser_animal."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
                
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>