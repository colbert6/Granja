<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th rowspan='2'>#</th>
                        <th rowspan='2'>CODIGO</th>
                        <th rowspan='2'>NOMBRE</th>
                        <th rowspan='2'>N° PARTO</th>
                        <th colspan='3'>ULTIMO PARTO</th>
                        <th colspan='4'>SERVICIO</th>
                        <th colspan='2'>PROB.PARTO</th>
                        <th colspan='2'>CONT.ULT.SEM</th>
                        <th rowspan='2'>DIAS POST.PARTO</th>
                    </tr>
                    <tr>
                      <th>FECHA</th>
                      <th>SEXO</th>
                      <th>TIP.SERV</th>
                      <th>FECHA</th>
                      <th>TIPO</th>
                      <th>REPROD.</th>
                      <th>PREÑADA</th>
                      <th>FECHA</th>
                      <th>MES</th>
                      <th>TOTAL</th>
                      <th>PROM.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php foreach (@$produccion1->result() as $datos) {   ?>
                          <?php
                          if($datos->up_fecha!=""){
                            $val_u = date_create($datos->up_fecha);
                          $date_u = date_format($val_u, 'Y-m-d');  
                          } else{
                            $date_u="";
                          }
                           
                          ?>
                        <tr>

                            <td><?= $i++; ?></td>
                            <td><?= $datos->a_rp; ?></td>
                            <td><?= $datos->a_nombre; ?></td>
                            <td><?= $datos->num_par; ?></td>
                            <td><?= $date_u; ?></td>
                            <td><?= $datos->up_sexo; ?></td> 
                            <td><?= $datos->up_tipser; ?></td>
                            <?php 
                            $c = 0;
                            $max='';
                            $id = '';
                            $tipo_s = '';
                            $repro = '';
                            foreach (@$servicio->result() as $serv) { 
                              $val = date_create($serv->ser_fecha_evento);
                              $date_t = date_format($val, 'Y-m-d'); 
                              if($serv->ser_animal == $datos->a_id && $date_t>$date_u){
                                if($max<$date_t){
                                  $max =$date_t;
                                  $id = $serv->ser_id;
                                  foreach (@$tipo_servicio->result() as $tipser) {   
                                    if($serv->ser_tipo_servicio==$tipser->tipse_id) 
                                      $tipo_s = strtoupper($tipser->tipse_abreviatura);
                                  }
                                  foreach (@$reproductor->result() as $rep) {   
                                    if($serv->ser_reproductor==$rep->repro_id) 
                                      $repro = strtoupper($rep->repro_abreviatura);
                                  }
                                }
                              }
                            }
                            $preniada = false;
                            $fecha_p = "";
                            if($max != ""){
                              foreach (@$tacto_rectal->result() as $tactrec) {
                                $val = date_create($tactrec->tarec_fecha_evento);
                                $date_trec = date_format($val, 'Y-m-d');
                                if($tactrec->tarec_rp == $datos->a_id && $date_trec>$max){
                                  if($tactrec->tarec_diag_utero == 1){
                                    $preniada=true;
                                  }
                                }   
                              }
                              $fecha_pr = new DateTime($max);
                              $fecha_pr->add(new DateInterval('P9M'));
                              $fecha_p = $fecha_pr->format('Y-m-d');
                            }
                            $suma = 0;
                            foreach (@$control->result() as $cont) {
                              $fin = date('Y-m-d');
                              $ini = strtotime ( '-7 day' , strtotime ( $fin ) ) ;
                              $ini = date ( 'Y-m-d' , $ini );
                              if($cont->con_rp == $datos->a_id){
                                 if($cont->con_fecha>$ini && $cont->con_fecha<=$fin){
                                    $suma += $cont->con_control_1+$cont->con_control_2;
                                 }
                              }
                            }
                            $ahora = date_create(date('Y-m-d'));
                            $_uparto = date_create($date_u);
                            $num_dias = date_diff($_uparto,$ahora);
                            ?>
                            <td><?= $max ?></td>
                            <td><?= $tipo_s ?></td> 
                            <td><?= $repro ?></td>
                            <td><?php if($preniada) echo "SI"; ?></td>
                            <td><?php if($preniada) echo $fecha_p; ?></td>
                            <td><?php if($preniada) echo date("m", strtotime($fecha_p)); ?></td>
                            <td><?= $suma; ?></td>
                            <td><?= round($suma/14, 2); ?></td>
                            <td><?= $num_dias->format('%a') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>   
</div>  
                
