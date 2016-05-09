<?php 
if(isset ($servicio))  {  $datos=$servicio->row(); }  
?>
<div class="col-md-6">
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
                           value=<?= $datos->ser_id; ?>>
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label for="nombre">Animal</label>
                    <input type="text" required class="form-control" id="animal" name="animal" placeholder="Ingrese Animal"
                     value=<?php if(isset ($servicio)) echo $datos->ser_animal;?> >
                </div>
              
                <div class="form-group">
                    <label for="nombre">Fecha de Evento</label>
                    <input type="date" required class="form-control" id="fecha_evento" name="fecha_evento" placeholder="Ingrese Fecha de Evento"
                     value=<?php if(isset ($servicio)) echo $datos->ser_fecha_evento;?> >
                </div>
                
                <div class="form-group">
                                <label for="fechareg">Reproductor</label>
                                <input type="text" required class="form-control" id="reproductor" name="reproductor" placeholder="Ingrese el Reproductor"
                                value=<?php if(isset ($servicio)) echo $datos->ser_reproductor;?>>
                </div>
                <div class="form-group">
                                <label for="fechareg">Personal</label>
                                <input type="text" required class="form-control" id="personal" name="personal" placeholder="Ingrese Personal"
                                value=<?php if(isset ($servicio)) echo $datos->ser_personal;?>>
               
                <div class="form-group">
                                <label for="fechareg">Tipo de Servicio</label>
                                <input type="text" required class="form-control" id="tipo_servicio" name="tipo_servicio" placeholder="Ingrese Servicio"
                                value=<?php if(isset ($servicio)) echo $datos->ser_tipo_servicio;?>>
                </div>
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>