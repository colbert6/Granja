<?php 
if(isset ($personal))  {  $datos=$personal->row(); }    
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
                    if(isset ($personal)) {?>  
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->per_id; ?>>
                    </div>
                <?php } ?>  
                <div class="form-group">
                    <label for="descripcion">Nombres</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese name"
                        value=<?php if(isset ($personal)) echo $datos->per_nombre; ?> >
                </div>
                <div class="form-group">
                    <label for="descripcion">Apellido Paterno</label>
                    <input type="text" class="form-control" id="appaterno" name="appaterno" placeholder="Ingrese apellido paterno"
                        value=<?php if(isset ($personal)) echo $datos->per_ape_paterno; ?> >
                </div>
                <div class="form-group">
                    <label for="descripcion">Apellido Materno</label>
                    <input type="text" class="form-control" id="apmaterno" name="apmaterno" placeholder="Ingrese apellido materno"
                        value=<?php if(isset ($personal)) echo $datos->per_ape_materno; ?> >
                </div>
                <div class="form-group">
                    <label for="descripcion">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese telefono"
                        value=<?php if(isset ($personal)) echo $datos->per_telefono; ?> >
                </div>
                <div class="form-group">
                    <label for="descripcion">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese direccion"
                        value=<?php if(isset ($personal)) echo $datos->per_direccion; ?> >
                </div>
                <div class="form-group">
                    <label for="descripcion">Distrito</label>
                    <input type="text" class="form-control" id="distrito" name="distrito" placeholder="Ingrese distrito"
                        value=<?php if(isset ($personal)) echo $datos->per_distrito; ?> >
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>