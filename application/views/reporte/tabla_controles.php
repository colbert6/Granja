<?php $controles=$control->result_array();

$interval = date_diff(date_create($fechas["inicio"]), date_create($fechas["fin"]));
$int_dias = $interval->format('%a');
function multidimensional_search($parents, $searched) { 
  if (empty($searched) || empty($parents)) { 
    return false; 
  } 

  foreach ($parents as $key => $value) { 
    $exists = true; 
    foreach ($searched as $skey => $svalue) { 
      $exists = ($exists && IsSet($parents[$key][$skey]) && $parents[$key][$skey] == $svalue); 
    } 
    if($exists){ return $key; } 
  } 

  return false; 
} 
?>


<input type="hidden" id="t_animales" name="total_animales" value="<?php echo count($animales->result()); ?>">
<br><br>
<div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th rowspan="2">ID</th>
                        <th rowspan="2">RP</th>
                        <th rowspan="2">NOMBRE</th>
                        <?php 
                            $fecha = date_create($fechas["inicio"]);
                            for ($i=0; $i <=$int_dias ; $i++) { 

                                echo "<th colspan='2'>".date_format($fecha, 'd/m/Y')."</th>";
                                date_add($fecha, date_interval_create_from_date_string('1 days'));
                            }
                            
                    
                        ?>
                    </tr>
                    <tr>
                        <?php 
                             for ($i=0; $i<=$int_dias ; $i++) {
                                echo "<th>C1</th>";
                                echo "<th>C2</th>";
                             }    
                        ?>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        $i=1;
                        foreach (@$animales->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->ani_id;?></td>
                            <td><?= $datos->ani_rp; ?></td> 
                            <td><?= $datos->ani_nombre; ?></td>
                            <?php
                            $fecha = date_create($fechas["inicio"]);
                            
                            for ($t=0; $t<=$int_dias ; $t++) {
                        
                                $aux = date_format($fecha, 'Y-m-d');
                                $indice = multidimensional_search($controles, array('con_fecha'=>$aux, 'con_rp'=>$datos->ani_id));
                                if(is_numeric($indice)){
                                     echo "<td>".$controles[$indice]["con_control_1"]."</td>";
                                    echo "<td>".$controles[$indice]["con_control_2"]."</td>";
                                }else{
                                   echo "<td>-</td>";
                                    echo "<td>-</td>";
                                }
                                
                                
                                date_add($fecha, date_interval_create_from_date_string('1 days'));
                            }   
                            ?>
                        </tr>
                    <?php $i++; } ?>
                </tbody>
                
            </table>
            <div class="col-xs-12">
            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Imprimir</button>
        </div>
            
        </div>
<script type="text/javascript">
    $(document).ready(function() {

               $("#tab").dataTable({
                 
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    "oLanguage" :{
                        'sProcessing':     'Cargando...',
                        'sLengthMenu':     'Mostrar _MENU_ registros',
                        'sZeroRecords':    'No se encontraron resultados',
                        'sEmptyTable':     'Ningún dato disponible en esta tabla',
                        'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
                        'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
                        'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
                        'sInfoPostFix':    '',
                        'sSearch':         'Buscar:',
                        'sUrl':            '',
                        'sInfoThousands':  '',
                        'sLoadingRecords': 'Cargando...',
                        'oPaginate': {
                            'sFirst':    'Primero',
                            'sLast':     'Último',
                            'sNext':     'Siguiente',
                            'sPrevious': 'Anterior'
                        },
                        'oAria': {
                            'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                            'sSortDescending': ': Activar para ordenar la columna de manera descendente'
                        }
                    },
                    'aaSorting': [[ 0, 'asc' ]],//ordenar
                    'iDisplayLength': 5,
                    'aLengthMenu': [[5, 10, 20], [5, 10, 20]]
            })      
      }); 
    
</script>