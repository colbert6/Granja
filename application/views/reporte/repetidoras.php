
<h3 class='text-center'><u>REPETIDORAS</u></h3>
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
          <?php
            $k=1; 
            foreach (@$animales->result() as $animal) {
              $uParto='1990-01-01';$cant_serv=0; 
              foreach (@$produccion1->result() as $pro1) {
                if($animal->ani_id == $pro1->a_id){
                    $val_u = date_create($pro1->up_fecha);
                    $uParto = date_format($val_u, 'Y-m-d');  
                }
              }
              foreach (@$servicio->result() as $serv) { 
                $val = date_create($serv->ser_fecha_evento);
                $date_t = date_format($val, 'Y-m-d'); 
                if(($serv->ser_animal == $animal->ani_id) && ($date_t>$uParto)){
                  $cant_serv++;
                }
              }
              if($cant_serv>1){?>
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
           
        </tbody>
</div>