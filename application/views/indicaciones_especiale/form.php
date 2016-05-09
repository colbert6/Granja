"<?php 
if(isset ($indicaciones_especiale))  {  $datos=$indicaciones_especiale->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($indicaciones_especiale)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->indes_id; ?>">
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label for="nombre">RP</label>
                    <input type="text" required class="form-control" id="rp" name="rp" placeholder="Ingrese rp"
                     value="<?php if(isset ($indicaciones_especiale)) echo $datos->indes_rp;?>" >
                </div>
              
                <div class="form-group">
                    <label for="nombre">Indicaciones Especiales</label>
                    <input type="text" class="form-control" id="indicaciones_esp" name="indicaciones_esp" placeholder="Ingrese Tipo Enfermedad"
                     value="<?php if(isset ($indicaciones_especiale)) echo $datos->indes_indicaciones_esp;?>" >
                </div>
                <div class="form-group">
                                <label for="fechareg">Fecha de Evento</label>
                                <input type="date" required class="form-control" id="fecha" name="fecha"
                                value="<?php if(isset ($indicaciones_especiale)) echo $datos->indes_fecha_evento;?>">
                </div>

                
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>