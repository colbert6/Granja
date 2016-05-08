<?php 
if(isset ($animales))  {  $datos=$animales->row(); }  
?>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
        
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post"  class="animales">
            <div class="box-body">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <?php if(isset ($animales)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->ani_id; ?>>
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label for="codigo">Codigo</label>
                    <input type="text" required class="form-control" id="codigo" name="codigo" placeholder="Ingrese codigo"
                    autofocus onkeypress="return soloNumeros(event)"
                    value=<?php if(isset ($animales)) echo $datos->ani_rp; ?> >

                </div>
                <div>
               </div>
                <div class="form-group">
                    <label>Raza</label>
                    <select required class="form-control" name="raza">
                        <option value=""> selecione...</option>;
                        <?php foreach ($razas->result() as $datos_r) {

                            if ($datos_r->raz_id==$datos->ani_raza) {
                                echo "<option select value='".$datos_r->raz_id."'>".$datos_r->raz_descripcion."</option>";
                            } else {
                               echo "<option  value='".$datos_r->raz_id."'>".$datos_r->raz_descripcion."</option>";
                            }

                            }
                         
                         ?>
                    </select>
                </div>

              <!--  <div class="form-group">
                    <label>Tipo Registro</label>
                    <select class="form-control" name="tipo_registro" required>
                        <option value=""> selecione...</option>;
                        <?php foreach ($tipo_registro->result() as $datos_tr) {
                            if ($datos_tr->tipreg_id==$datos->ani_tiporeg) {
                                echo "<option  select value='".$datos_tr->tipreg_id."'>".$datos_tr->tipreg_descripcion."</option>";
                            } else {
                                echo "<option  value='".$datos_tr->tipreg_id."'>".$datos_tr->tipreg_descripcion."</option>";
                            }
                            
                                

                            }
                         
                         ?>
                    </select>
                </div>-->
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre"
                     autofocus onkeypress="return soloLetras(event)" value=<?php if(isset ($animales)) echo $datos->ani_nombre;?> >
                </div>
                <div class="form-group">
                    <label for="proveedor">Proveedor</label>
                    <input type="text" required class="form-control" id="proveedor" name="proveedor" placeholder="Ingrese proveedor"
                    autofocus onkeypress="return soloLetras(event)" value=<?php if(isset ($animales)) echo $datos->ani_proveedor;?>>
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
                                <label for="npadre">Nombre padre</label>
                                <input type="text" required class="form-control" id="padre" name="padre" placeholder="Ingrese nombre del padre"
                                autofocus onkeypress="return soloLetras(event)" value=<?php if(isset ($animales)) echo $datos->ani_padre;?>>
                            </div>
                            <div class="form-group">
                                <label for="nmadre">Nombre madre</label>
                                <input type="text" required class="form-control" id="madre" name="madre" placeholder="Ingrese nombre de la madre"
                                autofocus onkeypress="return soloLetras(event)" value=<?php if(isset ($animales)) echo $datos->ani_madre;?>>
                            </div>
                            <div class="form-group">
                                <label for="sexo">Sexo</label>
                                <input type="text" required class="form-control" id="sexo" name="sexo" placeholder="Ingrese nombre de la madre"
                                autofocus onkeypress="return soloLetras(event)" value=<?php if(isset ($animales)) echo $datos->ani_sexo;?>>
                            </div>
                            <div class="form-group">
                                <label for="fechanac">Fecha de nacimiento</label>
                                <input type="date" required class="form-control" id="fechanac" name="fechanac"
                                value=<?php if(isset ($animales)) echo $datos->ani_fechanac;?>>
                            </div>
                            <div class="form-group">
                                <label for="fechareg">Fecha de registro</label>
                                <input type="date" required class="form-control" id="fechareg" name="fechareg"
                                value=<?php if(isset ($animales)) echo $datos->ani_fechareg;?>>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion"
                                autofocus onkeypress="return soloLetras(event)" value=<?php if(isset ($animales)) echo $datos->ani_descripcion;?>>
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