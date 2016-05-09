"<?php 
if(isset ($celo))  {  $datos=$celo->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post" class="innline">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($celo)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->celo_id; ?>">
                    </div>

                <?php } ?>

                <div class="form-group">
                    <label for="nombre"> RP</label>
                    <input type="text" required class="form-control" id="rp" name="rp" placeholder="Ingrese rp"
                     value="<?php if(isset ($celo)) echo $datos->celo_rp;?>" >
                </div>
                <div class="form-group">
                    <label for="nombre">Causa no Inseminal</label>
                    <input type="text" required class="form-control" id="causa_no_enseminal" name="causa_no_enseminal" placeholder="Ingrese causa no inseminal"
                     value="<?php if(isset ($celo)) echo $datos->celo_causa_no_inseminal;?>" >
                </div>
                <div class="form-group">
                    <label for="nombre">Medicina Genital</label>
                    <input type="text" required class="form-control" id="medicina_genital" name="medicina_genital" placeholder="Ingrese medicina genital"
                     value="<?php if(isset ($celo)) echo $datos->celo_medicina_genital;?>" >
                </div>
                <div class="form-group">
                    <label for="nombre">Via Aplicacion</label>
                    <input type="text" required class="form-control" id="via_aplicacion" name="via_aplicacion" placeholder="Ingrese medicina genital"
                     value="<?php if(isset ($celo)) echo $datos->celo_via_aplicacion;?>" >
                </div>
                <div class="form-group">
                                <label for="fechareg">Fecha Evento</label>
                                <input type="date" required class="form-control" id="fecha" name="fecha"
                                value="<?php if(isset ($celo)) echo $datos->celo_fecha_evento;?>">
                            </div>
                
            </div>
              
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>