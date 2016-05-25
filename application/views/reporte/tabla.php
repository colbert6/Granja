<!--DE AQUI EMPIEZA-->

            <div class="box-body table-responsive">
                <table id="tabla_f" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            
                            <th class='text-center' rowspan="2">ID</th>
                            <th class='text-center' rowspan="2">RP</th>
                            <th class='text-center' rowspan="2">Nombre</th>
                            <th class='text-center' colspan="12">MESES</th>
                            
                        </tr>
                        <tr>
                            <th class='text-center'>Ene</th>
                            <th class='text-center'>Feb</th>
                            <th class='text-center' >Mar</th>
                            <th class='text-center' >Abr</th>
                            <th class='text-center' >May</th>
                            <th class='text-center' >Jun</th>
                            <th class='text-center' >Jul</th>
                            <th class='text-center' >Ago</th>
                            <th class='text-center' >Sep</th>
                            <th class='text-center' >Oct</th>
                            <th class='text-center' >Nov</th>
                            <th class='text-center' >Dic</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;

                     foreach (@$animales->result() as $datos) {  
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <?= $datos->ani_rp; ?>
                            </td>
                            <td><?= $datos->ani_nombre; ?></td>
                            <?php for ($j=1; $j <=12 ; $j++) { ?>
                                <td class='text-center'>

                                <div id='<?php echo $i."".$j;?>'>
                                <?php
                                    $num=0;
                                    foreach (@$eventos->result() as $evento) {
                                        $num++;
                                        if($evento->ani_id == $datos->ani_id){
                                            $fecha = strtotime($evento->eve_fecha);
                                            if(date("m", $fecha)==$j){
                                                foreach (@$simbolos->result() as $simbolo) {
                                                    if($simbolo->sim_id == $evento->sim_id){

                                                    
                                ?>                                  
                                    <button type="button"  onclick="editarEvento('<?php echo $evento->eve_id; ?>','<?= base_url(); ?>');">
                                         <i class="<?php echo $simbolo->sim_icono; ?>" ></i>
                                      <span class="badge"><?php echo date("d", $fecha)?></span>
                                    </button><br>
                                <?php 
                                                   }
                                                }          
                                            }
                                        } 
                                    }
                                ?>
                                </div>

                                </td>
                            <?php } 
                                
                            ?>
                            
                        </tr>
                    <?php }?>                        
                        
                        
                        
                       
                    </tbody>
                    
                </table>
            </div><!-- /.box-body -->

<script type="text/javascript">
    $(document).ready(function(){
        $("#tabla_f").dataTable({        
            "bPaginate": false,
            "bLengthChange": true,
            "bFilter": false,
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
            'iDisplayLength': 20,
            'aLengthMenu': [[5, 10, 20], [5, 10, 20]]

        });
    });
</script>