<?php 
if(isset ($usuario))  {  $datos=$usuario->row();  }  

$tipo_usuario=$tipo_usuario->result();  
?>
 
<div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Usuario</h3>
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php if(isset ($usuario)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->usu_id; ?>" >
                    </div>

                <?php } ?>  
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre"
                        value=<?php if(isset ($usuario)) echo $datos->usu_nombre; ?> >
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese Password"
                        value=<?php if(isset ($usuario)) echo $datos->usu_password; ?> >
                </div>
                <div class="form-group">
                    <label>Tipo de Usuario</label>
                        <select class="form-control"  id="tipo_usuario" name="tipo_usuario">
                            <option value='' >Selecciona...</option>
                           
                           <?php //echo "<script>alert('".count($this->cat_empleado)."');</script>"; 
                            foreach ($tipo_usuario as $tipo ) {
                                  if($tipo->tipusu_id==$datos->usu_tipo_usuario ){?>
                                    <option selected value="<?= $tipo->tipusu_id;?>"><?=$tipo->tipusu_descripcion; ?></option>
                            <?php }else{  ?>
                                    <option value="<?= $tipo->tipusu_id;?>"><?=$tipo->tipusu_descripcion; ?></option>
                            <?php } 
                            } ?>
                        </select>
                </div>


                <div class="form-group">
                    <label for="abreviacion">Personal</label>
                    <input type="text" class="form-control" id="personal" name="personal" placeholder="Ingrese Personal"
                        value=<?php if(isset ($usuario)) echo $datos->usu_personal; ?> >
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div> 