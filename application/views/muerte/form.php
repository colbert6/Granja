<?php 
if(isset ($muerte))  {  $datos=$muerte->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($muerte)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->mue_id; ?>>
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label for="nombre">RP</label>
                    <input type="text" class="form-control" id="rp" name="rp" placeholder="Ingrese rp"
                     value=<?php if(isset ($muerte)) echo $datos->mue_rp;?> >
                </div>
              
                <div class="form-group">
                    <label for="nombre">Medicamentos</label>
                    <input type="text" class="form-control" id="espec_muerte" name="espec_muerte" placeholder="Ingrese Tipo Enfermedad"
                     value=<?php if(isset ($muerte)) echo $datos->mue_espec_muerte;?> >
                </div>
                
                <div class="form-group">
                                <label for="fechareg">Fecha de Evento</label>
                                <input type="date" class="form-control" id="fecha" name="fecha"
                                value=<?php if(isset ($muerte)) echo $datos->mue_fecha_evento;?>>
                </div>

                
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>