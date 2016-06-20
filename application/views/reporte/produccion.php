<div class="row">
    <div class="col-lg-12">
        <div class="box-body table-responsive">
            <table  id="example2" class="table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th rowspan='2'>#</th>
                        <th rowspan='2'>CODIGO</th>
                        <th rowspan='2'>NOMBRE</th>
                        <th rowspan='2'>N° PARTO</th>
                        <th rowspan='2'>N° SERV</th>
                        <th colspan='3'>ULTIMO PARTO</th>
                        <th colspan='4'>SERVICIO</th>
                        <th rowspan='2'>PROB.PARTO</th>
                        <th colspan='2'>CONT.ULT.SEM</th>
                        <th rowspan='2'>DIAS POST.PARTO</th>
                        <th rowspan='2'>INSEMINAR</th>
                        <th rowspan='2'>COND.CONTROL >=8,>=5,<=5</th>
                        <th rowspan='2'>COND.CONTROL >=6,>=4,<=4</th>
                    </tr>
                    <tr>
                      <th>FECHA</th>
                      <th>SEXO</th>
                      <th>TIP.SERV</th>
                      <th>FECHA</th>
                      <th>TIPO</th>
                      <th>REPROD.</th>
                      <th>PREÑADA</th>
                      <th>TOTAL</th>
                      <th>PROM.</th>
                    </tr>
                </thead>
                <tbody>
<!--INICIO DE PROGRAMACION-->
<?php $k=1; $total_t = array('sum' => 0 ,'prom' => 0,'sec' => 0,'cont' => 0);
$postpart_t = array('nd'=>0,'seca'=>0,'50'=>0,'100'=>0,'150'=>0,'200'=>0,'250'=>0,'300'=>0);
$contprom_t = array('secas'=>0,'8'=>0,'58'=>0,'5'=>0);
$sumprom_t = array('<=5'=>0);
$probpart_t = array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0,
  '8'=>0,'9'=>0,'10'=>0,'11'=>0,'12'=>0);
?>
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

        
        <?php 
  //-------------------------------------------
         $c = 0;$max='';$id = '';$tipo_s = '';$repro = '';
        foreach (@$servicio->result() as $serv) { 
          $val = date_create($serv->ser_fecha_evento);
          $date_t = date_format($val, 'Y-m-d'); 
          if(($serv->ser_animal == $datos->a_id) && ($date_t>$date_u)){
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

        $preniada=false;
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
          $mes='';$unidad="";

          foreach (@$tiempo_parto->result() as $tem) {
            $mes = $tem->cant; 
            $unidad = strtoupper($tem->unidad_tiempo);
          }
          $fecha_pr = new DateTime($max);
          $fecha_pr->add(new DateInterval('P'.$mes.$unidad));
          $fecha_p = $fecha_pr->format('Y-m-d');
        }
        $suma = 0;
        //-------------CONTROLES----------------
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
        //------SECADO---------
        $secadito = false;
        foreach (@$secado->result() as $sec) {
          if($sec->sec_rp == $datos->a_id){
            $secadito = true;
          }
        }
        //-----NUM SERVICIOS---------
        $m_numers = 0;
        foreach (@$serv_num->result() as $peru) {
          if($peru->ser_animal == $datos->a_id){
              $m_numers = $peru->num_serv;
          }
        }
        //--------DIAS POST PARTO--------
        $anio = date('Y');
        $ahora = date_create(date('Y-m-d'));
        $_uparto = date_create($date_u);
        $num_dias = date_diff($_uparto,$ahora);
        $post_part = $num_dias->format('%a');
        //------------ULTIMO CONTROL---------------
        $uTotal = $suma;
        $uPromedio = round($suma/14, 2);
        
        
        ?>
        <td><?= $k; ?></td>
        <td><?= $datos->a_rp; ?></td>
        <td><?= $datos->a_nombre; ?></td>
        <td><?= $datos->num_par; ?></td>
        <td><?= $m_numers; ?></td>
        <td><?= $date_u; ?></td>
        <td><?= $datos->up_sexo; ?></td> 
        <td><?= $datos->up_tipser; ?></td>
        <td><?= $max; ?></td>
        <td><?= $tipo_s; ?></td> 
        <td><?= $repro; ?></td>
        <td><?php if($preniada) echo "SI"; ?></td>
        <td><?php $val='';$ver='';$ot=0; if($preniada){echo $fecha_p;
$obj = date_create($fecha_p); $ver=date_format($obj,"m");$ot+=$ver;$val=$fecha_p;
  if(date_format($obj,"Y")==$anio) $probpart_t[$ot]++;
} ?><input readonly type='hidden' value='<?php echo $val; ?>' id='p_<?= $k;?>' /></td>
      
        <td><?php if($secadito){echo "Seca";}else{echo $uTotal;$total_t['sum']+=$uTotal;} ?></td>
        <td><?php if($secadito){echo "Seca";$contprom_t['secas']++;$total_t['sec']++;}else{echo $uPromedio;$total_t['prom']+=$uPromedio;$total_t['prom']++;
          if($uPromedio>=8){
            $contprom_t['8']++;
          }else if($uPromedio>=5 && $uPromedio<8){
            $contprom_t['58']++;
          }else if($uPromedio<5){
            $contprom_t['5']++;
          }
          if($uPromedio<=5){
            $sumprom_t['<=5']+=$uPromedio;
          }
            
        } ?></td>
        <td><?php if($secadito){echo "Seca";$postpart_t['seca']++;}else{if($date_u==''){echo "No Definido";$postpart_t['nd']++;}else{echo $post_part;
            if($post_part>=50){
                $postpart_t['50']++;
            }else if($post_part>=100){
                $postpart_t['100']++;
            }else if($post_part>=150){
                $postpart_t['150']++;
            }else if($post_part>=200){
                $postpart_t['200']++;
            }else if($post_part>=250){
                $postpart_t['250']++;
            }else if($post_part>=300){
                $postpart_t['300']++;
            }
          }}?></td>
        <td><?php if($secadito){echo "Seca";}else{if($max!=""){if($post_part>=30){echo "SI";}else{echo "";}}else{echo "";}} ?></td>
        <td><?php if($secadito){echo "Seca";}else{if($uPromedio>=8){echo "2";}else{if($uPromedio>=5){echo "1";}else{echo "0";}}} ?></td>
        <td><?php if($secadito){echo "Seca";}else{if($uPromedio>=6){echo "2";}else{if($uPromedio>=4){echo "1";}else{echo "0";}}} ?></td>

    </tr>
<?php $k++;} ?>
<!--FIN DE PROGRAMACION-->
                </tbody>
             
            </table>
        </div>
    </div>   
