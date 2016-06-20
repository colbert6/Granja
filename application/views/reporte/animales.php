<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th rowspan='2'>#</th>
                        <th rowspan='2'>RP</th>
                        <th rowspan='2'>NOMBRE</th>
                        <th colspan='2'>MADRE</th>
                        <th colspan='2'>PADRE</th>
                        <th rowspan='2'>SEXO</th>
                        <th rowspan='2'>FECH.NAC</th>
                        <th rowspan='2'>EDAD</th>
                        <th rowspan='2'>DESCRIPCION</th>
                        <th rowspan='2'>ESTADO</th>
                    </tr>
                    <tr>
                      <th>RP</th>
                      <th>NOMBRE</th>
                      <th>RP</th>
                      <th>NOMBRE</th>
                      
                    </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach (@$animales->result() as $datos) {   ?>
                        <tr>
                            <?php
                              $val_u = date_create($datos->ani_fechanac);
                              $nac = date_format($val_u, 'd-m-Y');   
                            ?>
                            <td><?= $i++; ?></td>
                            <td><?= $datos->ani_rp; ?></td>
                            <td><?= $datos->ani_nombre; ?></td> 
                            <!--MADRE-->
                            <td><?php foreach (@$animales->result() as $datoss) {   if($datos->ani_madre==$datoss->ani_id) echo $datoss->ani_rp;} ?></td>
                            <td><?php foreach (@$animales->result() as $datoss) {   if($datos->ani_madre==$datoss->ani_id) echo $datoss->ani_nombre;} ?></td>
                            <!--PADRE-->
                            <td><?php foreach (@$animales->result() as $datoss) {   if($datos->ani_padre==$datoss->ani_id) echo $datoss->ani_rp;} ?></td>
                            <td><?php foreach (@$animales->result() as $datoss) {   if($datos->ani_padre==$datoss->ani_id) echo $datoss->ani_nombre;} ?></td>
                            <!--SEXO-->
                            <td><?php foreach (@$sexo->result() as $sex) {   if($datos->ani_sexo==$sex->sexcr_id) echo strtoupper($sex->sexcr_abreviatura);} ?></td>
                            <td><?= $nac; ?></td>
                            <?php 
                              $hoy = date('Y-m-d');
                              $date1=date_create($nac);
                              $date2=date_create($hoy);
                              $diff=date_diff($date1,$date2);
                            ?>
                            <td>
                            <?php
                              if($diff->format('%y') == 0){
                                if($diff->format('%m') == 0){
                                  
                                    echo $diff->format('%a dias'); 
                                }else{
                                  echo $diff->format('%m meses');
                                }
                              }else{
                                echo $diff->format('%y años');
                              } 
                               
                            ?>
                            </td>
                            <td><?= $datos->ani_descripcion; ?></td>
                      
                            <td>
                              <?php  foreach (@$muerte->result() as $mu) {   if($datos->ani_id==$mu->mue_rp){ echo "MUERTO";}else{echo "VIVO";}}
                              ?>

                            </td>
                      
                        </tr>
                    <?php } ?>
                   
                </tbody>
            </table>
        </div>
    </div>   
</div>  