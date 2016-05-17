<?php 
if(isset ($tipo_registro))  {  $datos=$tipo_registro->row(); }    
?>
<div class="col-md-6" style="margin: auto;">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Tipo Registro</h3>
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php if(isset ($tipo_registro)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" required class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->tipre_id; ?>>
                    </div>

                <?php } ?> 
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion"
                    value="<?php if(isset ($tipo_registro)) echo $datos->tipre_descripcion; ?>">
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>?>