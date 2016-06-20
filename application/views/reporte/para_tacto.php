<h3 class='text-center'><u>PARA TACTO</u></h3>
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
          <?php $i = 1; ?>
                  <?php foreach (@$animales->result() as $datos) {   ?>
                    <?php foreach (@$tacto_rectal->result() as $tactrec) {?>
                      <?php if (($tactrec->tarec_rp==$datos->ani_id) && ($tactrec->tarec_diag_utero == 1)) { 
                        $val = date_create($tactrec->tarec_fecha_evento);
                        $fin = date_format($val, 'Y-m-d'); 
                        
                        //$ini = strtotime ( '+9 month' , strtotime ( $fin ) ) ;
                        //$ini = date ( 'Y-m-d' , $ini );
                        $ini1 = strtotime ( '+47 day' , strtotime ( $fin ) ) ;
                        $ini1 = date ( 'Y-m-d' , $ini1 );

                        $fin1 = date('Y-m-d');
                        $ini2 = strtotime ( '-1 day' , strtotime ( $fin1 ) ) ;
                        $ini2 = date ( 'Y-m-d' , $ini2 );
                      //  echo $ini1 ;
                         if ($ini2>=$ini1) {?>                       
                        
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
                  <?php } ?>          
        </tbody>
</div>