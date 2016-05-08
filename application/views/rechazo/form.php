<?php 
if(isset ($rechazo))  {  $datos=$rechazo->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($rechazo)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->recha_id; ?>>
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label for="nombre">RP</label>
                    <input type="text" required class="form-control" id="rp" name="rp" placeholder="Ingrese Rp"
                     value=<?php if(isset ($rechazo)) echo $datos->recha_rp;?> >
                </div>
              
                <div class="form-group">
                    <label for="nombre">Fecha de Evento</label>
                    <input type="date" required class="form-control" id="fecha_evento" name="fecha_evento" placeholder="Ingrese Fecha de Evento"
                     value=<?php if(isset ($rechazo)) echo $datos->recha_fecha_evento;?> >
                </div>
                <div class="form-group">
                    <label for="nombre">Cuarto Mamario</label>
                    <input type="text" required class="form-control" id="causa_rechazo" name="causa_rechazo" placeholder="Ingrese la Causa Rechazo"
                     value=<?php if(isset ($rechazo)) echo $datos->recha_causa_rechazo;?> >
                </div>
                             
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>