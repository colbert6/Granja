<?php 
if(isset ($medicina_cuarto_mamarios))  {  $datos=$medicina_cuarto_mamarios->row(); }    
?>
 
<div class="col-md-6" style="margin: auto;">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title"></h3>
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php 
                    if(isset ($medicina_cuarto_mamarios)) {?>  
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->mecu_id; ?>>
                    </div>
                <?php } ?>  
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion"
                        value="<?php if(isset ($medicina_cuarto_mamarios)) echo $datos->mecu_descripcion; ?>" >
                </div>
                <div class="form-group">
                    <label for="descripcion">Abreviatura</label>
                    <input type="text" class="form-control" id="abreviacion" name="abreviacion" placeholder="Ingrese abreviacion"
                        value="<?php if(isset ($medicina_cuarto_mamarios)) echo $datos->mecu_abreviatura; ?>" >
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>