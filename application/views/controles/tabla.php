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
                        foreach (@$animales->result() as $datos) {   ?>
                        <tr>
                            <td><?= $i;?><input type="hidden" name="id[]" id='id<?php echo $i; ?>' value="<?php echo $datos->ani_id; ?>"></td>
                            <td><?= $datos->ani_rp; ?></td> 
                            <td><?= $datos->ani_nombre; ?></td>
                            <td><input type="text" id='cont1<?php echo $i; ?>' name='cont1[]' onblur='sumar(this);' value="" /></td>
                            <td><input type="text"  id='cont2<?php echo $i;$i++;  ?>' name='cont2[]' onblur='sumar(this);' value="" /></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
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
            });
        }); 
</script>