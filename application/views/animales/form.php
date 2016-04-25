<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Animales</h3>
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
                <div class="form-group">
                    <label for="codigo">Codigo</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese codigo">
                </div>
                <div class="form-group">
                    <label>Raza</label>
                    <select class="form-control">
                    echo "<option  value='".$lista["curso"]."'>"."</option>";
                    </select>
                </div>

                <div class="form-group">
                    <label>Tipo Registro</label>
                    <select class="form-control">

                    </select>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre">
                </div>
                <div class="form-group">
                    <label for="proveedor">Proveedor</label>
                    <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="Ingrese proveedor">
                </div>
                <div class="form-group">
                    <label for="npadre">Nombre padre</label>
                    <input type="text" class="form-control" id="padre" name="padre" placeholder="Ingrese nombre del padre">
                </div>
                <div class="form-group">
                    <label for="nmadre">Nombre madre</label>
                    <input type="text" class="form-control" id="madre" name="madre" placeholder="Ingrese nombre de la madre">
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Ingrese nombre de la madre">
                </div>
                <div class="form-group">
                    <label for="fechanac">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fechanac" name="fechanac">
                </div>
                <div class="form-group">
                    <label for="fechareg">Fecha de registro</label>
                    <input type="date" class="form-control" id="fechareg" name="fechareg">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion">
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            
        </form>
    </div>
</div>