</div>  
<div class="row">
    <div class="col-lg-4">
            <table  id="par" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Pariciones</th>
                        <th><input type="number" onChange="actualizar_año('<?php echo $k-1;?>');" id='anio' style='text-align: center;' value="<?= $anio; ?>" min="1990"></th>
                    </tr>
                    <tr>
                        <th>MES</th>
                        <th>CANTIDAD</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $meses = array("ENE","FEB","MAR","ABR","MAY","JUN",
                                      "JUL","AGO","SET","OCT","NOV","DIC");?>
                  <?php for ($i=0; $i < count($meses) ; $i++) { ?>
                        <tr>
                          <td><?= $meses[$i];?></td>
                          <td><input type='text' readonly  id='m<?php echo $i+1;  ?>' value='<?= $probpart_t[$i+1]; ?>'style='border: none;background: none;'/></td>
                        </tr>                    
                  <?php }?>
                </tbody>
              
            </table>
    </div>   
    <div class="col-lg-4">
            <table  id="par" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th colspan="2">DIAS POST PARTO</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>No Definido</td>
                    <td><?= $postpart_t['nd']; ?></td>
                  </tr>
                  <tr>
                    <td>Seca</td>
                    <td><?= $postpart_t['seca']; ?></td>
                  </tr>
                  <tr>
                    <td><= 50 Dias</td>
                    <td><?= $postpart_t['50']; ?></td>
                  </tr>
                  <tr>
                    <td><= 100 Dias</td>
                    <td><?= $postpart_t['100']; ?></td>
                  </tr>
                  <tr>
                    <td><= 150 Dias</td>
                    <td><?= $postpart_t['150']; ?></td>
                  </tr>
                  <tr>
                    <td><= 200 Dias</td>
                    <td><?= $postpart_t['200']; ?></td>
                  </tr>
                  <tr>
                    <td><= 250 Dias</td>
                    <td><?= $postpart_t['250']; ?></td>
                  </tr>
                  <tr>
                    <td><= 300 Dias</td>
                    <td><?= $postpart_t['300']; ?></td>
                  </tr>
                </tbody>
              
            </table>
             <table  id="par" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class='text-center' colspan="2">RESUMEN</th>
                    </tr>
                    <tr>
                        <th class='text-center'>Condicion</th>
                        <th class='text-center'>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Secas</td>
                    <td class='text-center'><?= $total_t['sec']; ?></td>
                  </tr>
                  <tr>
                    <td >En Control</td>
                    <td class='text-center'><?= $total_t['cont']; ?></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr class="warning">
                    <th class='text-center'>TOTAL</th>
                    <th class='text-center'><?php echo $total_t['sec']+$total_t['cont']; ?></th>
                  </tr>
                </tfoot>
              
            </table>
    </div>   

  
    
    <div class="col-lg-4">
            <table  id="par" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th colspan="2">CONTROLES</th>
                    </tr>
                    <tr>
                        <th>Parametro</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Secas</td>
                    <td><?= $contprom_t['secas']; ?></td>
                  </tr>
                  <tr>
                    <td>>= 8</td>
                    <td><?= $contprom_t['8']; ?></td>
                  </tr>
                  <tr>
                    <td>>= 5 y <=8</td>
                    <td><?= $contprom_t['58']; ?></td>
                  </tr>
                  <tr>
                    <td><= 5</td>
                    <td><?= $contprom_t['5']; ?></td>
                  </tr>
                </tbody>
              
            </table>

            <table  id="par" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th colspan="2">TOTAL CONTROLES</th>
                        
                    </tr>
                    
                </thead>
                <tbody>
                  <tr>
                    <td>Todas</td>
                    <td><?= $total_t['prom']; ?></td>
                  </tr>
                  <tr>
                    <td><= 5</td>
                    <td><?= $sumprom_t['<=5']; ?></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr class='warning'>
                    <th>DIFERENCIA</th>
                    <th><?php echo $total_t['prom']-$sumprom_t['<=5']; ?></th>
                  </tr>
                </tfoot>
              
            </table>
    </div>   
</div>  
                
<script type="text/javascript">
  function actualizar_año(num_a) {
    var anio = parseInt($("#anio").val());
    var meses = [0,0,0,0,0,0,0,0,0,0,0,0];    
    for (var i = 1; i <= num_a; i++) {
        fecha = $(String("#p_"+i)).val();
        if(fecha!=""){
            dat = fecha.split("-");
            if(dat[0] == anio){
              mes = parseInt(dat[1]);
              meses[mes-1]++; 
            }             
        }
    }
    for (var i = 0; i < meses.length; i++) {
       $(String("#m"+(i+1))).val(meses[i]);
    }
  }
</script>
                
