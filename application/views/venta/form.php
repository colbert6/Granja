<?php 
if(isset ($venta))  {  $datos=$venta->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($venta)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->venta_id; ?>>
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label for="nombre">RP</label>
                    <input type="text" required class="form-control" id="rp" name="rp" placeholder="Ingrese Rp"
                     value=<?php if(isset ($venta)) echo $datos->venta_rp;?> >
                </div>
              
                <div class="form-group">
                    <label for="nombre">Fecha de Evento</label>
                    <input type="date" required class="form-control" id="fecha_evento" name="fecha_evento" placeholder="Ingrese Fecha de Evento"
                     value=<?php if(isset ($venta)) echo $datos->venta_fecha_evento;?> >
                </div>
                <div class="form-group">
                    <label for="nombre">Especificacion de Muerte</label>
                    <input type="text" required class="form-control" id="especif_venta" name="especif_venta" placeholder="Ingrese Fecha de Evento"
                     value=<?php if(isset ($venta)) echo $datos->venta_especif_venta;?> >
                </div>
                             
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>