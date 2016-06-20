<?php 
if(isset ($tiempo_parto))  {  $datos=$tiempo_parto->row(); }  
?>
<div class="col-md-6" style="margin: auto;">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($tiempo_parto)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->tiempar_id; ?>">
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label for="nombre">Descripcion</label>
                    <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion"
                     autofocus onkeypress="return soloNumeros(event)" value="<?php if(isset ($tiempo_parto)) echo $datos->descripcion;?>" >
                </div>
                <div class="form-group">
                    <label for="nombre">Cantidad</label>
                    <input type="text" required class="form-control" id="cant" name="cant" placeholder="Ingrese cantida"
                     autofocus onkeypress="return soloNumeros(event)" value="<?php if(isset ($tiempo_parto)) echo $datos->cant;?>" >
                </div>
                <div class="form-group">
                    <label for="nombre">Unidad de Tiempo</label>
                    <input type="text" required class="form-control" id="unidad" name="unidad" placeholder="Ingrese unidad de tiempo"
                     autofocus onkeypress="return soloLetras(event)" value="<?php if(isset ($tiempo_parto)) echo $datos->unidad_tiempo;?>" >
                </div>
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>