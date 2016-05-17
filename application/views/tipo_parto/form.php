<?php 
if(isset ($tipo_parto))  {  $datos=$tipo_parto->row(); }    
?>
 
<div class="col-md-6" style="margin: auto;">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Tipo de parto</h3>
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php 
                    if(isset ($tipo_parto)) {?>  
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->tippar_id; ?>>
                    </div>
                <?php } ?>  
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion"
                        value="<?php if(isset ($tipo_parto)) echo $datos->tippar_descripcion; ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Abreviacion</label>
                    <input type="text" class="form-control" id="abreviacion" name="abreviacion" placeholder="Ingrese abreviacion"
                        value="<?php if(isset ($tipo_parto)) echo $datos->tippar_abreviatura; ?>" >
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>