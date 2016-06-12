<?php 
if(isset ($animales))  {  $datos=$animales->row(); }
//print_r($datos);print_r($anima);}
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post"  class="animales">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if((isset ($animales)) && (!isset ($estado))) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value="<?= $datos->ani_id; ?>">
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label for="codigo">Codigo</label>
                    <input type="text" required class="form-control" id="codigo" name="codigo" placeholder="Ingrese codigo"
                    autofocus onkeypress="return soloNumeros(event)"
                    value="<?php if(isset ($animales)&& (!isset ($estado))) echo $datos->ani_rp; ?>" >

                </div>
                <div>
               </div>
                <div class="form-group">
                    <label>Raza</label>
                    <select required class="form-control" name="raza">
                        <option value=""> selecione...</option>;
                        <?php foreach ($razas->result() as $datos_r) {

                            if (($datos_r->raz_id==$datos->ani_raza)&& (!isset ($estado))) {
                                echo "<option selected value='".$datos_r->raz_id."'>".$datos_r->raz_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_r->raz_id."'>".$datos_r->raz_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>

            
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre"
                     autofocus onkeypress="return soloLetras(event)" value="<?php if(isset ($animales)&& (!isset ($estado))) echo $datos->ani_nombre;?>" >
                </div>
                <div class="form-group">
                    <label for="proveedor">Proveedor</label>
                    <input type="text" required class="form-control" id="proveedor" name="proveedor" placeholder="Ingrese proveedor"
                    autofocus onkeypress="return soloLetras(event)" value="<?php if(isset ($animales)&& (!isset ($estado))) echo $datos->ani_proveedor;?>">
                </div>
                <div class="form-group">
                    <label>Sexo</label>
                    <select required class="form-control" name="sexo">
                        <option value=""> selecione...</option>;
                        <?php foreach ($sexo_cria->result() as $datos_sc) {

                            if (($datos_sc->sexcr_id==$datos->ani_sexo)&& (!isset ($estado))) {
                                echo "<option selected value='".$datos_sc->sexcr_id."'>".$datos_sc->sexcr_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_sc->sexcr_id."'>".$datos_sc->sexcr_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>
            </div>
            <style type="text/css">
                .mover{position: absolute;top: -2px;left: 530px}
            </style>
            <div class="col-lg-12 mover">
                <div class="box box-warning">
                     <div class="box-header">
                    </div>
                    <div class="box-body">
                <div class="form-group">
                    <label>Nombre padre</label>
                    <select required class="form-control" name="padre">
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos) {
                            if (isset ($estado)) { 
                                    if ($datos->ani_sexo==1) {

                                      echo "<option  value='".$datos->ani_id."'>".$datos->ani_nombre." ".$datos->ani_rp."</option>";
                                
                                    }
                                 
                            }else{
                                  foreach ($anima->result() as $datoss) {
                                    if ($datoss->ani_id==$datos->ani_padre) {
                                        echo "<option selected value='".$datoss->ani_id."'>".$datoss->ani_nombre." ".$datoss->ani_rp."</option>";
                                    } else {
                                        if ($datoss->ani_sexo==1) {
                                          echo "<option  value='".$datoss->ani_id."'>".$datoss->ani_nombre." ".$datoss->ani_rp."</option>";
                                    
                                        }
                                    }
                                 }
                            }

                         }
                         
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre madre</label>
                    <select required class="form-control" name="madre">
                        <option value=""> selecione...</option>;
                        <?php foreach ($animales->result() as $datos) {
                            if (isset ($estado)) { 
                                    if ($datos->ani_sexo==2) {
                                      echo "<option  value='".$datos->ani_id."'>".$datos->ani_nombre." ".$datos->ani_rp."</option>";
                                
                                    }
                                 
                            }else{
                              foreach ($anima->result() as $datoss) {
                                if ($datoss->ani_id==$datos->ani_madre) {
                                    echo "<option selected value='".$datoss->ani_id."'>".$datoss->ani_nombre." ".$datoss->ani_rp."</option>";
                                } else {
                                    if ($datoss->ani_sexo==2) {
                                      echo "<option  value='".$datoss->ani_id."'>".$datoss->ani_nombre." ".$datoss->ani_rp."</option>";
                                
                                    }
                                }
                             }
                            }
                        }
                         
                         ?>
                    </select>
                </div>                            
                            <div class="form-group">
                                <label for="fechanac">Fecha de nacimiento</label>
                                <input type="date" required class="form-control" id="fechar" name="fechanac"
                                onclick="validar();" value=<?php if(isset ($animales)&& (!isset ($estado))) echo $datos->ani_fechanac;?>>
                            </div>
                            <div id="result"></div>
                            <div class="form-group">
                                <label for="fechareg">Fecha de registro</label>
                                <input type="date" required class="form-control" id="fechar" name="fechareg"
                               onclick="validar();" value=<?php if(isset ($animales)&& (!isset ($estado))) echo $datos->ani_fechareg;?>>
                            </div>
                            <div id="result"></div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion"
                                autofocus onkeypress="return soloLetras(event)" value="<?php if(isset ($animales)&& (!isset ($estado))) echo $datos->ani_descripcion;?>">
                            </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
</div>