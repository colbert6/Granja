        
        <h3 class='text-center'><u>INDICADORES DE RECHAZO</u></h3>
        <div class="box-body table-responsive">
           <table  id='tabla5' class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">NOMBRE</th>
                        <th class="text-center">RP</th>
                        <th class="text-center">RAZA</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach (@$animales->result() as $datos) {   ?>
                    <?php foreach (@$rechazo->result() as $rec) {   ?>
                      <?php if ($rec->recha_rp==$datos->ani_id) {   ?>
                        <tr>
                           <td class="text-center"><?= $i++; ?></td> 
                           <td class="text-center"><?= $datos->ani_nombre; ?></td>
                           <td class="text-center"><?= $datos->ani_rp; ?></td>
                           <td class="text-center">
                              <?php foreach (@$razas->result() as $raz) {
                                  if($raz->raz_id == $datos->ani_raza){
                                      echo $raz->raz_descripcion;
                                  }  
                              };?>
                           </td> 
                        </tr>
                      <?php } ?>
                    <?php } ?>
                  <?php } ?>
                   
                </tbody>
        </div>