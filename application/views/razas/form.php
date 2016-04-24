<div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Razas</h3>
        </div>
        <form role="form" action="<?= base_url();?>index.php/razas/nuevo" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion">
                </div>
                <div class="form-group">
                    <label for="abreviacion">Abreviacion</label>
                    <input type="text" class="form-control" id="abreviacion" name="abreviacion" placeholder="Ingrese abreviacion">
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>