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
                    <label for="nombre">RP</label>
                    <input type="text" required class="form-control" id="rp" name="rp" placeholder="Ingrese rp"
                     value="<?php if(isset ($parto)) echo $datos->par_rp;?>" >
                </div>
              
                <div class="form-group">
                    <label for="nombre">Fecha de Nacimieto</label>
                    <input type="date" required class="form-control" id="fechanac" name="fechanac" placeholder="Ingrese Fecha de nacimiento"
                     value="<?php if(isset ($parto)) echo $datos->par_fechanac;?>" >
                </div>
                
                <div class="form-group">
                                <label for="fechareg">Estado de Cria</label>
                                <input type="text" required class="form-control" id="estado_cria" name="estado_cria" placeholder="Ingrese Estado de Cria"
                                value="<?php if(isset ($parto)) echo $datos->par_estado_cria;?>">
                </div>
                <div class="form-group">
                                <label for="fechareg">Tipo de Parto</label>
                                <input type="text" required class="form-control" id="tipo_parto" name="tipo_parto" placeholder="Ingrese Tipo de Parto"
                                value="<?php if(isset ($parto)) echo $datos->par_tipo_parto;?>">
                </div>
                <div class="form-group">
                                <label for="fechareg">Sexo</label>
                                <input type="text" required class="form-control" id="sexo_cria" name="sexo_cria" placeholder="Ingrese el Sexo"
                                value="<?php if(isset ($parto)) echo $datos->par_estado_cria;?>">
                </div>
                <div class="form-group">
                                <label for="fechareg">Servicio</label>
                                <input type="text" required class="form-control" id="servicio" name="servicio" placeholder="Ingrese Servicio"
                                value="<?php if(isset ($parto)) echo $datos->par_servicio;?>">
                </div>
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>