<?php 
if(isset ($secado))  {  $datos=$secado->row(); }  
?>
<div class="col-md-6">
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
                    <label for="nombre">RP</label>
                    <input type="text" required class="form-control" id="rp" name="rp" placeholder="Ingrese Rp"
                     value="<?php if(isset ($secado)) echo $datos->sec_rp;?>" >
                </div>
              
                <div class="form-group">
                    <label for="nombre">Fecha de Evento</label>
                    <input type="date" required class="form-control" id="fecha_evento" name="fecha_evento" placeholder="Ingrese Fecha de Evento"
                     value="<?php if(isset ($secado)) echo $datos->sec_fecha_evento;?>" >
                </div>
                <div class="form-group">
                    <label for="nombre">Cuarto Mamario</label>
                    <input type="text" required class="form-control" id="cuarto_mamarios" name="cuarto_mamarios" placeholder="Ingrese los Cuarto Mamario"
                     value="<?php if(isset ($secado)) echo $datos->sec_cuarto_mamarios;?>" >
                </div>
                             
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>