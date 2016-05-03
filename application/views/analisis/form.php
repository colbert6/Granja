<?php 
if(isset ($analisis))  {  $datos=$analisis->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($analisis)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->ana_id; ?>>
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label>Animal</label>
                    <select class="form-control" name="animal">
                        <?php foreach ($animales->result() as $datos_a) {
                            if ($datos_a->ani_id==$datos->ana_animal) {
                                echo "<option select value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            } else {
                               echo "<option  value='".$datos_a->ani_id."'>".$datos_a->ani_nombre."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>

                
                <div class="form-group">
                    <label for="nombre">Tipo Analisis</label>
                    <input type="text" class="form-control" id="tipana" name="tipana" placeholder="Ingrese tipo analisis"
                     value=<?php if(isset ($analisis)) echo $datos->ana_tipo_analisis;?> >
                </div>
                <div class="form-group">
                    <label for="nombre">Resultado Analisis</label>
                    <input type="text" class="form-control" id="resultado_ana" name="resultado_ana" placeholder="Ingrese resultado"
                     value=<?php if(isset ($analisis)) echo $datos->ana_resul_analisis;?> >
                </div>
                <div class="form-group">
                                <label for="fechareg">Fecha Evento</label>
                                <input type="date" class="form-control" id="fecha" name="fecha"
                                value=<?php if(isset ($analisis)) echo $datos->ana_fecha_evento;?>>
                            </div>
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>