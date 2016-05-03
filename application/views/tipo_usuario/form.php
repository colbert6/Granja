<?php 
if(isset ($tipo_usuario))  {  $datos=$tipo_usuario->row(); }    
?>
 
<div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Tipo de Usuario</h3>
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php if(isset ($tipo_usuario)) { ?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese id" readonly="readonly"
                           value=<?= $datos->tipusu_id; ?> >
                    </div>

                <?php } ?>  
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese Descripcion"
                        value=<?php if(isset ($tipo_usuario)) echo $datos->tipusu_descripcion; ?> >
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div> 