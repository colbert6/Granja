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

$suma =array(1=>array('cont_1' => 0,'cont_2' => 0),
                2=>array('cont_1' => 0,'cont_2' => 0 ),
                3=>array('cont_1' => 0,'cont_2' => 0 ),
                4=>array('cont_1' => 0,'cont_2' => 0 ),
                5=>array('cont_1' => 0,'cont_2' => 0 ),
                6=>array('cont_1' => 0,'cont_2' => 0 ),
                7=>array('cont_1' => 0,'cont_2' => 0 ));
?>

<script type="text/javascript" src="<?php echo base_url()?>js/highcharts.js"></script>
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
						<th rowspan="2">TOTAL</th>
						<th rowspan="2">PROMEDIO</th>
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
                        $suma_total = 0;
                        $suma_promedio = 0;
                        foreach (@$animales->result() as $datos) {   ?>
                        <tr>
                            <td onclick="grafico()"><?= $datos->ani_id;?></td>
                            <td onclick="grafico()"><?= $datos->ani_rp; ?></td> 
                            <td onclick="grafico()"><?= $datos->ani_nombre; ?></td>
                            <?php
                            $fecha = date_create($fechas["inicio"]);
                            $suma_fila = 0;
                            for ($t=1; $t<=$int_dias+1 ; $t++) {
                        
                                $aux = date_format($fecha, 'Y-m-d');
                                $indice = multidimensional_search($controles, array('con_fecha'=>$aux, 'con_rp'=>$datos->ani_id));
                                if(is_numeric($indice)){
                                     echo "<td>".$controles[$indice]["con_control_1"]."</td>";
                                    echo "<td>".$controles[$indice]["con_control_2"]."</td>";
                                    $suma[$t]['cont_1']+=$controles[$indice]["con_control_1"];
                                    $suma[$t]['cont_2']+=$controles[$indice]["con_control_2"];
                                    $suma_fila+=$controles[$indice]["con_control_1"]+$controles[$indice]["con_control_2"];
                                }else{
                                   echo "<td>-</td>";
                                    echo "<td>-</td>";
                                }
                                
                                
                                date_add($fecha, date_interval_create_from_date_string('1 days'));
                            }   


                            ?>
							<td><?php echo round($suma_fila,2); $suma_total+=$suma_fila;?></td>
							<td><?php $pro = round($suma_fila/14,2);echo $pro; $suma_promedio+=$pro;?></td>
                        </tr>
                    <?php $i++; } ?>
                </tbody>
                <tfoot>
                    <tr >
                    </tr>
                    <tr class="danger">
                        <th colspan="3" style="text-align:right">Total:</th>
                        <?php
                            for ($t=1; $t<=$int_dias+1 ; $t++) {
                                $sum=$suma[$t]['cont_1']+$suma[$t]['cont_2'];
                                echo "<td class='$t' id='$sum'>".$suma[$t]['cont_1']."</td>";
                                echo "<td>".$suma[$t]['cont_2']."</td>";
                            }
							
                        ?>
                        <td><?php echo $suma_total; ?></td>
						<td><?php echo $suma_promedio; ?></td>
                    </tr>
                </tfoot>
                
            </table>
            <div class="col-xs-12">
            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Imprimir</button>
        </div>

        <!--modal-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">REPORTE GRAFICO</h4>
                        </div>
                        <div class="modal-body">
                          
                            <div id="container" style="min-width: 510px; height: 480px; margin: 0 auto"></div>

                        </div>
                        <br><br>
                        <div class="modal-footer">

                          <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                      
                    </div>

        </div>
            
    </div>
<script type="text/javascript">
    function grafico(){

        var uno = parseFloat($(".1").attr("id"));
        var dos = parseFloat($(".2").attr("id"));
        var tres = parseFloat($(".3").attr("id"));
        var cuatro = parseFloat($(".4").attr("id"));
        var cinco = parseFloat($(".5").attr("id"));
        var seis = parseFloat($(".6").attr("id"));
        var siete = parseFloat($(".7").attr("id"));
        var a = $("#fecha_inicio").val();
        var b = a.split("-");
        var dia = parseInt(b[2]);
        var mes=b[1];
        var ano =b[0];
       alert(uno);
        $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total percent market share'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: dia+"-"+mes+"-"+ano+" ",
                y: uno,
                drilldown: null
            },
            {
                name: dia+1+"-"+mes+"-"+ano+" ",
                y: dos,
                drilldown: null
            },{
                name: dia+2+"-"+mes+"-"+ano+" ",
                y: tres,
                drilldown: null
            },{
                name: dia+3+"-"+mes+"-"+ano+" ",
                y: cuatro,
                drilldown: null
            },{
                name: dia+4+"-"+mes+"-"+ano+" ",
                y: cinco,
                drilldown: null
            },{
                name: dia+5+"-"+mes+"-"+ano+" ",
                y: seis,
                drilldown: null
            },{
                name: dia+6+"-"+mes+"-"+ano+" ",
                y: siete,
                drilldown: null
            }]
        }]
    });
            $("#myModal").modal("show");
    }
    $(document).ready(function() {

             
  /*      var bar_data = {
            data: [["January", 100], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9]],
            color: "#3c8dbc"
        };
        $.plot("#bar-chart", [bar_data], {
                    grid: {
                        borderWidth: 1,
                        borderColor: "#f3f3f3",
                        tickColor: "#f3f3f3"
                    },
                    series: {
                        bars: {
                            show: true,
                            barWidth: 0.5,
                            align: "center"
                        }
                    },
                    xaxis: {
                        mode: "categories",
                        tickLength: 0
                    }
        });*/



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