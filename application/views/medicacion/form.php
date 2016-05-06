<?php 
if(isset ($medicacion))  {  $datos=$medicacion->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($medicacion)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->med_id; ?>>
                    </div>

                <?php } ?>
                
                <div class="form-group">
                    <label for="nombre">RP</label>
                    <input type="text" class="form-control" id="rp" name="rp" placeholder="Ingrese rp"
                     value=<?php if(isset ($medicacion)) echo $datos->med_rp;?> >
                </div>
              
                <div class="form-group">
                    <label for="nombre">Medicamentos</label>
                    <input type="text" class="form-control" id="medicamentos" name="medicamentos" placeholder="Ingrese Tipo Enfermedad"
                     value=<?php if(isset ($medicacion)) echo $datos->med_medicamentos;?> >
                </div>
                <div class="form-group">
                    <label for="nombre">Via Aplicaion</label>
                    <input type="text" class="form-control" id="via_aplicacion" name="via_aplicacion" placeholder="Ingrese Tipo Enfermedad"
                     value=<?php if(isset ($medicacion)) echo $datos->med_via_aplicacion;?> >
                </div>
                <div class="form-group">
                                <label for="fechareg">Fecha de Evento</label>
                                <input type="date" class="form-control" id="fecha" name="fecha"
                                value=<?php if(isset ($medicacion)) echo $datos->med_fecha_evento;?>>
                </div>

                
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>