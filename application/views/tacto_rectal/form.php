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
                    <label for="nombre">RP</label>
                    <input type="text" required class="form-control" id="rp" name="rp" placeholder="Ingrese Rp"
                     value="<?php if(isset ($tacto_rectal)) echo $datos->tarec_rp;?>" >
                </div>
              
                <div class="form-group">
                    <label for="nombre">Fecha de Evento</label>
                    <input type="date" required class="form-control" id="fecha_evento" name="fecha_evento" placeholder="Ingrese Fecha de Evento"
                     value="<?php if(isset ($tacto_rectal)) echo $datos->tarec_fecha_evento;?>" >
                </div>
                
                <div class="form-group">
                                <label for="fechareg">Diagnostico de Utero</label>
                                <input type="text" required class="form-control" id="diag_utero" name="diag_utero" placeholder="Ingrese el Diagnostico de Utero"
                                value="<?php if(isset ($tacto_rectal)) echo $datos->tarec_diag_utero;?>">
                </div>
                <div class="form-group">
                                <label for="fechareg">Enfermedad de Ovario</label>
                                <input type="text" required class="form-control" id="enfe_ovario" name="enfe_ovario" placeholder="Ingrese Enfermedad de Ovario"
                                value="<?php if(isset ($tacto_rectal)) echo $datos->tarec_enfe_ovario;?>">
                </div>
                <div class="form-group">
                                <label for="fechareg">Enfermedad de Utero</label>
                                <input type="text" required class="form-control" id="enfe_utero" name="enfe_utero" placeholder="Ingrese Enfermedad de Utero"
                                value="<?php if(isset ($tacto_rectal)) echo $datos->tarec_enfe_utero;?>">
                </div>
                <div class="form-group">
                                <label for="fechareg">Via Aplicacion</label>
                                <input type="text" required class="form-control" id="via_aplicacion" name="via_aplicacion" placeholder="Ingrese Enfermedad de Utero"
                                value="<?php if(isset ($tacto_rectal)) echo $datos->tarec_via_aplicacion;?>">
                </div>
                <div class="form-group">
                                <label for="fechareg">Medicina Genital</label>
                                <input type="text" required class="form-control" id="med_genital" name="med_genital" placeholder="Ingrese Medicina Genital"
                                value="<?php if(isset ($tacto_rectal)) echo $datos->tarec_med_genital;?>">
                </div>
                
              
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>