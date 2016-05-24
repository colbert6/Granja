<?php $controles=$control->result_array();
?>


<input type="hidden" id="t_animales" name="total_animales" value="<?php echo count($animales->result()); ?>">
<br><br>
<div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>NOMBRE</th>
                        <th>CONTROL 1</th>
                        <th>CONTROL 2</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        $i=1;
                        $cont_1=0;
                        $cont_2=0;
                        foreach (@$animales->result() as $datos) {   ?>
                        <tr>
                            <td><?= $datos->ani_id;?></td>
                            <td><?= $datos->ani_rp; ?></td> 
                            <td><?= $datos->ani_nombre; ?></td>
                            <td><?php 
                                $clave=array_search($datos->ani_rp, array_column($controles,'con_rp'));
                                if(is_numeric($clave)) {
                                    //echo $controles[$clave]['con_control_1'];
                                    $val = $controles[$clave]['con_control_1'];
                                    $id_c = $controles[$clave]['con_id'];
                                         
                                }else{
                                    $val = '';
                                    $id_c= 0;
                                }
                                //$cont_1+=$val;
                                echo "<input id_c='".$id_c."' f='$i' ani='$datos->ani_id' onkeypress='return dosDecimales(event, this)' type='text'  id='cont1".$i."' name='cont1[]' onblur=\"sumar(this,'".base_url()."');\" value='".$val."' />";

                            ?></td>
                            <td><?php
                                $clave=array_search($datos->ani_rp, array_column($controles,'con_rp'));
                                if(is_numeric($clave)) {
                                    //echo $controles[$clave]['con_control_1'];
                                    $val = $controles[$clave]['con_control_2'];
                                    $id_c = $controles[$clave]['con_id'];
                                }else{
                                    $val = '';
                                    $id_c= 0;
                                }
                                //$cont_2+=$val;
                                echo "<input f='$i' id_c='".$id_c."' ani='$datos->ani_id' onkeypress='return dosDecimales(event, this)' type='text'  id='cont2".$i."' name='cont2[]' onblur=\"sumar(this,'".base_url()."');\" value='".$val."' />";
                            ?>

                            </td>
                        </tr>
                    <?php $i++; } ?>
                </tbody>
                <tfoot>
                    <tr class="danger">
                        <th colspan="3" style="text-align:right">Total:</th>
                        <th><input type="text" id='cont1_t'  value="" /></th>
                        <th><input type="text" id='cont2_t'  value="" /></th>
                    </tr>
                </tfoot>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" onclick='guardar()' class="k-button">Guardar</a>
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
    function sumar(val,base){
        var oID_C = $(val).attr("id_c");
        var oID = $(val).attr("id");
        var animal = $(val).attr("ani");
        var fila = $(val).attr("f");
        //console.log(String("#"+oID));
        var fecha = $("#fecha_contol").val();
        var control1= $(String("#cont1"+fila)).val();
        var control2= $(String("#cont2"+fila)).val();
        if($(String("#"+oID)).val()!=""){
            if(oID_C=='0'){
                $.post(base+"index.php/controles/json_Nuevo",{animal:animal,fecha:fecha,control_1:control1,control_2:control2},function(){
                    $("#mostrarDatos").load(base+"index.php/controles/mostrarTabla/"+fecha);
                });
            }else{
                $.post(base+"index.php/controles/json_Editar",{id:oID_C,animal:animal,fecha:fecha,control_1:control1,control_2:control2},function(){
                    $("#mostrarDatos").load(base+"index.php/controles/mostrarTabla/"+fecha);
                });
            } 
        }
        
        


        /*var etq = oID.substr(0, 5);
        var t_animales = parseInt($("#t_animales").val());
        var t=0;
        for(var i=1;i<=t_animales;i++){
            var idv=String("#"+etq+i);
            val = $(idv).val();
            if(val!=""){
                console.log($(idv).val());
                if(isNaN($(idv).val())){
                    $(idv).focus()
                }else{
                    t+=parseFloat($(idv).val());
                }  
            }
        }
        res = parseFloat(Math.round(t * 100) / 100).toFixed(2);
        $(String("#"+etq+"_t")).val(res);*/
    }
</script>