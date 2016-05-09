<?php 
if(isset ($medicacion))  {  $datos=$medicacion->row(); }    
?>
 
<div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title"></h3>
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php 
                    if(isset ($medicacion)) {?>  
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->med_id; ?>>
                    </div>
                <?php } ?>  
                <div class="form-group">
                    <label for="descripcion">Med. RP</label>
                    <input type="text" class="form-control" id="rp" name="rp" placeholder="Ingrese codigo"
                        value=<?php if(isset ($medicacion)) echo $datos->med_rp; ?> >
                </div>
                <div class="form-group">
                    <label for="descripcion">Fecha de evento</label>
                    <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Ingrese apellido fecha"
                        value=<?php if(isset ($medicacion)) echo $datos->med_fecha_evento; ?> >
                </div>
                <div class="form-group">
                    <label for="descripcion">Medicamentos</label>
                    <input type="text" class="form-control" id="medicamentos" name="medicamentos" placeholder="Ingrese medicamento"
                        value=<?php if(isset ($medicacion)) echo $datos->med_cod_medicamentos; ?> >
                </div>
                <div class="form-group">
                    <label for="descripcion">Via de aplicacion</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese telefono"
                        value=<?php if(isset ($medicacion)) echo $datos->med_via_aplicacion; ?> >
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>