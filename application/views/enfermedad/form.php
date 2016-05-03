<?php 
if(isset ($enfermedad))  {  $datos=$enfermedad->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($enfermedad)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->enf_id; ?>>
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label for="nombre">RP</label>
                    <input type="text" class="form-control" id="rp" name="rp" placeholder="Ingrese rp"
                     value=<?php if(isset ($enfermedad)) echo $datos->enf_rp;?> >
                </div>
              
                <div class="form-group">
                    <label for="nombre">Tipo Enfermedad</label>
                    <input type="text" class="form-control" id="tipo_enfermedad" name="tipo_enfermedad" placeholder="Ingrese Tipo Enfermedad"
                     value=<?php if(isset ($enfermedad)) echo $datos->enf_tipo_enfermedad;?> >
                </div>
                <div class="form-group">
                                <label for="fechareg">Via Aplicacion</label>
                                <input type="text" class="form-control" id="via_aplicacion" name="via_aplicacion"placeholder="Ingrese Via"
                                value=<?php if(isset ($enfermedad)) echo $datos->enf_via_aplicacion;?>>
                </div>
                <div class="form-group">
                                <label for="fechareg">Medicamento</label>
                                <input type="text" class="form-control" id="medicamento" name="medicamento"
                                value=<?php if(isset ($enfermedad)) echo $datos->enf_medicamento;?>>
                </div>
                                <div class="form-group">
                                <label for="fechareg">Fecha de Evento</label>
                                <input type="date" class="form-control" id="fecha" name="fecha"
                                value=<?php if(isset ($enfermedad)) echo $datos->enf_fecha_evento;?>>
                </div>

                
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>