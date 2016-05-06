<?php 
if(isset ($modulo))  {  $datos=$modulo->row(); }    

$mod_padre=$mod_padre->result();
?>
 
<div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Modulo</h3>
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php if(isset ($modulo)) { ?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese id" readonly="readonly"
                           value=<?= $datos->mod_id; ?> >
                    </div>

                <?php } ?>  
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese Descripcion"
                        value=<?php if(isset ($modulo)) echo $datos->mod_descripcion; ?> >
                </div>

                <div class="form-group">
                    <label>Padre</label>
                        <select class="form-control"  id="padre" name="padre">
                            <option value='' >Selecciona...</option>
                           
                           <?php //echo "<script>alert('".count($this->cat_empleado)."');</script>"; 
                            foreach ($mod_padre as $padre ) {
                                  if($padre->mod_id==$datos->mod_padre ){?>
                                    <option selected value="<?= $padre->mod_id;?>"><?=$padre->mod_descripcion; ?></option>
                            <?php }else{  ?>
                                    <option value="<?= $padre->mod_id;?>"><?=$padre->mod_descripcion; ?></option>
                            <?php } 
                            } ?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="descripcion">Url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Ingrese Descripcion"
                        value=<?php if(isset ($modulo)) echo $datos->mod_url; ?> >
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div> 