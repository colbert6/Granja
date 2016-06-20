<h3 class='text-center'><u>SECAR POR PREÑEZ</u></h3>
<div class="box-body table-responsive">
   <table  id='tabla5' class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">NOMBRE</th>
                <th class="text-center">RP</th>
                <th class="text-center">FECHA</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $k=1;
            

            foreach (@$animales->result() as $animal) {
              $pParto='1990-01-01';$uParto='1990-01-01';$uServicio='1990-01-01';
              $cant_serv=0;$preniada=false;
              //ULTIMO PARTO 
              foreach (@$produccion1->result() as $pro1) {
                if($animal->ani_id == $pro1->a_id){
                    $val_u = date_create($pro1->up_fecha);
                    $uParto = date_format($val_u, 'Y-m-d');  
                }
              }
              //ULTIMO SERVICIO
              foreach (@$servicio->result() as $serv) { 
                $val = date_create($serv->ser_fecha_evento);
                $date_t = date_format($val, 'Y-m-d'); 
                if(($serv->ser_animal == $animal->ani_id) && ($date_t>$uParto)){
                    if($uServicio<$date_t){
                        $uServicio = $date_t; 
                    }
                }
              }
              //SABER SI ESTA PREÑADA
              foreach (@$tacto_rectal->result() as $tactrec) {
                $val = date_create($tactrec->tarec_fecha_evento);
                $date_trec = date_format($val, 'Y-m-d');
                if($tactrec->tarec_rp == $animal->ani_id && $date_trec>$uServicio){
                  if($tactrec->tarec_diag_utero == 1){
                    $preniada=true;
                  }
                }   
              }
              if($preniada){
                $ahora = date_create(date('Y-m-d'));
                $servicio = date_create($uServicio);
                $num_mes = date_diff($ahora,$servicio);
                $antes_p = $num_mes->format('%m');

                if($antes_p>=7 ){ ?>
                    <tr>
                   <td class="text-center"><?= $k++; ?></td> 
                   <td class="text-center"><?= $animal->ani_nombre; ?></td>
                   <td class="text-center"><?= $animal->ani_rp; ?></td>
                   <td class="text-center">
                      <?php foreach (@$razas->result() as $raz) {
                          if($raz->raz_id == $animal->ani_raza){
                              echo $raz->raz_descripcion;
                          }  
                      };?>
                   </td> 
                </tr>
            <?php    }  
            }
                ?>
                
            <?php } ?>
           
        </tbody>
</div>