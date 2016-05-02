<?php 
if(isset ($aborto))  {  $datos=$aborto->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($aborto)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->ab_id; ?>>
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label>Animal</label>
                    <select class="form-control" name="raza">
                        <?php foreach ($animales->result() as $datos_r) {
                            if ($datos_a->ab_animal==$datos->ani_id) {
                                echo "<option select value='".$datos_a->ab_animal."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option select value='".$datos_a->ab_animal."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>

                
                <div class="form-group">
                    <label for="nombre">Causa Aborto</label>
                    <input type="text" class="form-control" id="cauabor" name="cauabor" placeholder="Ingrese causa de aborto"
                     value=<?php if(isset ($aborto)) echo $datos->ab_causa_aborto;?> >
                </div>
                <div class="form-group">
                                <label for="fechareg">Fecha Evento</label>
                                <input type="date" class="form-control" id="fecha" name="fecha"
                                value=<?php if(isset ($aborto)) echo $datos->ab_fecha_evento;?>>
                            </div>
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>